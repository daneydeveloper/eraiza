<!DOCTYPE html>

<html ng-app="app">


<head lang="pt_BR">
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<title>Midia9 Imob</title>



	<link href="img/favicon.144x144.html" rel="apple-touch-icon" type="image/png" sizes="144x144">
	<link href="img/favicon.114x114.html" rel="apple-touch-icon" type="image/png" sizes="114x114">
	<link href="img/favicon.72x72.html" rel="apple-touch-icon" type="image/png" sizes="72x72">
	<link href="img/favicon.57x57.html" rel="apple-touch-icon" type="image/png">
	<link href="img/favicon.html" rel="icon" type="image/png">
	<link href="img/favicon-2.html" rel="shortcut icon">



	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!--[if lt IE 9]>
	<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
	<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->



<link rel="stylesheet" href="<?=base_url('assets')?>/css/separate/vendor/tags_editor.min.css">
<link rel="stylesheet" href="<?=base_url('assets')?>/css/separate/vendor/bootstrap-select/bootstrap-select.min.css">
<link rel="stylesheet" href="<?=base_url('assets')?>/css/separate/vendor/select2.min.css">
<link rel="stylesheet" href="<?=base_url('assets')?>/css/lib/multipicker/multipicker.min.css"> <!-- original css -->
<link rel="stylesheet" href="<?=base_url('assets')?>/css/separate/vendor/multipicker.min.css"> <!-- customization css -->
<link rel="stylesheet" href="<?=base_url('assets')?>/css/separate/vendor/bootstrap-datetimepicker.min.css">
<link rel="stylesheet" href="<?=base_url('assets')?>/css/lib/clockpicker/bootstrap-clockpicker.min.css">
<link rel="stylesheet" href="<?=base_url('assets')?>/css/lib/charts-c3js/c3.min.css" type="text/css">
<link rel="stylesheet" href="<?=base_url('assets')?>/css/separate/vendor/bootstrap-touchspin.min.css">
<link rel="stylesheet" href="<?=base_url('assets')?>/css/separate/pages/tasks.min.css">
<link rel="stylesheet" href="<?=base_url('assets')?>/angular/angular-datepicker.min.css">
<link rel="stylesheet" href="<?=base_url('assets')?>/css/separate/pages/gallery.min.css">
<link rel="stylesheet" href="<?=base_url('assets')?>/css/lib/lobipanel/lobipanel.min.css">
<link rel="stylesheet" href="<?=base_url('assets')?>/css/separate/vendor/lobipanel.min.css">
<link rel="stylesheet" href="<?=base_url('assets')?>/css/lib/jqueryui/jquery-ui.min.css">
<link rel="stylesheet" href="<?=base_url('assets')?>/css/separate/pages/widgets.min.css">
<link rel="stylesheet" href="<?=base_url('assets')?>/angular/angular-block-ui.css">
<link rel="stylesheet" href="<?=base_url('assets')?>/angular/angular-tooltips.css">
<link rel="stylesheet" href="<?=base_url('assets')?>/angular/ng-tags-input.min.css">
<link rel="stylesheet" href="<?=base_url('assets')?>/angular/ng-tags-input.bootstrap.min.css">
<link rel="stylesheet" href="<?=base_url('assets')?>/css/lib/font-awesome/font-awesome.min.css">
<link rel="stylesheet" href="<?=base_url('assets')?>/css/lib/bootstrap/bootstrap.min.css">
<link rel="stylesheet" href="<?=base_url('assets')?>/css/separate/vendor/pnotify.min.css">
<link rel="stylesheet" href="<?=base_url('assets')?>/css/separate/vendor/slick.min.css">
<link rel="stylesheet" href="<?=base_url('assets')?>/css/separate/pages/gallery.min.css">
<link rel="stylesheet" href="<?=base_url('assets')?>/css/main.css">
<link rel="stylesheet" href="<?=base_url('assets')?>/angular/style.css">
<link rel="stylesheet" href="<?=base_url('assets')?>/angular/morris.min.css">
<link rel="stylesheet" href="<?=base_url('assets')?>/angular/ngDialog.min.css">
<link rel="stylesheet" href="<?=base_url('assets')?>/angular/angular-block-ui.css">
<link rel="stylesheet" href="<?=base_url('assets')?>/angular/ng-notify.min.css">

