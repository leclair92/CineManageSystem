ALTER TABLE films
ADD genre VARCHAR(50);

UPDATE films
SET genre = (
    SELECT nom FROM genres WHERE genres.id = films.genre_id
);

ALTER TABLE films
DROP COLUMN genre_id,
DROP COLUMN affiche_film,
DROP COLUMN created_by;
