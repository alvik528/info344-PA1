<html>
	<head>
		<title>Online PHP Script Execution</title>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
        <link rel="stylesheet" href="css/main.css">
	</head>
	<body>
		<img src="national_basketball_association_nba_logo_2414.gif" alt="product picture" class="product-picture">
		<form method="get">
			Input a Player Name:<br>
			<div class="input-group">
		      <span class="input-group-btn">
		        <button class="btn btn-default" input type="submit" type="button">Go!</button>
		      </span>
		      <input type="text" name="name" class="form-control" placeholder="Search for...">
		      <br><br>
		    </div><!-- /input-group -->
		</form> 
		<table border="1" cellpadding="20">
		<?php
			echo ('<tr>');
			echo ('<td>'.'Player Name'.'</td><td>'.'Games Played'.'</td><td>'.'Field Goal Percentage'.'</td><td>'.'Three Point Percentage'.'</td><td>'.'Free Throw Percentage'.'</td><td>'.'Points Per Game'.'</td>');
			echo ('</tr>');
			if(isset($_REQUEST['name'])) 
			{
				$n = $_REQUEST["name"];
				$n = "%".$n."%";
				$username='info344user';
				$password='coolvikram528';
				try{
					$conn = new PDO('mysql:host=info344.cfoddr0dwrhs.us-west-2.rds.amazonaws.com;dbname=info344', $username, $password);
					$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
					$data = $conn->prepare('SELECT * FROM nba WHERE name LIKE :n');
					$data-> execute(array('n' => $n));
					require_once("player.php");
					while($row = $data->fetch()) {
						$name = $row[0];
						$gp = $row[1];
						$fgp = $row[2];
						$tpp = $row[3];
						$ftp = $row[4];
						$ppg = $row[5];
						$player = new Player($name, $gp, $fgp, $tpp, $tpp, $ftp, $ppg);
						echo ('<tr>');
						echo ('<td>'.$player->GetName().'</td><td>'.$player->GetGP().'</td><td>'.$player->GetFGP().'</td><td>'.$player->GetTPP().'</td><td>'.$player->GetFTP().'</td><td>'.$player->GetPPG().'</td>');
						echo ('</tr>');
					}
					
				} catch(PDOException $e) {
					echo 'ERROR: ' . $e->getMessage();
				}
			}
		?>
		</table>
		</body>
</html>