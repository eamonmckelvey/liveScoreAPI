<?php
include 'config.php';
include 'functions.php';
include 'myapp.php';


$Api = new LivescoreApi();
$data = $Api->getLeagueTables();
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
					
						
						
							<th></th>
							<th>Position</th>
							<th>Points</th>
							<th>Matches</th>
							<th>GF</th>
							<th>GA</th>
							<th>GD</th>
							<th>Won</th>
							<th>Lost</th>
							<th>Draw</th>
							
							<?php foreach ($data['data']['table'] as $table){ ?>
							 <?php } ?>	
							
							<th><a href="topScorer.php?competition_id=<?= $table ['competition_id'] ?>">Top Scorers</a></th>	
							<th><a href="fixtures.php?competition_id=<?= $table ['competition_id'] ?>">Fixtures</a></th>	
							 
							
									
							
							


							

							<tr>
							
							<tr>
							<?php foreach ($data['data']['table'] as $table){ ?>

														</tr>
								
								<td style="text-align: center;"><?= $table ['name'] ?></td>
								<td style="text-align: center;"><?= $table ['rank'] ?></td>
								<td style="text-align: center;"><?= $table ['points'] ?></td>
								<td style="text-align: center;"><?= $table ['matches'] ?></td>
								<td style="text-align: center;"><?= $table ['goals_scored'] ?></td>
								<td style="text-align: center;"><?= $table ['goals_conceded'] ?></td>
								<td style="text-align: center;"><?= $table ['goal_diff'] ?></td>
								<td style="text-align: center;"><?= $table ['won'] ?></td>
								<td style="text-align: center;"><?= $table ['lost'] ?></td>
								<td style="text-align: center;"><?= $table ['drawn'] ?></td>
								
															
							

								


								</tr>
							
											
									<?php } ?>
									<tr class="table-info">
		
														 </tr>								
							
					</table>
					
									<div class="col-md-3">
									
				</div>
			</div>
		</div>
	</body>
</html>