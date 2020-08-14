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
                        <a  href="" ><i class="fa fa-edit fa-2x"></i> Eléments <span class="fa arrow"></span></a>
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
                        <a class="active-menu" href=""><i class="fa fa-chevron-down fa-2x"></i>Nouveau<span class="fa arrow"></span></a>
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
                        <h1 class="main-text" style="color: red">Agent</h1>
                    </div>
                </div>
                <!-- /. ROW  -->

                <!--province et liste-->
                <div class="panel-body">
                    <ul class="nav nav-tabs">
                        <li class="active"><a href="#Agent" data-toggle="tab">Agent</a>
                        </li>
                        <li class=""><a href="#liste" data-toggle="tab">Liste</a>
                    </ul>

                    <div class="tab-content">
                        <div class="tab-pane fade active in" id="Agent">
                            <br />
                            <div class="row">
                                <div class="col-md-12 col-sm-6">
                                    <div class="panel panel-default" style="border-radius: 30px">
                                        <div class="panel-heading" style="border-radius: 30px">Formulaire</div>
                                        <form role="form" action="php/addAgent" method="POST" >
                                            <div class="col-md-12">
                                                <div class="col-md-3 "></div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <br />
                                                        <?php
                                                            include('php/connexion.php');
                                                            $sql1='SELECT * FROM agent WHERE ID_AGENT='.$_GET['ID_AGENT'];
                                                            $stmt=$connect->query($sql1);
                                                            while($rs=$stmt->fetch())
                                                            {
                                                        ?>
                                                        <label>Matricule</label>
                                                        <input value="<?php echo $rs['ID_AGENT']; ?>" name="txt_matricule_ag" class="form-control" style="border-radius: 30px"
                                                            placeholder="Matricule à obtenir du système" />
                                                    </div>
                                                </div>
                                                <div class="col-md-12 ">
                                                    <hr />
                                                </div>
                                                <div class="col-md-1 "></div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label>Nom*</label>
                                                        <input value="<?php echo $rs['NOM']; ?>" name="txt_nom_ag" class="form-control" style="border-radius: 30px"
                                                            placeholder="Saisissez le nom" />
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Postnom</label>
                                                        <input value="<?php echo $rs['POSTNOM']; ?>" name="txt_postnom_ag" class="form-control" style="border-radius: 30px"
                                                            placeholder="Saisissez le postnom" />
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Prenom*</label>
                                                        <input value="<?php echo $rs['PRENOM']; ?>" name="txt_prenom_ag" class="form-control" style="border-radius: 30px"
                                                            placeholder="Saisissez le prenom" />
                                                    </div>
                                                    <div class="form-group">
                                                        <br />
                                                        <label>Sexe</label>
                                                        <label class="checkbox-inline">
                                                            <input type="radio" name="txt_sexe_ag" id="optionsRadios1"
                                                                value="M" <?php if ($rs['SEXE']=='M'){echo 'checked';} else{echo '';}?>  />Homme
                                                        </label>
                                                        <label class="checkbox-inline">
                                                            <input type="radio" name="txt_sexe_ag" id="optionsRadios2"
                                                                value="F" <?php if ($rs['SEXE']=='F'){echo 'checked';} else{echo '';} ?> />Femme
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col-md-1 "></div>
                                                <div class="col-md-4 ">
                                                    <div class="form-group">
                                                        <label>Etat civil</label>
                                                        <select value="<?php echo $rs['ETAT_CIVIL']; ?>" name="txt_etat_civil_ag" class="form-control" style="border-radius: 30px">
                                                            <option>Celibataire</option>
                                                            <option>Marié</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>fonction*</label>
                                                        <input value="<?php echo $rs['FONCTION']; ?>" name="txt_fonction_ag" class="form-control" style="border-radius: 30px"
                                                            placeholder="Saisissez la fonction" />
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Numero de téléphone*</label>
                                                        <input value="<?php echo $rs['TELEPHONE']; ?>" name="txt_telephone_ag" class="form-control" style="border-radius: 30px"
                                                            placeholder="Saisissez le numero de téléphone" />
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Adresse</label>
                                                        <input value="<?php echo $rs['ADRESSE'];} ?>" name="txt_adresse_ag" class="form-control" style="border-radius: 30px"
                                                            placeholder="Saisissez l'adresse" />
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="col-md-7">
                                                        <div style="color: white;padding: 5px 0px 5px 40px;font-size: 16px;" class="col-md-12"> &nbsp;
                                                        <button value="Modifier" name="btnEnregistrerAg" type="submit" style="border-radius: 20px;float: right;" class="btn btn-danger">Modifier</button>
                                                        </div>
                                                    </div>
                                                </div>

                                        </form>
                                    </div>
                                        <label><h1><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/></h1></label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="liste">
                        <br />
                        <div class="row">
                            <div class="col-md-12 col-sm-6">
                                <div class="panel panel-default" style="border-radius: 30px">
                                    <div class="panel-heading" style="border-radius: 30px">Liste des agents</div>
                                    <div class=" panel-body">
                                        <div class="table-responsive">
                                        <table class="table table-striped table-bordered table-hover"
                                                    id="dataTables-example">
                                                    <thead>
                                                        <tr>
                                                            <th>Mat.</th>
                                                            <th>Nom</th>
                                                            <th>Postnom</th>
                                                            <th>Prenom</th>
                                                            <th>Sexe</th>
                                                            <th>Etat civil</th>
                                                            <th>Fonction</th>
                                                            <th>Telephone</th>
                                                            <th>Adresse</th>
                                                            <th>Date</th>
                                                            <th style="color:blue">Edit.</th>
                                                            <th style="color:red">Supp.</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                            try{
                                                            $sql="select * from agent";
                                                            $stmt=$connect->query($sql) ;
                                                            while ($rs = $stmt->fetch()) 
                                                            {
                                                        echo'
                                                        <tr class="even gradeA">
                                                            <td>'. $rs['ID_AGENT']. '</td>
                                                            <td>'. $rs['NOM'].'</td>
                                                            <td>'. $rs['POSTNOM'].'</td>
                                                            <td>'. $rs['PRENOM'].'</td>
                                                            <td>'. $rs['SEXE'].'</td>
                                                            <td>'. $rs['ETAT_CIVIL'].'</td>
                                                            <td>'. $rs['FONCTION'].'</td>
                                                            <td>'. $rs['TELEPHONE'].'</td>
                                                            <td>'. $rs['ADRESSE'].'</td>
                                                            <td>'. $rs['DATE_A'].'</td>
                                                            <td class="text-center"><a href="UpdateAgent?ID_AGENT='. $rs['ID_AGENT'].'"><img src="assets/img/Edit_24px.png"></a></td>
                                                            <td class="text-center"><a href="php/addAgent?ID_AGENT='. $rs['ID_AGENT'].'"><img src="assets/img/Trash Can_24px.png"></a></td>
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