<!-- <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/ng-dialog/0.6.4/css/ngDialog-theme-plain.css"> -->



</head>

<body class="with-side-menu control-panel control-panel-compact">

	<?=$header?>

	<div class="mobile-menu-left-overlay"></div>

	<?=$menu?>

	<?=@$content?>

	<script src="<?=base_url('assets')?>/js/lib/jquery/jquery.min.js"></script>
	<script src="<?=base_url('assets')?>/js/lib/tether/tether.min.js"></script>
	<script src="<?=base_url('assets')?>/js/lib/bootstrap/bootstrap.min.js"></script>
	<script src="<?=base_url('assets')?>/js/plugins.js"></script>
	<script src="<?=base_url('assets')?>/js/lib/jqueryui/jquery-ui.min.js"></script>
	<script src="<?=base_url('assets')?>/js/lib/lobipanel/lobipanel.min.js"></script>
	<script src="<?=base_url('assets')?>/js/lib/match-height/jquery.matchHeight.min.js"></script>
	<script src="<?=base_url('assets')?>/js/lib/peity/jquery.peity.min.js"></script>
	<script src="<?=base_url('assets')?>/js/lib/table-edit/jquery.tabledit.min.js"></script>
	<script src="<?=base_url('assets')?>/js/lib/jquery-tag-editor/jquery.caret.min.js"></script>
	<script src="<?=base_url('assets')?>/js/lib/jquery-tag-editor/jquery.tag-editor.min.js"></script>
	<script src="<?=base_url('assets')?>/js/lib/bootstrap-select/bootstrap-select.min.js"></script>
	<script src="<?=base_url('assets')?>/js/lib/moment/moment-with-locales.min.js"></script>
	<script src="<?=base_url('assets')?>/js/lib/eonasdan-bootstrap-datetimepicker/bootstrap-datetimepicker.min.js"></script>
	<script src="<?=base_url('assets')?>/js/lib/clockpicker/bootstrap-clockpicker.min.js"></script>
	<script src="<?=base_url('assets')?>/js/lib/daterangepicker/daterangepicker.js"></script>
	<script src="<?=base_url('assets')?>/js/lib/daterangepicker/pt-br.js"></script>
	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDogvkQfdO8Ws-8osoXlY6_hWK_eYp6brg"></script>
	<script src="<?=base_url('assets')?>/js/lib/select2/select2.full.min.js"></script>
	<script src="<?=base_url('assets')?>/js/lib/d3/d3.min.js"></script>
	<script src="<?=base_url('assets')?>/js/lib/charts-c3js/c3.min.js"></script>
	<script src="<?=base_url('assets')?>/js/lib/bootstrap-touchspin/jquery.bootstrap-touchspin.min.js"></script>
	<script src="<?=base_url('assets')?>/js/lib/bootstrap-notify/bootstrap-notify.min.js"></script>
	<script src="<?=base_url('assets')?>/js/lib/pnotify/pnotify.js"></script>
	<script src="<?=base_url('assets')?>/js/lib/slick-carousel/slick.min.js"></script>
	<script src="<?=base_url('assets')?>/js/lib/asPieProgress/jquery-asPieProgress.min.js"></script>
	<script src="<?=base_url('assets')?>/js/lib/match-height/jquery.matchHeight.min.js"></script>



	<script type="text/javascript" src="<?=base_url('assets')?>/angular/angular.min.js"></script>
	<script type="text/javascript" src="<?=base_url('assets')?>/angular/angular-locale_pt-br.js"></script>
	<script type="text/javascript" src="<?=base_url('assets')?>/angular/ngDialog.min.js"></script>
	<script type="text/javascript" src="<?=base_url('assets')?>/angular/ngMask.min.js"></script>
	<script type="text/javascript" src="<?=base_url('assets')?>/angular/angular-bootstrap-select.js"></script>
	<script type="text/javascript" src="<?=base_url('assets')?>/angular/ng-map.min.js"></script>
	<script type="text/javascript" src="<?=base_url('assets')?>/angular/angular-datepicker.min.js"></script>
	<script type="text/javascript" src="<?=base_url('assets')?>/angular/angular-tooltips.min.js"></script>
	<script type="text/javascript" src="<?=base_url('assets')?>/angular/ng-tags-input.min.js"></script>
	<script type="text/javascript" src="<?=base_url('assets')?>/angular/angular-file-upload.js"></script>
	<script type="text/javascript" src="<?=base_url('assets')?>/angular/angular-block-ui.min.js"></script>
	<script type="text/javascript" src="<?=base_url('assets')?>/angular/ng-notify.min.js"></script>
	<script type="text/javascript" src="<?=base_url('assets')?>/angular/ng-map.min.js"></script>

	<!-- <script type="text/javascript" src="<?=base_url('assets')?>/js/ngStorage.min.js"></script>
	<script type="text/javascript" src="<?=base_url('assets')?>/js/angular-web-notification.js"></script> -->
	<!-- <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.4.7/angular-sanitize.min.js"></script> -->
	<!-- 
	<script type="text/javascript" src="<?=base_url('assets')?>/js/alasql.min.js"></script>
	<script type="text/javascript" src="<?=base_url('assets')?>/js/xlsx.core.min.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
	<script type="text/javascript" src="<?=base_url('assets')?>/js/morris.min.js"></script>
	<script src="<?=base_url('assets')?>/js/lib/tether/tether.min.js"></script>
	<script type="text/javascript" src="<?=base_url('assets')?>/js/angular-file-upload.js"></script>
	<script type="text/javascript" src="<?=base_url('assets')?>/js/textAngular-rangy.min.js"></script>
	<script type="text/javascript" src="<?=base_url('assets')?>/js/textAngular-sanitize.js"></script>
	<script type="text/javascript" src="<?=base_url('assets')?>/js/textAngular.min.js"></script>
	
	
	<script type="text/javascript" src="<?=base_url('assets')?>/js/angular-table.min.js"></script> -->


	<script type="text/javascript" src="<?=base_url()?>/app/factorie.js"></script>
	<script type="text/javascript" src="<?=base_url()?>/app/controllers/imovel.js"></script>
	<script type="text/javascript" src="<?=base_url()?>/app/controllers/configuracao.js"></script>
	<!-- <script type="text/javascript" src="<?=base_url()?>/app/directives.js"></script>
	<script type="text/javascript" src="<?=base_url()?>/app/controllers/dashboard.js"></script>
	<script type="text/javascript" src="<?=base_url()?>/app/controllers/empresa.js"></script>
	<script type="text/javascript" src="<?=base_url()?>/app/controllers/usuario.js"></script>
	<script type="text/javascript" src="<?=base_url()?>/app/controllers/produto.js"></script>
	<script type="text/javascript" src="<?=base_url()?>/app/controllers/marketing.js"></script>
	<script type="text/javascript" src="<?=base_url()?>/app/controllers/header.js"></script>
	<script type="text/javascript" src="<?=base_url()?>/app/controllers/configuracao.js"></script>
	<script type="text/javascript" src="<?=base_url()?>/app/controllers/dealerforce.js"></script>
	<script type="text/javascript" src="<?=base_url()?>/app/controllers/mailmarketing.js"></script>
	<script type="text/javascript" src="<?=base_url()?>/app/controllers/gestao.js"></script> -->

	<script type="text/javascript" src="<?=base_url()?>/app/app.js"></script>

	<script src="<?=base_url('assets')?>/js/app.js"></script>


</body>



<!-- Mirrored from themesanytime.com/startui/demo/ by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 29 Nov 2016 01:49:00 GMT -->

</html>