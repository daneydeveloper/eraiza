angular.module('app.imovel', [])
.controller('Imovel', function($scope, $log, $http, ngDialog, base_url, $httpParamSerializerJQLike, FileUploader, blockUI, ngNotify){
	$log.debug('Load: Imovel');
	$scope.images  = [];
	$scope.imovel = {};
	$scope.dados = {};
	$scope.filtro = {};
	$scope.mapaDefault = true;
	$scope.mapaStreet = false;



	var uploader = $scope.uploader = new FileUploader({
    url: base_url.get + '/imovel/upload',
    queueLimit: 12
  });

  ngNotify.config({
    theme: 'pure',
    position: 'top',
    duration: 3000,
    type: 'info',
    sticky: true,
    button: true,
    html: false
	});

  uploader.filters.push({
    name: 'syncFilter',
    fn: function(item /*{File|FileLikeObject}*/, options) {
      console.log('syncFilter');
      return this.queue.length < 10;
    }
  });

  $scope.buscar = function(dados) {
  	$log.debug(dados);
  	$http({
			method:'POST',
			url: base_url.get + '/imovel/buscaPersonalizada',
			data:  $httpParamSerializerJQLike(dados),
      headers: {
        'Content-Type': 'application/x-www-form-urlencoded'
      }   
		})
		.success(function(retorno){
			$log.debug('buscar', retorno);
			$scope.dados.imovel = retorno;
		})
		.error(function(retorno){
			$log.error('Request',retorno);
			ngNotify.set('Ocorreu um erro ao processar sua solicitação', 'error');
		});
  }

  $scope.setMapa = function(type){
  	if (type == 1) {
  		$scope.mapaDefault = true;
  		$scope.mapaStreet = false;
  	}
  	else if (type == 2) {
  		$scope.mapaDefault = false;
  		$scope.mapaStreet = true;
  	}
  }

	var request = function(dados = null) {
		$http({
			method:'GET',
			url: base_url.get + '/imovel/getImoveis',
			data: dados
		})
		.success(function(retorno){
			$log.debug('Request', retorno);
			$scope.dados = retorno;
		})
		.error(function(retorno){
			$log.error('Request',retorno);
			ngNotify.set('Ocorreu um erro ao processar sua solicitação', 'error');
		});
	}

	$scope.visualizarImovel = function(id) {
		$scope.mapaDefault = true;
		$scope.mapaStreet = false;
		$http({
			method:'GET',
			url: base_url.get + '/imovel/getImoveis/null/' + id
		})
		.success(function(retorno){
			$scope.detalhe = retorno.imovel;
			$scope.detalheImagens = retorno.imagens;
			$log.debug('visualizar', $scope.detalhe);
			ngDialog.open({
				template: 'v_visualizarImovel',
				scope: $scope,
	      width: '80%',
	      showClose: false
			});
		})
		.error(function(retorno){
			$log.error('Request',retorno);
			ngNotify.set('Ocorreu um erro ao processar sua solicitação', 'error');
		});
	}

	$scope.adicionar = function() {
		uploader.clearQueue();
		$log.debug($scope.dados);
		ngDialog.openConfirm({
			template: 'v_adicionarImovel',
			scope: $scope,
      width: '80%',
      showClose: false,
      closeByDocument: false
		})
		.then(function(dados){
			$log.debug(dados);
			dados.IMG_Imagens = $scope.images;
			$http({
				method:'POST',
				url: base_url.get + '/imovel/addImovel',
				data:  $httpParamSerializerJQLike(dados),
	      headers: {
	        'Content-Type': 'application/x-www-form-urlencoded'
	      }   
			})
			.success(function(retorno){
				request(50);
				ngNotify.set('Imóvel adicionado com Sucesso', 'success');
				//$log.debug('adicionarImovel', retorno);
			})
			.error(function(retorno){
				ngNotify.set('Ocorreu um erro ao processar sua solicitação', 'error');
				$log.error('adicionarImovel',retorno);
			});
		});
	}

	$scope.limparFiltro = function() {
		$scope.filtro = {};
		request(50);
	}

	$scope.editar = function(id) {
		uploader.clearQueue();
		$scope.idImovel = id;
		$scope.edit = true;
		$scope.images = [];
		$http({
			method: 'GET',
			url: base_url.get + '/imovel/getImoveis/null/' + id
		})
		.success(function(retorno){
			$scope.imovel = retorno.imovel;
			$scope.imagens = retorno.imagens;

			$log.info($scope.imovel);
			$log.info($scope.imagens);
			ngDialog.openConfirm({
				template: 'v_adicionarImovel',
				scope: $scope,
	      width: '80%',
	      showClose: false
			})
			.then(function(dados){
				$log.debug(dados);
				dados.IMG_Imagens = $scope.images;
				$http({
					method:'POST',
					url: base_url.get + '/imovel/updateImovel',
					data:  $httpParamSerializerJQLike(dados),
		      headers: {
		        'Content-Type': 'application/x-www-form-urlencoded'
		      }   
				})
				.success(function(retorno){
					ngNotify.set('Imóvel atualizado com Sucesso', 'success');
					request(50);
					//$log.debug('adicionarImovel', retorno);
				})
				.error(function(retorno){
					$log.error('adicionarImovel',retorno);
					ngNotify.set('Ocorreu um erro ao processar sua solicitação', 'error');
				});
			});
		})
		.error(function(retorno){
			$log.error('Editar', retorno);
		});
	}

	$scope.setNewImages = function() {
		$scope.newImages = true;
	}
	$scope.visualizarImagemGaleria = function(img) {
		$scope.galeria = img;
		$log.debug(img);
		ngDialog.open({
			template: 'v_imagemGaleria',
			scope: $scope,
      width: '60%',
      showClose: false
		});
	}

	$scope.removerImagemGaleria = function(id) {
		$scope.alertText = "Você deseja remover esta imagem?";
		ngDialog.openConfirm({
			template: 'v_alert',
			scope: $scope,
      width: '30%',
      showClose: false
		})
		.then(function(){
			$http({
				method: 'GET',
				url: base_url.get + '/imovel/removeImage/' + id
			})
			.success(function(result){
				$log.debug(result);
				reloadEditar($scope.idImovel);
			})
			.error(function(result){
				$log.error(result);
			});
		});
	}

	$scope.removerImovel = function(id) {
		$scope.alertText = "Você realmente deseja Remover este imóvel?";
		ngDialog.openConfirm({
			template: 'v_alert',
			scope: $scope,
      width: '30%',
      showClose: false
		})
		.then(function(){
			$http({
				method: 'GET',
				url: base_url.get + '/imovel/setStatusImovel/' + id + "/3"
			})
			.success(function(result){
				ngNotify.set('Imóvel removido com Sucesso', 'success');
				request(50);
			})
			.error(function(result){
				$log.error(result);
				ngNotify.set('Ocorreu um erro ao processar sua solicitação', 'error');
			});
		});
	}

	$scope.setStatusImovel = function(id, status) {
		$http({
			method: 'GET',
			url: base_url.get + '/imovel/setStatusImovel/' + id + "/" + status
		})
		.success(function(result){
			ngNotify.set('Imóvel atualizado com Sucesso', 'success');
			request(50);
		})
		.error(function(result){
			$log.error(result);
			ngNotify.set('Ocorreu um erro ao processar sua solicitação', 'error');
		});
	}

	var reloadEditar = function(id) {
		$http({
			method: 'GET',
			url: base_url.get + '/imovel/getImoveis/null/' + id
		})
		.success(function(retorno){
			$scope.imovel = retorno.imovel;
			$scope.imagens = retorno.imagens;
		})
		.error(function(retorno){
			$log.error('Editar', retorno);
		});
	}

	$scope.buscaCEP = function(cep) {
		if (cep.length == 9) {
			$http({
				method: 'GET',
				url: 'http://api.postmon.com.br/v1/cep/'+cep+'?format=json'
			})
			.success(function(retorno){
				$log.debug('buscaCEP', retorno);
				$scope.loadCEP = true;
				$scope.imovel.IMV_Estado = retorno.estado;
				$scope.imovel.IMV_Cidade = retorno.cidade;
				$scope.imovel.IMV_Bairro = retorno.bairro;
				$scope.imovel.IMV_Rua = retorno.logradouro;
				$http.get('https://maps.googleapis.com/maps/api/geocode/json?address=' + retorno.logradouro + ' '+ retorno.cidade + ' ' + retorno.bairro + ' '+ retorno.estado +'&key=AIzaSyBPmXdLpmpOFn_-j60LNMVxymEzX7HzQik')
				.success(function(geo){
					$log.debug('Geo', geo);
					$scope.imovel.IMV_MetaDados.Geo = geo;
				})
				.error(function(geo){
					$log.error('Geo', geo);
				});
			})
			.error(function(retorno){
				$log.error('buscaCEP', retorno);
			})
		}
	}

	
 
	/*UPLOADER*/

	uploader.onWhenAddingFileFailed = function(item /*{File|FileLikeObject}*/, filter, options) {
      /*console.info('onWhenAddingFileFailed', item, filter, options);*/
      $scope.imageStatus = 1;
  };

  uploader.onAfterAddingFile = function(fileItem) {
      /*console.info('onAfterAddingFile', fileItem);*/
      $scope.imageStatus = 2;
  };

  uploader.onAfterAddingAll = function(addedFileItems) {
      /*console.info('onAfterAddingAll', addedFileItems);*/
      $scope.imageStatus = 3;
  };

  uploader.onBeforeUploadItem = function(item) {
      /*console.info('onBeforeUploadItem', item);*/
      $scope.imageStatus = 4;
  };

  uploader.onProgressItem = function(fileItem, progress) {
      /*console.info('onProgressItem', fileItem, progress);*/
      $scope.imageStatus = 5;
  };

  uploader.onProgressAll = function(progress) {
      /*console.info('onProgressAll', progress);*/
      $scope.imageStatus = 6;
  };

  uploader.onSuccessItem = function(fileItem, response, status, headers) {
     $scope.images.push(response);
     $log.info('onSuccessItem', $scope.images);
  };

  uploader.onErrorItem = function(fileItem, response, status, headers) {
      /*console.info('onErrorItem', fileItem, response, status, headers);*/
      $scope.imageStatus = 8;
  };

  uploader.onCancelItem = function(fileItem, response, status, headers) {
      /*console.info('onCancelItem', fileItem, response, status, headers);*/
      $scope.imageStatus = 9;
  };

  uploader.onCompleteItem = function(fileItem, response, status, headers) {
      $log.info('onCompleteItem');
      $scope.imageStatus = 10;
  };

  uploader.cancelAll = function() {
    uploader.clearQueue();
    $scope.imageStatus = 0;
  }

  uploader.onCompleteAll = function() {
    $log.debug('onCompleteAll ',$scope.images);
  };



	request(50);
});
