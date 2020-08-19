<?php
include 'config.php';
include 'functions.php';
include 'myapp.php';


$Api = new LivescoreApi();
$data = $Api->getMatchInfo();
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
					
							<th>Match ID</th>
							<th>Event</th>
							<th>Player Name</th>
							<th>Time</th>
							
						
							
						</tr>
							
							<?php foreach ($data['data'] ['event']as $_event){ ?>
							<tr>
								<td style="text-align: center;"><?= $_event['match_id'] ?></td>
								<td style="text-align: center;"><?= $_event['event'] ?></td>
								<td style="text-align: center;"><?= $_event['player'] ?></td>
								<td style="text-align: center;"><?= $_event['time'] ?>'</td>

																
								</tr>
													
							<?php } ?>							
							<tr>
																	
							
					</table>
				</div>
				<div class="col-md-3">
				</div>
			</div>
		</div>
	</body>
</html>