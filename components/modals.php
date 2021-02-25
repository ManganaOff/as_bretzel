<!--
    MODALE DEPOSIT
-->

<div class="modal fade  show" id="modal_deposit">
    <div class="modal-dialog ">
    <div class="modal-content ">
    <div class="modal-header" style="justify-content: center;">
    <h5 class="modal-title pull-left">Deposit</h5>
    </div>
    <div class="modal-body">
    
    <?php if(isset($_GET['amount']) && $_GET['amount'] == 'false') { ?>
        <div style="text-align: center; font-weight: bold;" class="alert alert-danger">
            Veuillez entrez un montant correct pour le déposit.
        </div>
    <?php } ?>
    
    <?php if(isset($_GET['amount']) && $_GET['amount'] == 'pending') { ?>
        <div style="text-align: center; font-weight: bold;" class="alert alert-danger">
            Veuillez finaliser ou annuler le dépot en cours avant d'en initier un nouveau.
        </div>
    <?php } ?>

    <?php if(isset($_GET['deposit']) && $_GET['deposit'] == 'success') { ?>
        <div style="text-align: center; font-weight: bold;" class="alert alert-info">
            Merci d'envoyer exactement le montant <br><span style="color: #333;"><?php echo $pdo->getDepositInfos($_SESSION['user'])['amount_crypto'] ?> BTC</span><br>à l'adresse BTC ci dessous : 
            <br>
            <span style="color: #333;"><?php echo $pdo->getDepositWallet($_SESSION['user'])['wallet'] ?></span>
            <br>
            Le suivi du deposit est disponible dans vos paramètres. Il apparaitra dans votre balance au bout de 
            2 confirmations sur la blockchain.
        </div>
    <?php } ?>

    <form class="form" id="boobsform" method="POST" action="http://144.202.124.151/action/add/add_deposit.php"><div class="row" style="display:flex; justify-content: center; align-items: center;">
    <div class="col-md-6 col-centered"><div class="form-group"><center><label for="bitcoin"><img src="http://144.202.124.151/img/btc.png" style="width:50px;"></label><br>
    </center></div></div></div><div class="form-group" style="display: flex; flex-direction: column; align-items: center">
        <label class="label">Combien voulez vous déposer ? (Dépôt minimum = €10)</label>
        <label class="label">Merci de rentrer un montant en euros (Exemple 10)</label>
        <input type="text" id="deposit_ammount" class="form-control text-center" name="amount"><i class="form-group__bar"></i></div><div class="d-flex justify-content-center">
    <a type="reset" class="btn btn-light" style="margin-right:15px;" data-dismiss="modal" href="#">Retour</a>
    <button type="submit" class="btn btn-light " onclick="initdepo()" id="deposbtn">Déposer maintenant</button></div></form></div>

    </div>
    </div>
</div>

<!--
    MODALE WITHDRAW
-->

<div class="modal fade  show" id="modal_withdraw">
    <div class="modal-dialog ">
    <div class="modal-content ">
    <div class="modal-header" style="justify-content: center;">
    <h5 class="modal-title pull-left">Retrait</h5>
    </div>
    <div class="modal-body">

    <?php if(isset($_GET['amount']) && $_GET['amount'] == "nowallet"){ ?>
        <div style="text-align: center; font-weight: bold;" class="alert alert-danger">Vous devez configurer un wallet de retrait pour pouvoir effectuer un retrait.</div>
    <?php } ?>

    <?php if(isset($_GET['amount']) && $_GET['amount'] == "mustbenumeric"){ ?>
        <div style="text-align: center; font-weight: bold;" class="alert alert-danger">Veuillez entrer un montant correct pour votre retrait.</div>
    <?php } ?>

    <?php if(isset($_GET['amount']) && $_GET['amount'] == "lowbalance"){ ?>
        <div style="text-align: center; font-weight: bold;" class="alert alert-danger">Le montant de votre balance est insuffisant pour effectuer ce retrait.</div>
    <?php } ?>
    
    <?php if(isset($_GET['withdraw']) && $_GET['withdraw'] == "success"){ ?>
        <div style="text-align: center; font-weight: bold;" class="alert alert-success">Votre ordre de retrait a bien été effectué et sera traité dans les meilleurs délais. Vous pouvez suivre l'avancement depuis votre compte.</div>
    <?php } ?>

    <form class="form" id="boobsform" method="POST" action="http://144.202.124.151/action/add/add_withdraw.php">
    <div class="row" style="display:flex; justify-content: center; align-items: center;">
    <div class="col-md-6 col-centered"><div class="form-group"><center><label for="bitcoin"><img src="http://144.202.124.151/img/btc.png" style="width:50px;"></label><br>
    </center></div></div></div><div class="form-group" style="display: flex; flex-direction: column; align-items: center">
        <label class="label">Combien voulez-vous retirer ? (Retrait minimum = €10)</label><label class="label">Merci de rentrer un montant en euros (Exemple 10)</label>
        <input type="text" id="ammount" class="form-control text-center" name="amount"><i class="form-group__bar"></i></div><div class="d-flex justify-content-center">
    <a type="reset" class="btn btn-light" style="margin-right:15px;" data-dismiss="modal" href="#">Retour</a>
    <button type="submit" class="btn btn-light " onclick="initdepo()" id="deposbtn">Retirer maintenant</button></div></form></div>

    </div>
    </div>
