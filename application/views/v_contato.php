<div class="rle_pagetitle_wrapper rle_toppadder40 rle_bottompadder40">
	<div class="container">
		<div class="row">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<div class="page_title">
					<h2>Contato</h2>
				</div>
				<ul class="breadcrumb">
					<li><a href="<?= base_url('home')?>"><i class="fa fa-home" aria-hidden="true"></i> home</a></li>
					<li><i class="fa fa-angle-right" aria-hidden="true"></i></li>
					<li><a href="">contato</a></li>
				</ul>
			</div>
		</div>
	</div>
</div>
<!-- Contact Wrapper start -->
<div class="rle_contact_wrapper rle_toppadder90 rle_bottompadder90" ng-app="app">
	<div class="container" ng-controller="Lead">
		<div class="row">
			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
				<div class="rle_contact_info">
					<ul>
						<li>
							<h4>Telefone</h4>
							<p>Tim: (88) 8888-8888  <i class="fa fa-whatsapp"></i>
							<br>Oi: (88) 8888-8888
							<br>Vivo: (88) 8888-8888</p>
						</li>
						<li>
							<h4>Email</h4>
							<p>eraizalves12@hotmail.com</p>
						</li>
					</ul>
				</div>
			</div>
			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
				<div class="rle_contact_form">
					<div class="row">
						<form>
							<input type="hidden" ng-init="dados.LE_CodigoImovel= 0">
							<div class="col-md-6 col-sm-6 col-xs-12">
								<input type="text" ng-model='dados.LE_Nome' placeholder="Nome" ng-required='true'>
							</div>
						
							<div class="col-md-6 col-sm-6 col-xs-12">
								<input type="email" ng-model='dados.LE_Email' placeholder="Email" ng-required='true'>
							</div>
							<div class="col-lg-12">
								<textarea rows="8" ng-model='dados.LE_Descricao' placeholder="Messagem" ng-required='true'></textarea>
							</div>
							<div class="col-lg-12">
								<a ng-disabled="!dados.LE_Descricao || !dados.LE_Nome || !dados.LE_Email" ng-click="enviarLead(dados)" class="rle_btn btn">Enviar</a>
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
   .controller('Lead', function($scope, $log, $http, $location, ngDialog, $httpParamSerializerJQLike,$filter) {
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
	      dados.TituloEmail = "Midia9 - Eraíza Alves - Novo Lead - " + $filter('date')(dataAtual, "dd/MM/yyyy");
	      dados.CorpoEmail = '<b>Nome:</b> ' + dados.LE_Nome  +'<br>' +
	        							'<b>Email: </b>' + dados.LE_Email  +'<br>' +
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

