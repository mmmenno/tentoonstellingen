<?php

include("_infra/functions.php");


if(isset($_GET['subj'])){

	if(!preg_match("/^Q[0-9]+$/",$_GET['subj'])){
		echo $_GET['subj'];
		die ('malformed location, want Qnumber');
	}

	$sparql = "
	SELECT ?item ?itemLabel (MIN(?start) AS ?begin) (MAX(?end) AS ?eind) ?loc ?locLabel ?onderwerp ?onderwerpLabel WHERE {
	  values ?expo { wd:Q29023906 wd:Q667276 }
	  values ?onderwerp { wd:" . $_GET['subj'] . " }
	  ?item wdt:P31 ?expo .
  	?item wdt:P17 wd:Q55 .
  	?item wdt:P921 ?onderwerp . 
	  ?item wdt:P276 ?loc .
	  optional{
	  	?item wdt:P580 ?start .
		}
	  optional{
	  	?item wdt:P582 ?end .
	  }
	  SERVICE wikibase:label { bd:serviceParam wikibase:language \"nl,en\". }
	}
	group by ?item ?itemLabel ?loc ?locLabel ?onderwerp ?onderwerpLabel
	order by ?begin
	limit 2500
	";

	//echo $sparql;

	$endpoint = 'https://query.wikidata.org/sparql';

	$json = getSparqlResults($endpoint,$sparql);
	$data = json_decode($json,true);




}

if(isset($_GET['cat']) && $_GET['cat'] == "nonhuman"){
	$sparql = "
	SELECT ?onderwerp ?onderwerpLabel (COUNT(?item) AS ?nr) WHERE {
	  values ?expo { wd:Q29023906 wd:Q667276 }
	  ?item wdt:P31 ?expo .
	  ?item wdt:P17 wd:Q55 .
	  ?item wdt:P921 ?onderwerp .
  	MINUS { ?onderwerp wdt:P31 wd:Q5 . }
	  SERVICE wikibase:label { bd:serviceParam wikibase:language \"nl,en\". }
	}
	group by ?onderwerp ?onderwerpLabel 
	order by ?onderwerpLabel
	limit 2500
	";
}elseif(isset($_GET['cat']) && preg_match("/^Q[0-9]+$/",$_GET['cat'])){
	$sparql = "
	SELECT ?onderwerp ?onderwerpLabel (COUNT(?item) AS ?nr) WHERE {
	  values ?expo { wd:Q29023906 wd:Q667276 }
	  ?item wdt:P31 ?expo .
	  ?item wdt:P17 wd:Q55 .
	  ?item wdt:P921 ?onderwerp .
  	?onderwerp wdt:P31 wd:" . $_GET['cat'] . " . 
	  SERVICE wikibase:label { bd:serviceParam wikibase:language \"nl,en\". }
	}
	group by ?onderwerp ?onderwerpLabel 
	order by ?onderwerpLabel
	limit 2500
	";
}elseif(isset($_GET['cat']) && $_GET['cat'] == "amsterdam"){
	$sparql = "
	SELECT ?onderwerp ?onderwerpLabel (COUNT(?item) AS ?nr) WHERE {
	  values ?expo { wd:Q29023906 wd:Q667276 }
	  ?item wdt:P31 ?expo .
	  ?item wdt:P17 wd:Q55 .
	  ?item wdt:P921 ?onderwerp .
  	?onderwerp wdt:P131 wd:Q9899 . 
	  SERVICE wikibase:label { bd:serviceParam wikibase:language \"nl,en\". }
	}
	group by ?onderwerp ?onderwerpLabel 
	order by ?onderwerpLabel
	limit 2500
	";
}else{
	$sparql = "
	SELECT ?onderwerp ?onderwerpLabel (COUNT(?item) AS ?nr) WHERE {
	  values ?expo { wd:Q29023906 wd:Q667276 }
	  ?item wdt:P31 ?expo .
	  ?item wdt:P17 wd:Q55 .
	  ?item wdt:P921 ?onderwerp .
	  SERVICE wikibase:label { bd:serviceParam wikibase:language \"nl,en\". }
	}
	group by ?onderwerp ?onderwerpLabel 
	order by ?onderwerpLabel
	limit 2500
	";

}



//echo $sparql;

$endpoint = 'https://query.wikidata.org/sparql';

$json = getSparqlResults($endpoint,$sparql);
$subjectdata = json_decode($json,true);



include("_parts/header.php");

if(isset($data['results']['bindings'][0])){
	$subjectlabel = $data['results']['bindings'][0]['onderwerpLabel']['value'];
}elseif(isset($_GET['subj'])){
	$subjectlabel = $_GET['subj'];
}


?>




<div class="container" id="main">

	<?php if(isset($_GET['subj'])){  ?>
	<h1>Tentoonstellingen over <?= $subjectlabel ?></h1>
	
	<div class="row">

		
			<?php foreach($data['results']['bindings'] as $k => $v) {

			$datums = fromto($v);
			$loc = displayloc($v);

			?>
				<div class="col-md-3">
					<h5><a href="<?= $v['item']['value'] ?>"><?= $v['itemLabel']['value'] ?></a></h5>
					<div class="evensmaller"><?= $datums ?> <?= $loc ?></div>
				</div>
			<?php } ?>
		

	</div>

	<?php } ?>


	<div class="row">

		

		<div class="col-md-12">

			<h2>Onderwerpen</h2>


			<?php foreach ($subjectdata['results']['bindings'] as $k => $v) {

					$px = "12";

					if((int)$v['nr']['value'] > 7){
						$px = "28";
					}elseif((int)$v['nr']['value'] > 5){
						$px = "24";
					}elseif((int)$v['nr']['value'] > 3){
						$px = "20";
					}elseif((int)$v['nr']['value'] > 1){
						$px = "17";
					}


					$urlparams = "?subj=" . str_replace("http://www.wikidata.org/entity/","",$v['onderwerp']['value']);
					if(isset($_GET['cat'])){
						$urlparams .= "&cat=" . $_GET['cat'];
					}

			 ?>

			<a style="font-size: <?= $px ?>px;" href="onderwerpen.php<?= $urlparams ?>"><?= $v['onderwerpLabel']['value'] ?></a> | 
		
					
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

include("_parts/footer.php");

?>
