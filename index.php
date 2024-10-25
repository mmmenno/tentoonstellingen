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
	<h1>Een archief van tentoonstellingen in Nederlandse musea, wordt het daar geen tijd voor?</h1>


	<div class="row">
		
		<div class="col-md-7">
			<p class="lead">Al meer dan een eeuw maken musea tentoonstellingen. Daar wordt veel tijd, moeite en geld ingestoken. En dan, als ze voorbij zijn, leven ze nog slechts een paar jaar voort op een hoekje van de website, totdat alleen de catalogus nog over is.</p>

			<p class="lead">Terwijl ze ons veel kunnen leren over hetgeen ze tot onderwerp hadden, de objecten die er te zien waren, de mensen en instellingen die ze maakten en de tijd waarin ze gemaakt werden.</p>

			<p class="lead">Alle reden dus om ze te beschrijven, te verbinden en te publiceren. Een plek die daar erg geschikt voor is, is Wikidata.</p>
		</div>

		<div class="col-md-5">
			<img src="_assets/img/publieke-werken.jpg" style="" />
			<p class="onderschrift">100 jaar <a href="http://www.wikidata.org/entity/Q27995517">Publieke Werken</a>. In het <a href="http://www.wikidata.org/entity/Q42175133">Stedelijk Museum</a> wordt de tentoonstelling <a href="http://www.wikidata.org/entity/Q130641334">Amsterdam, verleden en toekomst</a> ingericht. Maquette van het Muntplein - <a href="https://archief.amsterdam/beeldbank/detail/7520153d-6d7a-c076-5680-53a3be98398d">collectie Stadsarchief Amsterdam</a></p>
		</div>
	</div>

	

	<div class="row" style="margin-top:28px;">
		
		<div class="col-md-4">
			
				<h3>Hoeveel staat er nu op Wikidata?</h3>
				
				<p></p>
				
			
		</div>

		<div class="col-md-4">
			
				<h3>In de krant</h3>
				
				<p>In <a href="https://www.delpher.nl/nl/kranten">Delpher</a> zijn van veel tentoonstellingen recensies te vinden. In Wikidata is daar vanaf tentoonstellingsitems met de property '<a href="https://www.wikidata.org/wiki/Property:P973">beschreven op url</a>' naar te linken. Bekijk bijvoorbeeld de aldus verbonden krantenartikelen van tentoonstellingen in ...</p>

				<ul>
					<li><a href="kranten.php?organisator=Q1820897">het Amsterdam Museum</a></li>
					<li>Museum Willet-Holthuysen</li>
				</ul>
				
			
		</div>

		<div class="col-md-4">
			
				<h3>Onderwerpen</h3>
				
				<p></p>
				
			
		</div>


	</div>


	<div class="row" style="margin-top:28px;">
		
		<div class="col-md-4">
			
				<h3>Affiches</h3>
				
				<p></p>
				
			
		</div>

		<div class="col-md-4">
			
				
				
			
		</div>

		<div class="col-md-4">
			
			
		</div>


	</div>

	

</div>


<?php

include("_parts/footer.php");

?>
