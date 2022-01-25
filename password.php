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

<div class="register-area" style="background-color: rgb(249, 249, 249);">
    <div class="container">
        <div class="col-md-6 col-md-offset-3">
            <div class="box-for overflow">                         
                <div class="col-md-12 col-xs-12 login-blocks">
                    <h2>Login : </h2> 
                    <form action="" method="post">
                        <div class="form-group">
                            <label for="emailPassChange">E-mail</label>
                            <input type="email" class="form-control" id="emailPassChange">
                        </div>
                        <div class="form-group">
                            <label for="pwdChange">Nova password</label>
                            <input type="password" class="form-control" id="pwdChange">
                        </div>
                        <div class="form-group">
                            <label for="pwdConfChange">Confirmar a nova password</label>
                            <input type="password" class="form-control" id="pwdConfChange">
                        </div>
                        <div class="text-center">
                            <button type="button" class="btn btn-default" onclick="alteraPassword()"> Guardar</button>
                        </div>
                        <div id="response">
                            
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