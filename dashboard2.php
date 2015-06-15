<!DOCTYPE html>
<html>
	
    <?php
		include 'includes/header.php';
	?>
     <link rel='stylesheet' href="assets/css/jquery-ui.min.css">
        <link rel='stylesheet' href="assets/css/jquery-ui.structure.min.css">
        <link rel='stylesheet' href="assets/css/jquery-ui.theme.min.css">
     <script src="assets/js/jquery-ui.min.js"></script>


    <script type="text/javascript" src="assets/js/dashboard.js"></script>
	
    <body>
        
            
        <?php
			include 'includes/navigationBar.php';
		?>
		
        <div class="cover">
		<div class="cover-image" style="background-image: url(https://unsplash.imgix.net/photo-1418065460487-3e41a6c84dc5?q=25&amp;fm=jpg&amp;s=127f3a3ccf4356b7f79594e05f6c840e);"></div>
        <!--<div class="section">-->
            <div class="container">
				<div class="row">
					<div class="col-md-12">
						<h1 class="text-center">Dashboard</h1>
					</div>
				</div>
                <div class="row">
                    <div class="col-md-6 dashboard-font">
                        <p>You're selecting meetings from: </p>
                         <div class='selection-dates'>
                        <?php 
                            echo date('d/m/Y');
                            echo " to ";
                            echo date('d/m/Y', strtotime('+1 Week'));
                        ?>
                             <button type="button" class="btn btn-default date-button">Next</button>
                             </div>
                    </div>
                </div>
                
                <form role="form" method="get" action="?">
                    <div class="row ">
                        <div class="col-md-6 form-group">
                            <table border="1" width="100%" style="table-layout: fixed;" class="text-center dashboard-table">
                                <?php
									$curCol = 2;
									
									echo '<tr class="table-days">';
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
											echo '<td class="table-days">';
												if ($i < 10){
													echo '0';
												}
												echo "$i:00";
											echo '</td>';
										
											for ($j = 0; $j < 7; $j++){
												$colNum = $j * 48 + $i * 2 + 2;
												
												echo '<td colspan="2" class="select-free">';
                                                echo '</td>';
											}
										echo '</tr>';
									}
								?>
							</table>
						</div>
                        <div class="col-md-6 text-center" id="accordion">
                            <p>Your meetings:</p>
                            <div class="meeting-container text-left" >
									<div class="meeting">
										<p>aaa</p>
									</div>
									<div class="meeting2">
										<p>bbbb</p>
									</div>
                            </div>
                            <p>Your selected dates: </p>
                            <div class="selected-dates text-left">
                                <p>Meeting 1:</p>
                                <span>Selected Dates:</span>
                            </div>
                        </div>
					</div>
					<div class="row">
						<div class="col-md-6 text-right form-group">
                            <input type="submit" class="btn custom-btn-2" value="Update">
						</div>
					</div>
				</form>
			</div>
		</div>
            
        </div>
		<?php
			include 'includes/footer.php';
		?>
	</body>
</html>							