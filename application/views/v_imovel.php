<div class="rle_pagetitle_wrapper rle_toppadder40 rle_bottompadder40">
	<div class="container">
		<div class="row">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<ul class="breadcrumb">
					<li><a href="<?= base_url('home')?>"><i class="fa fa-home" aria-hidden="true"></i> home</a></li>
					<li><i class="fa fa-angle-right" aria-hidden="true"></i></li>
					<li><a href="">Imóvel</a></li>
				</ul>
			</div>
		</div>
	</div>
</div>
<!-- Property Single Wrapper start -->
<div class="rle_property_single_wrapper rle_bottompadder70" ng-app="app">
	<div class="container" ng-controller="Lead">
		<div class="row">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<div class="rle_property_single_heading">
					<h2><?= $imovel->IMV_Nome?></h2>
				</div>
			</div>
			<div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
				<div class="swiper-container slider_v1 gallery-top">
					<div class="swiper-wrapper">
						<?php foreach ($imagens as $key): ?>
							<div class="swiper-slide"><img src="<?=$imovel->IMG_Path.'/'.$key->IMG_Imagem?>" alt="" /></div>
						<?php endforeach ?>
					</div>
				</div>
				<!-- <div class="swiper-container slider_v1 gallery-thumbs">
					<div class="swiper-wrapper">
						<?php foreach ($imagens as $key): ?>
							<div class="swiper-slide"><img src="<?=$imovel->IMG_Path.'/'.$key->IMG_Imagem?>" alt="" /></div>
						<?php endforeach ?>
					</div>
					<div class="swiper-button-next swiper-button-white"></div>
					<div class="swiper-button-prev swiper-button-white"></div>
				</div> -->
			</div>
			<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
				<div class="rle_property_details_box">
					<div class="user_info">
						<img src="<?= base_url('assets/images/content/client5.png')?>">
						<h4>Eraíza Alves</h4>
						<p>Corretora</p>
					</div>
					<div class="user_info_share">
						<ul>
							<li><a href="#"><i class="fa fa-whatsapp" aria-hidden="true"></i> (88) 8888-8888
								<br><i class="fa fa-phone" aria-hidden="true"></i> (88) 8888-8888 | (88) 8888-8888
							</li>
							<li><a href="#"><i class="fa fa-envelope-o" aria-hidden="true"></i> eraizalves12@hotmail.com</a></li>
						</ul>
					</div>
					<div class="user_info_form">
						<form>
							<input type="hidden" ng-init="dados.LE_CodigoImovel='<?=$imovel->IMV_CodigoImovel?>'">
							<input type="text" ng-model='dados.LE_Nome' placeholder="Nome" ng-required="true">
							<input type="email" ng-model='dados.LE_Email' placeholder="Email" ng-required="true" >
							<input type="text" ng-model='dados.LE_Telefone' name="telefone" mask="(99) 9 9999-9999" clean="true" placeholder="Telefone" ng-required="true">
							<textarea rows="6" ng-model='dados.LE_Descricao' ng-required="true" placeholder="Mensagem"></textarea>
							<button ng-click="enviarLead(dados)" ng-disabled="!dados.LE_Descricao || !dados.LE_Nome || !dados.LE_Email || !dados.LE_Telefone" class="rle_btn btn">Enviar</button>
						</form>
					</div>
				</div>
			</div>
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<div class="rle_property_details_box">
					<h3>Descrição do Imóvel</h3>
					<p><?=$imovel->IMV_Descricao ?></p>
				</div>
				<div class="rle_property_details_box">
					<h3>Características do Imóvel</h3>
					<ul class="feature_prop row">
						<?php foreach($imovel->IMV_Caracteristicas as $key): ?>
							<li>	
								<div class="rle_checkbox col-md-2 col-sm-2">
									<input type="checkbox" checked />
									<label><?= $key->text ?> </label>
								</div>
							</li>
						<?php endforeach ?>
					</ul>
				</div>
				<div class="rle_property_details_box">
					<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
						<h3>Detalhes do Imóvel</h3>
						<div class="panel-group" id="accordion">
							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title">
										<a data-toggle="collapse" data-parent="#accordion" href="#collapse1"><i class="fa fa-home" aria-hidden="true"></i> Endereço</a>
									</h4>
								</div>
								<div id="collapse1" class="panel-collapse collapse in">
									<div class="panel-body"><?= $imovel->IMV_Rua ?>, <?= $imovel->IMV_Numero ?>, <?= $imovel->IMV_Bairro ?> - <?= $imovel->IMV_Cidade ?>/<?= $imovel->IMV_Estado ?></div>
								</div>
							</div>
							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title">
										<a data-toggle="collapse" data-parent="#accordion" href="#collapse2"><i class="fa fa-bed" aria-hidden="true"></i> Quartos e Suítes</a>
									</h4>
								</div>
								<div id="collapse2" class="panel-collapse collapse">
									<div class="panel-body">Quartos: <?= $imovel->IMV_Quartos?><br> Suítes: <?= $imovel->IMV_Suites ?></div>
								</div>
							</div>
							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title">
										<a data-toggle="collapse" data-parent="#accordion" href="#collapse3"><i class="fa fa-bath" aria-hidden="true"></i> Banheiros</a>
									</h4>
								</div>
								<div id="collapse3" class="panel-collapse collapse">
									<div class="panel-body"> <?= $imovel->IMV_Banheiros ?> </div>
								</div>
							</div>
							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title">
										<a data-toggle="collapse" data-parent="#accordion" href="#collapse4"><i class="fa fa-money" aria-hidden="true"></i> Preço</a>
									</h4>
								</div>
								<div id="collapse4" class="panel-collapse collapse">
									<?php if ($imovel->IMV_Finalidade == 2): ?>
										<div class="panel-body">Valor: R$ <?= number_format("$imovel->IMV_ValorAluguel",2,",",".") ?></div>
									<?php elseif ($imovel->IMV_Finalidade == 1): ?>
										<div class="panel-body">Valor: R$ <?= number_format("$imovel->IMV_ValorCompra",2,",",".") ?></div>
									<?php else: ?>
										<div class="panel-body">Valor: R$ <?= number_format("$imovel->IMV_ValorTemporada",2,",",".") ?></div>
									<?php endif ?>
								</div>
							</div>
						</div>
					</div>
					<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
						<h3>Localização</h3>
						<iframe src="https://www.google.com/maps/embed/v1/place?key=AIzaSyCWpGZYLW7ODaMF8A9XQ16A8-vWJ2_HfXk&q=<?=$imovel->IMV_Rua?>+<?=$imovel->IMV_Numero?>+<?=$imovel->IMV_Bairro?>+<?=$imovel->IMV_Cidade?>" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<script src="http://cdn.marketingmidia9.com.br/js/angular.min.js"></script>
