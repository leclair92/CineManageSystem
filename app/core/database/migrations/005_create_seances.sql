CREATE TABLE seances (
    id INT AUTO_INCREMENT PRIMARY KEY,
    film_id INT NOT NULL,
    salle_id INT NOT NULL,
    date_heure DATETIME NOT NULL,
    created_by INT NULL
);
