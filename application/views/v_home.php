<!DOCTYPE html>
<html lang="pt_br">
<head>
   <meta charset="utf-8" />
   <title>Eraíza Alves - Corretora de Imóveis</title>
   <meta content="width=device-width, initial-scale=1.0" name="viewport" />
   <meta name="description" content="" />
   <meta name="keywords" content="imóveis, comprar imóvel, compra casa, alugar casa, charlys, corretor" />
   <meta name="author" content="Midia9 Group, contato@midia9.com.br" />
   <meta name="MobileOptimized" content="320" />
   <!-- TAG OG -->
   <meta property="og:locale" content="pt_BR">
   <meta property="og:url" content="">
   <meta property="og:title" content="O imóvel certo para você!">
   <meta property="og:site_name" content="Eraíza Alves">
   <meta property="og:description" content="Eraíza Alves - Corretora de Imóveis">
   <meta property="og:image" content="images/banner/bnr2.jpg">
   <meta property="og:image:type" content="image/png">
   <meta property="og:type" content="website">
   <!--srart theme style -->
   <link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/bootstrap.css')?>" />
   <link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/font-awesome.css')?>" />
   <link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/fonts.css')?>" />
   <link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/owl.carousel.css')?>" />
   <link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/owl.theme.default.css')?>" />
   <link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/jquery-ui.css')?>" />
   <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.1.6/css/swiper.min.css"/>
   <link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/style.css')?>" />
   <link rel="stylesheet" type="text/css" href="http://cdn.marketingmidia9.com.br/css/sweetalert2.css">
   <!-- favicon links -->
   <link rel="shortcut icon" type="image/png" href="<?= base_url('assets/images/header/favicon.png')?>" />
