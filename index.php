<?php
include 'config.php';
include 'functions.php';
include 'myapp.php';

$Api = new LivescoreApi();
$data = $Api->getLeagueTables();
$timezone = 'Europe/Istanbul';
$dataX = $Api->getLiveScores();
$timezone = 'Europe/Istanbul';

?>

<html>
	<head>
	
	
	<style>
#customers {
  font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
  border-collapse: collapse;
    width: 100%;
}

#customers td, #customers th {
  border: 1px solid #ddd;
  padding: 4px;
  text-align : center;
  width : 1px;
}

#customers tr:nth-child(even){background-color: #f2f2f2;}

#customers tr:hover {background-color: #ddd;}

#customers th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: right;
  background-color: #4CAF50;
  color: white;
}
</style>
			<body>
		<div class="customers">
			<div class="row">
				<div class="col-md-3">
				</div>
				<div class="col-md-6">
					<table class="table table-bordered">
					
						<table id="customers">
						
						<h2 style="text-align: center;"> LiveScore? </h2>
													
							
						</tr>
														<tr>
								
						

							
								<td><a href="leagueTables.php?league_id=<?= 25 ?>?season=<?= 4 ?>">Premier League</td>
								<td><a href="leagueTables.php?league_id=<?= 47 ?>?season=<?= 4 ?>">Eredivise</td>
								<td><a href="leagueTables.php?league_id=<?= 48 ?>?season=<?= 4 ?>">Belgium League</td>
								<td><a href="leagueTables.php?league_id=<?= 49 ?>?season=<?= 4 ?>">Premeiera Liga</td>
								<td><a href="leagueTables.php?league_id=<?= 73 ?>?season=<?= 4 ?>">Serie A</td>
								<td><a href="leagueTables.php?league_id=<?= 74?>?season=<?= 4 ?>">La Liga</td>
								<td><a href="leagueTables.php?league_id=<?= 114 ?>?season=<?= 4 ?>">Bundesliga A</td>
								<td><a href="leagueTables.php?league_id=<?= 97?>?season=<?= 4 ?>">Argentina League</td>



	

						

								</tr>
													
							
			
			
					
							<th style="text-align: center;">KO</th>
							<th style="text-align: center;">Time</th>
							<th style="text-align: center;">Home</th>
							<th style="text-align: center;">Score</th>
							<th style="text-align: center;">Away</th>
							<th style="text-align: center;">League</th>
							<th style="text-align: center;">Competition</th>
							<th style="text-align: center;">Stats</th>
						</tr>
							<?php foreach ($dataX['data']['match'] as $_match) { ?>
							<tr>
								<td><?= convert($_match['scheduled'], $timezone) ?></td>
								<td style="text-align: center;"><?= $_match['time'] ?>'</td>
								<td style="text-align: center;"><?= $_match['home_name'] ?></td>
								<td style="text-align: center;"><a href="gameInfo.php?id=<?= $_match['id'] ?>"><?= $_match['score'] ?></td>
								<td style="text-align: center;"><?= $_match['away_name'] ?></td>
								<td style="text-align: center;"><?= $_match['league_name'] ?></td>
								<td style="text-align: center;"><?= $_match['competition_name'] ?></td>
								<td style="text-align: center;"><a href="gameStats.php?match_id=<?= $_match['id'] ?>"><?= $_match['id']?></td>
																
							</tr>
							<?php } ?>
					</table>
					
					
				</div>
				<div class="col-md-3">

				</div>
			</div>
		</div>
	</body>
</html>