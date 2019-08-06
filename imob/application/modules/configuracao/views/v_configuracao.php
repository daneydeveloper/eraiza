<div class="page-content" ng-controller="Configuracao">
		<div class="container-fluid col-md-12">
			<section class="card">
				<header class="card-header">
					Configurações
				</header>
				<div class="card-block">
					<div class="row">
						<div class="col-lg-3">
							<fieldset class="form-group">
								<label class="form-label" >Nome Empresa</label>
								<input type="text" ng-model="config.CON_NomeEmpresa"  class="form-control" ng-disabled="!edit">
							</fieldset>
						</div>
						<div class="col-lg-3">
							<fieldset class="form-group">
								<label class="form-label" >Email para Contato</label>
								<input type="text" ng-model="config.CON_EmailContato"  class="form-control" ng-disabled="!edit">
							</fieldset>
						</div>
						<div class="col-lg-3">
							<fieldset class="form-group">
								<label class="form-label" >Telefone para Contato</label>
								<input type="text" ng-model="config.CON_TelefoneContato"  class="form-control" ng-disabled="!edit">
							</fieldset>
						</div>
						<div class="col-lg-3">
							<fieldset class="form-group">
								<label class="form-label" >URL para acesso á API</label>
								<input type="text" ng-model="config.CON_URL"  class="form-control" ng-disabled="true">
							</fieldset>
						</div>
					</div>
					<div class="row">
						<div class="col-lg-6">
							<fieldset class="form-group">
								<label class="form-label" >Chave de Acesso para API</label>
								<input type="text" ng-model="config.CON_Key"  class="form-control" ng-disabled="true">
							</fieldset>
						</div>
					</div>
					<div class="row" ng-if="!edit">
						<div class="col-lg-4">
							<fieldset class="form-group">
								<label class="form-label" >Logo</label>
								<div class="thumbnail">
						      <img src="<?=base_url('assets/image/imoveis')?>/{{config.CON_Logo}}" alt="Nature" style="width:100%">
						    </div>
								<!-- <div class="gallery-grid">
									<div class="gallery-col">
										<article class="gallery-item" style="height: 158px;">
											<img class="gallery-picture" src="" alt="" height="158">
											<div class="gallery-hover-layout">
												<div class="gallery-hover-layout-in">
													<p class="gallery-item-title">The boxed castle</p>
													<p>by Alban Wamigo</p>
													<div class="btn-group">
														<button type="button" class="btn">
															<i class="font-icon font-icon-cloud"></i>
														</button>
														<button type="button" class="btn">
															<i class="font-icon font-icon-trash"></i>
														</button>
													</div>
													<p>3 days ago</p>
												</div>
											</div>
										</article>
									</div>
								</div> -->
							</fieldset>
						</div>
					</div>
					<div class="row" ng-if="edit">
						<div class="col-md-12">
							<fieldset class="form-group">
								 <h5 class="m-t-lg with-border m-t-0">Logo da Empresa</h5>
							</fieldset>
							<fieldset class="form-group">
							 <span class="btn btn-rounded btn-file">
				          <span>Selecionar Imagem</span>
				          <input type="file" nv-file-select="" uploader="uploader"/>
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
				</div>
				<footer class="card-footer text-center">
				<div class="row">
					<div class="col-lg-8"></div>
						<div class="col-lg-2">
							<fieldset class="form-group">
								<button type="button"  ng-if="edit" ng-click="editar()" class="btn btn-inline btn-danger btn-block">Cancelar</button>
							</fieldset>
						</div>
						<div class="col-lg-2" ng-if="!edit">
							<fieldset class="form-group">
								<button type="button" ng-disabled="formImovel.$invalid" ng-click="editar()" class="btn btn-inline btn-info btn-block">Editar</button>
							</fieldset>
						</div>
						<div class="col-lg-2" ng-if="edit">
							<fieldset class="form-group">
								<button type="button" ng-disabled="formImovel.$invalid" ng-click="salvar(config)" class="btn btn-inline btn-success btn-block">Salvar</button>
							</fieldset>
						</div>
					</div>
				</footer>
			</section>
	</div>
</div>