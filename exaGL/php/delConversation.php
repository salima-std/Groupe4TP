<?php
    include('connexion.php'); 
    try {
        $Code=$_GET['numero'];
        $st=$connect->prepare('DELETE FROM conversation WHERE numero=:CODE');
        $st->execute(array('CODE' => $Code));
        header('Location: ../conversation');
        $st->closeCursor(); 
    } catch (Exception $e) {
        die('Erreur: '.$e->getMessage());
    }

?>