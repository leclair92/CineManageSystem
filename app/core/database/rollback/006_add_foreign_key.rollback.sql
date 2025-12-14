ALTER TABLE films DROP FOREIGN KEY fk_films_genre;
ALTER TABLE films DROP FOREIGN KEY fk_films_created_by;
ALTER TABLE salles DROP FOREIGN KEY fk_salles_created_by;
ALTER TABLE seances DROP FOREIGN KEY fk_seances_film;
ALTER TABLE seances DROP FOREIGN KEY fk_seances_salle;
ALTER TABLE seances DROP FOREIGN KEY fk_seances_created_by;
