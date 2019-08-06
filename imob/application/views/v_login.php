<!DOCTYPE html>
<html ng-app="app.login">
   <head lang="pt-BR">
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
      <meta http-equiv="x-ua-compatible" content="ie=edge">
      <title>Midia9 Imob</title>
      <link href="img/favicon.144x144.html" rel="apple-touch-icon" type="image/png" sizes="144x144">
      <link href="img/favicon.114x114.html" rel="apple-touch-icon" type="image/png" sizes="114x114">
      <link href="img/favicon.72x72.html" rel="apple-touch-icon" type="image/png" sizes="72x72">
      <link href="img/favicon.57x57.html" rel="apple-touch-icon" type="image/png">
      <link href="img/favicon.html" rel="icon" type="image/png">
      <link href="img/favicon-2.html" rel="shortcut icon">
      <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
      <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
      <![endif]-->
      <link rel="stylesheet" href="<?=base_url('assets')?>/css/separate/pages/login.min.css">
      <link rel="stylesheet" href="<?=base_url('assets')?>/css/lib/font-awesome/font-awesome.min.css">
      <link rel="stylesheet" href="<?=base_url('assets')?>/css/lib/bootstrap/bootstrap.min.css">
      <link rel="stylesheet" href="<?=base_url('assets')?>/css/main.css">
      
   </head>
   <body>
      <div class="page-center"  style="background-image: url('<?=base_url('assets')?>/img/background.png');background-repeat: round;background-color: white;">
         <div class="page-center-in" ng-controller="Login">
            <div class="container-fluid">
               <form name="form" class="sign-box">
                  <div class="sign-avatar">
                     <img src="<?=base_url('assets')?>/img/avatar-sign.png" alt="">
                  </div>
                  <div ng-show="retorno" class="alert alert-danger" role="alert">
                     <strong>{{retorno}}</strong><br>
                  </div>
                  <header class="sign-title">Midia9 Imob</header>
                  <div class="form-group">
                     <input type="text" ng-model="dados.email" class="form-control" placeholder="E-Mail" ng-required="true"/>
                  </div>
                  <div class="form-group">
                     <input type="password" ng-model="dados.senha" class="form-control" placeholder="Senha" ng-required="true"/>
                  </div>
                  <button ng-disabled="form.$invalid" ng-click="Login(dados)" type="submit" class="btn btn-rounded">Entrar</button>
                  <!--<button type="button" class="close">
                     <span aria-hidden="true">&times;</span>
                     </button>-->
               </form>
            </div>
         </div>
      </div>
      <!--.page-center-->
      <script src="<?=base_url('assets')?>/js/lib/jquery/jquery.min.js"></script>
      <script src="<?=base_url('assets')?>/js/lib/tether/tether.min.js"></script>
      <script src="<?=base_url('assets')?>/js/lib/bootstrap/bootstrap.min.js"></script>
      <script src="<?=base_url('assets')?>/js/plugins.js"></script>
      <script src="<?=base_url('assets')?>/js/lib/match-height/jquery.matchHeight.min.js"></script>

      <script type="text/javascript" src="<?=base_url('assets')?>/angular/angular.min.js"></script>
      <script type="text/javascript" src="<?=base_url('assets')?>/angular/angular-route.min.js"></script>
      <script type="text/javascript" src="<?=base_url()?>app/controllers/login.js"></script>
      <script type="text/javascript" src="<?=base_url()?>app/factorie.js"></script>

      <script>
         $(function() {
             $('.page-center').matchHeight({
                 target: $('html')
             });
             $(window).resize(function(){
                 setTimeout(function(){
                     $('.page-center').matchHeight({ remove: true });
                     $('.page-center').matchHeight({
                         target: $('html')
                     });
                 },100);
             });
         });
      </script>
      <script src="<?=base_url('assets')?>/js/app.js"></script>
   </body>
</html>