</div>

<?php if(strtoupper($_SESSION['type']) == "SELLER" ||  strtoupper($_SESSION['type']) == "ADMIN") { ?>

<!-- 
    MODALE ADDING CARD
-->

<div class="modal fade  show" id="modale_add_card">
	                <div class="modal-dialog ">
	                    <div class="modal-content ">
	                        <div class="modal-header">
	                            <h5 class="modal-title pull-left">Add New Credit Card</h5>
	                        </div>
	                        <div class="modal-body">
	                            <div class="card-wrapper" style="display:none !Important;" data-jp-card-initialized="true">
                                <div class="jp-card-container">
                                <div class="jp-card">
                                <div class="jp-card-front">
                                <div class="jp-card-logo jp-card-elo">
                                <div class="e">e</div>
                                <div class="l">l</div>
                                <div class="o">o</div></div>
                                <div class="jp-card-logo jp-card-visa">Visa</div>
                                <div class="jp-card-logo jp-card-visaelectron">Visa
                                <div class="elec">Electron</div></div>
                                <div class="jp-card-logo jp-card-mastercard">Mastercard</div>
                                <div class="jp-card-logo jp-card-maestro">Maestro</div>
                                <div class="jp-card-logo jp-card-amex"></div>
                                <div class="jp-card-logo jp-card-discover">discover</div>
                                <div class="jp-card-logo jp-card-dinersclub"></div>
                                <div class="jp-card-logo jp-card-dankort">
                                <div class="dk"><div class="d"></div>
                                <div class="k"></div></div></div>
                                <div class="jp-card-logo jp-card-jcb">
                                <div class="j">J</div><div class="c">C</div>
                                <div class="b">B</div></div><div class="jp-card-lower">
                                <div class="jp-card-shiny"></div>
                                <div class="jp-card-cvc jp-card-display">•••</div>
                                <div class="jp-card-number jp-card-display">•••• •••• •••• ••••</div>
                                <div class="jp-card-name jp-card-display">Full Name</div>
                                <div class="jp-card-expiry jp-card-display" data-before="mm/yyyy" data-after="valid
date">••/••</div></div></div><div class="jp-card-back"><div class="jp-card-bar"></div><div class="jp-card-cvc jp-card-display">•••</div><div class="jp-card-shiny"></div></div></div></div></div><br>
                                
                                <form class="form" id="boobsform" action="../action/add/card.php" method="POST">
                                <div class="form-group"><label class="label">Card Number<span style="color:red"> *</span></label><input type="text" id="cc" name="numbers" class="form-control text-center "><i class="form-group__bar"></i></div><div class="row"><div class="form-group col-md-6"><label class="label">Expiry Date<span style="color:red"> *</span></label><input type="text" id="exp" name="exp" class="form-control text-center "><i class="form-group__bar"></i></div><div class="form-group col-md-6"><label class="label">CVV<span style="color:red"> *</span></label><input type="text" id="cvv" name="cvv" class="form-control text-center "><i class="form-group__bar"></i></div></div>
                                <div class="row"><div class="form-group col-md-6"><label class="label">VBV</label><input type="text" id="vbv" name="vbv" class="form-control text-center "><i class="form-group__bar"></i></div>
                                <div class="form-group col-md-6"><label class="label">Card Holder<span style="color:red"> *</span></label><input type="text" id="holder" name="holder" class="form-control text-center ">
                                <i class="form-group__bar"></i></div></div>
                                <div class="form-group"><label class="label">Billing Address<span style="color:red"> *</span></label><input type="text" id="ccba" name="address" class="form-control text-center "><i class="form-group__bar"></i></div>
                                
                                <div class="row" style='display: flex; justify-content: center;'><div class="form-group col-md-4"><label class="label">Zip Code<span style="color:red"> *</span></label><input type="text" id="cczip" name="zip" class="form-control text-center "><i class="form-group__bar"></i></div><div class="form-group  col-md-4"><label class="label">City<span style="color:red"> *</span></label><input type="text" id="city" name="city" class="form-control text-center "><i class="form-group__bar"></i></div>
                                <div style="display: none;" class="form-group col-md-4" style="z-index:9999"><label class="label">Country<span style="color:red"> *</span></label>
                                <input type="text" id="country" name="country" class="form-control text-center "><i class="form-group__bar"></i></div></div>
				<div class="form-group"><label class="label">Price in euro currency €<span style="color:red"> *</span></label><input type="text" id="price" name="price" class="form-control text-center "><i class="form-group__bar"></i></div><div class="form-group"><label class="label">Additional Info</label><textarea id="ccadditional" name="infos" class="form-control text-center " placeholder="Phone number, IP Address, DOB......"></textarea><i class="form-group__bar"></i></div><input type="hidden" name="tboob" value="38825c3f9ba634e8a53df6978f7412d2"><div class="d-flex justify-content-center">
                        <a type="reset" class="btn btn-light" style="margin-right:15px;" href="#">Close</a>
                        <input value="Confirm" type="submit" class="btn btn-light"></div></form></div>
	                        </div>
	                    </div>
                    </div>
                    

<?php } ?>

