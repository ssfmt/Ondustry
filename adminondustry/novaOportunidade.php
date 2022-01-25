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
              <h1 class="h3 mb-2 text-gray-800">Criar nova oportunidade</h1>

              <!-- Detalhes Oportunidade -->
              <div class="row">
                <div class="col-md-8">
                  <div class="card">
                    <div class="card-body">
                      <form id="details">
                        <div class='row'>
                          <div class='col-md-4 px-md-1'>
                            <div class='form-group'id="selTipoOportunidade">
                              
                              
                            </div>
                          </div>
                          <div class='col-md-4 pl-md-1'>
                            <div class='form-group'>
                              <label>Quantidade</label>
                              <input type='number' class='form-control' id="quantidadeOportunidade">
                            </div>
                          </div>
                          <div class='col-md-4 pl-md-1'>
                            <div class='form-group'>
                              <label>Prazo</label>
                              <input type='date' class='form-control' id="prazoOportunidade">
                            </div>
                          </div>
                        </div>
                        <div class='row'>
                          <div class='col-md-6 pl-md-1'>
                            <div class='form-group'>
                              <label>Orçamento</label>
                              <input type="number" step="0.01" class='form-control' id="orcamentoOportunidade">
                            </div>
                          </div>
                        </div>
                        <div class='row'>
                          <div class='col-md-8 pl-md-1'>
                            <div class='form-group'>
                              <label>Descrição</label>
                              <textarea rows='4' cols='100' class='form-control' placeholder="Descreva aqui a sua ideia." id="descricaoOportunidade"></textarea>
                            </div>
                          </div>
                        </div>
                        
                      </form>
                    </div>
                    <div class="card-footer">
                      <button type="button" class="btn btn-fill btn-warning" onclick="guardaOportunidade()">Submeter</button>
                      <div class="row" id="respostaOportunidade">
                
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
        </div>

        <!-- End of Main Content -->
 <?php 
    include_once 'footer.php';
 ?>