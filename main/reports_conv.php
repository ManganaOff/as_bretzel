<?php 
    $premier_message = $pdo->getPremierMessageTicket($_GET['id']);
    $full_conv = $pdo->getFullConvTicket($_GET['id']);
?>

<main class="main">

<main>
    <section class="content">  
        <div class="content__inner">              
            <div class="messages">
                <div class="messages__body">
                    <div class="messages__header">
                        <div class="toolbar toolbar--inner mb-0">
                            <div class="toolbar__label">Ticket</div>
                        </div>
                    </div>
                    <div class="messages__content">
                        <input type="hidden" name="tboob" value="758cbacf84802caccb6cd85dcace7f1a">
                        <div class="scroll-wrapper scrollbar-inner" style="position: relative;"><div class="scrollbar-inner scroll-content" style="height: 441px; margin-bottom: 0px; margin-right: 0px; max-height: none;">
                            
                            <?php echo $premier_message?>                            
                            <?php echo $full_conv ?>
                            

                        
                        </div> 
                        </div><div class="scroll-element scroll-x" style=""><div class="scroll-element_outer"><div class="scroll-element_size"></div><div class="scroll-element_track"></div><div class="scroll-bar" style="width: 100px;"></div></div></div><div class="scroll-element scroll-y" style=""><div class="scroll-element_outer"><div class="scroll-element_size"></div><div class="scroll-element_track"></div><div class="scroll-bar" style="height: 100px;"></div></div></div></div>
                    </div>
                    <div class="messages__reply">                        
                        <form action="../action/add/send_ticket_message.php" method="POST">
                            <textarea id="chat_msg" name="message" class="messages__reply__text" placeholder="Type a message and click send to send message..." style="min-height: 200px;"></textarea>

                            <input type="hidden" name="id_ticket" value="<?php echo $_GET['id']?>">
                            <input type="submit" class="btn btn-success btn-block" value="SEND">
                        </form>
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
