<?php 
    //session_start(); 
    include('php/verificationAcces.php');
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

<body>
    <div id="" style="width: 100%; background:#02428B;" >
        <nav class="navbar  " role="navigation" style="margin-bottom: 0">
            <div class="navbar-header navbar-default navbar-cls-top">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only"> </span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

            </div>
            <form role="form" action="php/verificationAcces" method="POST">
                <div style="color: white;padding: 5px 5px 5px 40px;font-size: 16px;" class="col-md-12"> &nbsp;
                   <button  value="Deconnecter" name="btnDeconnecter" type="submit" style="border-radius: 20px;float: right;" class="btn btn-danger">Se déconnecter</button>
                </div>
            </form>
        </nav>
        <!-- /. NAV TOP  -->
        
        <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">
                    <li class="text-center">
                        <img src="assets/img/images.jpeg" class=" img-responsive" />
                    </li>
                    <li>
                        <a class="active-menu" href="accueil"><i class="fa fa-dashboard fa-2x"></i> Tableau de
                            bord</a>
                    </li>
                    <li>
                        <a href=""><i class="fa fa-edit fa-2x"></i> Eléments <span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="province">Provinces</a>
                            </li>
                            <li>
                                <a href="actualite">Actualité</a>
                            </li>
                            <li>
                                <a href="protection">Protection</a>
                            </li>
                            <li>
                                <a href="conseil">Conseils aux Voyageurs</a>
                            </li>
                            <li>
                                <a href="repQuest">Réponses aux questions</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="conversation"><i class="fa fa-comments-o fa-2x"></i>Conversation</a>
                    </li>
                    <li>
                        <a href=""><i class="fa fa-chevron-down fa-2x"></i>Nouveau<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="agent">Agent</a>
                            </li>
                            <li>
                                <a href="utilisateur">Utilisateur</a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>

        </nav>



        <!-- /. NAV SIDE  -->
        <div id="page-wrapper">
            <div id="page-inner" style="border-radius: 30px">
                <div class="row">
                    <div class="col-md-12">
                        <h1 class="main-text" style="color: red">Tableau de bord</h1>
                        <?php
                            
                            include('php/DAO/_utilisateur.php');
                            include('php/connexion.php');
                            echo '<h4>Bienvenue '.$_SESSION['UserName'].'</h4>';
                        
                            // echo '<h4>code-'.$_SESSION['ACCES'].'->'.$_SESSION['ID_AGENT'].' </h4>';
                           
                        ?>
                        
                        <!-- <h4>Bienvenue Clément KALUMBUSA SAMBI</h4>alert('Bonjour !') -->
                    </div>
                </div>
                <!-- <img src="assets/img/print2.jpg" alt="Imprimer" style="width:20px; height: 20px;" onclick="window.print()">
                <img src="assets/img/print2.jpg" alt="" style="width:20px; height: 20px;" onclick="conversion()"> -->
                <script type="text/javascript" src="php/script.js"></script>
                <!-- /. ROW  -->
                <hr />
                <div class="row" >
                    <div class="col-md-3 col-sm-6 col-xs-6">
                        <div class="panel panel-back noti-box"  style="border-radius: 30px">
                            <span class="icon-box bg-color-red set-icon">
                                <img src="assets/img/Being Sick_48px.png">
                            </span>
                            <div class="text-box">
                                <?php
                                 $stmt=$connect->query('SELECT SUM(NOMBRE_CAS) as sumNOMBRE_CAT from province');
                                 while($rs=$stmt->fetch()){$sumNOMBRE_CAT=$rs['sumNOMBRE_CAT'];$stmt->closeCursor(); }
                                ?>
                                <p class="main-text"><?php echo $sumNOMBRE_CAT; ?></p>
                                <br /><br />
                                <p class="text-muted">Cas confirmer(s)</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6 col-xs-6">
                        <div class="panel panel-back noti-box" style="border-radius: 30px">
                            <span class="icon-box bg-color-green set-icon">
                                <img src="assets/img/Confirm_48px.png">
                            </span>
                            <div class="text-box">
                            <?php
                                 $stmt=$connect->query('SELECT SUM(NOMBRE_GUERISON) as sumNOMBRE_GUERISON from province');
                                 while($rs=$stmt->fetch()){$sumNOMBRE_GUERISON=$rs['sumNOMBRE_GUERISON'];$stmt->closeCursor(); }
                            ?>
                                <p class="main-text"><?php echo $sumNOMBRE_GUERISON; ?></p>
                                <br /><br />
                                <p class="text-muted">guéri</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6 col-xs-6">
                        <div class="panel panel-back noti-box" style="border-radius: 30px">
                            <span class="icon-box bg-color-blue set-icon">
                                <img src="assets/img/Dead.png">
                            </span>
                            <div class="text-box">
                            <?php
                                 $stmt=$connect->query('SELECT SUM(NOMBRE_MORT) as sumNOMBRE_MORT from province');
                                 while($rs=$stmt->fetch()){$sumNOMBRE_MORT=$rs['sumNOMBRE_MORT'];$stmt->closeCursor(); }
                            ?>
                                <p class="main-text"><?php echo $sumNOMBRE_MORT; ?></p>
                                <br /><br />
                                <p class="text-muted">Décè(s)</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6 col-xs-6">
                        <div class="panel panel-back noti-box" style="border-radius: 30px">
                            <span class="icon-box bg-color-brown set-icon">
                                <img src="assets/img/total_48px.png">
                            </span>
                            <div class="text-box">
                                <p class="main-text"><?php echo $sumNOMBRE_CAT+$sumNOMBRE_GUERISON+$sumNOMBRE_MORT ?></p>
                                <br /><br />
                                <p class="text-muted">Total</p>
                            </div>
                        </div>
                    </div>
                </div>
                <br />
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="panel panel-default" style="border-radius: 30px">
                            <div class="panel-heading" style="border-radius: 30px">
                                Bar Chart
                            </div>
                            <div class="panel-body">
                                <div id="morris-bar-chart"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="panel panel-default" style="border-radius: 30px">
                            <div class="panel-heading" style="border-radius: 30px">
                                Donut Chart
                            </div>
                            <div class="panel-body">
                                <div id="morris-donut-chart"></div>
                                <?php
                                //$output='';
                                //$stmt=$connect->query('SELECT COUNT(*) AS nombre,DESIGNATION_PROVINCE,NOMBRE_CAS FROM province GROUP BY DESIGNATION_PROVINCE');
                                // while($rs=$stmt->fetch())
                                // {
                                //    $output.="{
                                //        label:'".$rs["DESIGNATION_PROVINCE"]."', 
                                //        value:".$rs["NOMBRE_CAS"]."},";
                                //        $output = substr($output, 0,20);
                                        
                                        //var_dump($output);
                                     //$sumNOMBRE_GUERISON=$rs['sumNOMBRE_GUERISON'];
                                   //  $stmt->closeCursor(); 
                                //}

                                ?>
                                
                                
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /. PAGE INNER  -->
            </div>
            <!-- /. PAGE WRAPPER  -->
        </div>
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
        <script src="assets/js/custom.js" type="text/javascript"></script>
        
        
         
<!-- <script src=./js/html/assets/bundles/libscripts.bundle.js> </script>    
<script src=./js/html/assets/bundles/vendor/scripts.bundle.js> </script> 

<script src=./js/html/assets/bundles/fullcalendarscripts.bundle.js></script> 


<script src=./js/html/assets/bundles/mainscripts.bundle.js> </script> 
<script src=./js/html/assets/js/pagescalendar.js> </script>  -->
        
        <script type="text/javascript">
        $(document).ready(function () {
            //alert("boom");
            Morris.Donut({
                element: 'morris-donut-chart22',
                data: [<?php echo($output) ?>],
                resize: true
            });
        });
        </script>


</body>

</html>