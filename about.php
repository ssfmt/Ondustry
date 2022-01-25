<?php 
    include_once 'header.php'; 
    include_once 'nav.php';
?>

    <div class="page-head"> 
        <div class="container">
            <div class="row">
                <div class="page-head-content">
                    <h1 class="page-title"></h1>               
                </div>
            </div>
        </div>
    </div>
    <!-- End page header -->

    <div class="content-area blog-page padding-top-40" style="background-color: #FCFCFC;">
        <div class="container">   
            <div class="row">
                
                <div class="blog-asside-right col-md-3">
                    <div class="panel panel-default sidebar-menu wow fadeInRight animated" >
                        <div class="panel-heading">
                            <h3 class="panel-title">ONDUSTRY</h3>
                        </div>
                        <div class="panel-body text-widget">
                            <p>O SEU AGENTE DIGITAL
                            </p>

                        </div>
                    </div>

                    <div class="panel panel-default sidebar-menu wow  fadeInRight animated">
                        <div class="panel-heading">
                            <h3 class="panel-title">PESQUISA</h3>
                        </div>
                        <div class="panel-body">
                            <form role="search">
                                <div class="input-group">
                                    <input class="form-control" placeholder="Search" type="text">
                                    <span class="input-group-btn">
                                        <button type="submit" class="btn btn-smal">
                                            <i class="fa fa-search"></i>
                                        </button>
                                    </span>
                                </div>
                            </form>
                        </div>
                    </div>
                        

                    <div class="panel sidebar-menu wow  fadeInRight animated">
                        <div class="panel-heading">
                            <h3 class="panel-title">Tags</h3>
                        </div>
                        <div class="panel-body">
                            <ul class="tag-cloud">
                                <li><a href="#"><i class="fa fa-tags"></i> sobre</a> 
                                </li>
                                <li><a href="#"><i class="fa fa-tags"></i> ondustry</a> 
                                </li>
                                <li><a href="#"><i class="fa fa-tags"></i> plataforma</a> 
                                </li>
                                <li><a href="#"><i class="fa fa-tags"></i> agente</a> 
                                </li>
                                <li><a href="#"><i class="fa fa-tags"></i> empresas</a> 
                                </li>
                                <li><a href="#"><i class="fa fa-tags"></i> marcas</a> 
                                </li>
                                <li><a href="#"><i class="fa fa-tags"></i> produtos</a> 
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                
                <div class="blog-lst col-md-9">
                    <section class="post">
                        <div class="text-center padding-b-50">
                            <h2 class="wow fadeInLeft animated">Sobre nós</h2>
                            <br>
                        </div>

                        <div class="row">
                            <div class="col-sm-6">
                                
                            </div>
                            <div class="col-sm-6 right" >
                               
                            </div>
                        </div>
                        <div class="image wow fadeInLeft animated">
                            <a href="single.html">
                                <img src="assets/img/accordion.jpg" class="img-responsive" alt="Example blog post alt">
                            </a>
                        </div>
                        <p class="intro">ONDUSTRY é a plataforma destinada a empresas e marcas para ajudar na transição de modelo para produção em grande escala de um novo produto.
                        </p>
                        <h3>Principais Features</h3>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">Plataforma para marcas e prestadores de serviços, com duas opções de registo e visualização - para marcas e para prestadores de serviços - para que esteja o mais adaptada possível às suas necessidades.</li>
                            <li class="list-group-item">Criação de oportunidades de negócio por parte das marcas.</li>
                            <li class="list-group-item">Listagem facilmente acessível de todas as oportunidades disponíveis em cada setor.</li>
                            <li class="list-group-item">Submissão guiada de propostas por parte dos prestadores de serviços.</li>
                            <li class="list-group-item">Serviço de apoio permanente aos utilizadores, para que se sinta acompanhado em todas as fases do seu novo negócio.</li>
                            <br>
                            <div class="text-center">
                                <p style="font-size: 2.5rem;">Junte-se a nós e encontre o seu próximo parceiro de negócios!</p>
                                <button class="navbar-btn nav-button wow login" onclick=" window.open('login.php','_self')" data-wow-delay="0.45s">Login</button>
                                <button class="navbar-btn nav-button wow" onclick=" window.open('register.php','_self')" data-wow-delay="0.48s">Registo</button>
                            </div>
                            
                        </ul>
                       
                    </section>   

                </div> 

            </div>
    </div>


<?php
    include_once 'footer.php';
?>