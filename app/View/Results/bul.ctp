<?php

//Formatage de l'entête personnalisée
$header = $report['Report']['header'];
$header = str_replace("#PRENOM#", $items[0]['Pupil']['first_name'], $header);
$header = str_replace("#NOM#", $items[0]['Pupil']['name'], $header);

//Formatage du pied de page personnalisé
$footer = $report['Report']['footer'];
$footer = str_replace("#PRENOM#", $items[0]['Pupil']['first_name'], $footer);
$footer = str_replace("#NOM#", $items[0]['Pupil']['name'], $footer);

//Début du template du bulletin
$bulletin = '
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" lang="fr">
	<head>
		<title>Bulletin élève</title>
		<meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
		
		<style type="text/css">
			html, body, div, span, applet, object, iframe,
			h1, h2, h3, h4, h5, h6, p, blockquote, pre,
			a, abbr, acronym, address, big, cite, code,
			del, dfn, em, img, ins, kbd, q, s, samp,
			small, strike, strong, sub, sup, tt, var,
			b, u, i, center,
			dl, dt, dd, ol, ul, li,
			fieldset, form, label, legend,
			table, caption, tbody, tfoot, thead, tr, th, td,
			article, aside, canvas, details, embed, 
			figure, figcaption, footer, header, hgroup, 
			menu, nav, output, ruby, section, summary,
			time, mark, audio, video {
				margin: 0;
				padding: 0;
				border: 0;
				font-size: 100%;
				font: inherit;
				vertical-align: baseline;
			}
			@page { margin: 0; }
			#copyright { 
				-webkit-transform: rotate(270deg); 
				-moz-transform: rotate(270deg); 
				-ms-transform: rotate(270deg);
				position: fixed; 
				bottom:60px;
				left: 694px;
				width:60px;
				margin-left:60px;
				font: 500 8px Helvetica;
			}
		    #footer { position: fixed; text-align: center; bottom: 20px; height: 30px; font: italic 500 14px Helvetica; }
		    #footer .page:after { content: counter(page, decimal); }
			body {
				width: 694px;
				padding: 50px;
			}
			td { 
				border:thin solid black; 
				padding: 3px 3px 3px 5px;
				font: 13px "Helvetica";
			} 
			th {
				padding: 0 0 5px 0;
				font: italic 500 15px Helvetica;
				text-align: left;
			}
			.niveau1{
				font: 25px Helvetica;
				border-bottom: 1px solid black;
				padding-top: 30px;
				page-break-after: avoid;
			}
			.niveau2{
				margin: 0 0 20px 0;
				padding: 20px 0 0 0;
				font: 20px Helvetica;
				border-bottom: 1px dashed black;
			}
			.niveau3{
				margin: 0 0 0 30px;
				padding: 0 0 5px 0;
				font: italic 500 15px Helvetica;
			}
			.niveau4{
				margin: 10px 0 0 60px;
				padding: 0 0 5px 0;
				font: italic 500 15px Helvetica;
			}
			table{
				border-collapse:collapse;
				border-bottom: 1px solid black;
				width:100%;
			}
			.tabniv2{
				margin: 0px 0px 0px 0px;
			}
			.tabniv3{
				margin: 0px 0px 15px 23px;
				width: 685px;
			}
			.tabniv4{
				margin: 0px 0px 15px 46px;
				width: 678px;
			}
			.title{
				font: italic 500 23px Helvetica;
				border: 1px solid black;
				padding: 0px 0px 3px 10px;
			}
		</style>
	</head>
	<body>
		<div id="copyright">Opencomp system v 1.0</div>
		<div id="footer">
			<p class="page">'.$footer.' </p>
		</div>
		<div id="content">
		<p class="title">'.$header.'</p>';

