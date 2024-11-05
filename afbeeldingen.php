<?php

include("_infra/functions.php");




if(isset($_GET['locatie'])){
	$locatie = $_GET['locatie'];

	if(!preg_match("/^Q[0-9]+$/",$locatie)){
		die ('malformed location, want Qnumber');
	}

	$sparql = "
		SELECT ?item ?itemLabel ?afb ?locLabel ?begin ?eind ?organisator ?organisatorLabel WHERE {
	  values ?expo { wd:Q29023906 wd:Q667276 }
	  values ?loc { wd:" . $locatie . " }
	  ?item wdt:P31 ?expo .
	  ?item wdt:P276 ?loc .
	  ?item wdt:P580 ?begin .
	  ?item wdt:P582 ?eind .
	  ?item wdt:P18 ?afb .
	  optional{
	    ?item wdt:P664 ?organisator .  
	  }
	  SERVICE wikibase:label { bd:serviceParam wikibase:language \"nl,en\". }
	}
	order by ?begin
	limit 200
	";
}elseif(isset($_GET['organisator'])){
	$organisator = $_GET['organisator'];

	if(!preg_match("/^Q[0-9]+$/",$organisator)){
		die ('malformed location, want Qnumber');
	}

	$sparql = "
		SELECT ?item ?itemLabel ?afb ?org ?orglabel (MIN(?start) AS ?begin) (MAX(?end) AS ?eind) (SAMPLE(?location) AS ?loc) (SAMPLE(?locationLabel) AS ?locLabel) WHERE {
		  values ?expo { wd:Q29023906 wd:Q667276 }
		  values ?org { wd:" . $organisator . " }
		  ?item wdt:P31 ?expo .
		  ?item wdt:P276 ?location .
		  ?item wdt:P580 ?start .
		  ?item wdt:P582 ?end .
		  ?item wdt:P664 ?org . 
		  ?org rdfs:label ?orglabel .
		  FILTER(LANG(?orglabel)=\"en\")
	  	?item wdt:P18 ?afb .
		  SERVICE wikibase:label { bd:serviceParam wikibase:language \"nl,en\". }
		}
		group by ?item ?itemLabel ?afb ?org ?orglabel
		order by ?begin
		limit 200
	";
}else{
	die ('parameter missing');
}




//echo $sparql;

$endpoint = 'https://query.wikidata.org/sparql';

$json = getSparqlResults($endpoint,$sparql);
$data = json_decode($json,true);


//print_r($data);
$aantal = count($data['results']['bindings']);
$helft = floor($aantal/2);
$kwart = floor($helft/2);
$driekwart = $helft + $kwart;


include("_parts/header.php");



?>




<div class="container" id="main">
	<?php if(isset($locatie)){ ?>
	<h1>Tentoonstellingen in <?= $data['results']['bindings'][0]['locLabel']['value'] ?></h1>
	<?php }elseif(isset($organisator)){ ?>
	<h1>Tentoonstellingen van <?= $data['results']['bindings'][0]['orglabel']['value'] ?></h1>
	<?php } ?>
	
	<div class="row">

		<div class="col-md-3">
			<?php for($i=0 ; $i<$kwart; $i++) {

			$v = $data['results']['bindings'][$i];

			$datums = fromto($v);
			$org = displayorg($v);
			$imglink = str_replace("http://commons.wikimedia.org/wiki/Special:FilePath/","https://commons.wikimedia.org/wiki/File:",$v['afb']['value']);

			?>
				<h5><a href="<?= $v['item']['value'] ?>"><?= $v['itemLabel']['value'] ?></a></h5>
				<div class="evensmaller"><?= $datums ?> <?= $org ?></div>

				<a href="<?= $imglink ?>"><img src="<?= $v['afb']['value'] ?>?width=500px" /></a>

			<?php } ?>
		</div>


		<div class="col-md-3">
			<?php for($i=$kwart ; $i<$helft; $i++) {

			$v = $data['results']['bindings'][$i];

			$datums = fromto($v);
			$org = displayorg($v);
			$imglink = str_replace("http://commons.wikimedia.org/wiki/Special:FilePath/","https://commons.wikimedia.org/wiki/File:",$v['afb']['value']);

			?>
				<h5><a href="<?= $v['item']['value'] ?>"><?= $v['itemLabel']['value'] ?></a></h5>
				<div class="evensmaller"><?= $datums ?> <?= $org ?></div>

				<a href="<?= $imglink ?>"><img src="<?= $v['afb']['value'] ?>?width=500px" /></a>

			<?php } ?>
		</div>

		<div class="col-md-3">
			<?php for($i=$helft ; $i<$driekwart; $i++) {

			$v = $data['results']['bindings'][$i];

			$datums = fromto($v);
			$org = displayorg($v);
			$imglink = str_replace("http://commons.wikimedia.org/wiki/Special:FilePath/","https://commons.wikimedia.org/wiki/File:",$v['afb']['value']);

			?>
				<h5><a href="<?= $v['item']['value'] ?>"><?= $v['itemLabel']['value'] ?></a></h5>
				<div class="evensmaller"><?= $datums ?> <?= $org ?></div>

				<a href="<?= $imglink ?>"><img src="<?= $v['afb']['value'] ?>?width=500px" /></a>

			<?php } ?>
		</div>

		<div class="col-md-3">
			<?php for($i=$driekwart ; $i<$aantal; $i++) {

			$v = $data['results']['bindings'][$i];

			$datums = fromto($v);
			$org = displayorg($v);
			$imglink = str_replace("http://commons.wikimedia.org/wiki/Special:FilePath/","https://commons.wikimedia.org/wiki/File:",$v['afb']['value']);

			?>
				<h5><a href="<?= $v['item']['value'] ?>"><?= $v['itemLabel']['value'] ?></a></h5>
				<div class="evensmaller"><?= $datums ?> <?= $org ?></div>

				<a href="<?= $imglink ?>"><img src="<?= $v['afb']['value'] ?>?width=500px" /></a>

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
