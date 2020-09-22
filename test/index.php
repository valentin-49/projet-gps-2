<?php
session_start();
//$_SESSION["isconnectUS"];

?> 
<?php require("../user.php");?>
<?php
 if(isset($_POST['deco2'])){
    session_unset();
    session_destroy();

 }elseif(isset($_POST['deco'])){
    session_unset();
    session_destroy();
   
}
if(isset($_SESSION["isconnectUS"]) && $_SESSION["isconnectUS"]==true){
?>
 <html>
                        <head>
                            <title>Le GPS du bled</title>
                            <meta charset="utf-8">
                            <link rel="stylesheet" type="text/css" href="bootstrap-4.4.1-dist/css/bootstrap.css">
                            <link rel="stylesheet" type="text/css" href="index.css">
                            <link rel="shortcut icon" href="image/unnamed.png" />
                        </head>
                    
                        <body>
                            <div class="row">
                                        <div class="col-12">
                                            
                                            </div>
                                        <div class="col-2 " align="center">
                                                
                                            </div>
                                        <div class="col-8" align="center">
                                            <?php
                    
                                            if($_SESSION["isconnectUS"]){
                                                ?>
                                                    <div class="col-12 redirection" align="center">
                                                    <form action="index.php" method="POST">
                                                        <div class="row">
                                                            <div class="col-6" align="center"><p><input type="button" name="Valider" value="Accés à mon compte" onclick="self.location.href=''" class="bouton_redirect"/></p></div>                                      
                                                            <div class="col-6" align="center"><p><input type="button" name="Valider" value="Accés aux donnée" onclick=" self.location.href='acces_donnee/data.php'" class="bouton_redirect"/></p></div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-6" align="center"> <p><input type="button" name="Valider" value="Position des bateaux" onclick="self.location.href='position_bateaux/traceur.php'" class="bouton_redirect"/></p></div>
                                                            <div class="col-6" align="center"><p><input type="button" name="Valider" value="Accées administrateur" onclick="self.location.href='acces_admin/admin.php'" class="bouton_redirect"/></p></div>
                                                        </div>
                                                            <div class="col-12" align="center"><form method="POST"><p><input type="submit" name="deco2" value="deconnexion" class="bouton_redirect"/></p></form>
                                                        
                                                        </div>
                                                    </form>
                                                    </div>
                                                <?php      
                                            }
                                            ?>
                                            </div>
                                        <div class="col-2 " align="center">
                                                
                                                </div>
                                    </div>
                                </div>
                        </body>
                    </html>
<?php 

}elseif(!isset($_SESSION["isconnectUS"]) || $_SESSION["isconnectUS"]==false ){

?>
<html>
    <head>
        <title>Le GPS du bled</title>
        <meta charset="utf-8">
        <link rel="stylesheet" type="text/css" href="bootstrap-4.4.1-dist/css/bootstrap.css">
        <link rel="stylesheet" type="text/css" href="index.css">
        <link rel="shortcut icon" href="image/unnamed.png" />
    </head>

    <body>
            <div class="container">
                <div class="row">
                    <div class="col-12 en-tete" align="center">
                        <h1>Le GPS du bled</h1>
                    </div>
                    <div class="col-2 coterG" align="center">
                        
                    </div>
                    <div class="col-1" align="center">
                        
                    </div>
                    <div class="col-6 formulaire_de_connexion" align="center">
                        <form action="index.php" method="POST">
                            <label><h3>Se Connecter</h3></label>
                            <p><input type="text" name="ID_1" width="auto" class="text" required/></p>
                            <label><h3>Mot De Passe</h3></label>
                            <p><input type="password" name="MDP_1" class="text" required/></p>
                            <p><input type="submit" name="Valider" value="Valider" class="bouton"/></p>
                        </form>
                    <?php
                       if(empty($_POST['ID_1']) && empty($_POST['MDP_1'])){

                    }else{
                    
                    $user = new user();
                    $_SESSION["isconnectUS"] = $user->Compar_passwd($_POST['ID_1'],$_POST['MDP_1']);
                    if($_SESSION["isconnectUS"]){

                        echo"<p><h3>Connexion à la BDD effectuer</h3></p>";
                        $_SESSION["isconnectUS"]=true;

                    }else{ //meesage d'erreur si les Id et Mdp sont incorrects
                            
   
                         echo"<p><h3>Identifiants ou mot de passe incorrects, veuillez reessayer.</h3></p>";
                    }
                    }
                    ?>
                    </div>
                    <div class="col-1" align="center">
                        
                    </div>
                    <div class="col-2 coterDr" align="center">
                        
                    </div>         
                </div>
                <div class="row">
                    <div class="col-12">
                        
                        </div>
                    <div class="col-2 " align="center">
                            
                        </div>
                    <div class="col-8" align="center">
                        <?php

                        if(isset($_SESSION["isconnectUS"]) && $_SESSION["isconnectUS"]==true){
                            ?>
                                <div class="col-12 redirection" align="center">
                                <form action="index.php" method="POST">
                                    <div class="row">
                                        <div class="col-6" align="center"><p><input type="button" name="Valider" value="Accés à mon compte" onclick="self.location.href=''" class="bouton_redirect"/></p></div>                                      
                                        <div class="col-6" align="center"><p><input type="button" name="Valider" value="Accés aux donnée" onclick=" self.location.href='acces_donnee/data.php'" class="bouton_redirect"/></p></div>
                                    </div>
                                    <div class="row">
                                        <div class="col-6" align="center"> <p><input type="button" name="Valider" value="Position des bateaux" onclick="self.location.href='position_bateaux/traceur.php'" class="bouton_redirect"/></p></div>
                                        <div class="col-6" align="center"><p><input type="button" name="Valider" value="Accées administrateur" onclick="self.location.href='acces_admin/admin.php'" class="bouton_redirect"/></p></div>
                                    </div>
                                        <div class="col-12" align="center"><p><input type="button" name="deco" value="deconnexion" class="bouton_redirect"/></p></div>
                                       
                                    </form>
                                </div>
                            <?php      
                        }
                        ?>
                        </div>
                    <div class="col-2 " align="center">
                            
                            </div>
                </div>
            </div>
    </body>
</html>

<?php
    }

                       
               