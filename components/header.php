<header class="header class="header">
                <input type="hidden" id="baseurl" value="http://localhost/">
                <div class="navigation-trigger hidden-xl-up" data-sa-action="aside-open" data-sa-target=".sidebar">
                    <i class="zwicon-hamburger-menu"></i>
                </div>

                <div class="logo hidden-sm-down">
                    <a href=" http://144.202.124.151/"><img src="http://144.202.124.151/img/logo.png" alt="Fakers Website" style="width:150px" /></a>
                </div>               

                <ul class="top-nav">  
                    <li class="dropdown ">
                        <a href="#modal_withdraw">
                        <i class="fas fa-minus-circle"></i>
                        </a>                        
                    </li>

                    <li class="dropdown" data-toggle='modal_deposit' data-target='#'>
                        <a id="deposit" href="#modal_deposit">
                            <i class="fas fa-plus-circle"></i>  
                        </a>                      
                    </li>

                    <li class="dropdown">
                        <a href="javascript:void(0)" id="mybalance">
                          Ma Balance €<?php echo $balance?>
                       </a>
                    </li>

                    <!--
                    <li class="dropdown">
                    	<a href="http://localhost/Chat"><i class="fas fa-comments"></i></a>
                    </li>
                    -->
                    <li class="dropdown">
                        <a href=" http://144.202.124.151/main/purchases.php" data-toggle="dropdown" id="msgs">                        
                            <i class="fas fa-shopping-cart"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right dropdown-menu--block">
                            <div class="dropdown-header">
                                Messages
                            </div>


                            <div id="innermsgs" class="listview listview--hover">
                                <a href="http://localhost/reportdetails/2" class="listview__item">    
                                    <div class="listview__content">
                                        <div class="listview__heading">
                                        
                                            test1 <small>2021-01-13 15:44:30</small>
                                        </div>
                                        <p>Test</p>
                                    </div>
                                </a>
                                                                <a href="http://localhost/reportdetails/1" class="listview__item">
                                  
                                    
                                    <div class="listview__content">
                                        <div class="listview__heading">
                                        
                                            test1 <small>2021-01-13 15:39:20</small>
                                        </div>
                                        <p>aaaaaaaaaaaa</p>
                                    </div>
                                </a>
                                                                <a href="http://localhost/reports" class="view-more">View all messages</a>
                            </div>
                        </div>
                    </li>

                    <li class="dropdown hidden-xs-down">
                        <a href=" http://144.202.124.151/main/account.php" data-toggle="dropdown"><i class="fas fa-user"></i></a>
                    </li>

                    <li>
                        <a href="http://144.202.124.151/action/logout.php" data-toggle="dropdown"><i class="fas fa-sign-out-alt"></i></a>
                    </li>

                </ul>
            </header>

