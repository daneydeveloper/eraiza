<?php
defined('BASEPATH') OR exit('No direct script access allowed');
include(APPPATH . '/controllers/Evo_Basic.php');

class VivaReal extends CI_Controller {

	public function index(){
			$query['imobiliaria'] = $this->db->from('configuracao')
																		->get()
																			->first_row();
			$query['imoveis'] = $this->db->from('imovel')
																	 ->join('imovel_tipo', 'IMT_CodigoTipo = IMV_Tipo')
																	 ->where('IMV_Status = 1', NULL)
																	 ->get()
																	 ->result();
			if ($query['imoveis']) {
				for ($i=0; count($query['imoveis']) > $i; $i++) {
	        $query['imoveis'][$i]->IMV_MetaDados = json_decode($query['imoveis'][$i]->IMV_MetaDados);
	        $query['imoveis'][$i]->IMV_Caracteristicas = json_decode($query['imoveis'][$i]->IMV_Caracteristicas);
	        $query['imoveis'][$i]->IMV_Imagens = $this->db->from('imovel_imagens')->where('IMG_CodigoImovel', $query['imoveis'][$i]->IMV_CodigoImovel)->get()->result();
	        $query['imoveis'][$i]->IMG_Path = base_url('assets/image/imoveis');
      	}
			}
			foreach ($query['imoveis'] as $key) {
				var_dump($key);
			}
		return $query;
	}

	public function getImovel(){
			$query['imobiliaria'] = $this->db->from('configuracao')
																		->get()
																			->first_row();
			$query['imoveis'] = $this->db->from('imovel')
																	 ->join('imovel_tipo', 'IMT_CodigoTipo = IMV_Tipo')
																	 ->where('IMV_Status = 1', NULL)
																	 ->get()
																	 ->result();
			if ($query['imoveis']) {
				for ($i=0; count($query['imoveis']) > $i; $i++) {
	        $query['imoveis'][$i]->IMV_MetaDados = json_decode($query['imoveis'][$i]->IMV_MetaDados);
	        $query['imoveis'][$i]->IMV_Caracteristicas = json_decode($query['imoveis'][$i]->IMV_Caracteristicas);
	        $query['imoveis'][$i]->IMV_Imagens = $this->db->from('imovel_imagens')->where('IMG_CodigoImovel', $query['imoveis'][$i]->IMV_CodigoImovel)->get()->result();
	        $query['imoveis'][$i]->IMG_Path = base_url('assets/image/imoveis');
      	}
			}
			/*var_dump($query);*/
		return $query;
	}

