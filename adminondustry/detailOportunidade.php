<?php 
    include_once 'header.php';    
?>

<!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

        <!-- Main Content -->
        <div id="content">

            <?php 
              include_once 'nav.php';
            ?>

            <!-- Begin Page Content -->
            <div class="container-fluid">

              <!-- Page Heading -->
              <h1 class="h3 mb-2 text-gray-800" id="tituloDetail"></h1>

              <!-- Detalhes Oportunidade -->
              <div class="row">
                <?php if($_SESSION['userType'] == 1){ ?>
                <div class="col-md-12">
                <?php }else if ($_SESSION['userType'] == 2){ ?>
                <div class="col-md-8">
                <?php } ?>
                  <div class="card">
                    <div class="card-body">
                      <form id="details">
                        
                      </form>
                    </div>
                    <div class="card-footer">
                      <?php if($_SESSION['userType'] == 1){ ?>
                          <button type="button" class="btn btn-fill btn-warning" onclick="window.open('oportunidadesAtivas.php','_self')">Voltar</button>
                      <?php }else if ($_SESSION['userType'] == 2){ ?>
                          <button type="button" class="btn btn-fill btn-warning" onclick="mostraFormBid()">Fazer bid</button>
                      <?php } ?>
                      <div class="row" id="respostaBids">
                
                      </div>
                    </div>
                  </div>
                </div>
                <?php if ($_SESSION['userType'] == 2){ ?>
                  <div class="col-md-4">
                    <div class="card card-user" id="cardMarca">
                    </div>
                  </div>
                <?php } ?>
              </div>
              <?php if ($_SESSION['userType'] == 2){ ?>
                <div class="row" id="divBids">
                  <div class="col-md-8">
                    <div class="card">
                      <div class="card-body">
                        <form id="bids">
                          <div class='row'>
                            <div class='col-md-5 pr-md-1'>
                              <div class='form-group'>
                                <label>Capacidade de produção</label>
                                <input type='text' class='form-control' id="capacidadeBid">
                              </div>
                            </div>
                            <div class='col-md-3 px-md-1'>
                              <div class='form-group'>
                                <label>Orçamento</label>
                                <input type="number" step="0.01" class='form-control' id="orcamentoBid">
                              </div>
                            </div>
                            <div class='col-md-4 pl-md-1'>
                              <div class='form-group'>
                                <label>Prazo</label>
                                <input type='date' class='form-control' id="prazoBid">
                              </div>
                            </div>
                          </div>
                          <div class='row'>
                            <div class='col-md-8'>
                              <div class='form-group'>
                                <label>Descrição</label>
                                <textarea rows='4' cols='100' class='form-control' id="descricaoBid"></textarea>
                              </div>
                            </div>
                          </div>
                        </form>
                      </div>
                      <div class="card-footer">
                        <button type="button" class="btn btn-fill btn-warning" onclick="guardaBid()">Submeter</button>
                        
                      </div>
                    </div>
                  </div>
                </div>
              <?php }else if ($_SESSION['userType'] == 1){ ?>
                  <br><div class="card shadow mb-4">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Prestador</th>
                                            <th>Prazo</th>
                                            <th>Capacidade</th>
                                            <th>Orçamento</th>
                                            <th>Opções</th>
                                        </tr>
                                    </thead>
                                    <tbody id="tableBidsOportunidade">
                                        
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                
              <?php } ?>
              </div>
          </div>

        <!-- End of Main Content -->
 <?php 
    include_once 'footer.php';
 ?>