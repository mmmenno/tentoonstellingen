<?php


function fromto($v){
	$monthfrom = array("Jan","Feb","Mar","Apr","May","Jun","Jul","Aug","Sep","Oct","Nov","Dec");
	    $monthto = array("januari","februari","maart","april","mei","juni","juli","augustus","september","oktober","november","december");

	    	if(!isset($v['begin']['value'])){
	    		$from = "?";
	    	}else{
	    		$from = date("j M",strtotime($v['begin']['value']));
				$from = str_replace($monthfrom, $monthto, $from);	
	    	}

	    	if(!isset($v['eind']['value'])){
	    		$to = "?";
	    	}else{
	    		$to = date("j M",strtotime($v['eind']['value']));
				$to = str_replace($monthfrom, $monthto, $to);
	    	}

			if($from==$to && $from != "?"){
				$to = "";
				$from = date("M",strtotime($v['begin']['value']));
				$from = str_replace($monthfrom, $monthto, $from);
				if($from == "januari"){ // denk dat hier alleen jaar bekend is, geen zin om query aan te passen voor precisie
					$from = "";
				}
			}else{
				$to = " - " . $to;
			}

			if(isset($v['eind']['value'])){
				$to .= " " . substr(date("Y",strtotime($v['eind']['value'])),0,4);
			}

			return $from . $to;
}


function getSparqlResults($endpoint,$query){


	// params
	$url = $endpoint . '?query=' . urlencode($query) . "&format=json";
	$cache = true;
	$urlhash = hash("md5",$url);
	$datafile = __DIR__ . "/sparqldata/" . $urlhash . ".json";
	$maxcachetime = 60*60*24*7;

	// get cached data if recent
	if($cache == true && file_exists($datafile)){
		$mtime = filemtime($datafile);
		$timediff = time() - $mtime;
		if($timediff < $maxcachetime){
			$json = file_get_contents($datafile);
			return $json;
		}
	}

	
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL,$url);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
	curl_setopt($ch,CURLOPT_USERAGENT,'RotterdamsPubliek');
	$headers = [
	    'Accept: application/sparql-results+json'
	];

	curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
	$response = curl_exec ($ch);
	curl_close ($ch);

	//var_dump($response);

	// if valid results were returned, save file
	$data = json_decode($response,true);
	if($cache == true && isset($data['results'])){
		file_put_contents($datafile, $response);
	}

	
	
	return $response;
}




function dutchdate($date){

	$maanden = array("","jan","feb","maart","april","mei","juni","juli","aug","sept","okt","nov","dec");
	$dutch = date("j ",strtotime($date)) . $maanden[date("n",strtotime($date))] . date(" Y",strtotime($date));

	$dutch = preg_replace("/^1 jan /","",$dutch);

	return $dutch;
}



function wkt2geojson($wkt){

	//return "hi";
	$coordsstart = strpos($wkt,"(");
	$type = trim(substr($wkt,0,$coordsstart));
	$coordstring = substr($wkt, $coordsstart);

	switch (strtoupper($type)) {
	    case "LINESTRING":
	    	$geom = array("type"=>"LineString","coordinates"=>array());
			$coordstring = str_replace(array("(",")"), "", $coordstring);
	    	$pairs = explode(",", $coordstring);
	    	foreach ($pairs as $k => $v) {
	    		$coords = explode(" ", trim($v));
	    		$geom['coordinates'][] = array((double)$coords[0],(double)$coords[1]);
	    	}
	    	return $geom;
	    	break;
	    case "POLYGON":
	    	$geom = array("type"=>"Polygon","coordinates"=>array());
			preg_match_all("/\([0-9. ,]+\)/",$coordstring,$matches);
	    	//print_r($matches);
	    	foreach ($matches[0] as $linestring) {
	    		$linestring = str_replace(array("(",")"), "", $linestring);
		    	$pairs = explode(",", $linestring);
		    	$line = array();
		    	foreach ($pairs as $k => $v) {
		    		$coords = explode(" ", trim($v));
		    		$line[] = array((double)$coords[0],(double)$coords[1]);
		    	}
		    	$geom['coordinates'][] = $line;
	    	}
	    	return $geom;
	    	break;
	    case "MULTILINESTRING":
	    	$geom = array("type"=>"MultiLineString","coordinates"=>array());
	    	preg_match_all("/\([0-9. ,]+\)/",$coordstring,$matches);
	    	//print_r($matches);
	    	foreach ($matches[0] as $linestring) {
	    		$linestring = str_replace(array("(",")"), "", $linestring);
		    	$pairs = explode(",", $linestring);
		    	$line = array();
		    	foreach ($pairs as $k => $v) {
		    		$coords = explode(" ", trim($v));
		    		$line[] = array((double)$coords[0],(double)$coords[1]);
		    	}
		    	$geom['coordinates'][] = $line;
	    	}
	    	return $geom;
	    	break;
	    case "POINT":
			$coordstring = str_replace(array("(",")"), "", $coordstring);
	    	$coords = explode(" ", $coordstring);
	    	//print_r($coords);
	    	$geom = array("type"=>"Point","coordinates"=>array((double)$coords[0],(double)$coords[1]));
	    	return $geom;
	        break;
	}
}
















?>