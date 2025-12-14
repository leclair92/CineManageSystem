cineManageSystem/
│
├── public/
│   ├── index.php   
│   ├── css/
│   │   └── style.css
│   ├── js/
│   │   └── script.js
|   | 
│   └── images/   
│
├── app/
│   ├── controllers/
│   │   ├── AccueilController.php
│   │   ├── AuthController.php
│   │   ├── FilmController.php
│   │   ├── SalleController.php
│   │   ├── SeanceController.php
│   │   └── UsersController.php
│   ├── core/
│   │   ├── helpers.php
│   │   └── database/
│   │       ├── db.php
│   │       ├── migrate.php
│   │       ├── rollback.php
│   │       ├── migrations/
│   │       │   ├── 001_add_seances.sql
│   │       │   ├── 002_add_salles.sql
│   │       │   └── 003_add_foreign_keys.sql
│   │       │
│   │       └── rollback/
│   │          ├── 001_add_seances.rollback.sql
│   │          ├── 002_add_salles.rollback.sql
│   │          └── 003_add_foreign_keys.rollback.sql
│   │      
│   │   
│   │
│   ├── models/
│   │   ├── Film.php
│   │   ├── Salle.php
│   │   ├── Seance.php
│   │   └── User.php
│   │
│   ├── views/
│   │   ├── 404.php
│   │   ├── accueil.php
│   │   ├── admin_dashboard.php
│   │   ├── film_details.php
│   │   ├── film_form.php
│   │   ├── inscription.php
│   │   ├── liste_films.php
│   │   ├── liste_salles.php
│   │   ├── liste_seances.php  
│   │   ├── login.php       
│   │   ├── salle_form.php
│   │   ├── seance_form.php  
│   │   ├── user_create.php
│   │   ├── user_edit.php
│   │   ├── users.php
│   │   └── layouts/
│   │       ├── dashboard-menu.php
│   │       ├── header.php
│   │       └── footer.php
├── config/
│   ├── db.php
│   └── config.php
│
├── SQL/
│   └── cineManage_db.sql
│
└── README.md

https://docs.google.com/document/d/18GH0G51sDctoWxa9ow-sijcF3ss84dRU/edit document final
https://docs.google.com/document/d/145BSewS5fcprUZeHnoRt7UxzUQQl5GUh/edit document présentation