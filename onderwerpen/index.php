<?php

include("../_infra/functions.php");


$sparql = "
SELECT ?onderwerp ?onderwerpLabel (COUNT(?item) AS ?nr) WHERE {
  values ?expo { wd:Q29023906 wd:Q667276 wd:Q59861107 }
  ?item wdt:P31 ?expo .
  ?item wdt:P276 ?locatie .
  ?locatie wdt:P17 wd:Q55 .
  ?item wdt:P921 ?onderwerp .
  SERVICE wikibase:label { bd:serviceParam wikibase:language \"nl,en\". }
}
group by ?onderwerp ?onderwerpLabel 
order by ?onderwerpLabel
limit 2500
";

//echo $sparql;

$endpoint = 'https://query.wikidata.org/sparql';

$json = getSparqlResults($endpoint,$sparql);
$data = json_decode($json,true);



include("../_parts/header.php");



?>




<div class="container" id="main">

	<?php /* 
	<h1>Tentoonstellingen van <?= $data['results']['bindings'][0]['orgLabel']['value'] ?></h1>
	
	<div class="row">

		<div class="col-md-3">
			<?php for($i=0 ; $i<$kwart; $i++) {

			$v = $data['results']['bindings'][$i];

			$datums = fromto($v);
			$loc = displayloc($v);

			?>
				<h5><a href="<?= $v['item']['value'] ?>"><?= $v['itemLabel']['value'] ?></a></h5>
				<div class="evensmaller"><?= $datums ?> <?= $loc ?></div>

			<?php } ?>
		</div>


		<div class="col-md-3">
			<?php for($i=$kwart ; $i<$helft; $i++) {

			$v = $data['results']['bindings'][$i];

			$datums = fromto($v);
			$loc = displayloc($v);

			?>
				<h5><a href="<?= $v['item']['value'] ?>"><?= $v['itemLabel']['value'] ?></a></h5>
				<div class="evensmaller"><?= $datums ?> <?= $loc ?></div>

			<?php } ?>
		</div>

		<div class="col-md-3">
			<?php for($i=$helft ; $i<$driekwart; $i++) {

			$v = $data['results']['bindings'][$i];

			$datums = fromto($v);
			$loc = displayloc($v);

			?>
				<h5><a href="<?= $v['item']['value'] ?>"><?= $v['itemLabel']['value'] ?></a></h5>
				<div class="evensmaller"><?= $datums ?> <?= $loc ?></div>

			<?php } ?>
		</div>

		<div class="col-md-3">
			<?php for($i=$driekwart ; $i<$aantal; $i++) {

			$v = $data['results']['bindings'][$i];

			$datums = fromto($v);
			$loc = displayloc($v);

			?>
				<h5><a href="<?= $v['item']['value'] ?>"><?= $v['itemLabel']['value'] ?></a></h5>
				<div class="evensmaller"><?= $datums ?> <?= $loc ?></div>

			<?php } ?>
		</div>

	</div>

	*/ ?>


	<div class="row">

		<h2>Onderwerpen</h2>

		<div class="col-md-12">
			<?php foreach ($data['results']['bindings'] as $k => $v) {

					$px = "12";

					if((int)$v['nr']['value'] > 7){
						$px = "24";
					}elseif((int)$v['nr']['value'] > 5){
						$px = "20";
					}elseif((int)$v['nr']['value'] > 3){
						$px = "17";
					}elseif((int)$v['nr']['value'] > 1){
						$px = "15";
					}

			 ?>

			<a style="font-size: <?= $px ?>px;" href="<?= $v['onderwerp']['value'] ?>"><?= $v['onderwerpLabel']['value'] ?></a> | 
		
					
		<?php } ?>
		</div>

	</div>
	

</div>


<?php

function fromto($v){
	$monthfrom = array("Jan","Feb","Mar","Apr","May","Jun","Jul","Aug","Sep","Oct","Nov","Dec");
	    $monthto = array("januari","februari","maart","april","mei","juni","juli","augustus","september","oktober","november","december");

			$from = date("j M",strtotime($v['begin']['value']));
			$from = str_replace($monthfrom, $monthto, $from);

			$to = date("j M",strtotime($v['eind']['value']));
			$to = str_replace($monthfrom, $monthto, $to);

			if($from==$to){
				$to = "";
				$from = date("M",strtotime($v['begin']['value']));
				$from = str_replace($monthfrom, $monthto, $from);
			}else{
				$to = " - " . $to;
			}

			$to .= " " . substr(date("Y",strtotime($v['eind']['value'])),0,4);

			return $from . $to;
}

function displayloc($v){

	if(!isset($v['locLabel'])){
		return "";
	}

	// afko's
	if($v['locLabel']['value'] == "Joods Museum gebouwen"){
		$v['locLabel']['value'] = "JM";
	}

	if($v['locLabel']['value'] == "Museum Boijmans Van Beuningen"){
		$v['locLabel']['value'] = "Boijmans";
	}

	if($v['locLabel']['value'] == "Waag van Amsterdam"){
		$v['locLabel']['value'] = "Waag";
	}

	$link = '/ <a title="locatie" href="' . $v['loc']['value'] . '">' . $v['locLabel']['value'] . '</a>';

	return $link;

}

include("../_parts/footer.php");

?>
