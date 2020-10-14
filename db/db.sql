/* Conditionally drop tables */

DROP TABLE IF EXISTS public.messages;
DROP TABLE IF EXISTS public.moves;
DROP TABLE IF EXISTS public.game;
DROP TABLE IF EXISTS public.user;


/* Create the tables */

CREATE TABLE public.user
( id SERIAL NOT NULL PRIMARY KEY
, username VARCHAR(256) NOT NULL UNIQUE
, password VARCHAR(100) NOT NULL
, display_name VARCHAR(100) NOT NULL
, date_created TIMESTAMP NOT NULL
);

CREATE TABLE public.game
( id SERIAL NOT NULL PRIMARY KEY
, game_owner INT NOT NULL
, game_name VARCHAR(100) NOT NULL
, game_code VARCHAR(100) NOT NULL UNIQUE
, game_type VARCHAR(10) NOT NULL
, opponent INT
, grid_owner VARCHAR(100) NOT NULL
, grid_opponent VARCHAR(100) NOT NULL
, is_active INT NOT NULL
, date_created TIMESTAMP NOT NULL
, CONSTRAINT fk_game_owner FOREIGN KEY(game_owner) REFERENCES public.user(id)
, CONSTRAINT fk_opponent FOREIGN KEY(opponent) REFERENCES public.user(id)
);

CREATE TABLE public.messages
( id SERIAL NOT NULL PRIMARY KEY
, sent_by INT NOT NULL
, game_id INT NOT NULL
, body VARCHAR(500) NOT NULL
, time_sent TIMESTAMP NOT NULL
, CONSTRAINT fk_sent_by FOREIGN KEY(sent_by) REFERENCES public.user(id)
, CONSTRAINT fk_game_id FOREIGN KEY(game_id) REFERENCES public.game(id)
);

CREATE TABLE public.moves
( id SERIAL NOT NULL PRIMARY KEY
, sent_by INT NOT NULL
, game_id INT NOT NULL
, time_sent TIMESTAMP NOT NULL
, move_number INT NOT NULL
, board_update_sent_by VARCHAR(100) NOT NULL
, board_update_recieved_by VARCHAR(100) NOT NULL
, CONSTRAINT fk_sent_by FOREIGN KEY(sent_by) REFERENCES public.user(id)
, CONSTRAINT fk_game_id FOREIGN KEY(game_id) REFERENCES public.game(id)
);

/* Check the tables */

SELECT * FROM public.user;
SELECT * FROM public.game;
SELECT * FROM public.messages;
SELECT * FROM public.moves;

/* Insert test data */ 

INSERT INTO public.user
( username
, password
, display_name
, date_created
)
VALUES
( 'myusername'
, 'mypassword'
, 'mydisplayname'
, (SELECT CURRENT_TIMESTAMP)
);

INSERT INTO public.user
( username
, password
, display_name
, date_created
)
VALUES
( 'myusername2'
, 'mypassword2'
, 'mydisplay_name2'
, (SELECT CURRENT_TIMESTAMP)
);

INSERT INTO public.user
( username
, password
, display_name
, date_created
)
VALUES
( 'myusername3'
, 'mypassword3'
, 'mydisplay_name3'
, (SELECT CURRENT_TIMESTAMP)
);

INSERT INTO public.game
( game_owner
, opponent
, game_name
, game_code
, game_type
, grid_owner
, grid_opponent
, is_active
, date_created
)
VALUES
( 1
, 2
, 'Battle Boats 2.0'
, '2FGH59KJD3'
, 'PUBLIC'
, '* * * * * * * * * *'
, '* * * * * * * * * *'
, 1
, (SELECT CURRENT_TIMESTAMP)
);

INSERT INTO public.game
( game_owner
, opponent
, game_name
, game_code
, game_type
, grid_owner
, grid_opponent
, is_active
, date_created
)
VALUES
( 1
, 3
, 'Battle Boats 2.5'
, 'ABCD3FG'
, 'PUBLIC'
, '* * * * * * * * * *'
, '* * * * * * * * * *'
, 1
, (SELECT CURRENT_TIMESTAMP)
);

INSERT INTO public.game
( game_owner
, opponent
, game_name
, game_code
, game_type
, grid_owner
, grid_opponent
, is_active
, date_created
)
VALUES
( 3
, 2
, 'Battle Boats 2.0'
, 'CDEF574389'
, 'PRIVATE'
, '* * * * * * * * * *'
, '* * * * * * * * * *'
, 1
, (SELECT CURRENT_TIMESTAMP)
);

INSERT INTO public.game
( game_owner
, game_name
, game_code
, game_type
, grid_owner
, grid_opponent
, is_active
, date_created
)
VALUES
( 1
, 'Battle Boats 3.0'
, 'CODE7'
, 'PRIVATE'
, '* * * * * * * * * *'
, '* * * * * * * * * *'
, 0
, (SELECT CURRENT_TIMESTAMP)
);

INSERT INTO public.messages
( sent_by
, game_id
, body
, time_sent
)
VALUES
( 1
, 1
, 'I am going to win!'
, (SELECT CURRENT_TIMESTAMP)
);

INSERT INTO public.messages
( sent_by
, game_id
, body
, time_sent
)
VALUES
( 2
, 1
, 'No, I am going to win!'
, (SELECT CURRENT_TIMESTAMP)
);

INSERT INTO public.messages
( 
  sent_by
, game_id
, body
, time_sent
)
VALUES
( 1
, 2
, 'No, I am going to win!'
, (SELECT CURRENT_TIMESTAMP)
);

INSERT INTO public.messages
( sent_by
, game_id
, body
, time_sent
)
VALUES
( 3
, 2
, 'You wish!'
, (SELECT CURRENT_TIMESTAMP)
);

INSERT INTO public.moves
( sent_by
, game_id
, time_sent
, move_number
, board_update_sent_by
, board_update_recieved_by
)
VALUES
( 1
, 1
, (SELECT CURRENT_TIMESTAMP)
, 1
, '* * * * * * * V V *'
, '* * * * * * * * * *'
);

INSERT INTO public.moves
( 
  sent_by
, game_id
, time_sent
, move_number
, board_update_sent_by
, board_update_recieved_by
)
VALUES
( 2
, 1
, (SELECT CURRENT_TIMESTAMP)
, 2
, '* * * * * * * V V *'
, '* * * * * * * * * *'
);

INSERT INTO public.moves
( sent_by
, game_id
, time_sent
, move_number
, board_update_sent_by
, board_update_recieved_by
)
VALUES
( 1
, 2
, (SELECT CURRENT_TIMESTAMP)
, 1
, '* * * * * * * V V *'
, '* * * * * * * * * *'
);

INSERT INTO public.moves
( sent_by
, game_id
, time_sent
, move_number
, board_update_sent_by
, board_update_recieved_by
)
VALUES
( 3
, 2
, (SELECT CURRENT_TIMESTAMP)
, 2
, '* * * * * * * V V *'
, '* * * * * * * * * *'
);

/* Query the database to test foreign keys */

SELECT 
  u.id as owner_user_id
, u.username as owner_username
, u2.id as opponent_user_id
, u2.username as opponent_username
, g.id as game_id
, g.is_active
, COUNT(DISTINCT t.id) as num_turns
, COUNT(DISTINCT m.id) as num_messages
FROM public.user u, public.game g, public.moves t, public.messages m, public.user u2
WHERE u.id = g.game_owner
AND   g.id = t.game_id
AND   g.id = m.game_id
AND   g.opponent = u2.id
GROUP BY u.id, u.username, u2.id, u2.username, g.id, g.is_active;