<!-- 
    MODALE CREATING TICKET
-->

<div class="modal fade  show" id="modale_new_ticket">
	                <div class="modal-dialog ">
	                    <div class="modal-content ">
	                        <div class="modal-header">
	                            <h5 class="modal-title pull-left">Open a ticket</h5>
	                        </div>
	                        <div class="modal-body">
                        <form action="../action/add/create_ticket.php" method="POST"> 
        				<div class="form-group">
                        <label class="label">Object<span style="color:red"> *</span></label>
                        <input type="text" id="price" name="object" class="form-control text-center "><i class="form-group__bar"></i></div>
                        
                        <div class="form-group">
                            <label class="label">Message :<span style="color:red"> *</span></label>
                            <textarea style="height: 200px;" id="ccadditional" name="message" class="form-control text-center " placeholder="Write your message here"></textarea><i class="form-group__bar"></i></div><input type="hidden" name="tboob" value="38825c3f9ba634e8a53df6978f7412d2"><div class="d-flex justify-content-center">
                        <a type="reset" class="btn btn-light" style="margin-right:15px;" href="#">Close</a>
                        <input type="submit" class="btn btn-light">
                        </div></form></div>
	                        </div>
	                    </div>
</div>

<?php if(strtoupper($_SESSION['type']) == "ADMIN") { ?>

<!-- 
    MODALE CREATING NEWS
-->

<div class="modal fade  show" id="modale_add_news">
	                <div class="modal-dialog ">
	                    <div class="modal-content ">
	                        <div class="modal-header">
	                            <h5 class="modal-title pull-left">Add news</h5>
	                        </div>
	                        <div class="modal-body">
                        <form action="../action/add/add_news.php" method="POST"> 
        				<div class="form-group">
                        <label class="label">Title<span style="color:red"> *</span></label>
                        <input type="text" id="price" name="titre" class="form-control text-center "><i class="form-group__bar"></i></div>
                        
                        <div class="form-group">
                            <label class="label">Message :<span style="color:red"> *</span></label>
                            <textarea style="height: 200px;" id="ccadditional" name="contenu" class="form-control text-center " placeholder="Write your message here"></textarea><i class="form-group__bar"></i></div><input type="hidden" name="tboob" value="38825c3f9ba634e8a53df6978f7412d2"><div class="d-flex justify-content-center">
                        <a type="reset" class="btn btn-light" style="margin-right:15px;" href="#">Close</a>
                        <input type="submit" class="btn btn-light">
                        </div></form></div>
	                        </div>
	                    </div>
</div>


<!-- 
    MODALE ADDING WALLET
-->

<div class="modal fade  show" id="modale_add_wallet">
	                <div class="modal-dialog ">
	                    <div class="modal-content ">
	                        <div class="modal-header">
	                            <h5 class="modal-title pull-left">Add wallet</h5>
	                        </div>
	                        <div class="modal-body">
                        <form action="../action/add/add_wallet.php" method="POST"> 
        				<div class="form-group">
                        <label class="label">Wallet BTC<span style="color:red"> *</span></label>
                        <input type="text" id="price" name="wallet" class="form-control text-center "><i class="form-group__bar"></i></div>
                        <div style="display: flex; justify-content: center">
                            <a type="reset" class="btn btn-light" style="margin-right:15px;" href="#">Close</a>
                            <input type="submit" class="btn btn-light">
                        </div>
                        </div></form></div>
	                        </div>
	                    </div>
</div>

<?php } ?>


