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
                    <h1 class="h3 mb-2 text-gray-800">As Minhas Bids</h1>
                    <p class="mb-4">Consulte a listagem das suas propostas</p>

                    <div class="card shadow mb-4">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Código</th>
                                            <th>Oportunidade</th>
                                            <th>Estado</th>
                                            <th>Detalhes Bid</th>
                                        </tr>
                                    </thead>
                                    <tbody id="tableBids">
                                        
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