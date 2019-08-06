<div class="page-content" ng-controller="Imovel">

		<!-- FILTRO -->
		<div class="container-fluid col-md-12">
			<section class="card">
				<header class="card-header">
					Filtros
					<button ng-click="request()" type="button" class="modal-close">
						<i class="fa fa-refresh fa-2x"></i>
					</button>
				</header>
				<div class="card-block">
					<div class="row">
						<div class="col-lg-2">
							<fieldset class="form-group">
								<label class="form-label" >Código</label>
								<input type="text" ng-model="filtro.IMV_CodigoImovel"  class="form-control">
							</fieldset>
						</div>
						<div class="col-lg-2">
							<fieldset class="form-group">
								<label class="form-label" >Titulo</label>
								<input type="text" ng-model="filtro.IMV_Nome" class="form-control">
							</fieldset>
						</div>
						<div class="col-lg-2">
							<fieldset class="form-group">
								<label class="form-label" >Estado</label>
								<select class="select2" data-width="100%" ng-model="filtro.IMV_Estado" ng-required="true">
									<option value="">Selecione</option>
									<option ng-repeat="estado in dados.estados" value="{{estado.IMV_Estado}}">{{estado.IMV_Estado}}</option>
								</select>
							</fieldset>
						</div>
						<div class="col-lg-2">
							<fieldset class="form-group">
								<label class="form-label" >Cidade</label>
								<select class="select2" data-width="100%" ng-model="filtro.IMV_Cidade" ng-required="true">
									<option value="">Selecione</option>
									<option ng-repeat="cidade in dados.cidades" value="{{cidade.IMV_Cidade}}">{{cidade.IMV_Cidade}}</option>
								</select>
							</fieldset>
						</div>
						<div class="col-lg-2">
							<fieldset class="form-group">
								<label class="form-label" >Finalidade</label>
								<select class="select2" data-width="100%" ng-model="filtro.IMV_Finalidade" ng-required="true">
									<option value="" style="color:red">Selecione</option>
										<option value="1">Venda</option>
										<option value="2">Locação</option>
										<option value="3">Temporada</option>
								</select>
							</fieldset>
						</div>
						<div class="col-lg-2">
							<fieldset class="form-group">
								<label class="form-label" >Qtd. Quartos</label>
								<input type="number" ng-model="filtro.IMV_Quartos" class="form-control">
							</fieldset>
						</div>
					</div>
					<div class="row">
						<div class="col-lg-2">
							<fieldset class="form-group">
								<label class="form-label" >Tipo</label>
								<select class="select2" data-width="100%" ng-model="filtro.IMV_Tipo" ng-required="true">
									<option value="" style="color:red">Selecione</option>
									<option ng-repeat="tipos in dados.tipo" value="{{tipos.IMT_CodigoTipo}}">{{tipos.IMT_Nome}}</option>
								</select>
							</fieldset>
						</div>
						<div class="col-lg-2">
							<fieldset class="form-group">
								<label class="form-label" >Qtd. Banheiros</label>
								<input type="number" ng-model="filtro.IMV_Banheiros" class="form-control">
							</fieldset>
						</div>
						<div class="col-lg-2">
							<fieldset class="form-group">
								<label class="form-label" >Qtd. Suites</label>
								<input type="number" ng-model="filtro.IMV_Suites" class="form-control">
							</fieldset>
						</div>
						<div class="col-lg-2">
							<fieldset class="form-group">
								<label class="form-label">Qtd de Registros</label>
								<input type="number" ng-model="filtro.IMV_Limit" class="form-control" ng-init="filtro.IMV_Limit = 50">
							</fieldset>
						</div>
						<div class="col-lg-2">
							<fieldset class="form-group">
								<label class="form-label" >CEP</label>
								<input type="text" ng-model="filtro.IMV_CEP" mask="99999-999" class="form-control">
							</fieldset>
						</div>
					</div>
					<div class="row">
						<div class="col-lg-2">
							<fieldset class="form-group">
								<button type="button" ng-click="limparFiltro()" class="btn btn-inline btn-warning btn-block">Limpar Filtros</button>
							</fieldset>
						</div>
						<div class="col-lg-2">
							<fieldset class="form-group">
								<button type="button" ng-click="adicionar()" class="btn btn-inline btn-primary btn-block">Adicionar Imóvel</button>
							</fieldset>
						</div>
						<div class="col-lg-2">
							<fieldset class="form-group">
								<button type="button" ng-click="buscar(filtro)" class="btn btn-inline btn-success btn-block">Buscar Imóvel</button>
							</fieldset>
						</div>
						<!-- <div class="col-lg-2">
							<fieldset class="form-group">
								<button type="button" &ng-click="exportData(dados.leads)" disabled="true" class="btn btn-inline btn-info btn-block">Exportar Registros</button>
							</fieldset>
						</div> -->
					</div>
				</div>
			</section>
		</div>

		<div class="container-fluid col-md-12">
			<section class="card">
				<header class="card-header">
					Filtros
					<button ng-click="request()" type="button" class="modal-close">
						<i class="fa fa-refresh fa-2x"></i>
					</button>
				</header>
				<div class="card-block">
					<table id="table-lg" class="table table-bordered table-hover table-lg">
					<thead>
					<tr>
						<th width="1">#</th>
						<th>Titulo</th>
						<th>Estado/Cidade</th>
						<th>Tipo</th>
						<th>Finalidade</th>
						<th>Suites</th>
						<th>Quartos</th>
						<th>Banheiros</th>
						<th>Status</th>
						<th style="">Opção</th>
					</tr>
					</thead>
					<tbody>
					<tr ng-repeat="row in dados.imovel">
						<td>{{row.IMV_CodigoImovel}}</td>
						<td>{{row.IMV_Nome}}</td>
						<td>{{row.IMV_Estado}}/{{row.IMV_Cidade}}</td>
						<td>{{row.IMT_Nome}}</td>
						<td>
							<b ng-if="row.IMV_Finalidade == 1">Venda</b>
							<b ng-if="row.IMV_Finalidade == 2">Locação</b>
							<b ng-if="row.IMV_Finalidade == 3">Temporada</b>
						</td>
						<td class="text-center">{{row.IMV_Suites}}</td>
						<td class="text-center">{{row.IMV_Quartos}}</td>
						<td class="text-center">{{row.IMV_Banheiros}}</td>
						<td>
							<span ng-if="row.IMV_Status == 0" class='label label-danger'>Bloqueado</span>
		          <span ng-if="row.IMV_Status == 1" class='label label-success'>Disponível</span>
		          <span ng-if="row.IMV_Status == 11" class='label label-info'>Vendido</span>
		          <span ng-if="row.IMV_Status == 12" class='label label-warning'>Alugado</span>
						</td>
						<td>
							<div class="btn-group dropup">
								<button type="button" class="btn btn-inline dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
									Opções
								</button>
								<!-- 
									Finalidade{
										1:Venda
										2:Locação
										3:Temporada
									}
									Status{
										0: Bloqueado
										1: Disponivel
										11: Vendido
										12: Alugado
									}
								 -->
								<div class="dropdown-menu">
									<a class="dropdown-item" href="#" ng-click="visualizarImovel(row.IMV_CodigoImovel)"><i class="font-icon font-icon-eye"></i>Visualizar</a>
									<a class="dropdown-item" ng-click="editar(row.IMV_CodigoImovel)" href="#"><i class="font-icon font-icon-pencil"></i>Editar</a>
									<a class="dropdown-item" href="#" ng-click="removerImovel(row.IMV_CodigoImovel)"><i class="font-icon font-icon-trash"></i>Deletar</a>
									<div class="dropdown-divider"></div>

									<!-- Inicio IF Venda -->
									<a class="dropdown-item" href="#" ng-click="setStatusImovel(row.IMV_CodigoImovel, 12)" 
										 ng-if="row.IMV_Finalidade == 1 && row.IMV_Status != 0"> 
										<i class="font-icon font-icon-ok"></i>Marvar como Vendido
									</a>
									<a class="dropdown-item" href="#" ng-click="setStatusImovel(row.IMV_CodigoImovel, 1)" 
										 ng-if="row.IMV_Finalidade == 11 && row.IMV_Status != 0"> 
										<i class="font-icon font-icon-ok"></i>Marcar como Disponível
									</a>
									<!-- FIM IF Venda -->

									<!-- Inicio IF Aluguel -->
									<a class="dropdown-item" href="#" ng-click="setStatusImovel(row.IMV_CodigoImovel, 12)" 
										 ng-if="row.IMV_Finalidade == 2 && row.IMV_Status != 0"> 
										<i class="font-icon font-icon-ok"></i>Marvar como Alugado
									</a>
									<a class="dropdown-item" href="#" ng-click="setStatusImovel(row.IMV_CodigoImovel, 1)" 
										 ng-if="row.IMV_Finalidade == 12 && row.IMV_Status != 0"> 
										<i class="font-icon font-icon-ok"></i>Marcar como Disponível
									</a>
									<!-- FIM IF Aluguel -->

									<a class="dropdown-item" href="#" ng-click="setStatusImovel(row.IMV_CodigoImovel, 0)" ng-if="row.IMV_Status == 1"><i class="font-icon font-icon-del"></i>Bloquear</a>
									<a class="dropdown-item" href="#" ng-click="setStatusImovel(row.IMV_CodigoImovel, 1)" ng-if="row.IMV_Status == 0"><i class="font-icon font-icon-ok"></i>Desbloquear</a>
								</div>
							</div>
						</td>
					</tr>
					</tbody>
				</table>
				</div>
			</section>
		</div>