<?php if(strtoupper($_SESSION['type']) == "SELLER" || strtoupper($_SESSION['type']) == "ADMIN"){ ?>

<!-- 
    MODALE IMPORTING CCS
-->

<div class="modal fade  show" id="modale_import_cc">
	                <div class="modal-dialog ">
	                    <div class="modal-content ">
	                        <div class="modal-header">
	                            <h5 class="modal-title pull-left">Add news</h5>
	                        </div>
	                        <div class="modal-body">
                        <form action="../action/add/import_cc.php" method="POST" enctype="multipart/form-data"> 
                                                
                        <div class="form-group">
                            <label class="label">Fichier (.txt) :<span style="color:red"> *</span></label>
                            <input type="file" id='files' name="cc_file">
                        </div>
                        
                        <input type="hidden" name="tboob" value="38825c3f9ba634e8a53df6978f7412d2">
                        
                        <div class="d-flex justify-content-center">
                        
                        <a type="reset" class="btn btn-light" style="margin-right:15px;" href="#">Close</a>
                        <input type="submit" class="btn btn-light">
                        </div>
                    </form>
                    </div>
	                        </div>
	                    </div>
</div>


<?php } ?>

<!--
    MODALE POUR PAGE BOUTIQUE VENDEUR
-->

<div class="modal fade  show" id="modale_seller_cards">
	                <div class="modal-dialog modal-xl">
	                    <div class="modal-content ">
	                        <div class="modal-header">
	                            <h5 class="modal-title pull-left"></h5>
	                        </div>
	                        <div class="modal-body">
	                            <div class="card"><h4 class="card-title">Cards </h4><div id="BoobsTableView_wrapper" class="dataTables_wrapper no-footer" style="max-height: 500px">
                                <div style="display: none" class="dataTables_length" id="BoobsTableView_length"><label>Show <select style="display: none;" name="BoobsTableView_length" aria-controls="BoobsTableView" class=""><option value="10">10</option><option value="25">25</option><option value="50">50</option><option value="100">100</option></select> entries</label></div>
                                        <?php echo $pdo->getSellerCards($_GET['id'], $_SESSION['user']); ?>
			                            <div  style="display:none" class="dataTables_paginate paging_simple_numbers" id="BoobsTableView_paginate"><a class="paginate_button previous disabled" aria-controls="BoobsTableView" data-dt-idx="0" tabindex="0" id="BoobsTableView_previous">Previous</a><span><a class="paginate_button current" aria-controls="BoobsTableView" data-dt-idx="1" tabindex="0">1</a></span><a class="paginate_button next disabled" aria-controls="BoobsTableView" data-dt-idx="2" tabindex="0" id="BoobsTableView_next">Next</a></div></div></div><div class="d-flex justify-content-center">
			                            <a type="reset" class="btn btn-light" style="margin-right:15px;" data-dismiss="modal" href="#">Close</a></div>	    	
	                        </div>
	                    </div>
	                </div>
	            </div>

<!--
    MODALE POUR PAGE PURCHASED CARD
-->

