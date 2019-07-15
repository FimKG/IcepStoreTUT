<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>E-Commerce Shopping cart</title>

	<!-- Bootstrap -->
	<link rel="stylesheet" href="css/bootstrap.css">
	<!-- Style custom -->
	<link rel="stylesheet" href="css/style.css">
	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
	<script src="js/jquery-3.3.1.min.js"></script>
	<!-- Include all compiled plugins (below), or include individual files as needed -->
	<script src="js/bootstrap.js"></script>
	<script src="js/bootstrap.min.js"></script>


</head>

<body bgcolor="#654041">
	<nav>
		<div class="container">

			<?php include_once("Tp_Header.php"); ?>

			<!-- /.navbar-collapse -->
		</div>
		<!-- /.container-fluid -->
	</nav>
		<div class="container">
		    <div class="row">
		      <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
			<div id="carousel1" class="carousel slide">
			  <ol class="carousel-indicators">
			    <li data-target="#carousel1" data-slide-to="0" class="active"> </li>
			    <li data-target="#carousel1" data-slide-to="1" class=""> </li>
			    <li data-target="#carousel1" data-slide-to="2" class=""> </li>
			  </ol>
			  <div class="carousel-inner">
			    <div class="item"> <img class="img-responsive" src="images/HP Desktop.jpg" alt="thumb">
			      <div class="carousel-caption slider"> HP Desktop </div>
			    </div>
			    <div class="item active"> <img class="img-responsive" src="images/samsung-desktop-computer.jpg" alt="thumb">
			      <div class="carousel-caption slider"> samsung-desktop-computer </div>
			    </div>
			    <div class="item"> <img class="img-responsive" src="images/Spin-7.png" alt="thumb">
			      <div class="carousel-caption slider"> Acer Spin7 Laptop </div>
			    </div>
			  </div>
			  <a class="left carousel-control" href="#carousel1" data-slide="prev"><span class="icon-prev"></span></a> <a class="right carousel-control" href="#carousel1" data-slide="next"><span class="icon-next"></span></a></div>
		      </div>
		</div>
			<hr>
		</div>
		
<div class="container">
  <div class="row">
    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
      <div class="row">
        <div class="col-lg-2 col-md-3 col-sm-3 col-xs-2"></div>
        <div class="col-lg-6 col-md-9 col-sm-9 col-xs-9">
          <h4>Free Shipping</h4>
        </div>
      </div>
    </div>
    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
      <div class="row">
        <div class="col-lg-2 col-md-3 col-sm-3 col-xs-2"></div>
        <div class="col-lg-6 col-md-9 col-sm-9 col-xs-9">
          <h4>Free Returns</h4>
        </div>
      </div>
    </div>
    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
      <div class="row">
        <div class="col-lg-2 col-md-3 col-sm-3 col-xs-2"></div>
        <div class="col-lg-6 col-md-9 col-sm-9 col-xs-9">
          <h4>Low Prices</h4>
        </div>
      </div>
    </div>
  </div>
</div>
	<hr>
	<h2 class="text-center">PRODUCTS</h2>
	<hr>
	<div class="container">
		<div class="row text-center">

			<div id="tab"></div>


		</div>
		<hr>
		<h2 class="text-center">Your Cart</h2>
		<hr>


		<div id="table"></div>
	</div>
	</div>
	<hr>
<div class="container well" style="align:center;">
		<div class="row">

			<div class="col-xs-6 col-sm-6 col-md-6 col-lg-5">
				<address>
        <strong style="font-size: 2em;">Electronic store front, Inc.</strong><br>
	    1564 Block L<br>
        Soshanguve, 
        0152<br>
        <abbr title="Phone">Cell:</abbr> (+27) 79 - 410 - 2763
      </address>
			






				<address>
        <strong>Full Name</strong><br>
			Kgaugelo Moloto<br>
        <a title="E-mail" href="mailto:#">kgaugelob82@gmail.com</a>
        </address>
			






			</div>
		</div>
	</div>
	<footer class="text-center">
		<div class="container">
			<div class="row">
				<div class="col-xs-12">
					<p><abbr title="212486884 Moloto KA">Copyright © Moloto Kgaugelo. All rights reserved.</abbr></p>
				</div>
			</div>
		</div>
	</footer>


