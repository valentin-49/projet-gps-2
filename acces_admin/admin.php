<?php
session_start();
//$_SESSION["isconnectUS"];
?>
<?php require("admin_co.php");?>

<?php
if(isset($_POST['deco2'])){ 
    session_unset();
    session_destroy();
}
if(isset($_SESSION["isconnectAD"]) || $_SESSION["isconnectAD"]==true){
?>
<html>
    <head>
        <script type="text/javascript" src="admin.js"></script>
        <link rel="stylesheet" type="text/css" href="../bootstrap-4.4.1-dist/css/bootstrap.css">
        <link rel="stylesheet" type="text/css" href="admin.css">
        <link rel="shortcut icon" href="../image/unnamed.png" />
    </head>
    <body>
        <div class="container">
            <div class="row">
                
                    <div class="col-2 en-tete" align="center">
                        <form method="POST"><input type="submit" name="deco2" value="Deconnexion" class="bouton"/></form>
                    </div>
                    <div class="col-1"></div>
                    <div class="col-2 en-tete" align="center">
                        <form method="POST"><input type="submit" name="modif" value="Modifier un user" class="bouton"/></form>
                    </div>
                    <div class="col-1"></div>
                    <div class="col-2 en-tete" align="center">
                        <form method="POST"><input type="submit" name="supp" value="Supprimer un user" class="bouton"/></form>
                    </div>
                    <div class="col-1"></div>
                    <div class="col-2 en-tete" align="center">
                    <a href="../index.php"><button class="bouton">Retour a l'accueil</button></a>
                    </div>
                
            </div>

            <?php
                    if(isset($_POST['modif'])){ 
                    ?>
                    <div class="col-12" align="center">
                    <div id="gestion2"> <!-- affichage de la partie delete -->
                        <?php
                            $user = new admin();
                            $user->Select_User();
                        ?>
                    <?php
                    }
                    if(isset($_POST['supp'])){ 
                        ?>
                    <div class="container">
                        <div class="row">
                            <div class="col-12 delete" align="center">
                                <h1>supprimer</h1>
                            </div>
                        </div> 
                    </div>
            <?php
                }
            ?>
        </div>
    </body>
</html>
<?php    
}elseif(!isset($_SESSION["isconnectAD"]) || $_SESSION["isconnectAD"]==false ){   
?>
<html>
    <head>
        <script type="text/javascript" src="admin.js"></script>
        <link rel="stylesheet" type="text/css" href="../bootstrap-4.4.1-dist/css/bootstrap.css">
        <link rel="shortcut icon" href="../image/unnamed.png" />
    </head>
    <body onload="redirect()">
        <div class="container">
            <div class="row">
                <div class="col-12" align="center">
                    <h1>Vous etes deconnetez, vous allez etre rediriger vers l'acceuil dans 3 secondes</h1>
                </div>
            </div>
        </div>
    </body>
</html>
<?php
}
?>