<?php
class admin{
    //propriétes:
    private $_user;
    private $_passwd;
    private $_admin;
    

    //méthodes:
   
public function Select_User($NDC, $MDP){

    try
        {
            $maBase=new PDO('mysql:host=localhost; dbname=projet_gps; charset=utf8','root','');
            $LesUsers = $maBase->query('SELECT `user`,`MDP`,`admin` FROM `user`');
            $admin = $LesUsers->fetch();
            $this->_user = $admin['user'];
            $this->_passwd = $admin['MDP'];
            $this->_admin = $admin['admin'];
        }    

            catch (Exception $erreur){
                echo 'Erreur : '.$erreur ->getMessage();
        }
}
public function getUser(){
    return $this->_user;
    return $this->_passwd;
    }

}