</body>
<script>
	var cart = []

	function deleteCart( index ) {
		cart.splice( index, 1 )
		updateCart()
	}
			function submitCart() {
				console.table(cart)
			$.ajax( {
				url: 'order.php',
				type: 'post',
				data: JSON.stringify(cart),
				processData: false,
				contentType: false,
				success: function ( data, status ) {
					console.log( data )
				},
				error: function ( xhr, desc, err ) {


				}
			} );
		} 

	function updateCart() {
		let table = '<table class="table"><thead class="thead-light"><tr><th scope="col">code</th><th scope="col">Name</th><th scope="col">description</th><th scope="col">Quantity</th><th scope="col">Price</th><th scope="col">Total</th><th scope="col">Remove</th></tr></thead><tbody>';
		let total = 0;
		let qty = 0;
		$.each( cart, function ( i, field ) {


			table += '<tr>'
			table += '<th scope="row">' + field.code + '</th>'
			table += '<td>' + field.name + '</td>'
			table += '<td>' + field.description + '</td>'
			table += '<td>' + field.qty + '</td>'
			table += '<td>' + field.price + '</td>'
			table += '<td>R' + field.price * field.qty + '</td>'
			table += '<td><button class="btn btn-danger delete" onclick="deleteCart(' + i + ')"> <span class="glyphicon glyphicon-trash" aria-hidden="true"></span> Remove</button></td></tr>'
			qty += field.qty
			total += ( field.price * field.qty )
		} )
		table += '<tr><td></td><td></td>'
		table += '<th scope="row">Total</th>'
		table += '<th>' + qty + '</th>'
		table += '<td></td>'
		table += '<th>' + total.toFixed( 2 ) + '</th></tr></tbody></table>'
		table += '<button class="btn btn-success delete" onclick="submitCart()"> <span class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></span> buy</button>'
		$( '#table' ).html( table );
	}
	$( document ).ready( function () {


		$( this ).submit( function ( event ) {
			event.preventDefault();
			var button = $( this )
			var id = '#form' + button[ 0 ].activeElement.value
			console.log()
			let form = $( id ).serializeArray()
			let data = {
				name: form[ 1 ].value,
				price: parseFloat( form[ 3 ].value ),
				description: form[ 0 ].value,
				code: form[ 2 ].value,
				qty: parseInt( form[ 4 ].value )
			}
			let index = findProduct( cart, 'code', data.code )
			if ( index == -1 )
				cart.push( data )
			else
				cart[ index ].qty += data.qty

			updateCart()
			console.table( cart )
		} );

		function findProduct( array, key, value ) {
			for ( var i = 0; i < array.length; i++ ) {
				if ( array[ i ][ key ] === value ) {
					return i;
				}
			}
			return -1;
		}








		$.getJSON( "getproducts.php", function ( result ) {
			var card = '';
			$.each( result, function ( i, field ) {
				card += ' <form id="form' + field.code + '"> <div class="col-sm-4 col-md-4 col-lg-4 col-xs-6">';
				card += '<div class="thumbnail"> <img class="prodImages" src="images/' + field.pic + '" alt="Thumbnail Image 1" class="img-responsive">';
				card += '<div class="caption">';
				card += ' <h3>' + field.name + '</h3>';
				card += ' <p>' + field.description + '</p>'
				card += ' <p>R' + field.price + '</p>'
				card += ' <input type="hidden" value="' + field.description + '" name="description" />'
				card += ' <input type="hidden" value="' + field.name + '" name="name" />'
				card += ' <input type="hidden" value="' + field.code + '" name="code" />'
				card += ' <input type="hidden" value="' + field.price + '" name="price" />'
				card += '<input style="text-align: center" type="number" id="qty" name="qty" value="1" min="0"/><br><br>';
				card += '<button class="btn btn-primary delete" value="' + field.code + '" > <span class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></span> Add to Cart</button></div> </div></div></form>';
			} );
			$( '#tab' ).html( card );
		} );








	} )
</script>
</html>
