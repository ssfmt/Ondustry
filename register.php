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

<div id="resposta">
  
</div>

<div class="register-area" style="background-color: rgb(249, 249, 249);">
    <div class="container">
        <div class="col-md-8 col-md-offset-2">
            <div class="box-for overflow">                         
                <div class="col-md-12 col-xs-12 login-blocks">
                    <h2>Registo : </h2>
                    <p>Para começar a usar a plataforma comece por escolher o tipo de registo que pretende fazer, enquanto <strong>marca</strong> ou enquanto <strong>prestador de serviços</strong>.</p>
                    <p>As <strong>marcas</strong> apresentam oportunidades aos prestadores de serviços, descrevendo o produto que pretendem que seja produzido.</p>
                    <p>Os <strong>prestadores de serviços</strong> submetem propostas de produção industrial como resposta às oportunidades do seu setor.</p> 
                    <form action="" method="post">
                        <ul class="nav nav-pills" >
                            <li class="" style="width:49%"><a class="btn btn-lg btn-default" data-toggle="tab" href="#home" onclick="selectRegisto(1);">Marca</a></li>

                            <li class=" " style="width:49%"><a class=" btn btn-lg btn-default" data-toggle="tab" href="#menu1" onclick="selectRegisto(2);">Prestador de Serviços</a></li>
                        </ul>
                        <div class="tab-content">
                          <div id="home" class="tab-pane fade in" style="padding-top: 2rem;">
                            <form action="#">
                              <div class="form-group">
                                <label for="emailMarca">E-mail:</label>
                                <input type="email" class="form-control" id="emailMarca">
                              </div>
                              <div class="form-group">
                                <label for="pwdMarca">Password:</label>
                                <input type="password" class="form-control" id="pwdMarca">
                              </div>
                              <div class="form-group">
                                <label for="nomeMarca">Nome da marca:</label>
                                <input type="text" class="form-control" id="nomeMarca">
                              </div>
                              <div class="form-group">
                                <label for="nifMarca">NIF associado à marca:</label>
                                <input type="number" class="form-control" id="nifMarca">
                              </div>
                              <div class="form-group" id="selSetorMarca">
                                
                              </div>
                              <div class="form-group">
                                <label for="moradaMarca">Morada associada à marca:</label>
                                <input type="text" class="form-control" id="moradaMarca">
                              </div>
                              <div class="form-group">
                                <label for="codpMarca">Código Postal:</label>
                                <input type="text" class="form-control" id="codpMarca">
                              </div>
                              <div class="form-group">
                                <label for="localMarca">Localidade:</label>
                                <input type="text" class="form-control" id="localMarca">
                              </div>
                              <div class="form-group" id="selDistritoMarca">
                              
                              </div>
                              <button type="button" class="btn btn-default btn-lg" onclick="registaUtilizador(1)">Registar</button>
                              <div class="text-right">
                                <a href="login.php">A sua marca já está registada? <br> Faça o login aqui!</a>
                              </div>
                            </form>
                            <div id="resposta">
                                
                            </div>
                          </div>
                          <div id="menu1" class="tab-pane fade" style="padding-top: 2rem;">
                            <form action="#">
                              <div class="form-group">
                                <label for="emailPS">E-mail:</label>
                                <input type="email" class="form-control" id="emailPS">
                              </div>
                              <div class="form-group">
                                <label for="pwdPS">Password:</label>
                                <input type="text" class="form-control" id="pwdPS">
                              </div>
                              <div class="form-group">
                                <label for="nomePS">Nome da empresa:</label>
                                <input type="text" class="form-control" id="nomePS">
                              </div>
                              <div class="form-group">
                                <label for="nifPS">NIF associado à empresa:</label>
                                <input type="number" class="form-control" id="nifPS">
                              </div>
                              <div class="form-group" id="selSetorPS">
                                
                              </div>
                              <div class="form-group">
                                <label for="moradaPS">Morada associada à empresa:</label>
                                <input type="text" class="form-control" id="moradaPS">
                              </div>
                              <div class="form-group">
                                <label for="codpPS">Código Postal:</label>
                                <input type="text" class="form-control" id="codpPS">
                              </div>
                              <div class="form-group">
                                <label for="localPS">Localidade:</label>
                                <input type="text" class="form-control" id="localPS">
                              </div>
                              <div class="form-group" id="selDistritoPS">
                                
                              </div>
                              <button type="submit" class="btn btn-default btn-lg" onclick="registaUtilizador(2)">Registar</button>
                              <div class="text-right">
                                <a href="login.php">A sua empresa já está registada? <br> Faça o login aqui!</a>
                              </div>
                            </form>
                            <div id="resposta2">
                                
                            </div>
                          </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php 
    include_once 'footer.php';
?>