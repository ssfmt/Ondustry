<?php
    session_start();

    /*Se não existir um user com sessao iniciada bloqueia o acesso a pagina. Impede entrar atraves do link*/
    if(!isset($_SESSION["userID"])) {
        header("Location: ../index.php");
    }

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>ONDUSTRY</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Place favicon.ico and apple-touch-icon.png in the root directory -->
    <link rel="apple-touch-icon" sizes="180x180" href="../assets/img/favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="../assets/img/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="../assets/img/favicon/favicon-16x16.png">
    <link rel="manifest" href="../assets/img/favicon/site.webmanifest">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

    <link rel="stylesheet" href="css/styleAdmin.css">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav sidebar sidebar-light accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
                <img src="../assets/img/logoondustry.png" alt="">
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

        <?php if ($_SESSION['userType'] == 1){ ?>
            <!-- Nav Item - Nova Oportunidade-->
            <li class="nav-link">
                <button class="btn btn-warning" style="margin-left: 2rem;" id="buttonOp" onclick="window.open('novaOportunidade.php','_self')">Criar Oportunidade</button>
            </li>
        <?php } ?>

        <!-- Nav Item - Oportunidades Ativas-->
        <li class="nav-item">
            <a class="nav-link" href="oportunidadesAtivas.php">
                <i class="fas fa-briefcase"></i>
                <span>Oportunidades Ativas</span> 
            </a>
        </li>

        <!-- Nav Item - Histórico de oportunidades ou Bids -->
        <li class="nav-item">
            <?php if ($_SESSION['userType'] == 1){ ?>
                <a class="nav-link" href="historicoOportunidades.php">
                    <i class="fas fa-archive"></i>
                    <span>Histórico de Oportunidades</span>
                </a>
            <?php }else if ($_SESSION['userType'] == 2) { ?>
                <a class="nav-link" href="historicoBids.php">
                    <i class="fas fa-file-alt"></i>
                    <span>As Minhas Bids</span>
                </a>
            <?php } ?>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider d-none d-md-block">

        <!-- Sidebar Message -->


    </ul>
    <!-- End of Sidebar -->
