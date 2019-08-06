angular.module('app.login', ['app.factorie'])

.controller('Login', function($scope, $log, $http, $httpParamSerializerJQLike, $location, base_url){

	$log.debug('Ctrl: Login');



	$scope.Login = function(dados) {

		$http({

			method: 'POST',

			url: base_url.get + '/login/auth',

				data:  $httpParamSerializerJQLike(dados),

				headers: {

	      'Content-Type': 'application/x-www-form-urlencoded'

	    	}

		})

		.success(function(dados){
				$log.debug(dados);
			if (dados.error) {

				$scope.retorno = dados.error;

			}

			else {

				$log.debug(dados);

				// window.location.replace( base_url.get + '/imovel');

			}

		})

		.error(function(dados){

			$log.error(dados);

		});

	};

})