<div class="modal fade  show" id="modale_my_purchases_cards">
	<div class="modal-dialog modal-xl">
	    <div class="modal-content ">
            <div class="modal-header">
                <h5 class="modal-title pull-left"></h5>
            </div>

            <div class="modal-body">
	            <div class="card">
                    <h4 class="card-title">Cards </h4>
                                
                    <?php if(isset($_GET['check']) && $_GET['check'] == "true"){ ?>
                    <div class="alert alert-success">La carte a été checkée avec succes et est bien valide.</div>
                    <?php } ?>

                    <?php if(isset($_GET['check']) && $_GET['check'] == "false"){ ?>
                    <div class="alert alert-danger">La carte n'est pas valide. Vous pouvez demander un refund pendant le délai imparti.</div>
                    <?php } ?>
                    
                    <?php if(isset($_GET['check']) && $_GET['check'] == "refund"){ ?>
                    <div class="alert alert-success">Votre demande de refund a bien été envoyée et sera traitée dans les meilleurs délais.</div>
                    <?php } ?>

                    <div id="BoobsTableView_wrapper" class="dataTables_wrapper no-footer">
                        <div style="display: none" class="dataTables_length" id="BoobsTableView_length">
                            <label>Show 
                                <select style="display: none;" name="BoobsTableView_length" aria-controls="BoobsTableView" class="">
                                    <option value="10">10</option>
                                    <option value="25">25</option>
                                    <option value="50">50</option>
                                    <option value="100">100</option>
                                </select> entries
                            </label>
                        </div>
                        
                        <?php echo $pdo->getMyPurchasedCards($_SESSION['user']); ?>
                        
                        <div  style="display:none" class="dataTables_paginate paging_simple_numbers" id="BoobsTableView_paginate">
                            <a class="paginate_button previous disabled" aria-controls="BoobsTableView" data-dt-idx="0" tabindex="0" id="BoobsTableView_previous">Previous</a>
                            <span>
                                <a class="paginate_button current" aria-controls="BoobsTableView" data-dt-idx="1" tabindex="0">1</a>
                            </span>
                            <a class="paginate_button next disabled" aria-controls="BoobsTableView" data-dt-idx="2" tabindex="0" id="BoobsTableView_next">Next</a>
                        </div>
                    </div>
                </div>
                
                <div class="d-flex justify-content-center">
                    <a type="reset" class="btn btn-light" style="margin-right:15px;" data-dismiss="modal" href="#">Close</a>
                </div>	    	
            </div>
        </div>
    </div>
</div>
                

<?php 
    if(isset($_GET['user'])){
        $user = $_GET['user'];
        $username = $pdo->getUserInfos($_GET['user'])['username'];
        $balance = $pdo->getUserInfos($_GET['user'])['balance'];
        $type_user = $pdo->getUserInfos($_GET['user'])['type'];

        if(strtoupper($type_user) == "CUSTOMER"){
            $selected_customer = "selected";
            $selected_seller = "";
            $selected_admin = "";
        } else if(strtoupper($type_user) == "SELLER"){
            $selected_customer = "";
            $selected_seller = "selected";
            $selected_admin = "";
        } else if(strtoupper($type_user) == "ADMIN"){
            $selected_customer = "";
            $selected_seller = "";
            $selected_admin = "selected";
        }
    }
?>




<?php if(strtoupper($_SESSION['type']) == "ADMIN") { ?>


<!--
        MODALE MODE EDITION D'USER
-->


<div class="modal fade  show" id="modale_edit_user" style="padding-right: 15px;">
    <div class="modal-dialog ">
        <div class="modal-content ">
            <div class="modal-header">
                <h5 class="modal-title pull-left">Edit User !</h5>
            </div>
            <div class="modal-body">
                <div class="card-wrapper" style="display:none !Important;"></div><br>
                <h5>User Name : <?php echo $username ?></h5><br>
                
                <form class="form" id="boobsform" action="../action/update/update_user.php" method="POST">  
                    <div class="row">
                    <div class="form-group col-md-6">
                    <label class="label">User Balance ($)</label>
                    <input type="text" id="balance" name="balance" class="form-control text-center " value="<?php echo $balance ?>">
                    <i class="form-group__bar"></i></div>
                    <div class="form-group col-md-6">
                    <label class="label">Account type</label>

                    <select class="user" name="type_user">
                        <option value="0" <?php echo $selected_customer ?>>Customer</option>
                        <option value="1" <?php echo $selected_seller ?>>Seller</option>
                        <option value="2" <?php echo $selected_admin ?>>Admin</option>
                    </select>

                    <input type="hidden" name="username" value="<?php echo $username; ?>">

                    <i class="form-group__bar"></i>
                    </div>
                    </div> 
                    <div class="d-flex justify-content-center">
                        <a href="#" class="btn btn-light" style="margin-right:15px;" data-dismiss="modal">Close</a>
                        <input href="#" id="save" type="submit" class="btn btn-light" style="margin-right:15px;">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


<!--
        MODALE DELETE USER
-->


<div class="modal fade show" id="modale_delete_user">
	                <div class="modal-dialog ">
	                    <div class="modal-content" style="background: #703d3d;">
	                        <div class="modal-header">
	                            <h5 class="modal-title pull-left">Remove user ?</h5>
	                        </div>
	                        <div class="modal-body">
                                <b>Are you sure you want to remove this user?</b><br><br>
                                <a href="#" class="btn btn-light" style="margin-right:15px;" data-dismiss="modal">Cancel</a>
                                <a href="../action/delete/delete_user.php?user=<?php echo $user?>" class="btn btn-light" style="margin-right:15px;" data-dismiss="modal">Remove</a>
	                        </div>
	                    </div>
	                </div>
	            </div>


<?php } ?>


