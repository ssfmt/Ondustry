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
              <h1 class="h3 mb-2 text-gray-800" id="tituloDetailBid"></h1>

              <!-- Detalhes Oportunidade -->
              <div class="row">
                <div class="col-md-8">
                  <div class="card">
                    <div class="card-body">
                      <form id="detailsBid">
                        
                      </form>
                    </div>
                    <div class="card-footer">
                      <?php if($_SESSION['userType'] == 1){ ?>
                        <button type="button" class="btn btn-fill btn-warning" onclick="history.back()">Voltar</button>
                      <?php }else if($_SESSION['userType'] == 2){ ?>
                        <button type="button" class="btn btn-fill btn-warning" onclick="window.open('historicoBids.php','_self')">Voltar</button>
                      <?php } ?>
                    </div>
                  </div>
                </div>
                <div class="col-md-4">
                    <div class="card card-user" id="cardPS">
                    </div>
                </div>
              </div>
            </div>
        </div>

        <!-- End of Main Content -->
 <?php 
    include_once 'footer.php';
 ?>