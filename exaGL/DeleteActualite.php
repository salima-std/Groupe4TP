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
                        <a  href="accueil"><i class="fa fa-dashboard fa-2x"></i> Tableau de
                            bord</a>
                    </li>
                    <li>
                        <a class="active-menu" href="" ><i class="fa fa-edit fa-2x"></i> Eléments <span class="fa arrow"></span></a>
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
                        <h1 class="main-menu" style="color: red">Actualité</h1>
                    </div>
                </div>
                <!-- /. ROW  -->

                <!--province et liste-->
                <div class="panel-body">
                    <ul class="nav nav-tabs" >
                        <li class="" ><a href="#Actualite" data-toggle="tab">Actualité</a>
                        </li>
                        <li class="active"><a href="#liste" data-toggle="tab">Liste</a>
                    </ul>

                    <div class="tab-content">
                        <div class="tab-pane fade " id="Actualite">
                            <br />
                            <div class="row">
                                <div class="col-md-12 col-sm-6">
                                    <div class="panel panel-default " style="border-radius: 30px">
                                        <div class="panel-heading " style="border-radius: 30px">Formulaire</div>
                                        <form role="form" action="php/addActualite" method="post">
                                            <div class="col-md-12">
                                                <div class="col-md-3 "></div>
                                                <div class="col-md-6">
                                                    <br /><br />
                                                    <div class="form-group">
                                                        <label >Désignation*</label>
                                                        <input name="txt_desig_act" class="form-control" style="border-radius: 30px"
                                                            placeholder="Saisissez l'actualité" />
                                                    </div>
                                                    <div class="form-group">
                                                        <label >Lien</label>
                                                        <input name="txt_lien_act" class="form-control" style="border-radius: 30px" placeholder="Coller le lien de l'actualité" />
                                                    </div>

                                                </div>
                                                <div class="col-md-3"></div>
                                            </div>
                                            <br />
                                            <div class="col-md-12">
                                                <div class="col-md-7">
                                                    <div style="color: white;padding: 5px 0px 5px 40px;font-size: 16px;" class="col-md-12"> &nbsp;
                                                        <button value="Eregistrer" name="bntEnregistrerAct"  type="submit" style="border-radius: 20px;float: right;" class="btn btn-danger">Enregistrer</button>
                                                    </div>
                                                </div>
                                            </div>
                                            <br />
                                            <label><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /></label>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade active in" id="liste">
                            <br />
                            <div class="row">
                                <div class="col-md-12 col-sm-6">
                                    <div class="panel panel-default" style="border-radius: 30px">
                                        <div class="panel-heading" style="border-radius: 30px">Liste des Actaulités</div>
                                        <div class="panel-body">
                                            <div class="table-responsive">
                                            <table class="table table-striped table-bordered table-hover"
                                                    id="dataTables-example">
                                                    <thead>
                                                        <tr>
                                                            <th>Code</th>
                                                            <th>Designation</th>
                                                            <th>Lien</th>
                                                            <th>Date</th>
                                                            <th>Agent</th>
                                                            <th>Priorité</th>
                                                            <th style="color:green">La une</th>
                                                            <th style="color:blue">Edit.</th>
                                                            <th style="color:red">Supp.</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        
                                                        <?php
                                                            try{
                                                            include('php/connexion.php');
                                                            $sql="SELECT * FROM actualite ORDER BY PRIORITE DESC";
                                                            $stmt=$connect->query($sql) ;
                                                            while ($rs = $stmt->fetch()) 
                                                            {
                                                        echo'
                                                        <tr class="even gradeA">
                                                            <td>'. $rs['ID_ACTUALITE']. '</td>
                                                            <td>'. $rs['DESIGNATION_ACTUALITE'].'</td>
                                                            <td>'. $rs['LIEN'].'</td>
                                                            <td>'. $rs['DATE_ACTUALITE'].'</td>
                                                            <td>'. $rs['AGENT_ID'].'</td>
                                                            <td>'. $rs['PRIORITE'].'</td>
                                                            <td class="text-center"><a href="php/PrioriteActualite?ID_ACTUALITE='. $rs['ID_ACTUALITE'].'"><img src="assets/img/LINE_24px.png"></a></td>
                                                            <td class="text-center"><a href="UpdateActualite?ID_ACTUALITE='. $rs['ID_ACTUALITE'].'"><img src="assets/img/Edit_24px.png"></a></td>
                                                            <td class="text-center"><a href="php/addActualite?ID_ACTUALITE='. $rs['ID_ACTUALITE'].'"><img src="assets/img/Trash Can_24px.png"></a></td>
                                                        </tr>';  
                                                        
                                                            }
                                                        }catch (Exception $e){
                                                            die('Erreur: '.$e->getMessage());
                                                            }
                                                        ?>    
                                                    </tbody>
                                                </table>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="row">

                </div>

                <!-- /. ROW  -->

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
        <!-- DATA TABLE SCRIPTS -->
        <script src="assets/js/dataTables/jquery.dataTables.js"></script>
        <script src="assets/js/dataTables/dataTables.bootstrap.js"></script>
        <script>
            $(document).ready(function () {
                $('#dataTables-example').dataTable();
            });
        </script>
        <!-- CUSTOM SCRIPTS -->
        <script src="assets/js/custom.js"></script>

</body>

</html>