</div>

<script type="text/ng-template" id="v_adicionarImovel">
    <div class="container-fluid fade in col-md-12">
			<section class="card card-blue-fill">
				<header class="card-header">
					Adicionar um Novo Imóvel
					<button ng-click="closeThisDialog()" type="button" class="modal-close">
						<i class="font-icon-close-2"></i>
					</button>
				</header>
				<div class="card-block">
					<form name="formImovel">
						<div class="row">
							<div class="col-md-12">
								<div class="alert alert-warning alert-fill alert-border-left alert-close alert-dismissible fade in" role="alert">
									<strong>Obs:</strong> Caso você não tenha a informação de alguns dos campos abaixo, basta não preenche-lo.
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-lg-3">
								<fieldset class="form-group">
									<label class="form-label">Titulo<b class="text-danger">*</b></label>
									<input type="text" ng-model="imovel.IMV_Nome" tooltips tooltip-size="small" tooltip-template="Titulo do Imóvel no Site" class="form-control" ng-required="true">
								</fieldset>
							</div>
							<div class="col-lg-2">
								<fieldset class="form-group">
									<label class="form-label">Finalidade <b class="text-danger">*</b></label>
									<select selectpicker data-width="100%" ng-model="imovel.IMV_Finalidade" ng-required="true">
										<option value="" style="color:red">Selecione</option>
										<option value="1">Venda</option>
										<option value="2">Locação</option>
										<option value="3">Temporada</option>
									</select>
								</fieldset>
							</div>
							<div class="col-lg-3">
								<fieldset class="form-group">
									<label class="form-label">Tipo <b class="text-danger">*</b></label>
									<select selectpicker data-width="100%" ng-model="imovel.IMV_Tipo" ng-required="true">
										<option value="" style="color:red">Selecione</option>
										<option ng-repeat="tipo in dados.tipo" value="{{tipo.IMT_CodigoTipo}}">{{tipo.IMT_Nome}}</option>
									</select>
								</fieldset>
							</div>
							<div class="col-lg-2">
								<fieldset class="form-group">
									<label class="form-label">Qtd. Suites<b class="text-danger">*</b></label>
									<input type="number" ng-model="imovel.IMV_Suites" class="form-control">
								</fieldset>
							</div>
							<div class="col-lg-2">
								<fieldset class="form-group">
									<label class="form-label">Qtd. Quartos<b class="text-danger">*</b></label>
									<input type="number" ng-model="imovel.IMV_Quartos" class="form-control" tooltips tooltip-size="small" tooltip-template="Quantidade de quartos sem contar com as Suítes">
								</fieldset>
							</div>
						</div>
						<div class="row">
							<div class="col-lg-2">
								<fieldset class="form-group">
									<label class="form-label">Qtd. Banheiros<b class="text-danger">*</b></label>
									<input type="number" ng-model="imovel.IMV_Banheiros" class="form-control">
								</fieldset>
							</div>
							<div class="col-lg-2">
								<fieldset class="form-group">
									<label class="form-label">Área Útil(M²)<b class="text-danger">*</b></label>
									<input type="number" ng-model="imovel.IMV_AreaUtil" class="form-control">
								</fieldset>
							</div>
							<div class="col-lg-2">
								<fieldset class="form-group">
									<label class="form-label">Área Construída(M²)<b class="text-danger">*</b></label>
									<input type="number" ng-model="imovel.IMV_AreaConstruida" class="form-control">
								</fieldset>
							</div>
							<div class="col-lg-2">
								<fieldset class="form-group">
									<label class="form-label">Valor Aluguel<b class="text-danger">*</b></label>
									<input type="text" ng-disabled="imovel.IMV_Finalidade == 1 || imovel.IMV_Finalidade == 3 " ng-model="imovel.IMV_ValorAluguel" real-time-currency class="form-control">
								</fieldset>
							</div>
							<div class="col-lg-2">
								<fieldset class="form-group">
									<label class="form-label">Valor Venda<b class="text-danger">*</b></label>
									<input type="text" ng-disabled="imovel.IMV_Finalidade == 2 || imovel.IMV_Finalidade == 3 " ng-model="imovel.IMV_ValorCompra" real-time-currency class="form-control">
								</fieldset>
							</div>
							<div class="col-lg-2">
								<fieldset class="form-group">
									<label class="form-label">Valor Temporada<b class="text-danger">*</b></label>
									<input type="text" ng-disabled="imovel.IMV_Finalidade == 1 || imovel.IMV_Finalidade == 2 " ng-model="imovel.IMV_ValorTemporada" real-time-currency class="form-control">
								</fieldset>
							</div>
						</div>
						<div class="row">
							<div class="col-lg-2">
								<fieldset class="form-group">
									<label class="form-label">&nbsp;</label>
									<div class="checkbox-toggle" tooltips tooltip-size="small" tooltip-template="Caso exista Condomínio a ser pago">
										<input type="checkbox" ng-model="imovel.IMV_MetaDados.Condominio" id="check-toggle-1" checked="checked">
										<label for="check-toggle-1">Condomínio</label>
									</div>
								</fieldset>
							</div>
							<div class="col-lg-2">
								<fieldset class="form-group">
									<label class="form-label">Valor Condominio (Mês)<b class="text-danger">*</b></label>
									<input type="text" ng-model="imovel.IMV_ValorCondominio" ng-disabled="!imovel.IMV_MetaDados.Condominio" real-time-currency class="form-control">
								</fieldset>
							</div>
							<div class="col-lg-2">
								<fieldset class="form-group">
									<label class="form-label">Valor IPTU (Mês)<b class="text-danger">*</b></label>
									<input type="text" ng-model="imovel.IMV_ValorIPTU" real-time-currency class="form-control">
								</fieldset>
							</div>
							<div class="col-lg-2">
								<fieldset class="form-group">
									<label class="form-label">CEP<b class="text-danger">*</b></label>
									<input type="text" mask="99999-999" ng-model="imovel.IMV_CEP" ng-change="buscaCEP(imovel.IMV_CEP)" class="form-control">
								</fieldset>
							</div>
							<div class="col-lg-2">
								<fieldset class="form-group">
									<label class="form-label">Estado<b class="text-danger">*</b></label>
									<input type="text" ng-disabled="loadCEP" ng-model="imovel.IMV_Estado" class="form-control" ng-required="true">
								</fieldset>
							</div>
							<div class="col-lg-2">
								<fieldset class="form-group">
									<label class="form-label">Cidade<b class="text-danger">*</b></label>
									<input type="text" ng-disabled="loadCEP" ng-model="imovel.IMV_Cidade" class="form-control" ng-required="true">
								</fieldset>
							</div>
						</div>
						<div class="row">
							<div class="col-lg-3">
								<fieldset class="form-group">
									<label class="form-label">Bairro<b class="text-danger">*</b></label>
									<input type="text" ng-model="imovel.IMV_Bairro" class="form-control" ng-required="true">
								</fieldset>
							</div>
							<div class="col-lg-3">
								<fieldset class="form-group">
									<label class="form-label">Rua<b class="text-danger">*</b></label>
									<input type="text" ng-model="imovel.IMV_Rua" class="form-control" ng-required="true">
								</fieldset>
							</div>
							<div class="col-lg-1">
								<fieldset class="form-group">
									<label class="form-label">Número<b class="text-danger">*</b></label>
									<input type="text" ng-model="imovel.IMV_Numero" class="form-control">
								</fieldset>
							</div>
							<div class="col-lg-2">
								<fieldset class="form-group">
									<label class="form-label">Referência<b class="text-danger">*</b></label>
									<input type="text" ng-model="imovel.IMV_Referencia" class="form-control">
								</fieldset>
							</div>
							<div class="col-lg-3">
								<fieldset class="form-group">
									<label class="form-label">&nbsp;</label>
									<div class="checkbox-toggle" tooltips tooltip-size="small" tooltip-template="Deixar o preço deste imóvel visível no site">
										<input type="checkbox" ng-model="imovel.IMV_MetaDados.MostrarPreco" id="check-toggle-2" checked="">
										<label for="check-toggle-2">Mostrar preço no site</label>
									</div>
								</fieldset>
							</div>
						</div>
						
						<div class="row">
							<div class="col-lg-12">
								<fieldset class="form-group">
									<label class="form-label">Descrição do Imóvel<b class="text-danger">*</b></label>
									<textarea ng-model="imovel.IMV_Descricao" class="form-control" ng-required="true" rows="4" tooltips tooltip-size="small" tooltip-template="Faça uma descrição do imóvel tentando detalha-lo o máximo possível"></textarea>
								</fieldset>
							</div>
						</div>
						<div class="row">
							<div class="col-lg-12">
								<fieldset class="form-group" tooltips tooltip-size="small" tooltip-template="Informe alguns detalhes adicionais do imóvel como por ex: Ampla Varanda. Sempre separando por virgulas">
											<label class="form-label">Destaques do Imóvel</label>
											<tags-input placeholder="Adicione um item e pressione TAB ou virgula" 
																	ng-model="imovel.IMV_Caracteristicas" 
																	replace-spaces-with-dashes="false">
									      <auto-complete></auto-complete>
									    </tags-input>
										</fieldset>
							</div>
						</div>
						<div class="row" ng-if="!edit || newImages">
							<div class="col-md-12">
								<fieldset class="form-group">
									 <h5 class="m-t-lg with-border m-t-0">Imagens</h5>
								</fieldset>
								<fieldset class="form-group">
								 <span class="btn btn-rounded btn-file">
					          <span>Selecionar Imagens</span>
					          <input type="file" nv-file-select="" uploader="uploader" multiple />
					        </span>
								</fieldset>
								<div style="margin-bottom: 40px">
								  <table class="table">
								    <thead>
								      <tr>
								        <th width="50%">Imagem</th>
								        <th ng-show="uploader.isHTML5">Tamanho</th>
								        <th ng-show="uploader.isHTML5">Progresso</th>
								        <th>Status</th>
								        <th>Ações</th>
								      </tr>
								    </thead>
								    <tbody>
								      <tr ng-repeat="item in uploader.queue">
								        <td>
								          <div ng-show="uploader.isHTML5" ng-thumb="{ file: item._file, width: 100}"></div>
								        </td>
								        <td ng-show="uploader.isHTML5" nowrap>{{ item.file.size/1024/1024|number:2 }} MB</td>
								        <td ng-show="uploader.isHTML5">
								          <div class="progress" style="margin-bottom: 0;">
								            <div class="progress-bar" role="progressbar" ng-style="{ 'width': item.progress + '%' }"></div>
								          </div>
								        </td>
								        <td class="text-center">
								          <span ng-show="item.isSuccess"><i class="glyphicon glyphicon-ok"></i></span>
								          <span ng-show="item.isCancel"><i class="glyphicon glyphicon-ban-circle"></i></span>
								          <span ng-show="item.isError"><i class="glyphicon glyphicon-remove"></i></span>
								        </td>
								        <td nowrap>
								          <button type="button" class="btn btn-success btn-xs" ng-click="item.upload()" ng-disabled="item.isReady || item.isUploading || item.isSuccess">
								            <span class="glyphicon glyphicon-upload"></span> Enviar
								          </button>
								          <button type="button" class="btn btn-warning btn-xs" ng-click="item.cancel()" ng-disabled="!item.isUploading">
								            <span class="glyphicon glyphicon-ban-circle"></span> Cancelar
								          </button>
								          <button type="button" class="btn btn-danger btn-xs" ng-click="item.remove()">
								            <span class="glyphicon glyphicon-trash"></span> Remover
								          </button>
								        </td>
								      </tr>
								    </tbody>
								  </table>
								</div>
							</div>
						</div>
						<div class="row" ng-if="edit">
							<section class="box-typical box-typical-full-height-with-header">
								<header class="box-typical-header box-typical-header-bordered">
									<div class="tbl-row">
										<div class="tbl-cell tbl-cell-title">
											<h3>Galeria de Imagens</h3>
										</div>
									</div>
								</header>
								<div class="box-typical-body">
									<div class="gallery-grid">

										<div class="gallery-col" ng-repeat="galery in imagens">
											<article class="gallery-item">
												<img class="gallery-picture" src="<?=base_url('assets/image/imoveis/')?>/{{galery.IMG_Imagem}}" alt="" height="158">
												<div class="gallery-hover-layout">
													<div class="gallery-hover-layout-in">
														<p class="gallery-item-title">&nbsp;</p>
														<p>&nbsp;</p>
														<div class="btn-group">
															<button type="button" class="btn" ng-click="visualizarImagemGaleria(galery.IMG_Imagem)">
																<i class="font-icon font-icon-eye"></i>
															</button>
															<button type="button" class="btn" ng-click="removerImagemGaleria(galery.IMG_CodigoImagem)">
																<i class="font-icon font-icon-trash"></i>
															</button>
														</div>
														<p>&nbsp;</p>
													</div>
												</div>
											</article>
										</div><!--.gallery-col-->
									</div><!--.gallery-grid-->
								</div><!--.box-typical-body-->
							</section>
							<div class="row">
								<div class="col-md-12">
									<button type="button" class="btn btn-block" ng-click="setNewImages()">
			            <span class="glyphicon glyphicon-upload"></span> Enviar novas Imagens
			          </button>
								</div>
							</div>
						</div>
					</form>
				</div>
				<footer class="card-footer text-center">
				<div class="row">
					<div class="col-lg-8"></div>
						<div class="col-lg-2">
							<fieldset class="form-group">
								<button type="button" ng-click="closeThisDialog()" class="btn btn-inline btn-danger btn-block">Cancelar</button>
							</fieldset>
						</div>
						<div class="col-lg-2">
							<fieldset class="form-group">
								<button type="button" ng-disabled="formImovel.$invalid" ng-click="confirm(imovel)" class="btn btn-inline btn-success btn-block">Salvar</button>
							</fieldset>
						</div>
					</div>
				</footer>
			</section>
		</div>
