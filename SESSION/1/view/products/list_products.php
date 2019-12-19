<!DOCTYPE html>
<html lang="en">
	<head>
		<!-- Required meta tags -->
	  <meta charset="utf-8">
	  <meta name="viewport" content="width=device-width, initial-scale=1">
	  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
	  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
	  <link rel="stylesheet" type="text/css" href="public/main.css">
	</head>
	<body>
		<div class="row" style="width: 1000px">
		    <?php
		         foreach ($list_products as $key => $value):
		    ?>
			<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3" >
				<div class="thumbnail">
					<img src="public/image/<?php echo $value->get_image(); ?>" alt="">
					<div class="caption">
						<h3><?php echo $value->get_name(); ?></h3>
						<p><?php echo $value->get_price(); ?>	
						</p>
						<p><?php echo $value->get_decription(); ?>	
						</p>
						<p>
							<form action="" method="POST" accept-charset="utf-8">
								<input type="hidden" name="code" value="<?php echo $value->get_code(); ?>">
								<button action="add_cart" href="#" class="btn btn-primary">Add Cart</button>
								<input name="quantity" type="text" class="btn btn-default quantity" value="1">
							</form>
							
						</p>
					</div>
				</div>
			</div>
			<?php
				endforeach;  
		    ?>
		</div>
	</body>
</html>
