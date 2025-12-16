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

Maquettes
https://www.figma.com/proto/acX852w6dqdpD1PPby348q/CineGest?node-id=14-2002&p=f&t=zBV8z4n4uQItd5x7-1&scaling=min-zoom&content-scaling=fixed&page-id=3%3A1529&starting-point-node-id=14%3A2002&show-proto-sidebar=1
Rapport Final
https://docs.google.com/document/d/1cCb-VSch8v5-m_bKD0Lpv7ngU-1sa--kkrS0xBAHwRQ/edit?tab=t.0 
Document présentation
https://docs.google.com/presentation/d/1z_9eaphDB9-DyCXrcVFx8LyaMcGEoUMDUQSdb_z4q5I/edit?slide=id.p#slide=id.p 