</script>

<script type="text/ng-template" id="v_visualizarImovel">
    <div class="container-fluid fade in col-md-12">
			<section class="card card-blue-fill">
				<header class="card-header">
					Visualizar Imóvel
					<button ng-click="closeThisDialog()" type="button" class="modal-close">
						<i class="font-icon-close-2"></i>
					</button>
				</header>
				<div class="card-block">
					<form name="formImovel">
						<div class="row">
						</div>
						<div class="row">
							<div class="col-lg-3">
								<fieldset class="form-group">
									<label class="form-label">Titulo<b class="text-danger">*</b></label>
									<input type="text" ng-model="detalhe.IMV_Nome" ng-disabled="true" class="form-control">
								</fieldset>
							</div>
							<div class="col-lg-2">
								<fieldset class="form-group">
									<label class="form-label">Finalidade <b class="text-danger">*</b></label>
									<select selectpicker data-width="100%" ng-model="detalhe.IMV_Finalidade" ng-required="true" ng-disabled="true">
										<option value="" style="color:red">Selecione</option>
										<option value="1">Venda</option>
										<option value="2">Locação</option>
										<option value="3">Temporada</option>
									</select>
								</fieldset>
							</div>
							<div class="col-lg-3">
								<fieldset class="form-group">
									<label class="form-label">Tipo <b class="text-danger">*</b></label>
									<select selectpicker data-width="100%" ng-model="detalhe.IMV_Tipo" ng-required="true" ng-disabled="true">
										<option value="" style="color:red">Selecione</option>
										<option ng-repeat="tipo in dados.tipo" value="{{tipo.IMT_CodigoTipo}}">{{tipo.IMT_Nome}}</option>
									</select>
								</fieldset>
							</div>
							<div class="col-lg-2">
								<fieldset class="form-group">
									<label class="form-label">Qtd. Suites<b class="text-danger">*</b></label>
									<input type="number" ng-model="detalhe.IMV_Suites" class="form-control" ng-disabled="true">
								</fieldset>
							</div>
							<div class="col-lg-2">
								<fieldset class="form-group">
									<label class="form-label">Qtd. Quartos<b class="text-danger">*</b></label>
									<input type="number" ng-model="detalhe.IMV_Quartos" class="form-control" ng-disabled="true">
								</fieldset>
							</div>
						</div>
						<div class="row">
							<div class="col-lg-2">
								<fieldset class="form-group">
									<label class="form-label">Qtd. Banheiros<b class="text-danger">*</b></label>
									<input type="number" ng-model="detalhe.IMV_Banheiros" class="form-control" ng-disabled="true">
								</fieldset>
							</div>
							<div class="col-lg-2">
								<fieldset class="form-group">
									<label class="form-label">Área Útil(M²)<b class="text-danger">*</b></label>
									<input type="number" ng-model="detalhe.IMV_AreaUtil" class="form-control" ng-disabled="true">
								</fieldset>
							</div>
							<div class="col-lg-2">
								<fieldset class="form-group">
									<label class="form-label">Área Construída(M²)<b class="text-danger">*</b></label>
									<input type="number" ng-model="detalhe.IMV_AreaConstruida" class="form-control" ng-disabled="true">
								</fieldset>
							</div>
							<div class="col-lg-2">
								<fieldset class="form-group">
									<label class="form-label">Valor Aluguel<b class="text-danger">*</b></label>
									<input type="text" ng-model="detalhe.IMV_ValorAluguel" real-time-currency class="form-control" ng-disabled="true">
								</fieldset>
							</div>
							<div class="col-lg-2">
								<fieldset class="form-group">
									<label class="form-label">Valor Venda<b class="text-danger">*</b></label>
									<input type="text" ng-model="detalhe.IMV_ValorCompra" real-time-currency class="form-control" ng-disabled="true">
								</fieldset>
							</div>
							<div class="col-lg-2">
								<fieldset class="form-group">
									<label class="form-label">Valor Temporada<b class="text-danger">*</b></label>
									<input type="text" ng-model="detalhe.IMV_ValorTemporada" real-time-currency class="form-control" ng-disabled="true">
								</fieldset>
							</div>
						</div>
						<div class="row">
							<div class="col-lg-2">
								<fieldset class="form-group">
									<label class="form-label">&nbsp;</label>
									<div class="checkbox-toggle" tooltips tooltip-size="small" tooltip-template="Caso exista Condomínio a ser pago">
										<input type="checkbox" ng-model="detalhe.IMV_MetaDados.Condominio" id="check-toggle-1" checked="checked" ng-disabled="true">
										<label for="check-toggle-1">Condomínio</label>
									</div>
								</fieldset>
							</div>
							<div class="col-lg-2">
								<fieldset class="form-group">
									<label class="form-label">Valor Condominio (Mês)<b class="text-danger">*</b></label>
									<input type="text" ng-model="detalhe.IMV_ValorCondominio" real-time-currency class="form-control" ng-disabled="true">
								</fieldset>
							</div>
							<div class="col-lg-2">
								<fieldset class="form-group">
									<label class="form-label">Valor IPTU (Mês)<b class="text-danger">*</b></label>
									<input type="text" ng-model="detalhe.IMV_ValorIPTU" real-time-currency class="form-control" ng-disabled="true">
								</fieldset>
							</div>
							<div class="col-lg-2">
								<fieldset class="form-group">
									<label class="form-label">CEP<b class="text-danger">*</b></label>
									<input type="text" mask="99999-999" ng-model="detalhe.IMV_CEP" ng-change="buscaCEP(detalhe.IMV_CEP)" class="form-control" ng-disabled="true">
								</fieldset>
							</div>
							<div class="col-lg-2">
								<fieldset class="form-group">
									<label class="form-label">Estado<b class="text-danger">*</b></label>
									<input type="text" ng-model="detalhe.IMV_Estado" class="form-control" ng-required="true" ng-disabled="true">
								</fieldset>
							</div>
							<div class="col-lg-2">
								<fieldset class="form-group">
									<label class="form-label">Cidade<b class="text-danger">*</b></label>
									<input type="text" ng-model="detalhe.IMV_Cidade" class="form-control" ng-required="true" ng-disabled="true">
								</fieldset>
							</div>
						</div>
						<div class="row">
							<div class="col-lg-3">
								<fieldset class="form-group">
									<label class="form-label">Rua<b class="text-danger">*</b></label>
									<input type="text" ng-model="detalhe.IMV_Rua" class="form-control" ng-required="true" ng-disabled="true">
								</fieldset>
							</div>
							<div class="col-lg-3">
								<fieldset class="form-group">
									<label class="form-label">Bairro<b class="text-danger">*</b></label>
									<input type="text" ng-model="detalhe.IMV_Bairro" class="form-control" ng-required="true" ng-disabled="true">
								</fieldset>
							</div>
							<div class="col-lg-1">
								<fieldset class="form-group">
									<label class="form-label">Número<b class="text-danger">*</b></label>
									<input type="text" ng-model="detalhe.IMV_Numero" class="form-control" ng-disabled="true">
								</fieldset>
							</div>
							<div class="col-lg-2">
								<fieldset class="form-group">
									<label class="form-label">Referência<b class="text-danger">*</b></label>
									<input type="text" ng-model="detalhe.IMV_Referencia" class="form-control" ng-disabled="true">
								</fieldset>
							</div>
							<div class="col-lg-3">
								<fieldset class="form-group">
									<label class="form-label">&nbsp;</label>
									<div class="checkbox-toggle" tooltips tooltip-size="small" tooltip-template="Deixar o preço deste imóvel visível no site">
										<input type="checkbox" ng-model="detalhe.IMV_MetaDados.MostrarPreco" id="check-toggle-2" checked="" ng-disabled="true">
										<label for="check-toggle-2">Mostrar preço no site</label>
									</div>
								</fieldset>
							</div>
						</div>
						
						<div class="row">
							<div class="col-lg-12">
								<fieldset class="form-group">
									<label class="form-label">Descrição do Imóvel<b class="text-danger">*</b></label>
									<textarea ng-model="detalhe.IMV_Descricao" class="form-control" ng-required="true" rows="4" ng-disabled="true"></textarea>
								</fieldset>
							</div>
						</div>
						<div class="row">
							<div class="col-lg-12">
								<fieldset class="form-group" tooltips tooltip-size="small" tooltip-template="Informe alguns detalhes adicionais do imóvel como por ex: Ampla Varanda. Sempre separando por virgulas">
											<label class="form-label">Destaques do Imóvel</label>
											<tags-input placeholder="Adicione um item e pressione TAB ou virgula" 
																	ng-model="detalhe.IMV_Caracteristicas" 
																	replace-spaces-with-dashes="false" ng-disabled="true">
									      <auto-complete></auto-complete>
									    </tags-input>
										</fieldset>
							</div>
						</div>
						<div class="row">
							<div class="col-md-12">
								<section class="box-typical box-typical-full-height-with-header">
									<header class="box-typical-header box-typical-header-bordered">
										<div class="tbl-row">
											<div class="tbl-cell tbl-cell-title">
												<h3>Galeria de Imagens</h3>
											</div>
										</div>
									</header>
									<div class="box-typical-body">
										<div class="gallery-grid">

											<div class="gallery-col" ng-repeat="galery in detalheImagens">
												<article class="gallery-item">
													<img class="gallery-picture" src="<?=base_url('assets/image/imoveis/')?>/{{galery.IMG_Imagem}}" alt="" height="158">
													<div class="gallery-hover-layout">
														<div class="gallery-hover-layout-in">
															<p class="gallery-item-title">&nbsp;</p>
															<p>&nbsp;</p>
															<div class="btn-group">
																<button type="button" class="btn" ng-click="visualizarImagemGaleria(galery.IMG_Imagem)">
																	<i class="font-icon font-icon-eye"></i>
																</button>
																<!-- <button type="button" class="btn" ng-click="removerImagemGaleria(galery.IMG_CodigoImagem)">
																	<i class="font-icon font-icon-trash"></i>
																</button> -->
															</div>
															<p>&nbsp;</p>
														</div>
													</div>
												</article>
											</div><!--.gallery-col-->
										</div><!--.gallery-grid-->
									</div><!--.box-typical-body-->
								</section>
							</div>
						</div>
						<div class="row">
							<div class="col-md-12">
								<section class="tabs-section">
									<div class="tabs-section-nav tabs-section-nav-icons">
										<div class="tbl">
											<ul class="nav" role="tablist">
												<li class="nav-item">
													<a class="nav-link active" ng-click="setMapa(1)" href="#tabs-1-tab-1" role="tab" data-toggle="tab" aria-expanded="false">
														<span class="nav-link-in">
															<i class="font-icon font-icon-pin-2"></i>
															Mapa
														</span>
													</a>
												</li>
												<li class="nav-item">
													<a class="nav-link" ng-click="setMapa(2)" href="#tabs-1-tab-2" role="tab" data-toggle="tab" aria-expanded="false">
														<span class="nav-link-in">
															<span class="font-icon font-icon-eye"></span>
															Visão da Rua
														</span>
													</a>
												</li>
											</ul>
										</div>
									</div><!--.tabs-section-nav-->

									<div class="tab-content">
										<div role="tabpanel" class="tab-pane fade in active" id="tabs-1-tab-1" aria-expanded="false">
											<section class="box-typical box-typical-full-height-with-header">
												<header class="box-typical-header box-typical-header-bordered">
													<div class="tbl-row">
														<div class="tbl-cell tbl-cell-title">
															<h3>Geo Localização</h3>
														</div>
													</div>
												</header>
												<div class="box-typical-body">
													<ng-map ng-if="mapaDefault" center="[{{detalhe.IMV_MetaDados.Geo.results['0'].geometry.location.lat}}, {{detalhe.IMV_MetaDados.Geo.results['0'].geometry.location.lng}}]" default-style="false" style="height: 300px;">
														<marker position="[{{detalhe.IMV_MetaDados.Geo.results['0'].geometry.location.lat}}, {{detalhe.IMV_MetaDados.Geo.results['0'].geometry.location.lng}}]" title="how" animation="Animation.BOUNCE"></marker>
													</ng-map>
												</div><!--.box-typical-body-->
											</section>
										</div><!--.tab-pane-->
										<div role="tabpanel" class="tab-pane fade" id="tabs-1-tab-2" aria-expanded="false">
											<section class="box-typical box-typical-full-height-with-header">
												<header class="box-typical-header box-typical-header-bordered">
													<div class="tbl-row">
														<div class="tbl-cell tbl-cell-title">
															<h3>Geo Localização</h3>
														</div>
													</div>
												</header>
												<div class="box-typical-body">
													<ng-map ng-if="mapaStreet" zoom="20" center="{{detalhe.IMV_MetaDados.Geo.results['0'].geometry.location.lat}}, {{detalhe.IMV_MetaDados.Geo.results['0'].geometry.location.lng}}" >
												    <marker position="{{detalhe.IMV_MetaDados.Geo.results['0'].geometry.location.lat}}, {{detalhe.IMV_MetaDados.Geo.results['0'].geometry.location.lng}}"></marker>
												    <street-view-panorama
												      click-to-go="false"
												      disable-default-u-i="false"
												      disable-double-click-zoom="false"
												      position="{{detalhe.IMV_MetaDados.Geo.results['0'].geometry.location.lat}}, {{detalhe.IMV_MetaDados.Geo.results['0'].geometry.location.lng}}"
												      pov="{heading: 90, pitch: 0}"
												      scrollwheel="false"
												      enable-close-button="true"
												      visible="true">
												    </street-view-panorama>
												  </ng-map>
												</div><!--.box-typical-body-->
											</section>
										</div><!--.tab-pane-->
									</div><!--.tab-content-->
								</section>
							</div>
						</div>
					</form>
				</div>
				<footer class="card-footer text-center">
				<div class="row">
					<div class="col-lg-8"></div>
						<div class="col-lg-2">
							&nbsp;
						</div>
						<div class="col-lg-2">
							<fieldset class="form-group">
								<button type="button" ng-click="closeThisDialog()" class="btn btn-inline btn-block">Fechar</button>
							</fieldset>
						</div>
					</div>
				</footer>
			</section>
		</div>