//On parcours l'ensemble des compétences à afficher sur le bulletin
foreach($competences as $competence){
	if($competence['depth'] == 0){	
		if(in_array($competence['id'], $report['Report']['page_break']))
			$bulletin .= '<div style="page-break-after: always;"></div>';
			
		$bulletin .= '<h1 class="niveau1">'.$competence['title'].'</h1>';
		
		$itemlist = null;
		foreach($items as $item){
			if($item['Item']['competence_id'] == $competence['id']){
				if($item['Result']['result'] == 'A') $color = '#eeffcc'; 
				elseif($item['Result']['result'] == 'B') $color = '#ffffbb'; 
				elseif($item['Result']['result'] == 'C') $color = '#ffddaa'; 
				elseif($item['Result']['result'] == 'D') $color = '#ffbbaa'; 
				elseif($item['Result']['result'] == 'ABS') $color = '#eeeeee';
				elseif($item['Result']['result'] == 'X'){
					$color = '#ffffff';
					$item['Result']['result'] = '<img src="'.WWW_ROOT.'img/tick.png" alt="tick" />';
				}
				$itemlist[] = '<tr><td>'.$item['Item']['title'].'</td><td style="text-align:center; background-color:'.$color.';width:60px;">'.$item['Result']['result'].'</td></tr>';	
			}
		}
		if(isset($itemlist)){
			$bulletin .= '<div style="margin-top:30px;"></div>';
			$bulletin .= '<table><tbody>';
			foreach($itemlist as $libitem){
				$bulletin .= $libitem;
			}
			$bulletin .= '</tbody></table>';
		}
	}elseif($competence['depth'] == 1){
		if(in_array($competence['id'], $report['Report']['page_break']))
				$bulletin .= '<div style="page-break-after: always;"></div>';
		$bulletin .= '<h2 class="niveau2">'.$competence['title'].'</h2>';
		
		$itemlist = null;
		foreach($items as $item){
			if($item['Item']['competence_id'] == $competence['id'] && $item['Result']['result'] != ""){
				if($item['Result']['result'] == 'A') $color = '#eeffcc'; 
				elseif($item['Result']['result'] == 'B') $color = '#ffffbb'; 
				elseif($item['Result']['result'] == 'C') $color = '#ffddaa'; 
				elseif($item['Result']['result'] == 'D') $color = '#ffbbaa'; 
				elseif($item['Result']['result'] == 'ABS') $color = '#eeeeee';
				elseif($item['Result']['result'] == 'X'){
					$color = '#ffffff';
					$item['Result']['result'] = '<img src="'.WWW_ROOT.'img/tick.png" alt="tick" />';
				}
				$itemlist[] = '<tr><td>'.$item['Item']['title'].'</td><td style="text-align:center; background-color:'.$color.';width:60px;">'.$item['Result']['result'].'</td></tr>';	
			}
		}
		if(isset($itemlist)){
			$bulletin .= '<table class="tabniv2"><tbody>';
			foreach($itemlist as $libitem){
				$bulletin .= $libitem;
			}
			$bulletin .= '</tbody></table>';
		}
	}elseif($competence['depth'] == 2){
		$itemlist = null;
		foreach($items as $item){
			if($item['Item']['competence_id'] == $competence['id'] && $item['Result']['result'] != ""){
				if($item['Result']['result'] == 'A') $color = '#eeffcc'; 
				elseif($item['Result']['result'] == 'B') $color = '#ffffbb'; 
				elseif($item['Result']['result'] == 'C') $color = '#ffddaa'; 
				elseif($item['Result']['result'] == 'D') $color = '#ffbbaa'; 
				elseif($item['Result']['result'] == 'ABS') $color = '#eeeeee';
				elseif($item['Result']['result'] == 'X'){
					$color = '#ffffff';
					$item['Result']['result'] = '<img src="'.WWW_ROOT.'img/tick.png" alt="tick" />';
				}
				$itemlist[] = '<tr><td>'.$item['Item']['title'].'</td><td style="text-align:center; background-color:'.$color.';width:60px;">'.$item['Result']['result'].'</td></tr>';	
			}
		}
		if(isset($itemlist)){
			if(in_array($competence['id'], $report['Report']['page_break']))
				$bulletin .= '<div style="page-break-after: always;"></div>';
			$bulletin .= '<table class="tabniv3">';
			$bulletin .= '<thead><tr><th colspan="2">'.$competence['title'].'</th></tr></thead><tbody>';
			foreach($itemlist as $libitem){
				$bulletin .= $libitem;
			}
			$bulletin .= '</tbody></table>';
		}
	}elseif($competence['depth'] == 3){
		$itemlist = null;
		foreach($items as $item){
			if($item['Item']['competence_id'] == $competence['id'] && $item['Result']['result'] != ""){
				if($item['Result']['result'] == 'A') $color = '#eeffcc'; elseif($item['Result']['result'] == 'B') $color = '#ffffbb'; elseif($item['Result']['result'] == 'C') $color = '#ffddaa'; elseif($item['Result']['result'] == 'D') $color = '#ffbbaa'; elseif($item['Result']['result'] == 'ABS') $color = '#eeeeee';
				$itemlist[] = '<tr><td>'.$item['Item']['title'].'</td><td style="text-align:center; background-color:'.$color.';width:60px;">'.$item['Result']['result'].'</td></tr>';	
			}
		}
		if(isset($itemlist)){
			if(in_array($competence['id'], $report['Report']['page_break']))
				$bulletin .= '<div style="page-break-after: always;"></div>';
			$bulletin .= '<table class="tabniv4">';
			$bulletin .= '<thead><tr><th colspan="2">'.$competence['title'].'</th></tr></thead><tbody>';
			foreach($itemlist as $libitem){
				$bulletin .= $libitem;
			}
			$bulletin .= '</tbody></table>';
		}
	}
}

$bulletin .= "</div></body></html>";

if(isset($output_type) && $output_type == 'pdf'){
	App::import('Vendor','dompdf/dompdf_config_inc'); 

	$dompdf = new DOMPDF();
	$dompdf->set_paper("a4");
	$dompdf->load_html($bulletin);
	$dompdf->render();
	
	//Si l'utilisateur a demandé l'impression recto/verso
	//on ajoute automatiquement des pages blanche si le bulletin
	//ne comporte pas un nombre pair de pages ;)
	if($report['Report']['duplex_printing'])
		if($dompdf->get_canvas()->get_page_count() % 2 == 1)
			$dompdf->get_canvas()->new_page();
			
	$pdfoutput = $dompdf->output(); 
	$filename = "files/".$classroom_id."_".str_replace(',','',$period_id)."_".$pupil_id.".pdf";
	$fp = fopen($filename, "a"); 
	fwrite($fp, $pdfoutput); 
	fclose($fp); 
}else{
	echo $bulletin;
}


?>