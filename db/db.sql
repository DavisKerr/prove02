/* Conditionally drop tables */

DROP TABLE IF EXISTS public.board;
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
, game_code VARCHAR(100) NOT NULL
, game_type VARCHAR(10) NOT NULL
, opponent INT
, is_active INT NOT NULL
, date_created TIMESTAMP NOT NULL
, winner INT
, CONSTRAINT fk_game_owner FOREIGN KEY(game_owner) REFERENCES public.user(id)
, CONSTRAINT fk_opponent FOREIGN KEY(opponent) REFERENCES public.user(id)
, CONSTRAINT fk_winner FOREIGN KEY(winner) REFERENCES public.user(id)
);

CREATE TABLE public.board
( id SERIAL NOT NULL PRIMARY KEY
, board_owner INT NOT NULL
, game_id INT NOT NULL
, grid VARCHAR(256) NOT NULL
, CONSTRAINT fk_board_owner FOREIGN KEY(board_owner) REFERENCES public.user(id)
, CONSTRAINT fk_game_id FOREIGN KEY(game_id) REFERENCES public.game
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
, coords VARCHAR(100) NOT NULL
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
, 'mydisplayname2'
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
, 'mydisplayname3'
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
( 1
, 9
, 'You wish!'
, (SELECT CURRENT_TIMESTAMP)
);

INSERT INTO public.moves
( sent_by
, game_id
, time_sent
, move_number
, board_update_sent_by
)
VALUES
( 1
, 1
, (SELECT CURRENT_TIMESTAMP)
, 1
, "(1, 3)"
);

INSERT INTO public.moves
( sent_by
, game_id
, time_sent
, move_number
, board_update_sent_by
)
VALUES
( 2
, 1
, (SELECT CURRENT_TIMESTAMP)
, 2
, "(4, 3)"
);

INSERT INTO public.moves
( sent_by
, game_id
, time_sent
, move_number
, board_update_sent_by
)
VALUES
( 1
, 1
, (SELECT CURRENT_TIMESTAMP)
, 3
, "(3, 3)"
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

/* Query to get data for the game display */

SELECT g.game_name, g.date_created, u.display_name
FROM public.game AS g
JOIN public.user AS u
ON g.game_owner = u.id
WHERE g.is_active = 0
AND g.game_type = 'PUBLIC'
ORDER BY g.date_created;

SELECT g.game_name, g.date_created, g.is_active, g.game_type, u.display_name AS Player1, u2.display_name AS player2
FROM public.game AS g
JOIN public.user AS u 
ON g.game_owner = u.id
JOIN public.user AS u2
ON g.opponent = u2.id
WHERE g.opponent = 1
or g.game_owner = 1
ORDER BY g.date_created;

SELECT g.game_name, g.date_created, g.game_type, g.is_active, u.display_name AS Player1, u2.display_name AS player2
FROM public.game AS g
JOIN public.user AS u 
ON g.game_owner = u.id
JOIN public.user AS u2
ON g.opponent = u2.id
WHERE g.opponent = 1
or g.game_owner = 1
ORDER BY g.date_created;

SELECT g.game_name, g.date_created, g.game_type, u.display_name AS Player1, u2.display_name AS player2
      FROM public.game AS g
      JOIN public.user AS u 
      ON g.game_owner = u.id
      JOIN public.user AS u2
      ON g.opponent = u2.id
      WHERE g.opponent = 1
      or g.game_owner = 1
      AND g.is_active = 1
      ORDER BY g.date_created;

SELECT m.body, m.time_sent, u.display_name
FROM public.messages AS m
JOIN public.user AS u
ON m.sent_by = u.id
WHERE game_id = 1 
ORDER BY time_sent;

SELECT g.id, g.game_name, g.date_created, g.game_type, u.display_name AS Player1, u2.display_name AS player2
      FROM public.game AS g
      JOIN public.user AS u 
      ON g.game_owner = u.id
      JOIN public.user AS u2
      ON g.opponent = u2.id
      WHERE g.opponent = 1
      or g.game_owner = 1
      AND g.is_active = 1
      AND LOWER(g.game_name) LIKE LOWER('Battle Boats 2.0')
      ORDER BY g.date_created;

SELECT grid_owner, grid_opponent
FROM public.game
WHERE id = 1;

SELECT grid_owner, grid_opponent, game_owner
      FROM public.game
      WHERE id = 1;

UPDATE public.game
SET opponent = 2, is_active = 1
WHERE id = 9;

INSERT INTO public.messages
( sent_by
, game_id
, body
, time_sent
)
VALUES
( 1
, 1
, 'YEET!'
, (SELECT CURRENT_TIMESTAMP)
);

SELECT player_1_ready, player_2_ready FROM public.game
WHERE id = :game_id;

UPDATE public.game
SET 'grid_owner' = :grid
WHERE id = 1;

INSERT INTO public.moves
( sent_by
, game_id
, time_sent
, move_number
, coords
)
VALUES
( 1
, 1
, (SELECT CURRENT_TIMESTAMP)
, 3
, "(3, 3)"
);


SELECT * FROM public.moves WHERE game_id = :game_id;

UPDATE public.game
SET is_active = 0, game_type = 'FINISHED'
WHERE id = :game_id;

UPDATE public.game
SET is_active = 0, game_type = 'FINISHED'
WHERE id = 1;

SELECT g.id, g.game_name, g.date_created, g.game_type, u.display_name AS Player1, u2.display_name AS player2
      FROM public.game AS g
      JOIN public.user AS u 
      ON g.game_owner = u.id
      JOIN public.user AS u2
      ON g.opponent = u2.id
      WHERE (g.opponent = 1
      or g.game_owner = 1)
      AND g.is_active = 1
      AND LOWER(g.game_name) like LOWER('%')
      ORDER BY g.date_created;

SELECT id, username, password FROM public.user WHERE username='myusername' AND password='mypassword';

INSERT INTO board
( board_owner
, game_id
, grid
)
VALUES
( 1
, 1
, '****'
);


SELECT g.id, g.game_name, g.date_created, u.display_name AS Player1 
FROM public.game AS g 
JOIN public.user AS u 
ON g.game_owner = u.id 
WHERE g.is_active = 0 
AND g.game_type LIKE 'PUBLIC' 
AND LOWER(g.game_name) LIKE LOWER('%yeet%')
AND g.game_owner <> 2
ORDER BY g.date_created

DELETE FROM board;
DELETE FROM game;

SELECT m.body, m.time_sent, u.display_name
FROM public.messages AS m
JOIN public.user AS u
ON m.sent_by = u.id
WHERE game_id = 9
ORDER BY time_sent;

SELECT grid
FROM public.board
WHERE game_id = 9
AND
board_owner = 1;

SELECT grid
FROM public.board
WHERE game_id = 9
AND
board_owner <> 1;

SELECT game_type, winner FROM public.game WHERE id = 1;

UPDATE public.board SET grid = '**' WHERE game_id = 1 AND board_owner <> 1;
