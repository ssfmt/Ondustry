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
                            <label for="emailLog">E-mail</label>
                            <input type="email" class="form-control" id="emailLog">
                        </div>
                        <div class="form-group">
                            <label for="pwdLog">Password</label>
                            <input type="password" class="form-control" id="pwdLog">
                        </div>
                        <div id="resLogin">

                        </div>
                        <div class="text-center">
                            <button type="button" class="btn btn-default" onclick="login()"> Login</button>
                        </div>
                        <div id="register-link" class="text-right">
                            <a href="register.php">Ainda não está registado? <br> Registe-se aqui!</a><br>
                            <a href="password.php">Esqueceu-se da password? <br> Altere-a aqui!</a></a>
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