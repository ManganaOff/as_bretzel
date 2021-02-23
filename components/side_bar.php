<aside class="sidebar">
                    <div class="scrollbar-inner">
                        <div class="user">
                            <div class="user__info" data-toggle="dropdown">
                                <img class="user__img" src="http://localhost/as_bretzel/img/logo.png" alt="">
                                <div>
                                    <div class="user__name"><?php echo $_SESSION["pseudo"]?></div>
                                    <div class="user__email"><?php echo $_SESSION["type"]?></div>
                                </div>
                            </div>
                        </div>

                        <ul class="navigation">
                        	

                            <li class="@@index"><a href=" http://localhost/as_bretzel/index.php"><i class="fas fa-home"></i> Accueil</a></li>

                                <?php 
                                    $count_my_products = $pdo->getCountMyProducts($_SESSION['user']);
                                    $count_my_purchases = $pdo->getCountMyPurchases($_SESSION['user']);
                                    $count_my_tickets = $pdo->getCountMyTickets($_SESSION['user']);
                                    $total_cards_confirmed = $pdo->getCountTotalCardConfirmed();

                                    if($count_my_products > 0 ){
                                        $color_my_products = "success";
                                    } else {
                                        $color_my_products = "danger";
                                    }

                                    if($count_my_purchases > 0 ){
                                        $color_my_purchases = "success";
                                    } else {
                                        $color_my_purchases = "danger";
                                    }


                                    if($count_my_tickets > 0 ){
                                        $color_my_tickets = "success";
                                    } else {
                                        $color_my_tickets = "danger";
                                    }

                                    if($total_cards_confirmed > 0 ){
                                        $color_cards_confirmed = "success";
                                    } else {
                                        $color_cards_confirmed = "danger";
                                    }


                                    if(strtoupper($_SESSION['type']) == "ADMIN"){ 
                                        
                                    $total_reports = $pdo->getCountTotalReportsPending();
                                    $total_tickets = $pdo->getCountTotalTicketsPending();
                                    $total_withdraws = $pdo->getCountTotalWithdrawsPending();
                                    $total_deposits = $pdo->getCountTotalDepositsPending();
                                    $total_admin_cards = $pdo->getCountTotalUnconfirmedCards();

                                    if($total_reports > 0 ){
                                        $color_reports = "success";
                                    } else {
                                        $color_reports = "danger";
                                    }

                                    if($total_tickets > 0 ){
                                        $color_tickets = "success";
                                        $color_tickets_main = "danger";
                                    } else {
                                        $color_tickets = "success";
                                        $color_tickets_main = "success";
                                    }

                                    if($total_deposits > 0 ){
                                        $color_deposits = "success";
                                    } else {
                                        $color_deposits = "danger";
                                    }

                                    if($total_withdraws > 0 ){
                                        $color_withdraws = "success";
                                    } else {
                                        $color_withdraws = "danger";
                                    }

                                    if($total_admin_cards > 0 ){
                                        $color_admin_cards = "success";
                                    } else {
                                        $color_admin_cards = "danger";
                                    }                                    

                                    ?>

                                <li id="head_admin" class="navigation__sub navigation__sub">
                                    
                                    <a><i class="fas fa-user-cog"></i>Administration <span class="badge bg-<?php echo $color_tickets_main ?>" style="float: right; border-radius: 100px"><?php if($total_tickets > 0){echo $total_tickets;} ?></span></a>

                                    <ul id="dropdown_admin">
                                        <li class="@@photogalleryactive"><a href=" http://localhost/as_bretzel/admin/users.php">Users</a></li>
                                        <li class="@@photogalleryactive"><a href=" http://localhost/as_bretzel/admin/news.php">News</a></li>
                                        <!--<li class="@@photogalleryactive"><a href="params.php">Settings</a></li> -->
                                        <li class="@@photogalleryactive"><a href=" http://localhost/as_bretzel/admin/sales.php">Sales</a></li>
                                        <li class="@@photogalleryactive"><a href=" http://localhost/as_bretzel/admin/wallets.php">Wallets</a></li>
                                        <li class="@@photogalleryactive"><a href=" http://localhost/as_bretzel/admin/cards.php">Card<span class="badge bg-<?php echo $color_admin_cards ?>" style="float: right; border-radius: 100px"><?php echo $total_admin_cards ?></a></li>
                                        <!--<li class="@@photogalleryactive"><a href="http://localhost/news">News</a></li>-->
                                        <!--<li class="@@photogalleryactive"><a href="http://localhost/newsletters">News Letters</a></li>-->
                                        <li class="@@photogalleryactive"><a href=" http://localhost/as_bretzel/admin/deposits.php">Deposits <span class="badge bg-<?php echo $color_deposits ?>" style="float: right; border-radius: 100px"><?php echo $total_deposits ?></a></li>
                                        <li class="@@photogalleryactive"><a href=" http://localhost/as_bretzel/admin/withdrawals.php">Withdraw request <span class="badge bg-<?php echo $color_withdraws; ?>" style="float: right; border-radius: 100px"><?php echo $total_withdraws ?></a></li>
                                        <li class="@@typeactive"><a href="http://localhost/as_bretzel/admin/reports.php">Refund requests <span class="badge bg-<?php echo $color_reports ?>" style="float: right; border-radius: 100px"><?php echo $total_reports ?></a></li>
                                        <li class="@@typeactive"><a href=" http://localhost/as_bretzel/admin/tickets.php">Tickets <span class="badge bg-<?php echo $color_tickets ?>" style="float: right; border-radius: 100px"><?php echo $total_tickets ?></span></a></li>
                                    </ul>

                                </li>

                                <?php 
                                    }
                                ?>
                                 
                              
                                                        								                        <!--<li class="@@typeactive"><a href="http://localhost/priv"><i class="zmdi zmdi-folder-star-alt" style="color:#30CC71"></i>Priv8 Section <span class="badge bg-danger" style="float: right; border-radius: 100px">Soon</a></li>
	                        <li class="@@typeactive"><a href="http://localhost/Giveaways"><i class="zmdi zmdi-card-giftcard" style="color:#30CC71"></i>Giveaways <span class="badge bg-danger" style="float: right; border-radius: 100px">Soon</a></li>-->
                        <?php
                            if(strtoupper($_SESSION['type']) != "ADMIN"){
                        ?>
                        
                        <li class="navigation__sub navigation__sub">                         
                            <a href=" http://localhost/as_bretzel/main/tickets.php"><i class="fas fa-ticket-alt"></i>Tickets <span class="badge bg-<?php echo $color_my_tickets ?>" style="float: right; border-radius: 100px"><?php echo $count_my_tickets ?></span></a>
                        </li>

                        <?php
                            }
                        ?>

                        <li class="@@typeactive"><a href=" http://localhost/as_bretzel/main/card.php"><i class="fas fa-credit-card"></i>  Cartes <span class="badge bg-<?php echo $color_cards_confirmed ?>" style="float: right; border-radius: 100px"><?php echo $total_cards_confirmed ?></span></a></li>                                                      
                        
                        
                        <li class="@@typeactive"><a style="background: #50583c;" href=" http://localhost/as_bretzel/main/purchases.php"><i class="fas fa-shopping-cart"></i> Mes achats <span class="badge bg-<?php echo $color_my_purchases ?>" style="float: right; border-radius: 100px"><?php echo $count_my_purchases?></span></a></li>                                                      
                        


                        <?php 
                            if(strtoupper($_SESSION['type']) == "SELLER" || strtoupper($_SESSION['type']) == "ADMIN"){     
                        ?>

                        <li class="@@typeactive"><a href=" http://localhost/as_bretzel/main/store.php?id=<?php echo $_SESSION['user']?>" id="store_sidebar"><i class="fas fa-store"></i> Mon shop<span class="badge bg-<?php echo $color_my_products ?>" style="float: right; border-radius: 100px"><?php echo $count_my_products?></span></a></li>                                                      
                        
                        <?php
                            }
                        ?>

                        <li style='display: flex; justify-content: flex-end;' class="@@typeactive" id="li_tg"><a target="_blank" class="telegram" href="http://t.me/testbretzel" id="store_sidebar">Join us<i class="fab fa-telegram-plane telegram"></i></a></li>                                                      

                        </ul>
                    </div>
                </aside>