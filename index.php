
<!DOCTYPE html>
<html lang="nl">
	<head>
		<meta
			http-equiv="Content-type"
			content="text/html; 
    		charset=UTF-8"
		/>
		<meta name="robots" content="all" />
		<meta name="language" content="dutch" />
		<meta name="author" content="Scrumgroep 2" />
		<meta name="description" content="home pagina" />
		<meta name="keywords" content="RDW Applicatie" />
		<meta name="page" content="home" />
		<meta name="copyright" content="copyright" />
		
		<link rel="stylesheet" href="style.css" />
		<title>RDW Applicatie</title>
	</head>
	<body>
		<main>
			<h1 id="title">RDW Applicatie </h1>
			<h3>
				Welkom bij onze RDW Applicatie. Op deze applicatie kan je je kenteken invoeren, en allemaal verschillende informatie over je auto vinden en vergelijken met andere auto's.
			</h3>
			<form action="info.php" method="POST">
				<div>
            		<input id="kenteken" type="text" name="kenteken" style="text-transform: uppercase;" min="6" max="6">
            	</div>  
				<div> 
					<button type="submit" id="button" name="submit">Informatie Ophalen!</button> 
				</div>
			</form> 
		</main>
		<footer>
			
		</footer>
	</body>
</html>
