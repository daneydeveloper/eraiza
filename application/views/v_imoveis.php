<div class="rle_pagetitle_wrapper rle_toppadder40 rle_bottompadder40">
   <div class="container">
      <div class="row">
         <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="page_title">
               <h2>Imóveis</h2>
            </div>
            <ul class="breadcrumb">
               <li><a href="<?= base_url('home')?>"><i class="fa fa-home" aria-hidden="true"></i> home</a>
               </li>
               <li><i class="fa fa-angle-right" aria-hidden="true"></i>
               </li>
               <li><a href="<?= base_url('home/verImoveis')?>">Imóveis</a>
               </li>
            </ul>
         </div>
      </div>
   </div>
</div>
<!-- Property Wrapper start -->
<div class="rle_property_wrapper rle_bottompadder70">
   <div class="container">
      <div class="row">
         <!-- <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="rle_shorting_wrapper">
               <div class="row">
                  <div class="col-lg-6 col-md-6 col-sm-7 col-xs-12">
                     <ul class="rle_short_by">
                        <li>
                           <span>Ordenar</span>
                           <select>
                              <option value="2">Menor Preço</option>
                              <option value="3">Maior Preço</option>
                           </select>
                        </li>
                     </ul>
                  </div>
               </div>
            </div>
         </div> -->
         <div class="clearfix"></div>
         <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
            <div class="row">
               <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                  <?php foreach($imoveis as $imovel): ?>
	                  <div class="rle_property_infobox">
	                     <div class="row">
	                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
	                           <div class="rle_property_infobox_img">
	                              <a href="<?= base_url('home/verImovel/'.$imovel->IMV_URL)?>"><img src="<?=$imovel->IMG_Path.'/'.$imovel->IMG_Imagem?>" alt="" title=""></a>
	                              <?php if($imovel->IMV_Finalidade == 2): ?>
	                              <span><sup>R$</sup><?= number_format("$imovel->IMV_ValorAluguel",2,",",".")?></span>
	                              <?php elseif ($imovel->IMV_Finalidade == 1): ?>
	                              <span><sup>R$</sup><?= number_format("$imovel->IMV_ValorCompra",2,",",".")?></span>
	                              <?php elseif ($imovel->IMV_Finalidade == 3): ?>
	                              <span><sup>R$</sup><?= number_format("$imovel->IMV_ValorTemporada",2,",",".")?></span>
	                              <?php endif ?>
	                           </div>
	                        </div>
	                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
	                           <div class="rle_property_infobox_details">
	                              <div class="rle_property_infobox_details_header">
	                                 <ul>
	                                    <?php if($imovel->IMV_Finalidade == 2): ?>
	                                    <li class="rle_green_clr">Aluguel</li>
	                                    <?php elseif ($imovel->IMV_Finalidade == 1): ?>
	                                    <li class="rle_red_clr">Venda</li>
	                                    <?php elseif ($imovel->IMV_Finalidade == 3): ?>
	                                    <li class="rle_black_clr">Temporada</li>
	                                    <?php endif ?>
	                                 </ul>
	                                 <h3><a href="<?= base_url('home/verImovel/'.$imovel->IMV_URL)?>"><?=$imovel->IMV_Nome ?></a></h3>
	                                 <p><?=$imovel->IMV_Rua?>, <?=$imovel->IMV_Numero?>, <?=$imovel->IMV_Cidade?>, <?=$imovel->IMV_Estado?></p>
	                                 <!-- <span><?=$imovel->IMV_Descricao?></span> -->
	                              </div>
                              	<div class="rle_property_infobox_details_footer">
	                                 <p>Área:&nbsp <?=$imovel->IMV_AreaUtil?>m² </p>
	                                 <p>Tipo do Imóvel:&nbsp <?= $imovel->IMT_Nome ?></p>
	                                 <ul>
	                                    <li><i class="fa fa-bed" aria-hidden="true"></i>
	                                       <?=$imovel->IMV_Quartos?></li>
	                                    <li><i class="fa fa-bath" aria-hidden="true"></i>
	                                       <?=$imovel->IMV_Banheiros?></li>
	                                 </ul>
	                              </div>
	                           </div>
	                        </div>
	                     </div>
	                  </div>
                  <?php endforeach ?>
               </div>
            </div>
         </div>
        	<form method="GET" action="<?= base_url('home/buscarImoveis')?>">
	         <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
	            <div class="sidebar_wrapper blog_sidebaar">
	               <aside class="widget widget_search_property">
	                  <h4 class="widget-title">Procurar Imóvel</h4>
	                  <div class="rle_searchform_box style_3">
	                     <div class="row">
	                     	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
	                           <select name="IMV_Finalidade">
	                              <option value="" >Finalidade</option>
	                              <option value="2">Locação</option>
	                              <option value="1">Venda</option>
	                              <option value="3">Temporada</option>
	                           </select>
	                        </div>
	                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
	                           <select name="IMT_CodigoTipo">
	                              <option value="" >Tipo</option>
	                              <?php foreach ($tipo as $key): ?>
	                              	<option value="<?=$key->IMT_CodigoTipo?>"><?=$key->IMT_Nome?></option>
	                              <?php endforeach ?>
	                           </select>
	                        </div>
	                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
	                           <select name="IMV_Estado">
	                              <option value="" >Estado</option>
	                              <?php foreach ($estados as $key): ?>
	                              	<option value="<?= $key->IMV_Estado ?>"><?= $key->IMV_Estado ?></option>
	                              <?php endforeach ?>
	                           </select>
	                        </div>
	                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
	                           <select name="IMV_Cidade">
	                              <option value="" >Cidade</option>
	                              <?php foreach ($cidades as $key): ?>
	                              	<option value="<?= $key->IMV_Cidade ?>"><?= $key->IMV_Cidade ?></option>
	                              <?php endforeach ?>
	                           </select>
	                        </div>
	                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
	                           <select name="IMV_Bairro">
	                              <option value="" >Bairro</option>
	                              <?php foreach ($bairros as $key): ?>
	                              	<option value="<?= $key->IMV_Bairro ?>"><?= $key->IMV_Bairro ?></option>
	                              <?php endforeach ?>
	                           </select>
	                        </div>
	                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
	                           <select name="IMV_Quartos">
	                              <option value="" >Quartos</option>
	                              <?php foreach ($quartos as $key): ?>
	                              	<option value="<?= $key->IMV_Quartos ?>"><?= $key->IMV_Quartos ?></option>
	                              <?php endforeach ?>
	                           </select>
	                        </div>
	                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
	                           <select name="IMV_Banheiros">
	                              <option value="" >Banheiros</option>
	                              <?php foreach ($banheiros as $key): ?>
	                              	<option value="<?= $key->IMV_Banheiros ?>"><?= $key->IMV_Banheiros ?></option>
	                              <?php endforeach ?>
	                           </select>
	                        </div>
	                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
	                           <button type="submit" class="rle_btn">Procurar</button>
	                        </div>
	                     </div>
	                  </div>
	               </aside>
	            </div>
	         </div>
	      </form>
      </div>
   </div>
</div>