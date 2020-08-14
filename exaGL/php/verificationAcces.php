<?php
    session_start();
    if(isset($_POST['btnDeconnecter'])){
        if('Deconnecter'==$_POST['btnDeconnecter']){
            session_destroy();
            header('Location: ../index?erreur=3');
        }
    }
    if(!isset($_SESSION['ACCES']) || !$_SESSION['ACCES']){
        header('Location: index?erreur=3');
        }

    
?>