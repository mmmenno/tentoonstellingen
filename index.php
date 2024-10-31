<?php

include("_parts/header.php");



?>

<!--
<div class="container-fluid" id="subheader">
	<div class="row">
		<div class="col-md-12">
			<p>kies een straat en een bron:</p>

			<form method="get" action="/">
				
				<select name="straat" class="form-select" style="width:30%; display: inline;">
					<option value="https://adamlink.nl/geo/street/houtgracht/5668" <?php if($_GET['straat'] == "https://adamlink.nl/geo/street/houtgracht/5668"){ echo "selected"; } ?>>
					Houtgracht</option>
					<option value="https://adamlink.nl/geo/street/houtkopersdwarsstraat/1894" <?php if($_GET['straat'] == "https://adamlink.nl/geo/street/houtkopersdwarsstraat/1894"){ echo "selected"; } ?>>
					Houtkopersdwarsstraat</option>
					<option value="https://adamlink.nl/geo/street/jodenbreestraat/2158" <?php if($_GET['straat'] == "https://adamlink.nl/geo/street/jodenbreestraat/2158"){ echo "selected"; } ?>>
					Jodenbreestraat</option>
					<option value="https://adamlink.nl/geo/street/korte-houtstraat/5643" <?php if($_GET['straat'] == "https://adamlink.nl/geo/street/korte-houtstraat/5643"){ echo "selected"; } ?>>
				</select>

				<button class="btn btn-primary">toon op kaart</button>

			</form>


		</div>
	</div>
</div>
-->