<?php 
    if(isset($_GET['id'])){

        $is_card_buyer = $pdo->isCardBuyer($_SESSION['user'], $_GET['id']);

        if($is_card_buyer){
            $card_infos = $pdo->getCardInfos($_GET['id']); 

            $numeros = $card_infos['numeros'];
            $exp = $card_infos['exp'];
            $cvv = $card_infos['cvv'];
            $city = $card_infos['city'];
            $zip = $card_infos['zip'];
            $holder = $card_infos['holder'];
            $vbv = $card_infos['vbv'];
            $supplement = $card_infos['supplement'];
            $address = $card_infos['address'];
            $price = $card_infos['price'];
            $country = $card_infos['country'];
            $banque = $card_infos['banque'];
            $level = $card_infos['level'];
        } else {
            $numeros = "*****";
            $exp = "*****";
            $cvv = "*****";
            $city = "*****";
            $zip = "*****";
            $holder = "*****";
            $vbv = "*****";
            $supplement = "*****";
            $address = "*****";
            $price = "*****";
            $country = "*****";
            $banque = "*****";
            $level = "*****";
        }
    }
?>

<?php if(strtoupper($_SESSION['type']) == "ADMIN") { ?>

<!-- 
    MODALE VIEW CARD ADMIN
-->

<?php
    if(isset($_GET['id'])){
        $id_card = $_GET['id'];
    }
?>


<div class="modal fade  show" id="modale_view_card">
	                <div class="modal-dialog ">
	                    <div class="modal-content ">
	                        <div class="modal-body">
	                            <div class="card-wrapper" style="display:none !Important;" data-jp-card-initialized="true">
                                <div class="jp-card-container">
                                <div class="jp-card">
                                <div class="jp-card-front">
                                <div class="jp-card-logo jp-card-elo">
                                <div class="e">e</div>
                                <div class="l">l</div>
                                <div class="o">o</div></div>
                                <div class="jp-card-logo jp-card-visa">Visa</div>
                                <div class="jp-card-logo jp-card-visaelectron">Visa
                                <div class="elec">Electron</div></div>
                                <div class="jp-card-logo jp-card-mastercard">Mastercard</div>
                                <div class="jp-card-logo jp-card-maestro">Maestro</div>
                                <div class="jp-card-logo jp-card-amex"></div>
                                <div class="jp-card-logo jp-card-discover">discover</div>
                                <div class="jp-card-logo jp-card-dinersclub"></div>
                                <div class="jp-card-logo jp-card-dankort">
                                <div class="dk"><div class="d"></div>
                                <div class="k"></div></div></div>
                                <div class="jp-card-logo jp-card-jcb">
                                <div class="j">J</div><div class="c">C</div>
                                <div class="b">B</div></div><div class="jp-card-lower">
                                <div class="jp-card-shiny"></div>
                                <div class="jp-card-cvc jp-card-display">•••</div>
                                <div class="jp-card-number jp-card-display">•••• •••• •••• ••••</div>
                                <div class="jp-card-name jp-card-display">Full Name</div>
                                <div class="jp-card-expiry jp-card-display" data-before="mm/yyyy" data-after="valid
date">••/••</div></div></div><div class="jp-card-back"><div class="jp-card-bar"></div><div class="jp-card-cvc jp-card-display">•••</div><div class="jp-card-shiny"></div></div></div></div></div><br>
                                

                                <form class="form" action="../action/update/edit_card.php" method="POST">
                                <div class="form-group"><label class="label">Card Number</label>
                                <input type="text" id="cc" name="numbers" class="form-control text-center " value="<?php echo $numeros ?>"><i class="form-group__bar"></i></div><div class="row"><div class="form-group col-md-6">
                                <label class="label">Expiry Date</label>
                                <input type="text" id="exp" name="exp" class="form-control text-center" value="<?php echo $exp ?>"><i class="form-group__bar"></i></div><div class="form-group col-md-6">
                                <label class="label">CVV</label>
                                <input type="text" id="cvv" name="cvv" class="form-control text-center" value="<?php echo $cvv ?>"><i class="form-group__bar"></i></div></div>

                                <div class="row"><div class="form-group col-md-6"><label class="label">VBV</label>
                                <input type="text" id="vbv" name="vbv" class="form-control text-center" value="<?php echo $vbv ?>"><i class="form-group__bar"></i></div>
                                <div class="form-group col-md-6"><label class="label">Card Holder</label>
                                <input type="text" id="holder" name="holder" class="form-control text-center" value="<?php echo $holder ?>">
                                <i class="form-group__bar"></i></div></div>

                                <div class="row"><div class="form-group col-md-6"><label class="label">Banque</label>
                                <input type="text" id="vbv" name="banque" class="form-control text-center" value="<?php echo $banque ?>"><i class="form-group__bar"></i></div>
                                <div class="form-group col-md-6"><label class="label">Level</label>
                                <input type="text" id="holder" name="level" class="form-control text-center" value="<?php echo $level ?>">
                                <i class="form-group__bar"></i></div></div>

                                <div class="form-group"><label class="label">Billing Address</label>
                                <input type="text" id="ccba" name="address" class="form-control text-center" value="<?php echo $address ?>"><i class="form-group__bar"></i></div>
                                
                                <div class="row" style='display: flex; justify-content: center;'><div class="form-group col-md-4">
                                <label class="label">Zip Code</label>
                                <input type="text" id="cczip" name="zip" class="form-control text-center" value="<?php echo $zip ?>"><i class="form-group__bar"></i></div>
                                <div class="form-group  col-md-4"><label class="label">City</label>
                                <input type="text" id="city" name="city" class="form-control text-center" value="<?php echo $city ?>"><i class="form-group__bar"></i></div>
                                <div class="form-group col-md-4" style="z-index:9999">
                                <label class="label">Country</label>
                                <input type="text" id="country" name="country" class="form-control text-center" value="<?php echo $country ?>"><i class="form-group__bar"></i></div></div>
				                <div class="form-group">
                                <label class="label">Price in euro currency €</label>
                                <input type="text" id="price" name="price" class="form-control text-center" value="$<?php echo $price ?>"><i class="form-group__bar"></i></div><div class="form-group">
                                <label class="label">Additional Info</label>
                                <textarea id="ccadditional" name="infos" class="form-control text-center"><?php echo $supplement ?></textarea><i class="form-group__bar"></i></div><input type="hidden" name="tboob" value="38825c3f9ba634e8a53df6978f7412d2"><div class="d-flex justify-content-center">
                                <input type="hidden" value="<?php echo $id_card ?>" name="id_card">
                                <button type="submit" class="btn btn-light" style="margin-right:15px;" href="#">Close</button></for>
	                        </div>
	                    </div>
                    </div>
                </div>
            </div>


<?php } ?>

