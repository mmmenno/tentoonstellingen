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
  values ?expo { wd:Q29023906 wd:Q667276 }
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
limit 2000
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

			?>
				<h5><a href="<?= $v['item']['value'] ?>"><?= $v['itemLabel']['value'] ?></a></h5>
				<div class="evensmaller"><?= $datums ?></div>

			<?php } ?>
		</div>


		<div class="col-md-3">
			<?php for($i=$kwart ; $i<$helft; $i++) {

			$v = $data['results']['bindings'][$i];

			$datums = fromto($v);

			?>
				<h5><a href="<?= $v['item']['value'] ?>"><?= $v['itemLabel']['value'] ?></a></h5>
				<div class="evensmaller"><?= $datums ?></div>

			<?php } ?>
		</div>

		<div class="col-md-3">
			<?php for($i=$helft ; $i<$driekwart; $i++) {

			$v = $data['results']['bindings'][$i];

			$datums = fromto($v);

			?>
				<h5><a href="<?= $v['item']['value'] ?>"><?= $v['itemLabel']['value'] ?></a></h5>
				<div class="evensmaller"><?= $datums ?></div>

			<?php } ?>
		</div>

		<div class="col-md-3">
			<?php for($i=$driekwart ; $i<$aantal; $i++) {

			$v = $data['results']['bindings'][$i];

			$datums = fromto($v);

			?>
				<h5><a href="<?= $v['item']['value'] ?>"><?= $v['itemLabel']['value'] ?></a></h5>
				<div class="evensmaller"><?= $datums ?></div>

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
			}else{
				$to = " - " . $to;
			}

			$to .= " '" . substr(date("Y",strtotime($v['eind']['value'])),2,2);

			return $from . $to;
}

include("_parts/footer.php");

?>
