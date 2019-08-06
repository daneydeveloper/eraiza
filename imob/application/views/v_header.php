<div class="hide" &ng-controller="Configuracao"></div>
<header class="site-header" &ng-controller="Dashboard">
   <div class="container-fluid">
      <a href="#" class="site-logo">
        <img class="hidden-md-down" src="<?=base_url('assets/img')?>/logo-midia9.svg" alt="">
        <img class="hidden-lg-up" src="<?=base_url('assets/img')?>/logo-midia9.svg" alt="">
      </a>
      <button id="show-hide-sidebar-toggle" class="show-hide-sidebar">
        <span>toggle menu</span>
      </button>
      <button class="hamburger hamburger--htla">
        <span>toggle menu</span>
      </button>
      <div class="site-header-content">
         <div class="site-header-content-in">
            <div class="site-header-shown">
               <div class="dropdown user-menu">
                  <button class="dropdown-toggle" id="dd-user-menu" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <img src="<?=base_url('assets')?>/img/avatar-2-64.png" alt="">
                  </button>
                  <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dd-user-menu">
                     <a class="dropdown-item" href="#"><span class="font-icon glyphicon glyphicon-user"></span><?=$this->session->usuario->USR_Nome;?></a>
                     <div class="dropdown-divider"></div>
                     <a class="dropdown-item" href="<?=base_url('login/sair')?>"><span class="font-icon glyphicon glyphicon-log-out"></span>Sair</a>
                  </div>
               </div>
               <button type="button" class="burger-right">
               <i class="font-icon-menu-addl"></i>
               </button>
            </div>
            <div class="mobile-menu-right-overlay"></div>
            <!--.site-header-collapsed-in-->
         </div>
         <!--.site-header-collapsed-->
      </div>
      <!--site-header-content-in-->
   </div>
   <!--.site-header-content-->
   </div><!--.container-fluid-->
</header>
<!--.site-header-->