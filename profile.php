<!DOCTYPE html>
<html>
    
    <?php
		include 'head.php';
	?>
    
    <body>
        <?php
			include 'navigationBar.php';
		?>
		
		<div class="section">
			<div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h1 class="text-center">
							<?php
								echo $_SESSION['name'];
								echo "'s ";
							?>
							Profile
						</h1>
					</div>
				</div>
			</div>
		</div>
		
		<?php
			include 'footer.php';
		?>
	</body>
	
</html>