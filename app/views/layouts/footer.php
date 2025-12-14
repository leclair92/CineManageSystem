<div class="p-3 py-lg-5 mt-0 bg-dark" style="background-image:url('<?php echo BASE_URL; ?>images/infolettre-bg.jpg')">
 <div class="container">
    <div class="row align-items-center">
<div class="col-lg-6">
    <p class="h1 p-0 m-0 text-uppercase">Abonnez-vous</p>
    <p class="h1 p-0 m-0 text-white text-uppercase">À notre infolettre</p>
    <p class="lead text-white">Découvrez en primeur toutes les nouveautés !</p>
</div>
<div class="col-lg-6 text-end">
    <form class="row" method="POST">
  <div class="col-lg-9">
    <label for="courrielInfolettre" class="visually-hidden">Courriel</label>
    <input type="email" class="form-control form-control-lg" id="courrielInfolettre" placeholder="Votre adresse courriel *" required>
  </div>
  <div class="col-lg-3 p-0">
    <button type="submit" class="btn btn-secondary btn-lg mb-3 w-100">M'inscrire</button>
  </div>
</form>

</div>
</div>
</div>

</div>
<footer class="p-3 pt-5 mt-0" data-bs-theme="dark"> 
    <div class="container">
        <div class="row justify-content-between align-items-center ">
            <div class="col-lg-4 text-center text-lg-start">
                <img src="<?php echo BASE_URL; ?>images/logo-white.png" width="150" class="mb-2">
                <p>4204 Rue Bertrand-Fabi,<br> Sherbrooke, QC J1N 3Y2</p>
                <a href="tel:+18198219999">1 (819) 821-9999</a>
                <div class="d-flex gap-2 mt-3 text-center justify-content-center justify-content-sm-start align-items-center">
                    <a href="#" class="btn btn-primary"><i class="bi bi-facebook"></i></a>
                    <a href="#" class="btn btn-primary"><i class="bi bi-instagram"></i></a>
                </div>
            </div>
            <div class="col-lg-4 text-center text-lg-start">
                <ul class="nav flex-column"> 
                    <li class="nav-item"><a href="?action=accueil#listing" class="nav-link">Films à l'affiche</a></li>
                    <li class="nav-item"><a href="?action=inscription" class="nav-link">Inscription</a></li>
                    <li class="nav-item"><a href="?action=login" class="nav-link">Connexion</a></li> 
                </ul>
            </div>

            <div class="col-lg-4 text-center d-none d-lg-block">
                <p class="h4">Heures d'ouverture</p>
                <table style="max-width:250px;" class="table table-sm table-borderless m-auto">
                    <tbody>
                        <tr>
                            <td>Lundi</td>  
                            <td style="width:100px;"><hr></td>   
                            <td class="text-end">8h a 17h</td>  
                        </tr>
                        <tr>
                            <td>Mardi</td>  
                            <td style="width:100px;"><hr></td>   
                            <td class="text-end">8h a 17h</td>  
                        </tr>
                        <tr>
                            <td>Mercredi</td>  
                            <td style="width:100px;"><hr></td>   
                            <td class="text-end">8h a 17h</td>  
                        </tr>
                        <tr>
                            <td>Jeudi</td>  
                            <td style="width:100px;"><hr></td>   
                            <td class="text-end">8h a 17h</td>  
                        </tr>
                        <tr>
                            <td>Vendredi</td>  
                            <td style="width:100px;"><hr></td>   
                            <td class="text-end">8h a 17h</td>  
                        </tr>
                        <tr>
                            <td>Samedi</td>  
                            <td style="width:100px;"><hr></td>   
                            <td class="text-end">8h a 17h</td>  
                        </tr>
                        <tr>
                            <td>Dimanche</td>  
                            <td style="width:100px;"><hr></td>   
                            <td class="text-end">8h a 17h</td>  
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="text-center pt-3">
            <p class="copyright">&copy; <?php echo date('Y'); ?> CineGest. Tous droits réservés | Une création de Mireille, Amal et Maria</p></div>
        </div>
    </div>
</footer>
    <!-- Custom script -->
    <script src="<?php echo BASE_URL; ?>js/script.js"></script>
</body>
</html>
