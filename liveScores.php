<?php
include 'config.php';
include 'functions.php';
include 'myapp.php';

$Api = new LivescoreApi();
$data = $Api->getLiveScores();
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
							<th style="text-align: center;">KO</th>
							<th style="text-align: center;">Time</th>
							<th style="text-align: center;">Home</th>
							<th style="text-align: center;">Score</th>
							<th style="text-align: center;">Away</th>
						</tr>
							<?php foreach ($data['data']['match'] as $_match) { ?>
							<tr>
								<td><?= convert($_match['scheduled'], $timezone) ?></td>
								<td><?= $_match['time'] ?>'</td>
								<td style="text-align: right;"><?= $_match['home_name'] ?></td>
								<td style="text-align: center;"><a href="gameInfo.php?id=<?= $_match['id'] ?>"><?= $_match['score'] ?></td>
								<td><?= $_match['away_name'] ?></td>
								<td><a href="gameStats.php?match_id=<?= $_match['id'] ?>">123</td>
																
							</tr>
							<?php } ?>
					</table>
					
					<td><a href="gameStats.php?match_id=<?= $_match['id'] ?>">123</td>

				</div>
				<div class="col-md-3">
				</div>
			</div>
		</div>
	</body>
</html> 