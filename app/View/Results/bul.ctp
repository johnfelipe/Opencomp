<?php
$bulletin = '
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" lang="fr">
	<head>
		<meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
		
		<style type="text/css">
			@page { margin: 50px 46px 45px; }
		    #footer { position: fixed; text-align: center; bottom: 20px; font: italic 500 14px Helvetica; }
		    #footer .page:after { content: counter(page, decimal); }
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
				padding-top: 25px;
				font: 25px Helvetica;
				border-bottom: 1px solid black;
				page-break-after: avoid;
			}
			.niveau2{
				margin: 0 0 20px 0;
				padding: 20px 0 0 0;
				font: 20px Helvetica;
				border-bottom: 1px dashed black;
				page-break-after: avoid;
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
			<p class="page">Résultats scolaires du 1er trimestre pour '.$items[0]['Pupil']['first_name'].' '.$items[0]['Pupil']['name'].' - Page </p>
		</div>
		<div id="content">
		<p class="title">Résultats scolaires du 1er trimestre pour '.$items[0]['Pupil']['first_name'].' '.$items[0]['Pupil']['name'].'</p>';

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
			$bulletin .= '<table><tbody>';
			foreach($itemlist as $libitem){
				$bulletin .= $libitem;
			}
			$bulletin .= '</tbody></table>';
		}
	}elseif($competence['depth'] == 1){
		$bulletin .= '<h2 class="niveau2">'.$competence['title'].'</h2>';
		
		$itemlist = null;
		foreach($items as $item){
			if($item['Item']['competence_id'] == $competence['id'] && $item['Result']['result'] != ""){
				if($item['Result']['result'] == 'A') $color = '#eeffcc'; elseif($item['Result']['result'] == 'B') $color = '#ffffbb'; elseif($item['Result']['result'] == 'C') $color = '#ffddaa'; elseif($item['Result']['result'] == 'D') $color = '#ffbbaa'; elseif($item['Result']['result'] == 'ABS') $color = '#eeeeee';
				$itemlist[] = '<tr><td>'.$item['Item']['title'].'</td><td style="text-align:center; background-color:'.$color.';" width="60px">'.$item['Result']['result'].'</td></tr>';	
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
				if($item['Result']['result'] == 'A') $color = '#eeffcc'; elseif($item['Result']['result'] == 'B') $color = '#ffffbb'; elseif($item['Result']['result'] == 'C') $color = '#ffddaa'; elseif($item['Result']['result'] == 'D') $color = '#ffbbaa'; elseif($item['Result']['result'] == 'ABS') $color = '#eeeeee';
				$itemlist[] = '<tr><td>'.$item['Item']['title'].'</td><td style="text-align:center; background-color:'.$color.';" width="60px">'.$item['Result']['result'].'</td></tr>';	
			}
		}
		if(isset($itemlist)){
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
				$itemlist[] = '<tr><td>'.$item['Item']['title'].'</td><td style="text-align:center; background-color:'.$color.';" width="60px">'.$item['Result']['result'].'</td></tr>';	
			}
		}
		if(isset($itemlist)){
			$bulletin .= '<table class="tabniv4"><tbody>';
			$bulletin .= '<thead><tr><th colspan="2">'.$competence['title'].'</th></tr></thead>';
			foreach($itemlist as $libitem){
				$bulletin .= $libitem;
			}
			$bulletin .= '</tbody></table>';
		}
	}
}

$bulletin .= "</div></body></html>";

if(isset($output_type) && $output_type == 'pdf' && $output_engine == 'dompdf'){
	App::import('Vendor','dompdf/dompdf_config_inc'); 

	$dompdf = new DOMPDF();
	$dompdf->set_paper("a4");
	$dompdf->load_html($bulletin);
	$bulletin = utf8_decode($bulletin);
	$dompdf->render();
	if($dompdf->get_canvas()->get_page_count() % 2 == 1){
		$dompdf->get_canvas()->new_page();
	}
	//$dompdf->stream("sample.pdf", array('Attachment' => 0));
	$pdfoutput = $dompdf->output(); 
	$filename = "files/".$classroom_id."_".$period_id."_".$pupil_id.".pdf";
	$fp = fopen($filename, "a"); 
	fwrite($fp, $pdfoutput); 
	fclose($fp); 
}elseif(isset($output_type) && $output_type == 'pdf' && $output_engine == 'mpdf'){	
	App::import('Vendor', 'mPDF', array('file' => 'mpdf' . DS . 'mpdf.php'));
	$mpdf=new mPDF();
	$mpdf->WriteHTML($bulletin);
	$mpdf->SetFooter('Résultats scolaires du 1er trimestre pour '.$items[0]['Pupil']['first_name'].' '.$items[0]['Pupil']['name'].' - page {PAGENO}');
	$mpdf->Output();
}else{
	echo $bulletin;
}


?>