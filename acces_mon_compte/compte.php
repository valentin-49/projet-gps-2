<?php
session_start();
//$_SESSION["isconnectUS"];

?>
<?php
               
    $maBase=new PDO('mysql:host=localhost; dbname=projet_gps; charset=utf8','root','');
    $LesUsers = $maBase->query('SELECT `user`,`MDP`,`admin` FROM `user` WHERE "'.$_SESSION["LogUser"].'"=`user`');
    $admin = $LesUsers->fetch(); 
    $_SESSION["LogUser"] = $admin['user'];
    $_SESSION["MdpUser"] = $admin['MDP'];   
       
?>
<?php
    if(empty($_POST['Nv_MDP_1'])){
        
    }else{
        $maBase=new PDO('mysql:host=localhost; dbname=projet_gps; charset=utf8','root','');
        $LesUsers = $maBase->query('UPDATE `user` SET `MDP`="'.$_POST['Nv_MDP_1'].'" WHERE "'.$_SESSION["LogUser"].'"=`user`');

        echo"<p><h3>mot de passe changer, Veuillez reload la page </h3></p>";
    }                 
?>
<?php
 if(isset($_POST['deco'])){ 
    session_unset();
    session_destroy();
} 
if(isset($_SESSION["isconnectUS"]) && $_SESSION["isconnectUS"]==true && isset($_SESSION["LogUser"])){ //condition 1) si l'utilisateur est deja connecter et n'est pas un admin, affiche les redirections vers d'autres pages.
?>
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="../bootstrap-4.4.1-dist/css/bootstrap.css">
        <link rel="stylesheet" type="text/css" href="compte.css">
    </head>
        <body>
            <div class="container">
                <div class="row">
                    <div class="col-1"></div>
                    <div class="col-8 en-tete" align="center">
                        <h1>Bonjour <?php echo"$_SESSION[LogUser]"?></h1>
                    </div>
                    <div class="col-3"><form method="POST"><p><input type="submit" name="deco" value="deconnexion" class="bouton"/></p></form></div>
                   
                        <div class="col-5 en-tete" align="center">
                            <h1>--------------------</h1>
                            <h4>Pseudo = <?php echo"$_SESSION[LogUser]"?></h4>
                            <h4>MDP = <?php echo"$_SESSION[MdpUser]"?></h4>
                            <h1>--------------------</h1>
                        </div>
                        <div class="col-2"></div>
                        <div class="col-5 en-tete" align="center">
                        <h1>--------------------</h1>
                            <h2>Changer de mot de passe</h2>
                            <form action="compte.php" method="POST">
                                <label><h4>Nouveau mot de passe</h4></label>
                                <p><input type="text" value="" name="Nv_MDP_1" width="auto" class="text" required/></p>
                                <p><input type="submit" name="Valider" value="Valider" class="bouton"/></p>
                            </form>
                        <h1>--------------------</h1>
                        </div>
                    </div>
                </div>
            </div>
            
        </body>
</html>

<?php
}elseif(!isset($_SESSION["isconnectUS"]) && $_SESSION["isconnectUS"]==false){
?>
<html>
    <head>
        <script type="text/javascript" src="compte.js"></script>
        <link rel="stylesheet" type="text/css" href="../bootstrap-4.4.1-dist/css/bootstrap.css">
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