-- seances -> films
ALTER TABLE seances
ADD CONSTRAINT fk_seances_film
    FOREIGN KEY (film_id)
    REFERENCES films(id)
    ON DELETE CASCADE;

-- seances -> salles
ALTER TABLE seances
ADD CONSTRAINT fk_seances_salle
    FOREIGN KEY (salle_id)
    REFERENCES salles(id)
    ON DELETE CASCADE;

-- seances -> administrateurs
ALTER TABLE seances
MODIFY created_by INT(11) NULL;

ALTER TABLE seances
ADD CONSTRAINT fk_seances_admin
    FOREIGN KEY (created_by)
    REFERENCES administrateurs(id)
    ON DELETE SET NULL;

-- salles -> administrateurs
ALTER TABLE salles
MODIFY created_by INT(11) NULL;

ALTER TABLE salles
ADD CONSTRAINT fk_salles_admin
    FOREIGN KEY (created_by)
    REFERENCES administrateurs(id)
    ON DELETE SET NULL;
