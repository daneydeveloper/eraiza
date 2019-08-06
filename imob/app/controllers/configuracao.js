angular.module('app.configuracao', [])
.controller('Configuracao', function($scope, $log, $http, ngDialog, base_url, $httpParamSerializerJQLike, FileUploader, blockUI, ngNotify){
	$log.debug('Load: Configuracao');

	$scope.edit = false;

	var uploader = $scope.uploader = new FileUploader({
    url: base_url.get + '/configuracao/upload',
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

  var request = function() {
  	$http({
			method:'GET',
			url: base_url.get + '/configuracao/getConfig'
		})
		.success(function(retorno){
			$log.debug('Request', retorno);
			$scope.config = retorno;
		})
		.error(function(retorno){
			$log.error('Request',retorno);
			ngNotify.set('Ocorreu um erro ao processar sua solicitação', 'error');
		});
  }

  $scope.salvar = function(dados) {
		uploader.clearQueue();
		dados.CON_Logo = $scope.images;
		$log.debug(dados);
		$http({
			method:'POST',
			url: base_url.get + '/configuracao/addConfig',
			data:  $httpParamSerializerJQLike(dados),
      headers: {
        'Content-Type': 'application/x-www-form-urlencoded'
      }   
		})
		.success(function(retorno){
			$scope.edit = false;
			request();
			ngNotify.set('Configuração atualizada com sucesso', 'success');
			//$log.debug('adicionarImovel', retorno);
		})
		.error(function(retorno){
			ngNotify.set('Ocorreu um erro ao processar sua solicitação', 'error');
			$log.error('adicionarImovel',retorno);
		});
	}

	$scope.editar = function() {
		 if ($scope.edit) {
		 	$scope.edit = false;
		 }

		 else if (!$scope.edit) {
		 	$scope.edit = true;
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
     $scope.images = response;
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

  request();

});