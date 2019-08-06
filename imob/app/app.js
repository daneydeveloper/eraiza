angular.module('app', [
	'app.factorie',
	'angular-bootstrap-select',
	'ngMask',
	'ngDialog',
	'720kb.tooltips',
	'ngTagsInput',
	'angularFileUpload',
	'blockUI',
	'ngNotify',
	'ngMap',
	/**/
	'app.imovel',
	'app.configuracao'
	])

.config(function(blockUIConfig) {
  blockUIConfig.message = 'Carregando';
  blockUIConfig.delay = 100;
})