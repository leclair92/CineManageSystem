ALTER TABLE films
ADD CONSTRAINT fk_films_genre
FOREIGN KEY (genre_id) REFERENCES genres(id);

ALTER TABLE films
ADD CONSTRAINT fk_films_created_by
FOREIGN KEY (created_by) REFERENCES users(id)
ON DELETE SET NULL;

ALTER TABLE salles
ADD CONSTRAINT fk_salles_created_by
FOREIGN KEY (created_by) REFERENCES users(id)
ON DELETE SET NULL;

ALTER TABLE seances
ADD CONSTRAINT fk_seances_film
FOREIGN KEY (film_id) REFERENCES films(id)
ON DELETE CASCADE;

ALTER TABLE seances
ADD CONSTRAINT fk_seances_salle
FOREIGN KEY (salle_id) REFERENCES salles(id)
ON DELETE CASCADE;

ALTER TABLE seances
ADD CONSTRAINT fk_seances_created_by
FOREIGN KEY (created_by) REFERENCES users(id)
ON DELETE SET NULL;
