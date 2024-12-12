<?php

include("_infra/functions.php");

$locatie = "Q2466999";
if(isset($_GET['locatie'])){
	$locatie = $_GET['locatie'];
}

if(!preg_match("/^Q[0-9]+$/",$locatie)){
	die ('malformed location, want Qnumber');
}

$sparql = "
SELECT ?item ?itemLabel ?locLabel ?begin ?eind ?organisator ?organisatorLabel WHERE {
  values ?expo { wd:Q29023906 wd:Q667276 wd:Q59861107 }
  values ?loc { wd:" . $locatie . " }
  ?item wdt:P31 ?expo .
  ?item wdt:P276 ?loc .
  ?item wdt:P580 ?begin .
  ?item wdt:P582 ?eind .
  optional{
    ?item wdt:P664 ?organisator .  
  }
  SERVICE wikibase:label { bd:serviceParam wikibase:language \"nl,en\". }
}
order by ?begin
limit 1500
";

//echo $sparql;

$endpoint = 'https://query.wikidata.org/sparql';

$json = getSparqlResults($endpoint,$sparql);
$data = json_decode($json,true);



$aantal = count($data['results']['bindings']);
$helft = floor($aantal/2);
$kwart = floor($helft/2);
$driekwart = $helft + $kwart;


include("_parts/header.php");



?>




<div class="container" id="main">
	<h1>Tentoonstellingen in <?= $data['results']['bindings'][0]['locLabel']['value'] ?></h1>
	
	<div class="row">

		<div class="col-md-3">
			<?php for($i=0 ; $i<$kwart; $i++) {

			$v = $data['results']['bindings'][$i];

			$datums = fromto($v);
			$org = displayorg($v);

			?>
				<h5><a href="<?= $v['item']['value'] ?>"><?= $v['itemLabel']['value'] ?></a></h5>
				<div class="evensmaller"><?= $datums ?> <?= $org ?></div>

			<?php } ?>
		</div>


		<div class="col-md-3">
			<?php for($i=$kwart ; $i<$helft; $i++) {

			$v = $data['results']['bindings'][$i];

			$datums = fromto($v);
			$org = displayorg($v);

			?>
				<h5><a href="<?= $v['item']['value'] ?>"><?= $v['itemLabel']['value'] ?></a></h5>
				<div class="evensmaller"><?= $datums ?> <?= $org ?></div>

			<?php } ?>
		</div>

		<div class="col-md-3">
			<?php for($i=$helft ; $i<$driekwart; $i++) {

			$v = $data['results']['bindings'][$i];

			$datums = fromto($v);
			$org = displayorg($v);

			?>
				<h5><a href="<?= $v['item']['value'] ?>"><?= $v['itemLabel']['value'] ?></a></h5>
				<div class="evensmaller"><?= $datums ?> <?= $org ?></div>

			<?php } ?>
		</div>

		<div class="col-md-3">
			<?php for($i=$driekwart ; $i<$aantal; $i++) {

			$v = $data['results']['bindings'][$i];

			$datums = fromto($v);
			$org = displayorg($v);

			?>
				<h5><a href="<?= $v['item']['value'] ?>"><?= $v['itemLabel']['value'] ?></a></h5>
				<div class="evensmaller"><?= $datums ?> <?= $org ?></div>

			<?php } ?>
		</div>

	</div>
	

</div>


<?php



function displayorg($v){

	if(!isset($v['organisatorLabel'])){
		return "";
	}

	// afko's
	if($v['organisatorLabel']['value'] == "Amsterdam Museum"){
		$v['organisatorLabel']['value'] = "AHM";
	}

	if($v['organisatorLabel']['value'] == "Joods Museum"){
		$v['organisatorLabel']['value'] = "JHM";
	}

	$link = '/ <a title="organisator" href="' . $v['organisator']['value'] . '">' . $v['organisatorLabel']['value'] . '</a>';

	return $link;

}

include("_parts/footer.php");

?>