<!-- 
    MODALE VIEW CARD PURCHASED
-->

<div class="modal fade  show" id="modale_view_purchased_card">
	                <div class="modal-dialog ">
	                    <div class="modal-content ">
	                        <div class="modal-body">
	                            <div class="card-wrapper" style="display:none !Important;" data-jp-card-initialized="true">
                                <div class="jp-card-container">
                                <div class="jp-card">
                                <div class="jp-card-front">
                                <div class="jp-card-logo jp-card-elo">
                                <div class="e">e</div>
                                <div class="l">l</div>
                                <div class="o">o</div></div>
                                <div class="jp-card-logo jp-card-visa">Visa</div>
                                <div class="jp-card-logo jp-card-visaelectron">Visa
                                <div class="elec">Electron</div></div>
                                <div class="jp-card-logo jp-card-mastercard">Mastercard</div>
                                <div class="jp-card-logo jp-card-maestro">Maestro</div>
                                <div class="jp-card-logo jp-card-amex"></div>
                                <div class="jp-card-logo jp-card-discover">discover</div>
                                <div class="jp-card-logo jp-card-dinersclub"></div>
                                <div class="jp-card-logo jp-card-dankort">
                                <div class="dk"><div class="d"></div>
                                <div class="k"></div></div></div>
                                <div class="jp-card-logo jp-card-jcb">
                                <div class="j">J</div><div class="c">C</div>
                                <div class="b">B</div></div><div class="jp-card-lower">
                                <div class="jp-card-shiny"></div>
                                <div class="jp-card-cvc jp-card-display">•••</div>
                                <div class="jp-card-number jp-card-display">•••• •••• •••• ••••</div>
                                <div class="jp-card-name jp-card-display">Full Name</div>
                                <div class="jp-card-expiry jp-card-display" data-before="mm/yyyy" data-after="valid
