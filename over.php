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
	<h1>Over dit tentoonstellingenoverzicht</h1>


	<div class="row">
		
		<div class="col-md-4">
			
				<h3>Ontstaansgeschiedenis</h3>
				
				<p>Tijdens het project <a href="https://rotterdamspubliek.nl/">Rotterdams Publiek</a>, dat in data wilde vastleggen hoe het culturele landschap van Rotterdam er op verschillende momenten uitzag, heeft Boijmans een lijst geleverd met al hun tentoonstellingen, die we op Wikidata mochten zetten.</p>


				<p>Een paar jaar later, tijdens de Wikidata Hackathon 2023, heb ik ook de tentoonstellingen van het Amsterdam Museum aan Wikidata toegevoegd. Anderen hadden daar al de tentoonstellingen van onder andere de verschillende Wereldmusea gepubliceerd.</p>

				<p>Op de Wikidata Hackathon 2024 kwamen de tentoonstellingen van het Joods Museum daarbij, en zag ook deze applicatie het licht.</p>


				<h3>Dank</h3>
				
				<p>Dit alles staat of valt natuurlijk bij de bereidwilligheid van musea om hun tentoonstellingsdata te delen. Veel dank dus voor Boijmans, het Amsterdam Museum, het Joods Museum, het Centraal Museum en alle andere instellingen die niet alleen hun tentoonstellingsverleden netjes in kaart brachten, maar die gegevens ook open aanbieden!</p>
				
			
		</div>

		<div class="col-md-4">


				<h3>Wat deze applicatie beoogt</h3>
				
				<p>Tentoonstellingen in Wikidata zijn leuk, maar je moet wel een sparqlquery kunnen schrijven om ze er, anders dan per stuk, uit te krijgen.</p>

				<p>Deze applicatie geeft verschillende overzichten van wat er nu op Wikidata te vinden is, welke kenmerken beschreven zijn of beschreven zouden kunnen worden, en wat je met de gegevens zou kunnen. </p>
				
				<p>Doordat tentoonstelling van meerdere organisaties nu op Wikidata een plek hebben gekregen, zie je dat ze onderling verbonden raken. Bijvoorbeeld doordat ze een onderwerp delen, dezelfde kunstenaars er exposeerden of zelfs omdat verschillende organisaties hetzelfde gebouw gebruikten, zoals het Amsterdams Historisch en het Joods Museum een tijd De Waag deelden.</p>

				<p>Voor mensen die aan tentoonstellingsdata op Wikidata werken, zoals ikzelf, is deze website ook gewoon heel handig om snel even de stand van zaken te kunnen bekijken. Nieuw toegevoegde en bewerkte tentoonstellingen komen hier immers automatisch in terecht.</p>
		</div>

		<div class="col-md-4">

				
				<h3>Toekomstvisie</h3>
				
				<p>Dat dit een work in progress is moge duidelijk zijn: veel tentoonstellingen zijn <em>nog</em> niet op Wikidata te vinden. En veel tentoonstellingen die er wel zijn, zijn nog karig beschreven.</p>

				<p>Maar je ziet wel nu al hoe dit de plek kan zijn waar je snel alle tentoonstellingen kunt vinden van <a href="onderwerpen.php?subj=Q2606375">Co Westerik</a>, of over <a href="onderwerpen.php?subj=Q2301532&cat=nonhuman">het Waterlooplein</a>.</p>

				<p>En de plek waar recensies van tentoonstellingen in Delpher te linken zijn.</p>

				<p>Het culturele landschap van een willekeurig moment in het verleden is zo steeds makkelijker te schetsen. Reis je per tijdmachine naar een willekeurige dag in de 20ste eeuw, dan check je hier eerst even welke tentoonstellingen dan te bezoeken zijn.</p>

				<p>Ingevoerde tentoonstellingen hebben met het Qnummer ook een permanente identifier gekregen die door iedereen te gebruiken is. Een archiefinstelling kan die identifier gebruiken om vast te leggen op welke tentoonstelling een archiefdeel betrekking heeft, een museum kan zo vastleggen voor welke tentoonstelling ze een werk hebben uitgeleend.</p>



				
		</div>


	</div>


	

	

</div>


<?php

include("_parts/footer.php");

?>
