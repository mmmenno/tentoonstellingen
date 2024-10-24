<?php

include("_infra/functions.php");

$organiser = "Q1820897";
if(isset($_GET['organisator'])){
	$organiser = $_GET['organisator'];
}

if($organiser = "Q1820897"){
	$naam = "Amsterdam Museum";
	$csv = "amsterdam-museum-delpher.csv";
}

$sparql = "
SELECT ?item ?itemLabel ?url WHERE {
  values ?expo { wd:Q29023906 wd:Q667276 }
  ?item wdt:P31 ?expo .
  ?item wdt:P17 wd:Q55 .
  ?item wdt:P664 wd:" . $organiser . " .
  ?item wdt:P973 ?url .
  FILTER(REGEX(STR(?url),\"resolver.kb\"))
  SERVICE wikibase:label { bd:serviceParam wikibase:language \"nl,en\". }
}
limit 1000
";

$endpoint = 'https://query.wikidata.org/sparql';

$json = getSparqlResults($endpoint,$sparql);
$data = json_decode($json,true);


$delpherimgs = array();
if (($handle = fopen("_data/" . $csv, "r")) !== FALSE) {
    while (($rec = fgetcsv($handle, 1000, ",")) !== FALSE) {
			$delpherimgs[$rec[0]] = $rec;
    }
    fclose($handle);
}







include("_parts/header.php");



?>




<div class="container-fluid" id="main">
	<h1>Tentoonstellingen <?= $naam ?> in de krant</h1>
	
	<div class="row">

		<?php foreach ($data['results']['bindings'] as $k => $v) { ?>

			<div class="col-md-3">
				<h3><?= $v['itemLabel']['value'] ?></h3>

				<a href="<?= $v['url']['value'] ?>">
					<img style="width:100%" src="<?= $delpherimgs[$v['url']['value']][4] ?>" />
				</a>
						
						
						
					
			</div>
		<?php } ?>

	</div>
	

</div>


<?php

include("_parts/footer.php");

?>