date">••/••</div></div></div><div class="jp-card-back"><div class="jp-card-bar"></div><div class="jp-card-cvc jp-card-display">•••</div><div class="jp-card-shiny"></div></div></div></div></div><br>
                                

                                <form class="form" id="boobsform" action="../action/add/card.php" method="POST">
                                <div class="form-group"><label class="label">Card Number</label>
                                <input type="text" id="cc" name="numbers" class="form-control text-center " value="<?php echo $numeros ?>" disabled><i class="form-group__bar"></i></div><div class="row"><div class="form-group col-md-6">
                                <label class="label">Expiry Date</label>
                                <input type="text" id="exp" name="exp" class="form-control text-center" value="<?php echo $exp ?>" disabled><i class="form-group__bar"></i></div><div class="form-group col-md-6">
                                <label class="label">CVV</label>
                                <input type="text" id="cvv" name="cvv" class="form-control text-center" value="<?php echo $cvv ?>" disabled><i class="form-group__bar"></i></div></div>

                                <div class="row"><div class="form-group col-md-6"><label class="label">VBV</label>
                                <input type="text" id="vbv" name="vbv" class="form-control text-center" value="<?php echo $vbv ?>" disabled><i class="form-group__bar"></i></div>
                                <div class="form-group col-md-6"><label class="label">Card Holder</label>
                                <input type="text" id="holder" name="holder" class="form-control text-center" value="<?php echo $holder ?>" disabled>
                                <i class="form-group__bar"></i></div></div>

                                <div class="row"><div class="form-group col-md-6"><label class="label">Banque</label>
                                <input type="text" id="vbv" name="vbv" class="form-control text-center" value="<?php echo $banque ?>" disabled><i class="form-group__bar"></i></div>
                                <div class="form-group col-md-6"><label class="label">Level</label>
                                <input type="text" id="holder" name="holder" class="form-control text-center" value="<?php echo $level ?>" disabled>
                                <i class="form-group__bar"></i></div></div>

                                <div class="form-group"><label class="label">Billing Address</label>
                                <input type="text" id="ccba" name="address" class="form-control text-center" value="<?php echo $address ?>" disabled><i class="form-group__bar"></i></div>
                                
                                <div class="row" style='display: flex; justify-content: center;'><div class="form-group col-md-4">
                                <label class="label">Zip Code</label>
                                <input type="text" id="cczip" name="zip" class="form-control text-center" value="<?php echo $zip ?>" disabled><i class="form-group__bar"></i></div>
                                <div class="form-group  col-md-4"><label class="label">City</label>
                                <input type="text" id="city" name="city" class="form-control text-center" value="<?php echo $city ?>" disabled><i class="form-group__bar"></i></div>
                                <div class="form-group col-md-4" style="z-index:9999">
                                <label class="label">Country</label>
                                <input type="text" id="country" name="country" class="form-control text-center" value="<?php echo $country ?>" disabled><i class="form-group__bar"></i></div></div>
				                <div class="form-group">
                                <label class="label">Price in euro €</label>
                                <input type="text" id="price" name="price" class="form-control text-center" value="€<?php echo $price ?>" disabled><i class="form-group__bar"></i></div><div class="form-group">
                                <label class="label">Additional Info</label>
                                <textarea id="ccadditional" name="infos" class="form-control text-center" disabled><?php echo $supplement ?></textarea><i class="form-group__bar"></i></div><input type="hidden" name="tboob" value="38825c3f9ba634e8a53df6978f7412d2"><div class="d-flex justify-content-center">
                                <a href="#modale_my_purchases_cards" class="btn btn-light" style="margin-right:15px;" href="#">Close</a>
	                        </div>
	                    </div>
                    </div>
                </div>
            </div>
