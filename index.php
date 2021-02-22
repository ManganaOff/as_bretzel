<?php
    //$current_hour = date('H:i:s');
    //var_dump(diff_time($current_hour , '21:58:12'));

    //svar_dump(explode(" ", "2021-02-19 22:10:04")[1]);
    //die();

    session_start();

//	ini_set('display_errors', 'on');

    if(!$_SESSION['logged']){
        header("Location: http://localhost/as_bretzel/main/login.php");
    }
    
//    $path = $_SERVER['DOCUMENT_ROOT'];
    $path = "db/pdo.php";

    include_once($path);
    
    $pdo = databaseConnection::getInstance();

    $balance = number_format($pdo->getBalance($_SESSION['pseudo']), 2);
    $news = $pdo->getNews();

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <!-- Primary Meta Tags -->
        <meta name="title" content="Shop tools with cheap prices">     
        <?php
            include "components/styles.php";
        ?>

        <title>AS Bretzel</title> 
    </head>
    <style>
         .dt-center {
            text-align: center !Important;
         }
    </style>
    <body data-sa-theme="4">        <main class="main">

    <?php
        include "components/header.php";
        include "components/side_bar.php";
    ?>


		<main>
            <section class="content">

                <?php if(isset($_GET['report']) && $_GET['report'] == 'success') { ?>
                    <div style="font-weight: bold" class="alert alert-success">We have received your report. We will examine it and take the necessary measures as soon as possible.</div>
                <?php } ?>

                <div class="row">
                    <div class="
                            col-md-9">
                        <input type="hidden" name="tboob" value="a0168735d1a5743cdc40e0419c6d9ea7">
                                                <div class="row">
                        


                            <div style='display: none' class="col-md-12">
                                <div class="card" >
                                    <div class="toolbar toolbar--inner">
                                        <div class="toolbar__nav">
                                            Stats
                                        </div>                                        
                                    </div>
                                    <div class="card-body">
                                        <div class="col-md-12">
                                            <div class="flot-chart flot-donut"></div>
                                            <div class="flot-chart-legends zenga"></div>
                                        </div>
                                    </div> 
                                </div>
                                
                            </div>   


                            <div class="col-md-12">
                                <div class="card" >
                                    <div class="toolbar toolbar--inner">
                                        <div class="toolbar__nav">
                                            News
                                        </div>                                        
                                    </div>
                                    <div class="card-body">
                                        <div class="col-md-12" id='w-news'>
                                            <?php echo $news ?>
                                        </div>
                                    </div> 
                                </div>
                                
                            </div>  


                        </div>                   
                    </div>
                     <div style="display: none" class="col-md-3">

                                                    <div class="card">
                                <div class="card-body" style="overflow-x: scroll">
                                    <h4 class="card-title">Best 5 Sellers.</h4>
                                </div>

                                <div class="listview listview--hover">
                                                                        <a class="listview__item" href="http://localhost/store/index/1141">
                                        <img src="http://localhost/as_bretzel/img/logo.png" class="listview__img" alt="">

                                        <div class="listview__content">
                                           <div class="listview__heading text-truncate">Seller1141</div>
                                            <p><strong>Good rates : <span class="badge badge-success">2</span> Negative rates : <span class="badge badge-danger">2</span></strong></p>                                        
                                        </div>
                                    </a>
                                                                        <div class="m-4"></div>
                                </div>
                            </div>
                        
<!--                                                 <div class="card">
                            <div class="toolbar toolbar--inner">
                                <div class="toolbar__nav">
                                    Adds
                                </div>                                        
                            </div>
                            <div class="card-body" style="overflow-x: scroll">
                                <div class="col-md-12">
                                	<input type="hidden" name="tboob" value="a0168735d1a5743cdc40e0419c6d9ea7"> 
                                	<iframe data-aa="1424052" src="//acceptable.a-ads.com/1424052" scrolling="no" style="border:0px; padding:0; width:100%; height:100%; overflow:hidden" allowtransparency="true"></iframe>
                                </div>
                            </div> 
                        </div>
 -->                    </div>
                </div>
        
            </section>
        </main>




        
        <div id="ModalContiner">
            
        </div>

        <div class="modal fade " id="MassModal" tabindex="-1" >
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title pull-left">Mass Add</h5>
                    </div>
                    <div class="modal-body">
                        <h5>Do not close this modal until the process will finish.</h5>
                        <br/>
                        <p><i class="fas fa-plus-circle"></i>&nbsp;
                            <b>Status</b>&nbsp;
                            <i class="zmdi zmdi-arrow-right"></i>&nbsp;
                            <i class="zmdi zmdi-arrow-right"></i>&nbsp;
                            <span class="badge bg-info" id="stats" > Working...</span>
                        <br/>
                        <p>
                        <i class="fas fa-plus-circle"></i>&nbsp;
                            <b id="massadd"></b>&nbsp;
                            <i class="zmdi zmdi-arrow-right"></i>&nbsp;
                            <i class="zmdi zmdi-arrow-right"></i>&nbsp;
                            <span class="badge bg-success" id="acount">0</span>
                        </p>
                        <p>
                        <i class="fas fa-minus-circle"></i>&nbsp;
                            <b id="massnotadd"></b>&nbsp;
                            <i class="zmdi zmdi-arrow-right"></i>&nbsp;
                            <i class="zmdi zmdi-arrow-right"></i>&nbsp;
                            <span class="badge bg-danger" id="nacount">0</span>
                        </p>
                        <p>
                        <i class="fas fa-plus-circle"></i>&nbsp;
                            <b id="massduplicated"></b>&nbsp;
                            <i class="zmdi zmdi-arrow-right"></i>&nbsp;
                            <i class="zmdi zmdi-arrow-right"></i>&nbsp;
                            <span class="badge bg-warning" id="dcount">0</span></p>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Older IE warning message -->
            <!--[if IE]>
                <div class="ie-warning">
                    <h1>Warning!!</h1>
                    <p>You are using an outdated version of Internet Explorer, please upgrade to any of the following web browsers to access this website.</p>

                    <div class="ie-warning__downloads">
                        <a href="http://www.google.com/chrome">
                            <img src="http://localhost/_template/img/browsers/chrome.png" alt="">
                        </a>

                        <a href="https://www.mozilla.org/en-US/firefox/new">
                            <img src="http://localhost/_template/img/browsers/firefox.png" alt="">
                        </a>

                        <a href="http://www.opera.com">
                            <img src="http://localhost/_template/img/browsers/opera.png" alt="">
                        </a>

                        <a href="https://support.apple.com/downloads/safari">
                            <img src="http://localhost/_template/img/browsers/safari.png" alt="">
                        </a>

                        <a href="https://www.microsoft.com/en-us/windows/microsoft-edge">
                            <img src="http://localhost/_template/img/browsers/edge.png" alt="">
                        </a>

                        <a href="http://windows.microsoft.com/en-us/internet-explorer/download-ie">
                            <img src="http://localhost/_template/img/browsers/ie.png" alt="">
                        </a>
                    </div>
                    <p>Sorry for the inconvenience!</p>
                </div>
            <![endif]-->

        <?php
            include "components/modals.php";
        ?>
        </body>
    <html>
  

                                        
