<?php
$bulletin = '
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
		
		<style>
			@page { margin: 50px 46px 45px; }
		    #footer { position: fixed; text-align: center; bottom: 20px; font: italic 500 14px Helvetica; }
		    #footer .page:after { content: counter(page, decimal); }
			td { 
				border:thin solid black; 
				padding: 3px 3px 3px 5px;
				font: 13px Helvetica;
			} 

			.niveau1{
				margin: 25px 0 0 0;
				font: 25px Helvetica;
				border-bottom: 1px solid black;
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
				margin: 0px 0 0 60px;
				padding: 10px 0 5px 0;
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
				width: 694px;
			}
			.tabniv4{
				margin: 0px 0px 15px 45px;
				width: 685px;
			}
			.title{
				margin: -10px 0 0 0;
				font: italic 500 23px Helvetica;
				border: 1px solid black;
				padding: 0px 0px 3px 10px;
			}
		</style>
	</head>
	<body>
		<div id="footer">
			<p class="page">Résultats scolaires du 1er trimestre pour &lt; Prénom &gt; &lt; Nom &gt; - Page </p>
		</div>
		<div id="content">
		<p class="title">Résultats scolaires du 1er trimestre pour &lt; Prénom &gt; &lt; Nom &gt;</p>';

foreach($competences as $competence){
	if($competence['depth'] == 0){
		$bulletin .= '<h1 class="niveau1">'.$competence['title'].'</h1>';
		
		$itemlist = null;
		foreach($items as $item){
			if($item['Item']['competence_id'] == $competence['id']){
				if($item['Result']['result'] == 'A') $color = '#eeffcc'; elseif($item['Result']['result'] == 'B') $color = '#ffffbb'; elseif($item['Result']['result'] == 'C') $color = '#ffddaa'; elseif($item['Result']['result'] == 'D') $color = '#ffbbaa'; elseif($item['Result']['result'] == 'ABS') $color = '#eeeeee';
				$itemlist[] = '<tr><td>'.$item['Item']['title'].'</td><td style="text-align:center; background-color:'.$color.';" width="60px">'.$item['Result']['result'].'</td></tr>';	
			}
		}
		if(isset($itemlist)){
			$bulletin .= '<table>';
			foreach($itemlist as $libitem){
				$bulletin .= $libitem;
			}
			$bulletin .= '</table>';
		}
	}elseif($competence['depth'] == 1){
		$bulletin .= '<h2 class="niveau2">'.$competence['title'].'</h2>';
		
		$itemlist = null;
		foreach($items as $item){
			if($item['Item']['competence_id'] == $competence['id']){
				if($item['Result']['result'] == 'A') $color = '#eeffcc'; elseif($item['Result']['result'] == 'B') $color = '#ffffbb'; elseif($item['Result']['result'] == 'C') $color = '#ffddaa'; elseif($item['Result']['result'] == 'D') $color = '#ffbbaa'; elseif($item['Result']['result'] == 'ABS') $color = '#eeeeee';
				$itemlist[] = '<tr><td>'.$item['Item']['title'].'</td><td style="text-align:center; background-color:'.$color.';" width="60px">'.$item['Result']['result'].'</td></tr>';	
			}
		}
		if(isset($itemlist)){
			$bulletin .= '<table class="tabniv2">';
			foreach($itemlist as $libitem){
				$bulletin .= $libitem;
			}
			$bulletin .= '</table>';
		}
	}elseif($competence['depth'] == 2){
		$bulletin .= '<h3 class="niveau3">'.$competence['title'].'</h3>';
		$itemlist = null;
		foreach($items as $item){
			if($item['Item']['competence_id'] == $competence['id']){
				if($item['Result']['result'] == 'A') $color = '#eeffcc'; elseif($item['Result']['result'] == 'B') $color = '#ffffbb'; elseif($item['Result']['result'] == 'C') $color = '#ffddaa'; elseif($item['Result']['result'] == 'D') $color = '#ffbbaa'; elseif($item['Result']['result'] == 'ABS') $color = '#eeeeee';
				$itemlist[] = '<tr><td>'.$item['Item']['title'].'</td><td style="text-align:center; background-color:'.$color.';" width="60px">'.$item['Result']['result'].'</td></tr>';	
			}
		}
		if(isset($itemlist)){
			$bulletin .= '<table class="tabniv3">';
			foreach($itemlist as $libitem){
				$bulletin .= $libitem;
			}
			$bulletin .= '</table>';
		}
	}elseif($competence['depth'] == 3){
		$bulletin .= '<h3 class="niveau4">'.$competence['title'].'</h3>';
		$itemlist = null;
		foreach($items as $item){
			if($item['Item']['competence_id'] == $competence['id']){
				if($item['Result']['result'] == 'A') $color = '#eeffcc'; elseif($item['Result']['result'] == 'B') $color = '#ffffbb'; elseif($item['Result']['result'] == 'C') $color = '#ffddaa'; elseif($item['Result']['result'] == 'D') $color = '#ffbbaa'; elseif($item['Result']['result'] == 'ABS') $color = '#eeeeee';
				$itemlist[] = '<tr><td>'.$item['Item']['title'].'</td><td style="text-align:center; background-color:'.$color.';" width="60px">'.$item['Result']['result'].'</td></tr>';	
			}
		}
		if(isset($itemlist)){
			$bulletin .= '<table class="tabniv4">';
			foreach($itemlist as $libitem){
				$bulletin .= $libitem;
			}
			$bulletin .= '</table>';
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
	$dompdf->stream("sample.pdf", array('Attachment' => 0));
}else{
	echo $bulletin;
}


?>