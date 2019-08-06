<div class="rle_pagetitle_wrapper rle_toppadder40 rle_bottompadder40">
	<div class="container">
		<div class="row">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<div class="page_title">
					<h2>Corretor</h2>
				</div>
				<ul class="breadcrumb">
					<li><a href="<?= base_url('home')?>"><i class="fa fa-home" aria-hidden="true"></i> home</a></li>
					<li><i class="fa fa-angle-right" aria-hidden="true"></i></li>
					<li><a href="">sobre</a></li>
				</ul>
			</div>
		</div>
	</div>
</div>
<!-- Agent Details Wrapper start -->
<div class="rle_agent_single_wrapper rle_toppadder100 rle_bottompadder50" >
	<div class="container">
		<div class="row">
			<div class="col-md-5 col-sm-5 col-xs-12">
				<div class="rle_agent_single_info_img">
					<img src="<?= base_url('assets/images/content/agent_single.png')?>">
				</div>
			</div>
			<div class="col-md-7 col-sm-7 col-xs-12">
				<div class="rle_agent_single_info">
					<div class="rle_agent_single_info_box">
						<div class="rle_agent_single_name_box">
							<h3>Eraíza Alves</h3>
							<p>Corretora de Imóveis</p>
						</div>
						<div class="rle_agent_single_mail_box">
							<ul>
								<li><a ><i class="fa fa-whatsapp" aria-hidden="true"></i>(88) 8888-8888
								<li><a ><i class="fa fa-phone" aria-hidden="true"></i>(88) 8888-8888
								<li><a ><i class="fa fa-phone" aria-hidden="true"></i>(88) 8888-8888</a></li><br>
								<li><a ><i class="fa fa-envelope-o" aria-hidden="true"></i> eraizalves12@hotmail.com</a></li>
							</ul>
						</div>
					</div>
					<div class="rle_agent_single_info_content">
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
						tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
						quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
						consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
						cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
						proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
						<ul>
							<li>
								<img src="<?= base_url('assets/images/icon/counter1.png') ?>">
								<div class="rle_counter_box">
									<h1>500+</h1>
									<p>Imóveis vendidos</p>
								</div>
							</li>
							<li>
								<img src="<?= base_url('assets/images/icon/counter3.png')?>">
								<div class="rle_counter_box">
									<h1>10+</h1>
									<p>Anos de experiência</p>
								</div>
							</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="rle_agent_message_wrapper rle_bottompadder100" ng-app="app">
	<div class="container" ng-controller="Lead">
		<div class="row">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<hr>
				<h4>Entrar em contato</h4>
				<div class="rle_agent_messages rle_toppadder30">
					<div class="row">
						<form>
							<input type="hidden" ng-init="dados.LE_CodigoImovel= 0">
							<div class="col-md-4 col-sm-4 col-xs-12">
								<input type="text" ng-model='dados.LE_Nome' ng-requiered="true" placeholder="Seu nome">
							</div>
							<div class="col-md-4 col-sm-4 col-xs-12">
								<input type="email" ng-model='dados.LE_Email' ng-requiered="true" placeholder="Email">
							</div>
							<div class="col-md-4 col-sm-4 col-xs-12">
								<input type="text" ng-model='dados.LE_Telefone' mask="(99) 9 9999-9999" clean="true" ng-requiered="true" placeholder="Telefone">
							</div>
							<div class="col-lg-12">
								<textarea rows="8" ng-model='dados.LE_Descricao' ng-requiered="true" placeholder="Mensagem"></textarea>
							</div>
							<div class="col-lg-12">
								<button  ng-disabled="!dados.LE_Descricao || !dados.LE_Nome || !dados.LE_Email || !dados.LE_Telefone" ng-click="enviarLead(dados)" class="rle_btn btn">Enviar</button>
							</div>
						</form>
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
