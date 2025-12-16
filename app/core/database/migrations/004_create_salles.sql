CREATE TABLE salles (
  id int(11) NOT NULL,
  nom varchar(100) NOT NULL,
  capacite int(11) NOT NULL,
  type varchar(50) NOT NULL,
  created_by int(11) DEFAULT NULL
) ;
