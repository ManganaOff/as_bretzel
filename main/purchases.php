<?php
    session_start();

    if(!$_SESSION['logged']){
        header("Location: http://localhost/as_bretzel/main/login.php");
    }
    

    $path = $_SERVER['DOCUMENT_ROOT'];
    $path .= "/as_bretzel/db/pdo.php";


    include_once($path);
    
    $pdo = databaseConnection::getInstance();

    $balance = number_format($pdo->getBalance($_SESSION['pseudo']), 2);
    $total_purchased_cards = $pdo->getCountMyPurchasedCards($_SESSION['user']);

    if($total_purchased_cards > 0){
        $color_purchased = "success";
    } else {
        $color_purchased = "danger";
    }

?>

<html lang="en"><head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <!-- Primary Meta Tags -->
        <meta name="title" content="Shop tools with cheap prices">
        <meta name="description" content="[Accounts], [CC's], [Banks], [Sells], [WHM/Cpanels], [Pages], [Letters], [Leads], [SMTPS], [PHPMailers], [RDP'/VPS], [Script/Bots], [Methodes], [Documents]">
        <meta property="og:type" content="website">
        <meta property="og:url" content="http://localhost/myitems">
        <meta property="og:title" content="Shop tools with cheap prices">
        <meta property="og:description" content="[Accounts], [CC's], [Banks], [Sells], [WHM/Cpanels], [Pages], [Letters], [Leads], [SMTPS], [PHPMailers], [RDP'/VPS], [Script/Bots], [Methodes], [Documents]">
        
        <?php
            include "../components/styles.php";
        ?>

       <title>AS - Bretzel</title> 
    <style>
         .dt-center {
            text-align: center !Important;
         }
    </style><style type="text/css"> 
</style><style type="text/css">@keyframes tawkMaxOpen{0%{opacity:0;transform:translate(0, 30px);;}to{opacity:1;transform:translate(0, 0px);}}@-moz-keyframes tawkMaxOpen{0%{opacity:0;transform:translate(0, 30px);;}to{opacity:1;transform:translate(0, 0px);}}@-webkit-keyframes tawkMaxOpen{0%{opacity:0;transform:translate(0, 30px);;}to{opacity:1;transform:translate(0, 0px);}}#r2GDrnK-1611604708389{outline:none!important;visibility:visible!important;resize:none!important;box-shadow:none!important;overflow:visible!important;background:none!important;opacity:1!important;filter:alpha(opacity=100)!important;-ms-filter:progid:DXImageTransform.Microsoft.Alpha(Opacity1)!important;-moz-opacity:1!important;-khtml-opacity:1!important;top:auto!important;right:10px!important;bottom:90px!important;left:auto!important;position:fixed!important;border:0!important;min-height:0!important;min-width:0!important;max-height:none!important;max-width:none!important;padding:0!important;margin:0!important;-moz-transition-property:none!important;-webkit-transition-property:none!important;-o-transition-property:none!important;transition-property:none!important;transform:none!important;-webkit-transform:none!important;-ms-transform:none!important;width:auto!important;height:auto!important;display:none!important;z-index:2000000000!important;background-color:transparent!important;cursor:auto!important;float:none!important;border-radius:unset!important;pointer-events:auto!important}#FF012eg-1611604708392.open{animation : tawkMaxOpen .25s ease!important;}</style></head>
    
    <body data-sa-theme="4">        <main class="main">
            <div class="page-loader" style="display: none;">
                <div class="page-loader__spinner">
                    <svg viewBox="25 25 50 50">
                        <circle cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10"></circle>
                    </svg>
                </div>
            </div>

            <?php
                    include "../components/header.php";
                    include "../components/side_bar.php";
            ?>

		<main>
            <section class="content">

                    <div class="card ">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <h4 class="card-title">Mes produits</h4>
                                    <h6 class="card-subtitle">Retrouvez ici tous les produits que vous avez achetés. </h6>
                                </div>

                            </div>
                            <br>
                            <br>
                            <input type="hidden" name="tboob" value="e14fb6cbe6c72cebd4af6c21f1635dd6">
                            <div class="row">                       
                                <div class="col-md-3">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="actions">
                                                <a href="#modale_my_purchases_cards" style="height: 34px" class="btn btn-light pull-right viewboobs" data-dest="cards"><i class="fas fa-eye"></i></a>
                                                <span class="btn btn-<?php echo $color_purchased; ?> pull-right"><?php echo $total_purchased_cards ?></span>
                                            </div>
                                            <center><i class="fas fa-credit-card" style="font-size: 90px;"></i>
                                            <h4 class="card-title">Credit Cards</h4></center>
                                        </div>
                                        
                                    </div>
                                </div>    
                            </div>
                        </div>
                    </div>                    
                
            </section>
        </main>
        
        <div id="ModalContiner">
            
        </div>

        <div class="modal fade " id="MassModal" tabindex="-1">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title pull-left">Mass Add</h5>
                    </div>
                    <div class="modal-body">
                        <h5>Do not close this modal until the process will finish.</h5>
                        <br>
                        <p><i class="zmdi zmdi-plus-circle-o"></i>&nbsp;
                            <b>Status</b>&nbsp;
                            <i class="zmdi zmdi-arrow-right"></i>&nbsp;
                            <i class="zmdi zmdi-arrow-right"></i>&nbsp;
                            <span class="badge bg-info" id="stats"> Working...</span>
                        <br>
                        </p><p>
                            <i class="zmdi zmdi-plus-circle-o"></i>&nbsp;
                            <b id="massadd"></b>&nbsp;
                            <i class="zmdi zmdi-arrow-right"></i>&nbsp;
                            <i class="zmdi zmdi-arrow-right"></i>&nbsp;
                            <span class="badge bg-success" id="acount">0</span>
                        </p>
                        <p>
                            <i class="zmdi zmdi-minus-circle-outline"></i>&nbsp;
                            <b id="massnotadd"></b>&nbsp;
                            <i class="zmdi zmdi-arrow-right"></i>&nbsp;
                            <i class="zmdi zmdi-arrow-right"></i>&nbsp;
                            <span class="badge bg-danger" id="nacount">0</span>
                        </p>
                        <p>
                            <i class="zmdi zmdi-plus-circle-o-duplicate"></i>&nbsp;
                            <b id="massduplicated"></b>&nbsp;
                            <i class="zmdi zmdi-arrow-right"></i>&nbsp;
                            <i class="zmdi zmdi-arrow-right"></i>&nbsp;
                            <span class="badge bg-warning" id="dcount">0</span></p>
                    </div>
                </div>
            </div>
        </div>

</main>


<?php
  include "../components/modals.php";
?>

</body></html>