</script>

<script type="text/ng-template" id="v_imagemGaleria">
  <div class="container-fluid fade in col-md-12">
		<section class="card card-blue-fill">
			<header class="card-header">
				Imagem
				<button ng-click="closeThisDialog()" type="button" class="modal-close">
					<i class="font-icon-close-2"></i>
				</button>
			</header>
			<div class="card-block">
				<div class="thumbnail">
		      <img src="<?=base_url('assets/image/imoveis/')?>/{{galeria}}" alt="Lights" style="width:100%">
		    </div>
			</div>
		</section>
	</div>
</script>


<script type="text/ng-template" id="v_alert">
	<section class="card card-orange-fill">
		<header class="card-header">
			Atenção
			<button ng-click="closeThisDialog()" type="button" class="modal-close">
				<i class="font-icon-close-2"></i>
			</button>
		</header>
		<div class="card-block">
			<p>{{alertText}}</p>
			<div class="row">
				<div class="col-lg-6">
					<fieldset class="form-group">
						<button type="button" ng-click="closeThisDialog()" class="btn btn-inline btn-danger btn-block">Não</button>
					</fieldset>
				</div>
				<div class="col-lg-6">
					<fieldset class="form-group">
						<button type="button" ng-click="confirm(1)" class="btn btn-inline btn-success btn-block">Sim</button>
					</fieldset>
				</div>
			</div>
		</div>
	</section>
</script>