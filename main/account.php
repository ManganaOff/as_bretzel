<?php
    session_start();

    if(!$_SESSION['logged']){
        header("Location: http://144.202.124.151/main/login.php");
    }
    
    $path = $_SERVER['DOCUMENT_ROOT'];
    $path .= "/db/pdo.php";


    include_once($path);
    
    $pdo = databaseConnection::getInstance();

    $balance = number_format($pdo->getBalance($_SESSION['pseudo']), 2);

    $current_wallet = $pdo->getUserInfos($_SESSION['user'])['wallet'];

?>


<html lang="en"><head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <!-- Primary Meta Tags -->
        <meta name="title" content="Shop tools with cheap prices">
        <meta name="description" content="[Accounts], [CC's], [Banks], [Sells], [WHM/Cpanels], [Pages], [Letters], [Leads], [SMTPS], [PHPMailers], [RDP'/VPS], [Script/Bots], [Methodes], [Documents]">
        <meta property="og:type" content="website">
        <meta property="og:url" content="http://localhost/profile">
        <meta property="og:title" content="Shop tools with cheap prices">
        <meta property="og:description" content="[Accounts], [CC's], [Banks], [Sells], [WHM/Cpanels], [Pages], [Letters], [Leads], [SMTPS], [PHPMailers], [RDP'/VPS], [Script/Bots], [Methodes], [Documents]">
        
        <?php
            include "../components/styles.php";
        ?>
    
        <style>
         .dt-center {
            text-align: center !Important;
         }
    </style><style type="text/css"> 