<div class="container" id="main">
	<h1>Tentoonstellingen in NL archiveren, wordt het daar niet eens tijd voor?</h1>


	<div class="row">
		
		<div class="col-md-7">
			<p class="lead">Al meer dan een eeuw maken musea tentoonstellingen. Daar wordt veel tijd, moeite en geld ingestoken. En dan, als ze voorbij zijn, leven ze nog een paar jaar op een hoekje van de website, totdat alleen de catalogus nog over is.</p>

			<p class="lead">Terwijl ze ons veel kunnen leren over hetgeen ze tot onderwerp hadden, de objecten die er te zien waren, de mensen en instellingen die ze maakten en de tijd waarin ze gemaakt werden.</p>

			<p class="lead">Alle reden dus om ze te beschrijven, te verbinden en te publiceren. Een plek die daar erg geschikt voor is, is Wikidata.</p>
		</div>

		<div class="col-md-5">
			<img src="_assets/img/publieke-werken.jpg" style="" />
			<p class="onderschrift">100 jaar <a href="http://www.wikidata.org/entity/Q27995517">Publieke Werken</a>. In het <a href="http://www.wikidata.org/entity/Q42175133">Stedelijk Museum</a> wordt de tentoonstelling <a href="http://www.wikidata.org/entity/Q130641334">Amsterdam, verleden en toekomst</a> ingericht. Maquette van het Muntplein - <a href="https://archief.amsterdam/beeldbank/detail/7520153d-6d7a-c076-5680-53a3be98398d">collectie Stadsarchief Amsterdam</a></p>
		</div>
	</div>

	

	<div class="row">
		
		<div class="col-md-4">
			
				<h3>Aantallen op Wikidata</h3>
				
				<p>Er staan op het moment van schrijven zo'n 3600 Nederlandse kunst- en tijdelijke tentoonstellingen op Wikidata. Die zijn te groeperen, zoals hieronder op organisator of op locatie.</p>

				<iframe style="width: 100%; height: 50vh; border: none; " src="https://query.wikidata.org/embed.html#%20%23defaultView%3ABubbleChart%0ASELECT%20%3Forganiser%20%3ForganiserLabel%20(COUNT(%3Fitem)%20AS%20%3Fnr)%20WHERE%20%7B%0A%20%20values%20%3Fexpo%20%7B%20wd%3AQ29023906%20wd%3AQ667276%20%7D%0A%20%20%3Fitem%20wdt%3AP31%20%3Fexpo%20.%0A%20%20%3Fitem%20wdt%3AP17%20wd%3AQ55%20.%0A%20%20%3Fitem%20wdt%3AP664%20%3Forganiser%20.%0A%20%20SERVICE%20wikibase%3Alabel%20%7B%20bd%3AserviceParam%20wikibase%3Alanguage%20%22nl%2Cen%22.%20%7D%0A%7D%0Agroup%20by%20%3Forganiser%20%3ForganiserLabel%0Alimit%201000" referrerpolicy="origin" sandbox="allow-scripts allow-same-origin allow-popups"></iframe>

				<p class="onderschrift">Aantallen tentoonstellingen per organisator, ook als <a href="https://w.wiki/Bizs">lijst te bekijken</a>.</p>

				<iframe style="width: 100%; height: 50vh; border: none;" src="https://query.wikidata.org/embed.html#%23defaultView%3ABubbleChart%0ASELECT%20%3Flocatie%20%3FlocatieLabel%20(COUNT(%3Fitem)%20AS%20%3Fnr)%20WHERE%20%7B%0A%20%20values%20%3Fexpo%20%7B%20wd%3AQ29023906%20wd%3AQ667276%20%7D%0A%20%20%3Fitem%20wdt%3AP31%20%3Fexpo%20.%0A%20%20%3Fitem%20wdt%3AP17%20wd%3AQ55%20.%0A%20%20%3Fitem%20wdt%3AP276%20%3Flocatie%0A%20%20SERVICE%20wikibase%3Alabel%20%7B%20bd%3AserviceParam%20wikibase%3Alanguage%20%22nl%2Cen%22.%20%7D%0A%7D%0Agroup%20by%20%3Flocatie%20%3FlocatieLabel%0Alimit%201000" referrerpolicy="origin" sandbox="allow-scripts allow-same-origin allow-popups"></iframe>

				<p class="onderschrift">Aantallen tentoonstellingen per locatie, ook als <a href="https://w.wiki/Bi$S">lijst te bekijken</a>.</p>
				
			
		</div>

		<div class="col-md-4">
			
				<h3>In de krant</h3>
				
				<p>In <a href="https://www.delpher.nl/nl/kranten">Delpher</a> zijn van veel tentoonstellingen recensies te vinden. In Wikidata is daar vanaf tentoonstellingsitems met de property '<a href="https://www.wikidata.org/wiki/Property:P973">beschreven op url</a>' naar te linken. Bekijk bijvoorbeeld de aldus verbonden krantenartikelen van tentoonstellingen in ...</p>

				<ul>
					<li><a href="kranten.php?organisator=Q1820897">het Amsterdam Museum</a></li>
					<li><a href="kranten.php?organisator=Q1886176">Museum Willet-Holthuysen</a></li>
				</ul>




				<h3>Afbeeldingen</h3>
				
				<p></p>




				<h3>Archieven</h3>
				
				<p>Correspondentie, ontwerpschetsen, foto's, etc. komen in het archief van het museum terecht. Soms komt die documentatie na verloop van tijd bij een archiefinstelling terecht. Zo zijn tentoonstellingen van de Amsterdamse gemeentelijke musea online terug te vinden bij het Stadsarchief Amsterdam.</p>

				<img src="_assets/img/kosten-pw-tentoonstelling.jpg" />

				<p class="onderschrift">De rekening van de tentoonstelling <a href="http://www.wikidata.org/entity/Q130641334">Amsterdam, verleden en toekomst</a> is terug te vinden <a href="https://archief.amsterdam/inventarissen/file/3b17dbba-b7c8-f19d-b8fb-163f40bb6d51">in het Stadsarchief Amsterdam</a>. Blijkbaar was het btw-tarief in 1950 drie procent.</p>
			
		</div>

		<div class="col-md-4">
			
				<h3>Onderwerpen</h3>
				
				<p>Met de property <a href="https://www.wikidata.org/wiki/Property:P921">hoofdonderwerp</a> zijn tentoonstellingen te verbinden met degene die of hetgene dat ze als onderwerp hebben. Dat zijn logischerwijs vaak kunstenaars, maar het kunnen natuurlijk ook stromingen, genres, stadswijken, gebouwen, expedities, etc. zijn. De top vijf:</p>

				<ul>
					<li>Rembrandt</li>
					<li>Peter Paul Rubens</li>
					<li>Salvador Dalí</li>
					<li>Pablo Picasso</li>
					<li>Co Westerik</li>
				</ul>


				<p>De <a href="https://w.wiki/Bjvd">hele lijst</a> telt nu zo'n 750 onderwerpen die aan een kleine 1100 tentoonstellingen gelinkt zijn.</p>
				



				<h3>Wat was er te zien?</h3>

				<p>Als een object een item op Wikidata heeft (dankzij het project <a href="https://www.wikidata.org/wiki/Wikidata:WikiProject_sum_of_all_paintings">Sum of All Paintings</a> is dat voor honderdduizenden schilderijen het geval), dan is het met de property <a href="https://www.wikidata.org/wiki/Property:P608">geëxposeerd op</a> met een tentoonstelling te verbinden.</p>

				<p>Met de tentoonstelling <a href="https://www.wikidata.org/wiki/Q109994766">Vergeet me niet</a> in het Rijksmuseum zijn zo bijvoorbeeld <a href="https://w.wiki/Bkrr">112 werken verbonden</a>.</p>
			
		</div>


	</div>


	

	

</div>


<?php

include("_parts/footer.php");

?>
