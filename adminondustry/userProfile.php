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
              <h1 class="h3 mb-2 text-gray-800">Perfil</h1>

              <!-- Detalhes Perfil -->
              <div class="row">
                <div class="col-md-8">
                  <div class="card">
                    <div class="card-body">
                      <form id="detailsUserProfile">
                        
                      </form>
                    </div>
                    <div class="card-footer">
                        <button type="button" class="btn btn-fill btn-warning" onclick="editaPerfil()">Guardar</button>
                        <div style="padding-top: 1rem;" id="resposta">
                            
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