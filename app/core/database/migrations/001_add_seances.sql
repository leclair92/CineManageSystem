CREATE TABLE seances (
    id INT(11) NOT NULL AUTO_INCREMENT,
    film_id INT(11) NOT NULL,
    salle_id INT(11) NOT NULL,
    date_heure DATETIME NOT NULL,
    created_by INT(11) NULL,
    PRIMARY KEY (id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
