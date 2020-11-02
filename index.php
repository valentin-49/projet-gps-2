<?php
session_start();
//$_SESSION["isconnectUS"];
?> 
<?php require("user.php");?>
<?php
    if(empty($_POST['ID_1']) && empty($_POST['MDP_1'])){ //suite du formulaire de connexion de la condition 2

    }else{
                    
        $user = new user();
        $user->Connexion($_POST['ID_1'],$_POST['MDP_1']);
        $_SESSION["isconnectUS"] = $user->Compar_passwd($_POST['ID_1'],$_POST['MDP_1']);
        $_SESSION["isconnectAD"] = $user->compar_admin($_POST['ID_1'],$_POST['MDP_1']);
       
        if($_SESSION["isconnectUS"]){

        $_SESSION["isconnectUS"]=true;
        $_SESSION["LogUser"]=$_POST['ID_1'];
        $_SESSION["MdpUser"]=$_POST['MDP_1']; //passe la variable isconnectUS a true ce qui permet de rentrer dans la condition 1 et de faire disparaitre le formulaire 

    }elseif($_SESSION["isconnectAD"]){ //message d'erreur si les Id et Mdp sont incorrects
                            
        $_SESSION["isconnectAD"]=true;

    }else{
        echo"<p><h3>Identifiants ou mot de passe incorrects, veuillez reessayer.</h3></p></div>"; 
        }
    }
?>
<?php 
    if(empty($_POST['new_ID']) && empty($_POST['new_MDP'])){

    }else{

        $user = new user();
        $user->UsersNv($_POST['new_ID'] , $_POST['new_MDP']);

    }
?>  
<?php
 if(isset($_POST['deco2'])){ //bouton de deconnexion qui retourne à la condition 2
    session_unset();
    session_destroy();

 } if(isset($_POST['deco'])){ //bouton de deconnexion qui retourne à la condition 2
    session_unset();
    session_destroy();

}  
if(isset($_SESSION["isconnectUS"]) && $_SESSION["isconnectUS"]==true && $_SESSION["isconnectAD"]==false ){ //condition 1) si l'utilisateur est deja connecter et n'est pas un admin, affiche les redirections vers d'autres pages.
?>
 <html>
    <head>
        <link rel="stylesheet" type="text/css" href="style.css">
    </head>

    <body>
        <div class="hero">
            <div class="form-box2">
               <form id="login" class="input-group2" method="POST"> 
                    <input type="button" name="Valider" value="Acces a mon compte" onclick="self.location.href='acces_mon_compte/compte.php'" class="submit-btn2"/> 
                    <input type="button" name="Valider" value="Acces aux donnees" onclick="self.location.href='acces_donnee/data.php'" class="submit-btn2"/> 
                    <input type="button" name="Valider" value="Position des bateaux" onclick="self.location.href='position_bateaux/traceur.php'" class="submit-btn2"/> 
                    <input type="submit" name="deco" value="deconnexion" class="submit-btn2"/>
                </form>   
            </div>
            
        </div>
    </body>
</html>
<?php 

}elseif(!isset($_SESSION["isconnectUS"]) || $_SESSION["isconnectUS"]==false || !isset($_SESSION["isconnectAD"]) || $_SESSION["isconnectAD"]==false){ // condition 2) si l'utilisateur n'est pas deja connecter, affiche un formulaire de connexion

?>
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="style.css">
    </head>

    <body>
        <div class="background">
            <div class="form-box">
               <div class="button-box">
                   <div id="btn"></div>
                   <button type="button" class="toggle-btn" onclick="login()">Se Connecter</button>
                   <button type="button" class="toggle-btn" onclick="register()">S'inscrire</button>
               </div>
               <div class="social">
                    <img src="image/fb.png">
                    <img src="image/tw.png">
                    <img src="image/gp.png">
               </div>
               <form id="login" class="input-group" method="POST">
                    <input type="text" class="input-field" placeholder="Pseudo" name="ID_1" required>
                    <input type="text" class="input-field" placeholder="Mot de passe" name="MDP_1" required>
                    <button type="submit" class="submit-btn">Se Connecter</button>
                </form>
                <form id="register" class="input-group" method="POST">
                    <input type="text" class="input-field" placeholder="Pseudo" name="new_ID" required>
                    <input type="email" class="input-field" placeholder="E-mail" name="new_mail" required>
                    <input type="text" class="input-field" placeholder="Mot de passe" name="new_MDP" required>
                    <button type="submit" class="submit-btn">S'inscrire</button>
                </form>
            </div>
        </div>
        <script>

            var x = document.getElementById("login");
            var y = document.getElementById("register");
            var z = document.getElementById("btn");

            function register(){
                x.style.left = "-400px";
                y.style.left = "50px";
                z.style.left = "140px";
            }

            function login(){
                x.style.left = "50px";
                y.style.left = "450px";
                z.style.left = "0px";
            }

        </script>
    </body>
</html>
<?php
    }elseif(isset($_SESSION["isconnectAD"]) || $_SESSION["isconnectAD"]==true ){ //condition 3) si l'utilisateur est connecter ete et un admin, affiche la redirection vers la page d'administration
?>
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="style.css">
    </head>

    <body>
        <div class="hero">
            <div class="form-box2">
               <form id="login" class="input-group2" method="POST">
                    <input type="button" name="Valider" value="admin" onclick="admin()" class="submit-btn2"/> 
                    <input type="button" name="Valider" value="Acces a mon compte" onclick="compte()" class="submit-btn2"/> 
                    <input type="button" name="Valider" value="Acces aux donnees" onclick="data()" class="submit-btn2"/> 
                    <input type="button" name="Valider" value="Position des bateaux" onclick="position()" class="submit-btn2"/> 
                    <input type="submit" name="deco2" value="deconnexion" class="submit-btn2"/>
                </form> 
            </div> 
        </div>
    </body>
</html>

<?php
}
?>

