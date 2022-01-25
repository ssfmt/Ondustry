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
                    <h1 class="h3 mb-2 text-gray-800">Histórico de Oportunidades</h1>
                   
                    <p class="mb-4">Consulte o histórico das suas oportunidades</p>

                    <div class="card shadow mb-4">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTableHistorico" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Código</th>
                                            <th>Setor</th>
                                            <th>Tipo</th>
                                            <th>Estado</th>
                                        </tr>
                                    </thead>
                                    <tbody id="tableHistorico">
                                        
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->
 <?php 
    include_once 'footer.php';
 ?>