<script src="http://cdn.marketingmidia9.com.br/js/angular-route.min.js"></script>
<script src="http://cdn.marketingmidia9.com.br/js/ngMask.min.js"></script>
<script src="http://cdn.marketingmidia9.com.br/js/ngDialog.min.js"></script>
<script src='http://cdn.marketingmidia9.com.br/js/sweetalert.min.js'></script>
<script type="text/javascript">
   angular.module('app', ['ngMask', 'ngDialog'])
   .controller('Lead', function($scope, $log, $http, $location, ngDialog, $httpParamSerializerJQLike, $filter) {
      $log.warn($location.host());
      $scope.load = false;
      $scope.dados = {};
      var host = 'http://imob.charlysresendeimoveis.com.br'

      $scope.enviarLead = function(dados, tmp = null) {
         $scope.load = true;
         $log.info(dados);

         $http({
            method: 'POST',
            url: host + '/api/receberLead',
            data: $httpParamSerializerJQLike(dados),
            headers: {
               'Content-Type': 'application/x-www-form-urlencoded'
            }
         })

         var dataAtual = new Date();
	      $scope.load = true;
	      $log.info(dados);
	      dados.Para = "eraizalves12@hotmail.com";
	      dados.TituloEmail = "Midia9 - Eraíza Alves Imoveis - Novo Lead - " + $filter('date')(dataAtual, "dd/MM/yyyy");
	      dados.CorpoEmail = '<b>Nome:</b> ' + dados.LE_Nome  +'<br>' +
	        						 '<b>Email: </b>' + dados.LE_Email  +'<br>' +
	        						 '<b>Telefone: </b>' + dados.LE_Telefone  +'<br>' +
	        						 '<b>Código do Imóvel: </b>' + dados.LE_CodigoImovel  +'<br>' +
	                         '<b>Mensagem: </b>' + dados.LE_Descricao + '<br>';

	      $http({
	      	method: 'POST',
	         url: host + '/Temp_Functions/Email_Simples',
	         data:  $httpParamSerializerJQLike(dados),
	         headers: {
	           'Content-Type': 'application/x-www-form-urlencoded'
	         }
	       }) 

         .success(function(retorno) {
            $scope.load = false;
            $log.info
            if (!retorno.error) {
              swal({
                title: "Obrigado!",
                text: "Suas informações foram enviadas com sucesso!",
                type: "success",
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "Ok",
                closeOnConfirm: false
              });
            }
            else {
              swal("Ops!", "Ocorreu um problema ao enviar suas informações, tente novamente", "error");
            }
         })
         .error(function(retorno) {
            $scope.load = false;
            $log.error(retorno);
         });
      }
      $scope.openForm = function(template, tipo) {
          $scope.dados.LE_CodigoTipo = tipo;
          ngDialog.openConfirm({
            template:template,
            scope: $scope,
            width: '100%',
            showClose: false,
            closeByDocument: false,
            closeByEscape: false
          });
        }
   });
</script>