</head>
<body>
   <div class="rle_banner_wrapper ">
      <div class="rle_header_wrapper">
         <div class="container">
            <div class="row">
               <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                  <div class="rle_logo">
                     <a href="<?= base_url('home')?>"><img src="<?= base_url('assets/images/icon/logohome.png')?>" alt="Logo" title="Logo"></a>
                  </div>
               </div>
               <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                  <button class="rle_menu_btn"><i class="fa fa-bars" aria-hidden="true"></i>
                  </button>
                  <div class="rle_main_menu_wrapper">
                     <div class="rle_main_menu">
                        <ul>
                           <li><a href="<?= base_url('home')?>">Home</a>
                           </li>
                           <li><a href="<?= base_url('imoveis')?>">Imóveis</a>
                           </li>
                           <li><a href="<?= base_url('sobre')?>">Sobre</a>
                           </li>
                           <li><a href="<?= base_url('contato');?>">contato</a>
                           </li>
                        </ul>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <div class="container">
         <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
               <div class="rle_banner_text">
                  <h1>O imóvel certo para <span>você!</span></h1>
                  <p></p>
               </div>
            </div>
         </div>
      </div>
   </div>
   <!-- Tab Form Section start -->
   <div class="rle_searchform_wrapper">
      <div class="container">
         <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
               <div class="rle_searchform_tabs">
                  <!-- Nav tabs -->
                  <ul class="nav nav-tabs" role="tablist">
                  </ul>
                  <!-- Tab panes -->
                  <form method="GET" action="<?= base_url('home/buscarHome')?>">
	                  <div class="tab-content">
	                     <div role="tabpanel" class="tab-pane fade in active" id="compra">
	                        <div class="row">
	                           <div class="col-lg-10 col-md-10 col-sm-9 col-xs-12">
	                              <div class="rle_searchform_box">
	                              	<div class="col-lg-3 col-md-3 col-sm-4 col-xs-12">
	                                    <select name="IMV_Finalidade">
	                                       <option value="" >Finalidade</option>
	                                       <option value="2">Locação</option>
	                                       <option value="1">Venda</option>
	                                       <option value="3">Temporada</option>
	                                    </select>
	                                 </div>
	                                 <div class="col-lg-3 col-md-3 col-sm-4 col-xs-12">
	                                    <select name="IMV_Tipo">
	                                       <option value="" >Tipo</option>
	                                       <?php foreach ($tipo as $key): ?>
	                                       	<option value="<?=$key->IMT_CodigoTipo?>"><?=$key->IMT_Nome?></option>
	                                       <?php endforeach ?>
	                                    </select>
	                                 </div>
	                                 <div class="col-lg-3 col-md-3 col-sm-4 col-xs-12">
	                                    <select name="IMV_Estado"> 
	                                       <option value="" >Estado</option>
	                                       <?php foreach ($estados as $key): ?>
	                                       	<option value="<?=$key->IMV_Estado?>"><?=$key->IMV_Estado?></option>
	                                       <?php endforeach ?>
	                                    </select>
	                                 </div>
	                                 <div class="col-lg-3 col-md-3 col-sm-4 col-xs-12">
	                                    <select name="IMV_Cidade">
	                                       <option value="" >Cidade</option>
	                                       <?php foreach ($cidades as $key): ?>
	                                       	<option value="<?=$key->IMV_Cidade?>"><?=$key->IMV_Cidade?></option>
	                                       <?php endforeach ?>
	                                    </select>
	                                 </div>
	                                 <div class="col-lg-3 col-md-3 col-sm-4 col-xs-12">
	                                    <select name="IMV_Bairro">
	                                       <option value="" >Bairro</option>
	                                       <?php foreach($bairros as $key): ?>
	                                       	<option value="<?=$key->IMV_Bairro?>"><?=$key->IMV_Bairro?></option>
	                                       <?php endforeach ?>
	                                    </select>
	                                 </div>
	                                 <div class="col-lg-3 col-md-3 col-sm-4 col-xs-12">
	                                    <select name="IMV_Quartos">
	                                       <option value="" >Quartos</option>
	                                       <?php foreach($quartos as $key): ?>
	                                       	<option value="<?=$key->IMV_Quartos?>"><?=$key->IMV_Quartos?></option>
	                                    	<?php endforeach ?>
	                                    </select>
	                                 </div>
	                                 <div class="col-lg-3 col-md-3 col-sm-4 col-xs-12">
	                                    <select name="IMV_Banheiros">
	                                       <option value="" >Banheiros</option>
	                                       <?php foreach($banheiros as $key): ?>
	                                       	<option value="<?=$key->IMV_Banheiros?>"><?=$key->IMV_Banheiros?></option>
	                                    	<?php endforeach ?>
	                                    </select>
	                                 </div>
	                              </div>
	                           </div>
	                           <div class="col-lg-2 col-md-2 col-sm-3 col-xs-12">
	                              <button type="submit" class="rle_searchform_btn">
	                                 <img  src="<?= base_url('assets/images/icon/search_icon.png')?>">
	                                 <p >Pesquisar</p>
	                              </button>
	                           </div>
	                        </div>
	                     </div>
	                  </div>
	               </form>
               </div>
            </div>
         </div>
      </div>
   </div>
   <!-- Property Wrapper start -->
   <div class="rle_property_wrapper rle_toppadder100 rle_bottompadder70">
      <div class="container">
         <div class="row">
	      	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
					<div class="rle_center_heading rle_bottompadder60">
						<h1>Mais Recentes</h1>
						<p>Veja os imóveis mais recentes cadastrados</p>
					</div>
				</div>
				<?php foreach($imoveis as $imovel): ?>
					<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
						<div class="rle_property_infobox">
							<div class="rle_property_infobox_img" style="height: 230px;display: inline-block;overflow: hidden;">
								<a href="<?= base_url('home/verImovel/'.$imovel->IMV_URL)?>"><img src="<?=$imovel->IMG_Path.'/'.$imovel->IMG_Imagem?>" alt="" title=""></a>
								<?php if($imovel->IMV_Finalidade == 2): ?>
									<span><sup>R$</sup><?=number_format("$imovel->IMV_ValorAluguel",2,",",".")?></span>
								<?php elseif ($imovel->IMV_Finalidade == 1): ?>
									<span><sup>R$</sup><?=number_format("$imovel->IMV_ValorCompra",2,",",".")?></span>
								<?php elseif ($imovel->IMV_Finalidade == 3): ?>
									<span><sup>R$</sup><?=number_format("$imovel->IMV_ValorTemporada",2,",",".")?></span>
								<?php endif ?> 
							</div>
							<div class="rle_property_infobox_details">
								<div class="rle_property_infobox_details_header">
									<ul>
										<?php if($imovel->IMV_Finalidade == 2): ?>
											<li class="rle_green_clr">Aluguel</li>
										<?php elseif ($imovel->IMV_Finalidade == 1): ?>
											<li class="rle_red_clr">Venda</li>
										<?php elseif ($imovel->IMV_Finalidade == 3): ?>
											<li class="rle_black_clr">Temporada</li>	
										<?php endif ?>
									</ul>
									<h3><a href="<?= base_url('home/verImovel/'.$imovel->IMV_URL)?>"><?=$imovel->IMV_Nome ?></a></h3>
									<p><?=$imovel->IMV_Rua?>, <?=$imovel->IMV_Numero?>, <?=$imovel->IMV_Cidade?>, <?=$imovel->IMV_Estado?></p>
								</div>
								<div class="rle_property_infobox_details_footer">
									<p>Área:&nbsp <?=$imovel->IMV_AreaUtil?>m² </p>
									<p>Tipo do Imóvel:  &nbsp <?= $imovel->IMT_Nome ?></p>
									<ul>
										<li><i class="fa fa-bed" aria-hidden="true"></i> <?=$imovel->IMV_Quartos?></li>
										<li><i class="fa fa-bath" aria-hidden="true"></i> <?=$imovel->IMV_Banheiros?></li>
									</ul>
								</div>
							</div>
						</div>
					</div>
				<?php endforeach ?>
         </div>
      </div>
   </div>
   <div class="rle_footer_wrapper rle_toppadder100">
		<div class="container">
			<div class="row">
				<div class="rle_top_footer">
					<div class="col-lg-3 col-md-4 col-sm-12">
						<div class="widget text-widget">
							<img src="<?= base_url('assets/images/icon/logo4.png')?>" alt="Footer Logo" />
						</div>
					</div>
					<div class="col-lg-3 col-md-2 col-sm-12 col-lg-offset-1"></div>
					<div class="col-lg-2 col-md-2 col-sm-12 " >
						<div class="widget text-widget">
							<h4 class="widget-title">Telefone</h4>
							<ul>
								<li><p><i class="fa fa-whatsapp" aria-hidden="true"></i>(88) 8888-8888</a></li>
								<li><p><i class="fa fa-phone" aria-hidden="true"></i>(88) 8888-8888 </a></li>
							</ul>
						</div>
					</div> 
					<div class="col-lg-3 col-md-4 col-sm-12 ">
						<div class="widget text-widget">
							<h4 class="widget-title">Email</h4>
							<ul>
								<li><p><i class="fa fa-envelope-open-o" aria-hidden="true"></i>eraizalves12@hotmail.com</p></li>
							</ul>
						</div>
					</div>
				</div>
				<div class="rle_bottom_footer">
					<p>© <a href="http://agenciamidia9.com.br/" target="blank">Agência Mídia9</a> - Todos os direitos reservados. </p>
				</div>
			</div>
		</div>
	</div>
   <!--main js file start-->
   <script type="text/javascript" src="<?= base_url('assets/js/jquery.js')?>"></script> 
   <script type="text/javascript" src="<?= base_url('assets/js/bootstrap.js')?>"></script>
   <script type="text/javascript" src="<?= base_url('assets/js/owl.carousel.js')?>"></script>
   <script type="text/javascript" src="<?= base_url('assets/js/jquery-ui.js')?>"></script>
   <script type="text/javascript" src="<?= base_url('assets/js/custom.js')?>"></script>
   <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.1.6/js/swiper.min.js"></script>
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/1.0.2/Chart.min.js"></script>
	<script type="text/javascript" src="<?= base_url('assets/js/canva.js')?>"></script>
   <!--main js file end-->
</body>
</html>