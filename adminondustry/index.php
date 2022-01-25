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
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
                    </div>

                

                <!-- Content Row -->
                <div class="row">

                
                    <div class="col-xl-3 col-md-6 mb-4">
                        <div class="card border-left-primary shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                            Oportunidades Ativas</div>
                                        <div class="h5 mb-0 font-weight-bold text-gray-800" id="staticOportunidadesAtivas"></div>
                                    </div>
                                    <div class="col-auto">
                                        <i class="fas fa-calendar fa-2x text-gray-300"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!--Elementos exclusivos das Marcas-->
                    <?php if($_SESSION['userType'] == 1){ ?>
                        <!-- Isto são os do tipo 2. Tem de estar aqui porque se não tiver o ID dá erro no js-->
                        <a hidden id="staticBidsAbertas"></a>
                        <a hidden id="staticBidsAceites"></a>
                        <a hidden id="staticBidsRecusadas"></a>

                        <!-- Oportunidades Concluídas -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-success shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                                Oportunidades Concluídas</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800" id="staticOportunidadesConcluidas"></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-check fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Oportunidades Atríbuidas -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-info shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Oportunidades Atríbuidas
                                            </div>
                                            <div class="row no-gutters align-items-center">
                                                <div class="col-auto">
                                                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800" id="staticOportunidadesAtribuidas"></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-link fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Bids -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-warning shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                                Bids</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800" id="staticBids"></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-comments fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                
                <!--Elementos exclusivos dos prestadores-->
                <?php }elseif($_SESSION['userType'] == 2){ ?>
                    <!-- Isto são os do tipo 1. Tem de estar aqui porque se não tiver o ID dá erro no js-->
                    <a hidden id="staticOportunidadesConcluidas"></a>
                    <a hidden id="staticOportunidadesAtribuidas"></a>
                    <a hidden id="staticBids"></a>

                    <!-- Bids Abertas-->
                    <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-info shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                                Bids Abertas</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800" id="staticBidsAbertas"></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="far fa-envelope-open fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Bids Aceites -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-success shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Bids Aceites
                                            </div>
                                            <div class="row no-gutters align-items-center">
                                                <div class="col-auto">
                                                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800" id="staticBidsAceites"></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-check fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Bids Recusadas -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-danger shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">
                                                Bids Recusadas</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800" id="staticBidsRecusadas"></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-times fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                <?php } ?>

                <!-- Content Row -->

                <div class="row">

                    <!-- Area Chart -->
                    <div class="col-xl-12 col-lg-7">
                        <div class="card shadow mb-4">
                            <!-- Card Header - Dropdown -->
                            <div
                                class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                <h6 class="m-0 font-weight-bold text-warning">Últimas Oportunidades</h6>
                            </div>
                            <!-- Card Body -->
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
                                        <tbody id="tableOportunidadesDashBoard">
                                            
                                        </tbody>
                                    </table>
                                </div>
                            </div>
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