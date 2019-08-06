<nav class="side-menu" $ng-controller="Dashboard">
  <ul class="side-menu-list">
  <!-- <li class="gold">
    <a href="<?=base_url('dashboard')?>">
    <i class="font-icon fa fa-dashboard"></i>
    <span class="lbl">Dashboard</span>
    </a>
  </li> -->
  <!-- <li class="purple with-sub">
    <span>
    <i class="font-icon font-icon-user"></i>
    <span class="lbl">Gerencial</span>
    </span>
    <ul>
      <li><a href="<?=base_url('gerencial/empresa')?>" ng-if="nivel == 99"><span class="lbl">Empresas</span></a></li>
      <li><a href="<?=base_url('gerencial/usuario')?>" ng-if="nivel != 2"><span class="lbl">Usuários</span></a></li>
      <li><a href="<?=base_url('gerencial/produto')?>"><span class="lbl">Produtos / Serviços</span></a></li>
    </ul>
  </li> -->
  <li class="green with-sub">
    <span>
    <i class="fa fa-home"></i>
    <span class="lbl">Imóveis</span>
    </span>
    <ul>
      <li><a href="<?=base_url('imovel')?>"><span class="lbl">Cadastrar Imóveis</span></a></li>
    </ul>
  </li>
  <li class="red">
    <a href="<?=base_url('configuracao')?>">
    <i class="font-icon fa fa-cog"></i>
    <span class="lbl">Configurações</span>
    </a>
  </li>
</nav>
<!--.side-menu-->