</style><style type="text/css">@keyframes tawkMaxOpen{0%{opacity:0;transform:translate(0, 30px);;}to{opacity:1;transform:translate(0, 0px);}}@-moz-keyframes tawkMaxOpen{0%{opacity:0;transform:translate(0, 30px);;}to{opacity:1;transform:translate(0, 0px);}}@-webkit-keyframes tawkMaxOpen{0%{opacity:0;transform:translate(0, 30px);;}to{opacity:1;transform:translate(0, 0px);}}#GQQKqSg-1611762603379{outline:none!important;visibility:visible!important;resize:none!important;box-shadow:none!important;overflow:visible!important;background:none!important;opacity:1!important;filter:alpha(opacity=100)!important;-ms-filter:progid:DXImageTransform.Microsoft.Alpha(Opacity1)!important;-moz-opacity:1!important;-khtml-opacity:1!important;top:auto!important;right:10px!important;bottom:90px!important;left:auto!important;position:fixed!important;border:0!important;min-height:0!important;min-width:0!important;max-height:none!important;max-width:none!important;padding:0!important;margin:0!important;-moz-transition-property:none!important;-webkit-transition-property:none!important;-o-transition-property:none!important;transition-property:none!important;transform:none!important;-webkit-transform:none!important;-ms-transform:none!important;width:auto!important;height:auto!important;display:none!important;z-index:2000000000!important;background-color:transparent!important;cursor:auto!important;float:none!important;border-radius:unset!important;pointer-events:auto!important}#iUO99k3-1611762603381.open{animation : tawkMaxOpen .25s ease!important;}</style></head>
    
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
                    <div class="card">
                        <div class="toolbar toolbar--inner">
                            <div class="toolbar__nav">
                                My Profile
                            </div>
                        </div>
                        <div class="card-body">
                            <h4 class="card-title">Mon compte</h4>
                                 
                             
                            <div class="row"> 

                                <div class="col-md-4">
                                    <form action="../action/update/update_password.php" method="POST" class="card">
                                        <div class="card-body">
                                            <h4 class="card-title">Informations personnelles</h4>
                                            <h6 class="card-subtitle">Vous pouvez mettre à jour vos informations ici.</h6>

                                             
                                            <div class="form-group">
                                                <input type="text" class="form-control" name="old" placeholder="Current password">
                                                <i class="form-group__bar"></i>
                                            </div>
                                            <div class="form-group">
                                                <input type="text" class="form-control" name="new" placeholder="New password">
                                                <i class="form-group__bar"></i>
                                            </div>
                                            <div class="form-group">
                                                <input type="text" class="form-control" name="confirm" placeholder="Re-type password">
                                                <i class="form-group__bar"></i>
                                            </div>

                                            <?php if(isset($_GET['error']) && $_GET['error'] == 'wrong') {?>

                                            <div style="font-weight: bold; text-align: center;" class="alert alert-danger">
                                                Mauvais password.
                                            </div>

                                            <?php } ?>

                                            <?php if(isset($_GET['error']) && $_GET['error'] == 'confirm') {?>

                                            <div style="font-weight: bold; text-align: center;" class="alert alert-danger">
                                                Les deux passwords ne sont pas identiques.
                                            </div>

                                            <?php } ?>


                                            <?php if(isset($_GET['password']) && $_GET['password'] == 'success') {?>

                                            <div style="font-weight: bold; text-align: center;" class="alert alert-success">
                                                Le password a bien été mis à jour.
                                            </div>

                                            <?php } ?>

                                            <div class="form-group" style="display: flex; justify-content: flex-end">
                                                <button style="width: 144px;" type="submit" class="form-control btn btn-light">Change password</button>
                                                <i class="form-group__bar"></i>
                                            </div>
                                    </form>
                                    <form action="../action/update/update_withdraw_wallet.php" method="POST">
                                            <label>Votre wallet de retrait BTC</label>
                                            <div class="form-group">
                                                <input type="text" class="form-control" name="btc_wallet" placeholder="BTC Address" value="<?php echo $current_wallet ?>">
                                                <i class="form-group__bar"></i>
                                            </div>
                                            <?php if(isset($_GET['wallet']) && $_GET['wallet'] == 'success') {?>

                                            <div style="font-weight: bold; text-align: center;" class="alert alert-success">
                                                Votre wallet de retrait a bien été mis à jour.
                                            </div>

                                            <?php } ?>

                                                <div class="text-right">
                                            	<input type="hidden" name="tboob" value="a37d959165816ba5d68c32793e33288a">
                                                <button type="submit" id="update" class="btn btn-light" onclick="updateinfo();">Update wallet</button>
                                            </div>
                                        </div>

                                    </form>
                                </div>

                                <div class="col-md-8">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="tab-container">
                                                <ul class="nav nav-tabs" role="tablist">
                                                    <li class="nav-item">
                                                        <a class="nav-link active" data-toggle="tab" href="#depos" role="tab" aria-expanded="true">Mes dépôts BTC</a>
                                                    </li>
                                                </ul>

                                                <div class="tab-content">
                                                    <div class="tab-pane fade active show" id="depos" role="tabpanel" aria-expanded="true">
                                                        <br>
                                                        <h6 class="card-subtitle">Mes dépots</h6>
                                                        <div id="depoTable_wrapper" class="dataTables_wrapper no-footer">
                                                        <div style="display: none" class="dataTables_length" id="depoTable_length">
                                                        <label>Show 
                                                        <select name="depoTable_length" aria-controls="depoTable" class="">
                                                        <option value="10">10</option><option value="25">25</option><option value="50">50</option><option value="100">100</option></select> entries</label></div><div id="depoTable_processing" class="dataTables_processing" style="display: none;">Processing...</div>
                                                        
                                                        <table class="table dataTable no-footer dtr-inline collapsed" id="depoTable" role="grid" aria-describedby="depoTable_info" style="width: 100%;">
                                                            <thead>
                                                                <tr role="row"><th class="dt-center sorting_asc" tabindex="0" aria-controls="depoTable" rowspan="1" colspan="1" style="width: 137px;" aria-label="
                                                                        Date
                                                                    : activate to sort column descending" aria-sort="ascending">
                                                                        Date
                                                                    </th><th style='width: 45px' class="dt-center sorting" tabindex="0" aria-controls="depoTable" rowspan="1" colspan="1" style="width: 244px;" aria-label="
                                                                        Ammount $
                                                                    : activate to sort column ascending">
                                                                        Montant
                                                                    </th><th class="dt-center sorting" tabindex="0" aria-controls="depoTable" rowspan="1" colspan="1" style="width: 288px" aria-label="
                                                                        Ammount BTC
                                                                    : activate to sort column ascending">
                                                                        Montant BTC
                                                                    </th>
                                                                    
                                                                    <th class="dt-center sorting" tabindex="0" aria-controls="depoTable" rowspan="1" colspan="1" style="width: 143px;" aria-label="
                                                                        Stats
                                                                    : activate to sort column ascending">
                                                                        Wallet
                                                                    </th>
                                                                    
                                                                    <th class="dt-center sorting" tabindex="0" aria-controls="depoTable" rowspan="1" colspan="1" style="width: 143px;" aria-label="
                                                                        Stats
                                                                    : activate to sort column ascending">
                                                                        Status
                                                                    </th>
                                                                    
                                                                    </tr>
                                                            </thead>
                                                        <tbody>
                                                            <?php echo $pdo->getMyDeposits($_SESSION['user']) ?>
                                                        </tbody>
                                                    </table>
                                                    
                                                    <div style='display: none' class="dataTables_info" id="depoTable_info" role="status" aria-live="polite">Showing 1 to 1 of 1 entries</div><div style='display: none' class="dataTables_paginate paging_simple_numbers" id="depoTable_paginate"><a class="paginate_button previous disabled" aria-controls="depoTable" data-dt-idx="0" tabindex="0" id="depoTable_previous">Previous</a><span><a class="paginate_button current" aria-controls="depoTable" data-dt-idx="1" tabindex="0">1</a></span><a class="paginate_button next disabled" aria-controls="depoTable" data-dt-idx="2" tabindex="0" id="depoTable_next">Next</a></div></div>                               

                                                    </div>
                                                    <div class="tab-pane fade" id="depospm" role="tabpanel" aria-expanded="false">
                                                        <br>
                                                        <h6 class="card-subtitle">You can find here all your deposites with PerfectMoney</h6>
                                                        <div id="depoTablePm_wrapper" class="dataTables_wrapper no-footer"><div style="display: none" class="dataTables_length" id="depoTablePm_length"><label>Show <select name="depoTablePm_length" aria-controls="depoTablePm" class=""><option value="10">10</option><option value="25">25</option><option value="50">50</option><option value="100">100</option></select> entries</label></div><div id="depoTablePm_processing" class="dataTables_processing" style="display: none;">Processing...</div>
                                                        <table class="table dataTable no-footer dtr-inline" id="depoTablePm" style="width: 100%;" role="grid" aria-describedby="depoTablePm_info">
                                                            <thead>
                                                                <tr role="row"><th class="dt-center sorting_asc" tabindex="0" aria-controls="depoTablePm" rowspan="1" colspan="1" style="width: 0px;" aria-label="
                                                                        Date
                                                                    : activate to sort column descending" aria-sort="ascending">
                                                                        Date
                                                                    </th><th class="dt-center sorting" tabindex="0" aria-controls="depoTablePm" rowspan="1" colspan="1" style="width: 0px;" aria-label="
                                                                        Ammount $
                                                                    : activate to sort column ascending">
                                                                        Ammount $
                                                                    </th><th class="dt-center sorting" tabindex="0" aria-controls="depoTablePm" rowspan="1" colspan="1" style="width: 0px;" aria-label="
                                                                        Stats
                                                                    : activate to sort column ascending">
                                                                        Stats
                                                                    </th></tr>
                                                            </thead>
                                                        <tbody><tr role="row" class="odd"><td class="dt-center sorting_1" tabindex="0"><strong>2021-01-20 16:26:43</strong></td><td class=" dt-center"><strong>$10</strong></td><td class=" dt-center"><span class="issue-tracker__tag bg-purple">Canceled</span></td></tr></tbody></table><div style="display: none" class="dataTables_info" id="depoTablePm_info" role="status" aria-live="polite">Showing 1 to 1 of 1 entries</div><div style='display: none' class="dataTables_paginate paging_simple_numbers" id="depoTablePm_paginate"><a class="paginate_button previous disabled" aria-controls="depoTablePm" data-dt-idx="0" tabindex="0" id="depoTablePm_previous">Previous</a><span><a class="paginate_button current" aria-controls="depoTablePm" data-dt-idx="1" tabindex="0">1</a></span><a class="paginate_button next disabled" aria-controls="depoTablePm" data-dt-idx="2" tabindex="0" id="depoTablePm_next">Next</a></div></div>
                                                    </div>
                                                    
                                                    <div class="tab-pane fade" id="withdraw" role="tabpanel" aria-expanded="false">
                                                        <br>
                                                        <h6 class="card-subtitle">Mes withdraws</h6>
                                                        <div id="withTable_wrapper" class="dataTables_wrapper no-footer"><div style="display: none" class="dataTables_length" id="withTable_length"><label>Show <select name="withTable_length" aria-controls="withTable" class=""><option value="10">10</option><option value="25">25</option><option value="50">50</option><option value="100">100</option></select> entries</label></div><div id="withTable_processing" class="dataTables_processing" style="display: none;">Processing...</div><table class="table dataTable no-footer dtr-inline" id="withTable" style="width: 100%;" role="grid" aria-describedby="withTable_info">
                                                            <thead>
                                                                <tr role="row"><th class="dt-center sorting_asc" tabindex="0" aria-controls="withTable" rowspan="1" colspan="1" style="width: 0px;" aria-label="
                                                                        Date
                                                                    : activate to sort column descending" aria-sort="ascending">
                                                                        Date
                                                                    </th><th class="dt-center sorting" tabindex="0" aria-controls="withTable" rowspan="1" colspan="1" style="width: 0px;" aria-label="
                                                                        Ammount
                                                                    : activate to sort column ascending">
                                                                        Ammount
                                                                    </th><th class="dt-center sorting" tabindex="0" aria-controls="withTable" rowspan="1" colspan="1" style="width: 0px;" aria-label="
                                                                        Stats
                                                                    : activate to sort column ascending">
                                                                        Stats
                                                                    </th></tr>
                                                            </thead>
                                                        <tbody><tr role="row" class="odd"><td class="dt-center sorting_1" tabindex="0"></td><td class=" dt-center"></td><td class=" dt-center"></td></tr></tbody></table><div style="display: none" class="dataTables_info" id="withTable_info" role="status" aria-live="polite">Showing 1 to 1 of 1 entries</div><div style='display: none' class="dataTables_paginate paging_simple_numbers" id="withTable_paginate"><a class="paginate_button previous disabled" aria-controls="withTable" data-dt-idx="0" tabindex="0" id="withTable_previous">Previous</a><span><a class="paginate_button current" aria-controls="withTable" data-dt-idx="1" tabindex="0">1</a></span><a class="paginate_button next disabled" aria-controls="withTable" data-dt-idx="2" tabindex="0" id="withTable_next">Next</a></div></div> 
                                                    </div>
                                                                                                    </div>
                                            </div>
                                        </div>
                                    </div> 



                                    <div class="card">
                                        <div class="card-body">
                                            <div class="tab-container">
                                                <ul class="nav nav-tabs" role="tablist">
                                                    <li class="nav-item">
                                                        <a class="nav-link active" data-toggle="tab" href="#depos" role="tab" aria-expanded="true">Retraits BTC</a>
                                                    </li>
                                                </ul>

                                                <div class="tab-content">
                                                    <div class="tab-pane fade active show" id="depos" role="tabpanel" aria-expanded="true">
                                                        <br>
                                                        <h6 class="card-subtitle">Mes retraits</h6>
                                                        <div id="depoTable_wrapper" class="dataTables_wrapper no-footer"><div style="display: none" class="dataTables_length" id="depoTable_length"><label>Show <select name="depoTable_length" aria-controls="depoTable" class=""><option value="10">10</option><option value="25">25</option><option value="50">50</option><option value="100">100</option></select> entries</label></div><div id="depoTable_processing" class="dataTables_processing" style="display: none;">Processing...</div>
                                                        <table class="table dataTable no-footer dtr-inline collapsed" id="depoTable" role="grid" aria-describedby="depoTable_info" style="width: 100%;">
                                                            <thead>
                                                                <tr role="row"><th class="dt-center sorting_asc" tabindex="0" aria-controls="depoTable" rowspan="1" colspan="1" style="width: 137px;" aria-label="
                                                                        Date
                                                                    : activate to sort column descending" aria-sort="ascending">
                                                                        Date
                                                                    </th><th class="dt-center sorting" tabindex="0" aria-controls="depoTable" rowspan="1" colspan="1" style="width: 244px;" aria-label="
                                                                        Ammount $
                                                                    : activate to sort column ascending">
                                                                        Ammount €
                                                                    </th><th class="dt-center sorting" tabindex="0" aria-controls="depoTable" rowspan="1" colspan="1" style="width: 288px;" aria-label="
                                                                        Ammount BTC
                                                                    : activate to sort column ascending">
                                                                        Wallet
                                                                    </th><th class="dt-center sorting" tabindex="0" aria-controls="depoTable" rowspan="1" colspan="1" style="width: 143px;" aria-label="
                                                                        Stats
                                                                    : activate to sort column ascending">
                                                                        Status
                                                                    </th></tr>
                                                            </thead>
                                                        <tbody>
                                                            <?php echo $pdo->getMyWithdrawals($_SESSION['user']) ?>
                                                        </tbody>
                                                        </table><div style="display: none" class="dataTables_info" id="depoTable_info" role="status" aria-live="polite">Showing 1 to 1 of 1 entries</div><div style='display: none' class="dataTables_paginate paging_simple_numbers" id="depoTable_paginate"><a class="paginate_button previous disabled" aria-controls="depoTable" data-dt-idx="0" tabindex="0" id="depoTable_previous">Previous</a><span><a class="paginate_button current" aria-controls="depoTable" data-dt-idx="1" tabindex="0">1</a></span><a class="paginate_button next disabled" aria-controls="depoTable" data-dt-idx="2" tabindex="0" id="depoTable_next">Next</a></div></div>                               

                                                    </div>
                                                    <div class="tab-pane fade" id="depospm" role="tabpanel" aria-expanded="false">
                                                        <br>
                                                        <h6 class="card-subtitle">You can find here all your deposites with PerfectMoney</h6>
                                                        <div id="depoTablePm_wrapper" class="dataTables_wrapper no-footer"><div style="display: none" class="dataTables_length" id="depoTablePm_length"><label>Show <select name="depoTablePm_length" aria-controls="depoTablePm" class=""><option value="10">10</option><option value="25">25</option><option value="50">50</option><option value="100">100</option></select> entries</label></div><div id="depoTablePm_processing" class="dataTables_processing" style="display: none;">Processing...</div><table class="table dataTable no-footer dtr-inline" id="depoTablePm" style="width: 100%;" role="grid" aria-describedby="depoTablePm_info">
                                                            <thead>
                                                                <tr role="row"><th class="dt-center sorting_asc" tabindex="0" aria-controls="depoTablePm" rowspan="1" colspan="1" style="width: 0px;" aria-label="
                                                                        Date
                                                                    : activate to sort column descending" aria-sort="ascending">
                                                                        Date
                                                                    </th><th class="dt-center sorting" tabindex="0" aria-controls="depoTablePm" rowspan="1" colspan="1" style="width: 0px;" aria-label="
                                                                        Ammount $
                                                                    : activate to sort column ascending">
                                                                        Ammount $
                                                                    </th><th class="dt-center sorting" tabindex="0" aria-controls="depoTablePm" rowspan="1" colspan="1" style="width: 0px;" aria-label="
                                                                        Stats
                                                                    : activate to sort column ascending">
                                                                        Stats
                                                                    </th></tr>
                                                            </thead>
                                                        <tbody><tr role="row" class="odd"><td class="dt-center sorting_1" tabindex="0"><strong>2021-01-20 16:26:43</strong></td><td class=" dt-center"><strong>$10</strong></td><td class=" dt-center"><span class="issue-tracker__tag bg-purple">Canceled</span></td></tr></tbody></table><div style="display: none" class="dataTables_info" id="depoTablePm_info" role="status" aria-live="polite">Showing 1 to 1 of 1 entries</div><div style='display: none' class="dataTables_paginate paging_simple_numbers" id="depoTablePm_paginate"><a class="paginate_button previous disabled" aria-controls="depoTablePm" data-dt-idx="0" tabindex="0" id="depoTablePm_previous">Previous</a><span><a class="paginate_button current" aria-controls="depoTablePm" data-dt-idx="1" tabindex="0">1</a></span><a class="paginate_button next disabled" aria-controls="depoTablePm" data-dt-idx="2" tabindex="0" id="depoTablePm_next">Next</a></div></div>
                                                    </div>
                                                    
                                                    <div class="tab-pane fade" id="withdraw" role="tabpanel" aria-expanded="false">
                                                        <br>
                                                        <h6 class="card-subtitle">You can find here all your withdraws</h6>
                                                        <div id="withTable_wrapper" class="dataTables_wrapper no-footer"><div style="display: none" class="dataTables_length" id="withTable_length"><label>Show <select name="withTable_length" aria-controls="withTable" class=""><option value="10">10</option><option value="25">25</option><option value="50">50</option><option value="100">100</option></select> entries</label></div><div id="withTable_processing" class="dataTables_processing" style="display: none;">Processing...</div><table class="table dataTable no-footer dtr-inline" id="withTable" style="width: 100%;" role="grid" aria-describedby="withTable_info">
                                                            <thead>
                                                                <tr role="row"><th class="dt-center sorting_asc" tabindex="0" aria-controls="withTable" rowspan="1" colspan="1" style="width: 0px;" aria-label="
                                                                        Date
                                                                    : activate to sort column descending" aria-sort="ascending">
                                                                        Date
                                                                    </th><th class="dt-center sorting" tabindex="0" aria-controls="withTable" rowspan="1" colspan="1" style="width: 0px;" aria-label="
                                                                        Ammount
                                                                    : activate to sort column ascending">
                                                                        Ammount
                                                                    </th><th class="dt-center sorting" tabindex="0" aria-controls="withTable" rowspan="1" colspan="1" style="width: 0px;" aria-label="
                                                                        Stats
                                                                    : activate to sort column ascending">
                                                                        Stats
                                                                    </th></tr>
                                                            </thead>
                                                        <tbody><tr role="row" class="odd"><td class="dt-center sorting_1" tabindex="0"></td><td class=" dt-center"></td><td class=" dt-center"></td></tr></tbody></table><div style="display: none" class="dataTables_info" id="withTable_info" role="status" aria-live="polite">Showing 1 to 1 of 1 entries</div><div style='display: none' class="dataTables_paginate paging_simple_numbers" id="withTable_paginate"><a class="paginate_button previous disabled" aria-controls="withTable" data-dt-idx="0" tabindex="0" id="withTable_previous">Previous</a><span><a class="paginate_button current" aria-controls="withTable" data-dt-idx="1" tabindex="0">1</a></span><a class="paginate_button next disabled" aria-controls="withTable" data-dt-idx="2" tabindex="0" id="withTable_next">Next</a></div></div> 
                                                    </div>
                                                                                                    </div>
                                            </div>
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