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
                    <h1 class="h3 mb-2 text-gray-800">Oportunidades</h1>
                    <?php if($_SESSION['userType'] == 1){ ?>
                        <p class="mb-4">Consulte as suas oportunidades ativas</p>
                    <?php }else if ($_SESSION['userType'] == 2){ ?>
                        <p class="mb-4">Consulte as oportunidades disponíveis para o seu setor</p>
                    <?php } ?>

                    <div class="card shadow mb-4">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Código</th>
                                            <th>Setor</th>
                                            <th>Tipo</th>
                                            <?php if ($_SESSION['userType'] == 2){ ?>
                                                <th>Marca</th>
                                            <?php } ?>
                                        </tr>
                                    </thead>
                                    <tbody id="tableOportunidades">
                                        
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