CREATE TABLE Scripture
(
  ScriptureId SERIAL NOT NULL PRIMARY KEY,
  Book varchar(60),
  Chapter int,
  Verse int,
  Content varchar (256)
);

INSERT INTO Scripture
(
  Book,
  Chapter,
  Verse,
  Content
)
VALUES
(
  'John',
  1,
  5,
  'And the light shineth in darkness; and the darkness comprehended it not.'
);

INSERT INTO Scripture
(
  Book,
  Chapter,
  Verse,
  Content
)
VALUES
(
  'D&C',
  88,
  49,
  'The light shineth in darkness, and the darkness comprehendeth it not; nevertheless, the day shall come when you shall comprehend even God, being quickened in him and by him.'
);

INSERT INTO Scripture
(
  Book,
  Chapter,
  Verse,
  Content
)
VALUES
(
  'D&C',
  93,
  28,
  'He that keepeth his commandments receiveth truth and light, until he is glorified in truth and knoweth all things'
);

INSERT INTO Scripture
(
  Book,
  Chapter,
  Verse,
  Content
)
VALUES
(
  'Mosiah',
  16,
  9,
  'He is the light and the life of the world; yea, a light that is endless, that can never be darkened; yea, and also a life which is endless, that there can be no more death.'
);

CREATE TABLE topic (
	id SERIAL PRIMARY KEY NOT NULL,
	topicname VARCHAR(80) NOT NULL
);

CREATE TABLE scripturetopic (
	id SERIAL PRIMARY KEY NOT NULL,
	scriptureid INT REFERENCES scripture(scriptureid),
	topicid INT REFERENCES topic(id)
);

INSERT INTO topic(topicname) VALUES('Faith'), ('Sacrifice'), ('Charity');