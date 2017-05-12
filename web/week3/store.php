<?php
session_start();
	?>
	<!DOCTYPE html>
<html>
<head>
	<title>Candy Cane Craze</title>
	<link href="//netdna.bootstrapcdn.com/bootstrap/3.0.3/css/bootstrap.min.css" rel="stylesheet">
    <link href="home.css" rel="stylesheet">
</head>
<body>
<div class="jumbotron cane"><h1><a href='store.php'>Candy Cane Craze</a></h1>
	<a href="viewCart.php">
		<img border="0" alt="veiw cart" src="pic/cart.png" class="cart">
	</a>

</a>
</div>
<form action="fillCart.php" method="get">
<div class="container-fluid">
	<div class="row">
		<div class="col-md-3">
			<img src="pic/candyclassic.jpg" class="img-thumbnail pic" alt="classic candy cane" width="200px" height="200px">
			<div class="caption"><p>Clasic Candy Cane</p>
			<button name="classic" type="submit" value="1">Add to cart</button>
			</div>
		</div>
		<div class="col-md-3">
			<img src="pic/candystick.jpg" class="img-thumbnail pic" alt="classic candy stick" width="200px" height="200px">
			<div class="caption"><p>Candy Cane Stick</p>
			<button name="stick" type="submit" value="1" >Add to Cart</button> 
			</div>
		</div>
		<div class="col-md-3">
		<img src="pic/candyj.jpg" class="img-thumbnail pic" alt="candy j" width="200px" height="200px">
			<div class="caption"><p>Candy J</p>
			<button type="submit" name="j" value="1">Add to cart</button>
			</div>
		</div>
		<div class="col-md-3">
			<img src="pic/candycircle.jpg" class="img-thumbnail pic" alt="classic circle" width="200px" height="200px">
			<div class="caption"><p>Candy Circle</p>
			<button type="submit" name="circle" value="1">Add to cart</button>
			</div>
		</div>
	</div>
	</div>

	<br>

	<div class="row">
		<div class="col-md-3">
			<img src="pic/candygummy.jpg" class="img-thumbnail pic" alt="candy cane gummy" width="200px" height="200px">
			<div class="caption"><p>Candy Cane Gummy</p>
			<button type="submit" name="gummy" value="1">Add to cart</button>
			</div>
		</div>
		<div class="col-md-3">
			<img src="pic/candytree.jpg" class="img-thumbnail pic" alt="candy tree" width="200px" height="200px">
			<div class="caption"><p>Candy Cane Tree</p>
			<button type="submit" name="tree" value="1">Add to cart</button>
			</div>
		</div>
		<div class="col-md-3">
		<img src="pic/candyshank.jpg" class="img-thumbnail pic" alt="candy shank" width="200px" height="200px">
			<div class="caption"><p>Candy Shank</p>
			<button type="submit" name="shank" value="1">Add to cart</button>
			</div>
		</div>
		<div class="col-md-3">
			<img src="pic/candyheart.jpg" class="img-thumbnail pic" alt="candy cane heart" width="200px" height="200px">
			<div class="caption"><p>Candy Cane Heart</p>
			<button type="submit" name="heart" value="1">Add to cart</button>
			</div>
		</div>
	</div>
</div>
<!-- <input type="image" name="submit" class="cart" src="cart.png"> -->
<!-- <botton type="submit" class="cart" value="Cart"  name="">Submit
	<img src="cart.png" alt="shopping cart" class="cart">
</botton> -->
</form>
<script type="text/javascript">
	var cart = [];
	function addCart(item){
		cart.push(item);
	}
	function addSession(){
		<?php
		$_SESSION = cart;
		?>
	}
</script>
</body>
</html>