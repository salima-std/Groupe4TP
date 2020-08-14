<?php
    
    include('DAO/_utilisateur.php');
    include('connexion.php');
    
    $Utilisateur = new _utilisateur();

    $Utilisateur->setIdentifiant(
        isset($_POST['txt_identifiant']) ? $_POST['txt_identifiant'] :''
    );
    $Utilisateur->setPassword(
        isset($_POST['txt_password']) ? $_POST['txt_password'] : ''
    );

    if($Utilisateur->getIdentifiant() == ''){
        header('Location: ../index?erreur=1');
    }else{
        $st=$connect->prepare('SELECT * FROM listeutilisateur WHERE IDENTIFIANT=:identifiant AND MOT_DE_PASSE=:password');
        $st->execute(array(
            'identifiant'=> $Utilisateur->getIdentifiant(),
            'password'=>$Utilisateur->getPassword()
        ));
        $rs=$st->fetch();
            if ($rs) 
            {   
                session_start();
                $_SESSION['ID_AGENT']=$rs['ID_AGENT'];
                $_SESSION['UserName']=$rs['NOM'].' '.$rs['PRENOM'];
                $_SESSION['ACCES']=$rs['ACCES'];

                header('Location: ../accueil');
            } 
            else 
            {
                header('Location: ../index?erreur=2');
            }
    }


   
    
    
        
?>