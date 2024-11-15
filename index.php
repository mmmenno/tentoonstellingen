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
	<h1>Een nieuwe blik op Nederlands tentoonstellingsverleden, bij elkaar</h1>


	<div class="row">
		
		<div class="col-md-7">
			<p class="lead">Al meer dan een eeuw maken musea tentoonstellingen. Daar wordt veel tijd, moeite en geld ingestoken. En dan, als ze voorbij zijn, leven ze nog een paar jaar op een hoekje van de website, totdat alleen de catalogus nog over is.</p>

			<p class="lead">Terwijl ze ons veel kunnen leren over hetgeen ze tot onderwerp hadden, de objecten die er te zien waren, de mensen en instellingen die ze maakten en de tijd waarin ze gemaakt werden.</p>

			<p class="lead">Alle reden dus om ze te beschrijven, te verbinden en te publiceren. Een plek die daar erg geschikt voor is, is Wikidata.</p>
		</div>

		<div class="col-md-5">
			<img src="_assets/img/publieke-werken.jpg" style="margin-top: 0;" />
			<p class="onderschrift">100 jaar <a href="http://www.wikidata.org/entity/Q27995517">Publieke Werken</a>. In het <a href="http://www.wikidata.org/entity/Q42175133">Stedelijk Museum</a> wordt de tentoonstelling <a href="http://www.wikidata.org/entity/Q130641334">Amsterdam, verleden en toekomst</a> ingericht. Maquette van het Muntplein - <a href="https://archief.amsterdam/beeldbank/detail/7520153d-6d7a-c076-5680-53a3be98398d">collectie Stadsarchief Amsterdam</a></p>
		</div>
	</div>

	

	<div class="row">
		
		<div class="col-md-4">
			
				<h3>Hoeveel tentoonstellingen vind je op Wikidata?</h3>
				
				<p>Er staan op het moment van schrijven zo'n 4000 Nederlandse <a href="https://www.wikidata.org/wiki/Q667276">kunst- (Q667276)</a> en <a href="https://www.wikidata.org/wiki/Q29023906">tijdelijke (Q29023906)</a> tentoonstellingen op Wikidata. Die zou je allemaal samen kunnen opvragen, maar waarschijnlijk wil je ze liever per locatie (het gebouw) of per museum (organisatie) bekijken.</p>

				<p>Een overzicht van de aantallen tentoonstellingen in Nederland per locatie kan je in Wikidata opvragen en als <a href="https://w.wiki/Bi$S">lijst</a> of als <a href="https://w.wiki/BqLK">bubble chart</a> bekijken.</p>

				<p class="smaller">Ook de aantallen tentoonstellingen per museum (organisator) zijn als <a href="https://w.wiki/Bizs">lijst</a> of als <a href="https://w.wiki/BqLn">bubble chart</a> te bekijken.</p>


				<h3>Wat was er te zien?</h3>

				<p>Als een object een item op Wikidata heeft (dankzij het project <a href="https://www.wikidata.org/wiki/Wikidata:WikiProject_sum_of_all_paintings">Sum of All Paintings</a> is dat voor honderdduizenden schilderijen het geval), dan is het met de property <a href="https://www.wikidata.org/wiki/Property:P608">geëxposeerd op</a> met een tentoonstelling te verbinden.</p>

				<p>Met de tentoonstelling <a href="https://www.wikidata.org/wiki/Q109994766">Vergeet me niet</a> in het Rijksmuseum zijn zo bijvoorbeeld <a href="https://w.wiki/Bkrr">112 werken verbonden</a>.</p>
			


				
				<h3>Afbeeldingen</h3>
				
				<p>Aan elk Wiki-item kan een <a href="https://www.wikidata.org/wiki/Property:P18">afbeelding (P18)</a> gekoppeld worden. Bekijk bijvoorbeeld de met tentoonstellingen in de volgende locaties / van de volgende organisaties verbonden afbeeldingen:</p>



				<ul>
					<li><a href="afbeeldingen.php?locatie=Q2077209">Paleis voor Volksvlijt</a> (locatie)</li>
					<li><a href="afbeeldingen.php?organisator=Q1820897">het Amsterdam Museum</a> (organisatie)</li>
					<li><a href="afbeeldingen.php?organisator=Q1131589">Wereldmuseum Amsterdam</a> (organisatie)</li>
					<li><a href="afbeeldingen.php?organisator=Q1886176">Museum Willet-Holthuysen</a> (organisatie)</li>
					<li><a href="afbeeldingen.php?organisator=Q679527">Museum Boijmans</a> (organisatie)</li>
				</ul>

				
				<img src="https://upload.wikimedia.org/wikipedia/commons/thumb/2/2e/Radio_tentoonstelling_in_het_Paleis_van_Volksvlijt%2C_SFA022812618.jpg/800px-Radio_tentoonstelling_in_het_Paleis_van_Volksvlijt%2C_SFA022812618.jpg" />

				<p class="onderschrift">Deze foto van de <a href="https://www.wikidata.org/wiki/Q130674749">Radio-Tentoonstelling van den Nederlandschen Bond van Radio-Handelaren</a> is niet via de property afbeelding op Wikidata met de tentoonstelling verbonden (het is gebruikelijk op die manier maar één afbeelding met een item te verbinden), maar wel andersom: <a href="https://commons.wikimedia.org/wiki/File:Radio_tentoonstelling_in_het_Paleis_van_Volksvlijt,_SFA022812618.jpg">op Commons</a>, onder het tabje 'gestructureerde data' met de property 'beeldt af'.</p>
				
				
			
		</div>

		<div class="col-md-4">


				<h3>Per locatie</h3>
				
				<p>Museum Boijmans zat tot 1935 in het <a href="locatie.php?locatie=Q2801130">Schielandshuis</a>, het Amsterdams Historisch Museum en het Joods Historisch Museum hadden, ook een tijdje samen, hun onderkomen in <a href="locatie.php?locatie=Q2466999">de Amsterdamse Waag</a>.</p>

				<p>Hieronder linkjes naar tentoonstellingsoverzichten op nog een aantal locaties:</p>

				<ul>
					<li><a href="locatie.php?locatie=Q130730258">Joods Museum</a> (het gebouwencomplex)</li>
					<li><a href="locatie.php?locatie=Q2206529">Hollandsche Schouwburg</a></li>
					<li><a href="locatie.php?locatie=Q1909968">Burgerweeshuis</a></li>
					<li><a href="locatie.php?locatie=Q2077209">Paleis voor Volksvlijt</a></li>
				</ul>

				


			
				<h3>In de krant</h3>
				
				<p>In <a href="https://www.delpher.nl/nl/kranten">Delpher</a> zijn van veel tentoonstellingen recensies te vinden. In Wikidata is daar vanaf tentoonstellingsitems met de property '<a href="https://www.wikidata.org/wiki/Property:P973">beschreven op url</a>' naar te linken. Bekijk bijvoorbeeld de aldus verbonden krantenartikelen van tentoonstellingen in ...</p>

				<ul>
					<li><a href="kranten.php?organisator=Q1820897">het Amsterdam Museum</a></li>
					<li><a href="kranten.php?organisator=Q1886176">Museum Willet-Holthuysen</a></li>
				</ul>


				<h3>Archieven</h3>
				
				<p>Correspondentie, ontwerpschetsen, foto's, etc. komen in het archief van het museum terecht. Soms komt die documentatie na verloop van tijd bij een archiefinstelling terecht. Zo zijn tentoonstellingen van de Amsterdamse gemeentelijke musea online terug te vinden bij het Stadsarchief Amsterdam.</p>

				<img src="_assets/img/kosten-pw-tentoonstelling.jpg" />

				<p class="onderschrift">De rekening van de tentoonstelling <a href="http://www.wikidata.org/entity/Q130641334">Amsterdam, verleden en toekomst</a> is terug te vinden <a href="https://archief.amsterdam/inventarissen/file/3b17dbba-b7c8-f19d-b8fb-163f40bb6d51">in het Stadsarchief Amsterdam</a>. Het btw-tarief op cultuur lijkt in 1950 drie procent te zijn geweest.</p>
				


				

				
			
		</div>

		<div class="col-md-4">

				<h3>Per organisatie</h3>
				
				<p>Zoek je tentoonstellingen georganiseerd door een specifiek museum, dan kan je dus tentoonstellingen op verschillende locaties tegenkomen. Het <a href="organisatie.php?organisator=Q702726">Joods Museum</a> programmeert niet alleen in het JM gebouwencomplex, maar ook in de Hollandsche Schouwburg, en vroeger zaten ze dus in De Waag.</p>

				<p>Bekijk ook de tentoonstellingsoverzichten van de organisaties hieronder:</p>

				<ul>
					<li><a href="organisatie.php?organisator=Q1131589">Wereldmuseum Amsterdam</a></li>
					<li><a href="organisatie.php?organisator=Q1820897">Amsterdam Museum</a></li>
					<li><a href="organisatie.php?organisator=Q1886176">Museum Willet-Holthuysen</a></li>
					<li><a href="organisatie.php?organisator=Q679527">Museum Boijmans</a></li>
				</ul>

				<p>Als je erop let, zie je dat gebouw en organisatie op Wikidata soms nog wat door elkaar lopen. Er is wat dat aangaat nog wel gelegenheid het één en ander te verbeteren.</p>
			
				<h3>Onderwerpen</h3>
				
				<p>Met de property <a href="https://www.wikidata.org/wiki/Property:P921">hoofdonderwerp</a> zijn tentoonstellingen te verbinden met degene die of hetgene dat ze als onderwerp hebben.</p>

				<p>Je kunt hier <a href="onderwerpen.php">alle onderwerpen</a> bekijken (en de daarmee verbonden tentoonstellingen). Die onderwerpen zijn ook items met allerlei kenmerken, dus je kunt ook alleen de <a href="onderwerpen.php?cat=nonhuman">onderwerpen die geen mens zijn</a> opvragen, of specifieker alle <a href="onderwerpen.php?cat=Q968159">kunststromingen</a> of onderwerpen <a href="onderwerpen.php?cat=amsterdam">gelegen binnen de gemeente Amsterdam</a>.

				<p>Je kunt ook de <a href="https://w.wiki/Bjvd">hele lijst op Wikidata</a> (met aantallen) bekijken.</p>
				



				
		</div>


	</div>


	

	

</div>


<?php

include("_parts/footer.php");

?>
