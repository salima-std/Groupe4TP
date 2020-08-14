<?php 
    $erreur=isset($_GET['erreur']) ? $_GET['erreur'] : '';
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>exaGL</title>
    <!-- BOOTSTRAP STYLES-->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <!-- FONTAWESOME STYLES-->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
    <!-- MORRIS CHART STYLES-->
    <link href="assets/js/morris/morris-0.4.3.min.css" rel="stylesheet" />
    <!-- CUSTOM STYLES-->
    <link href="assets/css/custom.css" rel="stylesheet" />
    <!-- GOOGLE FONTS-->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
</head>
<div class="col-md-12">
<body style="background: url(assets/img/bg.jpg)no-repeat;">
    
    <div class="col-md-12">
    <nav>
        <div class="col-md-5"></div>
        <div class="col-md-2 ">
        <h1 style="color: white; padding: 0px 0px 0px 35px;float: left;">Login</h1>
        </div>
    </nav>
    </div>
    <!--  -->
    <div class="col-md-12">
    <div class="col-md-5"></div>
    <div class="col-md-2 ">
        <form role="form" method="POST" action="php/login">
            <div class="form-group input-group col-md-12">
                <div style="padding: 0px 5px 0px 0px;float: left;font-size: 16px;">
                    <img src="assets/img/images.jpeg" style="border-radius: 100px;" class="user-image img-responsive " />
                    <br />
                </div>
            </div>
            <div class="form-group input-group col-md-12">
                <div style="padding: 0px 5px 0px 5px;float: left;font-size: 16px;">
                    <div class="form-group input-group col-md-12">
                        <span class="input-group-addon " style="border-radius: 30px;"><img src="assets/img/User_24px.png" /></span>
                        <input name="txt_identifiant" type="text" class="form-control" style="border-radius: 30px;" placeholder="Identifiant">
                    </div>
                </div>
            </div>
            <div class="form-group input-group col-md-12">
                <div style="padding: 0px 5px 0px 5px;float: left;font-size: 16px;">
                    <div class="form-group input-group col-md-12">
                        <span class="input-group-addon" style="border-radius: 30px;"><img src="assets/img/Password_24px.png" /></span>
                        <input name="txt_password" type="password" style="border-radius: 30px;" class="form-control" placeholder="Mot de passe">
                    </div>
                </div>
            </div>

            <div style="color: white;padding: 5px 5px 5px 40px;float: left;font-size: 16px;" class="col-md-12"> &nbsp;
                <button  type="submit" style="border-radius: 30px;" class="btn  btn-danger">connexion</button>
            </div>


        </form>
    </div>
</div>
    <?php
        switch($erreur){
            case 1:
               echo '<div class="col-md-12">
                    <br /><br />
                    <h4 class="text-center" style="color: red">Merci de saisir vos identifiants...!</h5>
                    </div>';
            break;
            case 2:
                echo '<div class="col-md-12">
                    <br /><br />
                    <h4 class="text-center" style="color: red">Identifiant ou le mot de passe saisi est incorrect...!</h5>
                    </div>'; 
            break;
            case 3:
                echo '<div class="col-md-12">
                    <br /><br />
                    <h4 class="text-center" style="color: red">Vous avez été déconnecter...!</h5>
                    </div>'; 
            break;
            
        }
    ?>
    <!-- /. WRAPPER  -->
    <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
    <!-- JQUERY SCRIPTS -->
    <script src="assets/js/jquery-1.10.2.js"></script>
    <!-- BOOTSTRAP SCRIPTS -->
    <script src="assets/js/bootstrap.min.js"></script>
    <!-- METISMENU SCRIPTS -->
    <script src="assets/js/jquery.metisMenu.js"></script>
    <!-- MORRIS CHART SCRIPTS -->
    <script src="assets/js/morris/raphael-2.1.0.min.js"></script>
    <script src="assets/js/morris/morris.js"></script>
    <!-- CUSTOM SCRIPTS -->
    <script src="assets/js/custom.js"></script>


</body>
</div>
</html>