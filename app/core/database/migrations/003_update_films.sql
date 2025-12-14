ALTER TABLE films
ADD genre_id INT NULL,
ADD affiche_film VARCHAR(255) NULL,
ADD created_by INT NULL;

UPDATE films
SET genre_id = (
    SELECT id FROM genres WHERE genres.nom = films.genre LIMIT 1
);

ALTER TABLE films
DROP COLUMN genre;
