<?php
    session_start();

    if(!$_SESSION['logged']){
        header("Location: http://144.202.124.151/main/login.php");
    }
    

    $path = $_SERVER['DOCUMENT_ROOT'];
    $path .= " /db/pdo.php";


    include_once($path);
    
    $pdo = databaseConnection::getInstance();

    $balance = number_format($pdo->getBalance($_SESSION['pseudo']), 2);

    $seller = $pdo->getSellerName($_GET['id']);
    $good_rates = $pdo->getSellerGoodReviews($_GET['id']);
    $bad_rates = $pdo->getSellerBadReviews($_GET['id']);

    $total_my_cards = $pdo->getCountMyProducts($_GET['id']);
    
    if($total_my_cards == "0"){
        $bouton_total = "danger";
    } else {
        $bouton_total = "success";
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
                                <h4 class="card-title"><?php echo $seller ?> Shop</h4>
                                <h6 class="card-subtitle">Retrouvez ici tous les produits du vendeur <?php echo $seller ?>. </h6>
                                <h5 class="card-subtitle">  <span class="btn btn-success" style="background: #28a745!important;"> Feeds positifs de ce vendeur : <?php echo $good_rates ?></span> </h5>
                                <h5 class="card-subtitle"> <span class="btn btn-danger">Feeds négatifs de ce vendeur : <?php echo $bad_rates ?></span> </h5>                                </div>
                            </div>
                            <br>
                            <br>
                            <input type="hidden" name="tboob" value="e14fb6cbe6c72cebd4af6c21f1635dd6">
                            <div class="row">                       
                                <div class="col-md-3">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="actions">
                                                <a href="#modale_seller_cards" style="height: 34px" class="btn btn-light pull-right viewboobs" data-dest="cards"><i class="fas fa-eye"></i></a>
                                                <span class="btn btn-<?php echo $bouton_total ?> pull-right"><?php echo $total_my_cards ?></span>
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

<div style="left: -1000px; overflow: scroll; position: absolute; top: -1000px; border: none; box-sizing: content-box; height: 200px; margin: 0px; padding: 0px; width: 200px;"><div style="border: none; box-sizing: content-box; height: 200px; margin: 0px; padding: 0px; width: 200px;"></div></div><div id="r2GDrnK-1611604708389" class="" style="display: block !important;">  <iframe id="R9kq90Q-1611604708395" src="about:blank" frameborder="0" scrolling="no" title="chat widget" class="" style="outline: none !important; visibility: visible !important; resize: none !important; box-shadow: none !important; overflow: visible !important; background: none transparent !important; opacity: 1 !important; position: fixed !important; border: 0px !important; padding: 0px !important; margin: 0px !important; transition-property: none !important; transform: none !important; display: none !important; z-index: 1000003 !important; cursor: auto !important; float: none !important; border-radius: unset !important; pointer-events: auto !important; top: auto !important; bottom: 60px !important; right: 15px !important; left: auto !important; width: 21px !important; max-width: 21px !important; min-width: 21px !important; height: 21px !important; max-height: 21px !important; min-height: 21px !important;"></iframe><iframe id="DEQZ3S1-1611604708397" src="about:blank" frameborder="0" scrolling="no" title="chat widget" class="" style="outline: none !important; visibility: visible !important; resize: none !important; box-shadow: none !important; overflow: visible !important; background: none transparent !important; opacity: 1 !important; position: fixed !important; border: 0px !important; padding: 0px !important; transition-property: none !important; cursor: auto !important; float: none !important; border-radius: unset !important; pointer-events: auto !important; transform: rotate(0deg) translateZ(0px) !important; transform-origin: 0px center !important; bottom: 90px !important; top: auto !important; right: 20px !important; left: auto !important; width: 72px !important; max-width: 72px !important; min-width: 72px !important; height: 79px !important; max-height: 79px !important; min-height: 79px !important; z-index: 1000002 !important; margin: 0px !important; display: none !important;"></iframe><div class="" style="outline: none !important; visibility: visible !important; resize: none !important; box-shadow: none !important; overflow: visible !important; background: none transparent !important; opacity: 1 !important; top: 0px !important; right: auto !important; bottom: auto !important; left: 0px !important; position: absolute !important; border: 0px !important; min-height: auto !important; min-width: auto !important; max-height: none !important; max-width: none !important; padding: 0px !important; margin: 0px !important; transition-property: none !important; transform: none !important; width: 100% !important; height: 100% !important; display: none !important; z-index: 1000001 !important; cursor: move !important; float: left !important; border-radius: unset !important; pointer-events: auto !important;"></div><div id="hHsRoE9-1611604708389" class="" style="outline: none !important; visibility: visible !important; resize: none !important; box-shadow: none !important; overflow: visible !important; background: none transparent !important; opacity: 1 !important; top: 0px !important; right: auto !important; bottom: auto !important; left: 0px !important; position: absolute !important; border: 0px !important; min-height: auto !important; min-width: auto !important; max-height: none !important; max-width: none !important; padding: 0px !important; margin: 0px !important; transition-property: none !important; transform: none !important; width: 6px !important; height: 100% !important; display: block !important; z-index: 999998 !important; cursor: w-resize !important; float: none !important; border-radius: unset !important; pointer-events: auto !important;"></div><div id="bFzb3zG-1611604708390" class="" style="outline: none !important; visibility: visible !important; resize: none !important; box-shadow: none !important; overflow: visible !important; background: none transparent !important; opacity: 1 !important; top: 0px !important; right: 0px !important; bottom: auto !important; left: auto !important; position: absolute !important; border: 0px !important; min-height: auto !important; min-width: auto !important; max-height: none !important; max-width: none !important; padding: 0px !important; margin: 0px !important; transition-property: none !important; transform: none !important; width: 100% !important; height: 6px !important; display: block !important; z-index: 999998 !important; cursor: n-resize !important; float: none !important; border-radius: unset !important; pointer-events: auto !important;"></div><div id="rctWtTq-1611604708390" class="" style="outline: none !important; visibility: visible !important; resize: none !important; box-shadow: none !important; overflow: visible !important; background: none transparent !important; opacity: 1 !important; top: 0px !important; right: auto !important; bottom: auto !important; left: 0px !important; position: absolute !important; border: 0px !important; min-height: auto !important; min-width: auto !important; max-height: none !important; max-width: none !important; padding: 0px !important; margin: 0px !important; transition-property: none !important; transform: none !important; width: 12px !important; height: 12px !important; display: block !important; z-index: 999998 !important; cursor: nw-resize !important; float: none !important; border-radius: unset !important; pointer-events: auto !important;"></div><iframe id="L4A8lqF-1611604708442" src="about:blank" frameborder="0" scrolling="no" title="chat widget" class="" style="outline: none !important; visibility: visible !important; resize: none !important; box-shadow: none !important; overflow: visible !important; background: none transparent !important; opacity: 1 !important; position: fixed !important; border: 0px !important; min-height: auto !important; min-width: auto !important; max-height: none !important; max-width: none !important; padding: 0px !important; margin: 0px !important; transition-property: none !important; transform: none !important; width: 378px !important; height: 903px !important; display: none !important; z-index: 999999 !important; cursor: auto !important; float: none !important; border-radius: unset !important; pointer-events: auto !important; bottom: 100px !important; top: auto !important; right: 20px !important; left: auto !important;"></iframe></div>

<?php
  include "../components/modals.php";
?>

</body></html>