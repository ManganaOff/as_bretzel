<main class="main">
            <div class="page-loader" style="display: none;">
                <div class="page-loader__spinner">
                    <svg viewBox="25 25 50 50">
                        <circle cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10"></circle>
                    </svg>
                </div>
            </div>
		<main>
            <section class="content">                
                    <div class="card">
                        <div class="toolbar toolbar--inner">
                            <div class="toolbar__nav">
                                Tickets
                            </div>

                            <div class="actions">                                
                                <a href="#modale_new_ticket">
                                  <i class="fas fa-plus add_card"></i>
                                </a>
                              </li>
                            </div>
                        </div>
                        <div class="card-body">
                            <h4 class="card-title">My Tickets</h4>
                                 <input type="hidden" name="tboob" value="a0168735d1a5743cdc40e0419c6d9ea7">                            
                                <div id="BoobsTable_wrapper" class="dataTables_wrapper no-footer"><div style="display: none" class="dataTables_length" id="BoobsTable_length"><label>Show <select style="display: none" name="BoobsTable_length" aria-controls="BoobsTable" class=""><option value="10">10</option><option value="25">25</option><option value="50">50</option><option value="100">100</option></select> entries</label></div><div id="BoobsTable_processing" class="dataTables_processing" style="display: none;">Processing...</div>

                                    <?php echo $pdo->getMyTicketList($_SESSION['user']) ?>
                                  
                                  <div style="display: none" class="dataTables_info" id="BoobsTable_info" role="status" aria-live="polite">Showing 1 to 5 of 5 entries</div><div style='display: none' class="dataTables_paginate paging_simple_numbers" id="BoobsTable_paginate"><a class="paginate_button previous disabled" aria-controls="BoobsTable" data-dt-idx="0" tabindex="0" id="BoobsTable_previous">Previous</a><span><a class="paginate_button current" aria-controls="BoobsTable" data-dt-idx="1" tabindex="0">1</a></span><a class="paginate_button next disabled" aria-controls="BoobsTable" data-dt-idx="2" tabindex="0" id="BoobsTable_next">Next</a></div></div>       
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