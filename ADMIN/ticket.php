
	<div class="container">
		<div class="alert alert-success">
		  <strong>Yay! Your ticket is ready...</strong> It's time to BusKaro :)
		</div>
	</div>
	<?php
	require 'db_connect.php';
	

	$sql_instance="SELECT * FROM buskaro.seat_matrix JOIN buskaro.routes ON buskaro.seat_matrix.RID = buskaro.routes.RID WHERE Passenger=".$userID." AND BID=".$bid." AND SeatNo=".$seat.";";
	$result = $conn->query($sql_instance);
	$row = $result->fetch_assoc();
	$qr_pass = '<<BusKaro Digital Ticket>><Journey Date - '.$row['BusDate'].'><Route ID - '.$row['RID'].'><Seat Number - '.$row['SeatNo'].'><Passenger ID - '.$row['Passenger'].'><<BusKaro!>>';
	echo '<center><div class="container-fluid">
					<div class="card bg-info text-white" style="width:30%">
						<br><br>
						<center><img class="card-img-top" src="qr_gen.php?id='.$qr_pass.'" alt="Card image"><center>
					  <div class="card-body">
					    <center><h3 class="card-title">BusKaro Digital Ticket</h3>
					    <h4 class="card-text">Journey Date - '.$row['BusDate'].'</h4>
							<h4 class="card-text">Route ID - '.$row['RID'].' </h4>
							<h4 class="card-text">Departure at - <strong> '.$row['STime'].' </strong>  from <strong> '.$row['Src'].' </strong></h4>
							<h4 class="card-text">Arrival at - <strong> '.$row['DTime'].' </strong>  near <strong> '.$row['Dst'].' </strong></h4>
							<h4 class="card-text">Seat Number - <strong> '.$row['SeatNo'].' </strong></h4>
							<h4 class="card-text">Passenger ID - '.$row['Passenger'].' </h4>
							<br><br>
					  </div>
					</div>
				</div></center>'

	?>
</body>
