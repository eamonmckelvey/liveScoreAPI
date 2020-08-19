<?php
include 'config.php';
include 'functions.php';
include 'myapp.php';


$Api = new LivescoreApi();
$data = $Api->getMatchStats();
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
					
						<h2 style="text-align: center;"> Game Stats </h2>

							<tr>
							
							

							<th>Possession%</th>
							<td style="text-align: center;"><?= $data['possesion'] ?></td>
							</tr>
							
							<tr>
							<th>FKs</th>
							<td style="text-align: center;"><?= $data['free_kicks'] ?></td>
							</tr>
							
							
							<tr>
							<th>GKs</th>
							<td style="text-align: center;"><?= $data['goal_kicks'] ?></td>
							</tr>
							
							<tr>
							<th>Offsides</th>
							<td style="text-align: center;"><?= $data['offsides'] ?></td>
							</tr>
							
							<tr>
							<th>Corners</th>
							<td style="text-align: center;"><?= $data['data']['corners'] ?></td>
							</tr>
							
							<tr>
							<th>Attempts</th>
							<td style="text-align: center;"><?= $data['data']['attempts_on_goal'] ?></td>
							</tr>
							
							<tr>
							<th>On Taregt</th>
							<td style="text-align: center;"><?= $data['data']['shots_on_target'] ?></td>
							</tr>
							
							<tr>
							<th>Off Target</th>
							<td style="text-align: center;"><?= $data['data']['shots_off_target'] ?></td>
							</tr>
							
							<tr>
							<th>Penalties</th>
							<td style="text-align: center;"><?= $data['data']['penalties'] ?></td>
							</tr>
							
							<tr>
							<th>Shots Blocked</th>
							<td style="text-align: center;"><?= $data['data']['shots_blocked'] ?></td>
							</tr>
							
							<tr>
							<th>Attacks</th>
							<td style="text-align: center;"><?= $data['data']['attacks'] ?></td>
							</tr>
							
							<tr>
							<th>Saves</th>
							<td style="text-align: center;"><?= $data['data']['saves'] ?></td>
							</tr>
							
							<tr>
							<th>Fouls</th>
							<td style="text-align: center;"><?= $data['data']['fauls'] ?></td>
							</tr>
							
							<tr>
							<th>Yellows</th>
							<td style="text-align: center;"><?= $data['data']['yellow_cards'] ?></td>
							</tr>
							
							<tr>
							<th>Reds</th>
							<td style="text-align: center;"><?= $data['data']['red_cards'] ?></td>
							</tr>
							
							
							
						
							
						</tr>
							
							
				
																	
							
					</table>
				</div>
				<div class="col-md-3">
				</div>
			</div>
		</div>
	</body>
</html>