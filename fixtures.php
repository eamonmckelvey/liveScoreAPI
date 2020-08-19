<?php
include 'config.php';
include 'functions.php';
include 'myapp.php';


$Api = new LivescoreApi();
$data = $Api->getLeagueFixtures();
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
						<h2 style="text-align: center;"> Fixtures </h2>
							<th>Home Team</th>
							<th></th>
							<th>Away team</th>
							<th>Round</th>
							<th>Date</th>
							<th>Time</th>
							<th>Competition</th>
							
							
						</tr>
							<?php foreach ($data['data']['fixtures'] as $fixtures){ ?>
							<tr>
								
								<td style="text-align: center;"><?= $fixtures ['home_name'] ?> </td>
								<td style="text-align: center;"><?= $fixtures [''] ?> VS </td>
								<td style="text-align: center;"><?= $fixtures ['away_name'] ?></td>
								<td style="text-align: center;"><?= $fixtures ['round'] ?></td>
								<td style="text-align: center;"><?= $fixtures ['date'] ?></td>
								<td style="text-align: center;"><?= $fixtures ['time'] ?></td>
								<td style="text-align: center;"><?= $fixtures ['competition']['name'] ?></td>






																
						





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