	public function gerarXML(){

		$imovel = $this->getImovel();

		$dom = new DOMDocument("1.0", "UTF-8");
		$dom->preserveWhiteSpace = false;
		$dom->formatOutput = true;

		/*Bloco Pai*/
		$root = $dom->createElement("ListingDataFeed");
			$xmlns =  $dom->createAttribute("xmlns");
				$xmlns->appendChild(
			    $dom->createTextNode('http://www.vivareal.com/schemas/1.0/VRSync')
			  );
			$xmlnsxsi = $dom->createAttribute("xmlns:xsi");
				$xmlnsxsi->appendChild(
			    $dom->createTextNode('http://www.w3.org/2001/XMLSchema-instance')
			  );
			$xsischemaLocation = $dom->createAttribute("xsi:schemaLocation");
				$xsischemaLocation->appendChild(
					$dom->createTextNode('http://www.vivareal.com/schemas/1.0/VRSync  http://xml.vivareal.com/vrsync.xsd')
			  );  
		$root->appendChild($xmlns);
		$root->appendChild($xmlnsxsi);
		$root->appendChild($xsischemaLocation);

		
		$header = $dom->createElement("header");

		/*Header*/
		$provider = $dom->createElement("Provider");
			$provider->appendChild(
				$dom->createTextNode($imovel['imobiliaria']->CON_NomeEmpresa)
			);
		$email = $dom->createElement("Email");
			$email->appendChild(
				$dom->createTextNode($imovel['imobiliaria']->CON_EmailContato)
			);
		/*Childs*/
		$header->appendChild($provider);
		$header->appendChild($email);
		/*END*/

		/*Listinings*/
		$listings = $dom->createElement("Listings");
			foreach ($imovel['imoveis'] as $key) {
				$listing = $dom->createElement("Listing");

				$listingID = $dom->createElement("ListingID");
					$listingID->appendChild(
						$dom->createTextNode($key->IMV_CodigoReferencia)
					);

				$title = $dom->createElement("Title");
					$title->appendChild(
						$dom->createTextNode('<![CDATA['.$key->IMV_Nome.']]')
					);

				$transactionType = $dom->createElement("TransactionType");

					$finalidade = $key->IMV_Finalidade;
					if ($finalidade == 1) {$finalidade = "For Sale";}
					if ($finalidade == 2) {$finalidade = "For Rent";}
					if ($finalidade == 3) {$finalidade = "Sale/Rent";}

					$transactionType->appendChild(
						$dom->createTextNode($finalidade)
					);

				$media = $dom->createElement("Media");
				foreach ($key->IMV_Imagens as $img) {
					$item  = $dom->createElement("Item");
						$medium =  $dom->createAttribute("medium");
							$medium->appendChild(
								$dom->createTextNode('image')
							);
							$item->appendChild(
								$dom->createTextNode($key->IMG_Path . '/' . $img->IMG_Imagem)
							);
						$primary =  $dom->createAttribute("primary");
						$caption =  $dom->createAttribute("caption");
							$caption->appendChild(
								$dom->createTextNode($imovel['imobiliaria']->CON_NomeEmpresa)
							);
					$media->appendChild($item);
					$item->appendChild($medium);
					$item->appendChild($primary);
					$item->appendChild($caption);
				}

				$details = $dom->createElement("Details");
					$propertyType = $dom->createElement("PropertyType");
						$propertyType->appendChild(
							$dom->createTextNode($key->IMT_RefVivaReal)
						);
					$description = $dom->createElement("Description");
						$description->appendChild(
							$dom->createTextNode('<![CDATA['.$key->IMV_Descricao.']]')
						);
					$listPrice = $dom->createElement("ListPrice");
						$currency =  $dom->createAttribute("currency");
						$listPrice->appendChild(
							$dom->createTextNode($key->IMV_ValorAluguel)
						);
						$abbreviation =  $dom->createAttribute("abbreviation");
							$currency->appendChild(
								$dom->createTextNode('BRL')
							);
					$livingArea  = $dom->createElement("LivingArea");
						$livingArea->appendChild(
								$dom->createTextNode($key->IMV_AreaConstruida)
							);
						$unit =  $dom->createAttribute("unit");
							$unit->appendChild(
								$dom->createTextNode('square metres')
							);
					$bedrooms = $dom->createElement("Bedrooms");
						$bedrooms->appendChild(
							$dom->createTextNode($key->IMV_Quartos)
						);
					$bathrooms = $dom->createElement("Bathrooms");
						$bathrooms->appendChild(
							$dom->createTextNode($key->IMV_Banheiros)
						);

					$features = $dom->createElement("Features");
						foreach ($key->IMV_Caracteristicas as $feat) {
							$feature = $dom->createElement("Feature");
								$feature->appendChild(
									$dom->createTextNode($feat->text)
								);
						$features->appendChild($feature);
						}

				$Location  = $dom->createElement("Location");
					$country  = $dom->createElement("Country");
						if (@$key->IMV_MetaDados->Geo):
						$country->appendChild(
							$dom->createTextNode($key->IMV_MetaDados->Geo->results['0']->address_components['3']->long_name)
						);
						endif;
						$c_abbreviation =  $dom->createAttribute("abbreviation");
						if (@$key->IMV_MetaDados->Geo):
							$c_abbreviation->appendChild(
								$dom->createTextNode($key->IMV_MetaDados->Geo->results['0']->address_components['3']->short_name)
							);
						endif;
					$state   = $dom->createElement("State");
						if (@$key->IMV_MetaDados->Geo):
						$state->appendChild(
							$dom->createTextNode($key->IMV_MetaDados->Geo->results['0']->address_components['2']->long_name)
						);
						endif;
						if (@$key->IMV_MetaDados->Geo):
						$s_abbreviation =  $dom->createAttribute("abbreviation");
							$s_abbreviation->appendChild(
								$dom->createTextNode($key->IMV_MetaDados->Geo->results['0']->address_components['2']->short_name)
							);
						endif;
					$zone  = $dom->createElement("Zone");
						$zone->appendChild(
							$dom->createTextNode('Não informado')
						);
					$neighborhood  = $dom->createElement("Neighborhood");
						$neighborhood->appendChild(
							$dom->createTextNode($key->IMV_Bairro)
						);
					
				$location = $dom->createElement("location");
				$contactInfo = $dom->createElement("ContactInfo");
					$name = $dom->createElement("Name");
						$name->appendChild(
							$dom->createTextNode($imovel['imobiliaria']->CON_NomeEmpresa)
						);
					$email = $dom->createElement("Email");
						$email->appendChild(
							$dom->createTextNode($imovel['imobiliaria']->CON_EmailContato)
						);

				$listings->appendChild($listing);
				$listing->appendChild($listingID);
				$listing->appendChild($title);
				$listing->appendChild($transactionType);
				$listing->appendChild($media);
				$listing->appendChild($details);
					$details->appendChild($propertyType);	
					$details->appendChild($description);
					$details->appendChild($listPrice);
						$listPrice->appendChild($currency);
					$details->appendChild($livingArea);
						$livingArea->appendChild($unit);
					$details->appendChild($bedrooms);
					$details->appendChild($bathrooms);
					$details->appendChild($features);
				$listing->appendChild($location);
					$listing->appendChild($country);
						$country->appendChild($c_abbreviation);
					$listing->appendChild($state);
						$state->appendChild($s_abbreviation);
					$listing->appendChild($zone);
					$listing->appendChild($neighborhood);
				$listing->appendChild($contactInfo);
					$contactInfo->appendChild($name);
					$contactInfo->appendChild($email);
			}


		#setanto nomes e atributos dos elementos xml (nós)
	/*	$nome = $dom->createElement("nome", "Rafael Clares");
		$telefone = $dom->createElement("telefone", "(11) 5500-0055");
		$endereco = $dom->createElement("endereco", "Av. longa n 1");*/

		
		#adiciona os nós (informacaoes do contato) em contato
		/*$contato->appendChild($nome);
		$contato->appendChild($telefone);
		$contato->appendChild($endereco);*/

		$root->appendChild($header);
		$header->appendChild($listings);
		$dom->appendChild($root);
		header("Content-Type: text/xml");
		print $dom->saveXML();
	}
}
