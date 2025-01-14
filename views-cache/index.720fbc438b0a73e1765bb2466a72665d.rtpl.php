<?php if(!class_exists('Rain\Tpl')){exit;}?><!doctype html>
<html lang="pt-br">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="/res/login/fonts/icomoon/style.css">

    <link rel="stylesheet" href="/res/login/css/owl.carousel.min.css">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="/res/login/css/bootstrap.min.css">
    
    <!-- Style -->
    <link rel="stylesheet" href="/res/login/css/style.css">

    <title>Login</title>
  </head>
  <body>
  

  
  <div class="content">
    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <img src="/res/login/images/undraw_remotely_2j6y.svg" alt="Image" class="img-fluid">
        </div>
        <div class="col-md-6 contents">
          <div class="row justify-content-center">
            <div class="col-md-8">
              <div class="mb-4">
              <h3>Entrar</h3>
              <p class="mb-4"></p>
            </div>
            <form action="/" method="post">
              <?php if( $error != '' ){ ?>

              <div class="alert alert-danger">
                <?php echo htmlspecialchars( $error, ENT_COMPAT, 'UTF-8', FALSE ); ?>

              </div>
              <?php } ?>

              <div class="form-group first">
                <label for="username">Username</label>
                <input type="text" class="form-control" id="username" name="login">
                
              </div>
              <div class="form-group last mb-4">
                <label for="password">Password</label>
                <input type="password" class="form-control" id="password" name="password">
                
              </div>
              
              <div class="d-flex mb-5 align-items-center">
                <label class="control control--checkbox mb-0"><span class="caption">Lembre de mim</span>
                  <input type="checkbox" checked="checked"/>
                  <div class="control__indicator"></div>
                </label>
                <span class="ml-auto"><a href="#" class="forgot-pass">Esqueceu sua senha</a></span> 
              </div>

              <input type="submit" value="Log In" class="btn btn-block btn-primary">

            </form>
            </div>
          </div>
          
        </div>
        
      </div>
    </div>
  </div>

  
    <script src="/res/login/js/jquery-3.3.1.min.js"></script>
    <script src="/res/login/js/popper.min.js"></script>
    <script src="/res/login/js/bootstrap.min.js"></script>
    <script src="/res/login/js/main.js"></script>
  </body>
</html>