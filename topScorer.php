<?php
include 'config.php';
include 'functions.php';
include 'myapp.php';


$Api = new LivescoreApi();
$data = $Api->getTopScorer();
$timezone = 'Europe/Istanbul';
?>

<html>
	<head>
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	</head>
	<body>
		<div class="container">
			<div class="row">
				<div class="col-md-3">
				</div>
				<div class="col-md-6">
					<table class="table table-bordered">
					
						<tr class="table-info">
						<h2 style="text-align: center;"> Top Scorers </h2>
							<th>Player Name</th>
							<th>Goals</th>
							<th>Assists</th>
							<th>Games Played</th>
							<th>Team</th>
							
							
						<tr>
							<?php foreach ($data['data']['goalscorers'] as $_goalscorers){ ?>

														</tr>
								
								<td style="text-align: center;"><?= $_goalscorers['name'] ?></td>
								<td style="text-align: center;"><?= $_goalscorers['goals'] ?></td>
								<td style="text-align: center;"><?= $_goalscorers['assists'] ?></td>
								<td style="text-align: center;"><?= $_goalscorers['played'] ?></td>
								<td style="text-align: center;"><?= $_goalscorers['team']['name'] ?></td>								

								
						





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