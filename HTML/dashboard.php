<!DOCTYPE html>
<html>
    
    <?php
		include 'head.php';
	?>

    <body>
        <?php
			include 'navigationBar.php';
		?>
		
		<?php
			$name = $_SESSION['name'];
			$email = $_SESSION['email'];
			
			include 'dbConnect.php';
			
			$query = "SELECT * FROM schedules WHERE email = '".$email."'";
			$result = mysqli_query($connection, $query);
			$numResult = mysqli_num_rows($result);
			
			if ($numResult == 1){
				$row = mysqli_fetch_array($result, MYSQLI_NUM);
			}
			else {
				echo 'Database error occured';
			}
		?>
		
        <div class="section">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h1 class="text-center">Dashboard</h1>
					</div>
				</div>
				<form role="form" method="get" action="?">
				<div class="row">
					<div class="col-md-12 form-group">
						<table border="1" width="100%" style="table-layout: fixed;" class="text-center">
							<?php
								$curCol = 2;
								
								echo '<tr>';
									echo '<td></td>';
									echo '<td colspan="2">Mon</td>';
									echo '<td colspan="2">Tue</td>';
									echo '<td colspan="2">Wed</td>';
									echo '<td colspan="2">Thu</td>';
									echo '<td colspan="2">Fri</td>';
									echo '<td colspan="2">Sat</td>';
									echo '<td colspan="2">Sun</td>';
								echo '</tr>';
								
								for ($i = 0; $i < 24; $i++){
									echo '<tr>';
										echo '<td>';
										if ($i < 10){
											echo '0';
										}
										echo "$i:00";
										echo '</td>';
										
										for ($j = 0; $j < 7; $j++){
											$colNum = $j * 48 + $i * 2 + 2;
											echo '<td class="dropdown">';
												echo '<a class="dropdown-toggle" href="#" data-toggle="dropdown"> Activity </a>';
												echo '<div class="dropdown-menu" style="padding: 15px; padding-bottom: 0px; min-width: 200px;">';
													echo '<div class="form-group">';
													echo '<input type="text" class="form-control" placeholder="n/a" id="activity" name="activity">';
													echo '</div>';
												echo '</div>';
											echo '</td>';
											
											echo '<td class="btn-group" data-toggle="buttons">';
												echo '<label class="btn btn-primary" style="background-color: #00FF00;">';
													echo '<input type="radio" name="options" id="option1" value="available" autocomplete="off"> T';
												echo '</label>';
												echo '<label class="btn btn-primary active" style="background-color: #FF0000;">';
													echo '<input type="radio" name="options" id="option2" value="busy" autocomplete="off" checked> F';
												echo '</label>';
											echo '</td>';
										}
									echo '</tr>';
								}
							?>
						</table>
					</div>
				</div>
				<div class="row">
                    <div class="col-md-12 text-right form-group">
                        <input type="submit" class="btn custom-btn-2" value="Update">
					</div>
				</div>
				</form>
			</div>
		</div>

        
		<?php
			include 'footer.php';
		?>
	</body>

</html>