<!doctype html>
<html class="no-js" lang="en">

    <head>
        <!-- META DATA -->
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
		
		

		<script src="https://unpkg.com/mathjs@10.0.1/lib/browser/math.js"></script>
		<script src="https://cdn.plot.ly/plotly-1.35.2.min.js"></script>

		<link rel="stylesheet" href="../styles/styles.css" media="screen">
		

        <!--font-family-->
		<link href="https://fonts.googleapis.com/css?family=Playfair+Display:400,400i,700,700i,900,900i" rel="stylesheet">
		
		<link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900" rel="stylesheet">
		
		<link href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700,900" rel="stylesheet">
		
        <!-- TITLE OF SITE -->
        <title>Zombiz(team)</title>

        <!-- for title img -->
		<link rel="shortcut icon" type="image/icon" href="assets/images/logo/favicon.png"/>
       
        <!--font-awesome.min.css-->
        <link rel="stylesheet" href="assets/css/font-awesome.min.css">
		
		<!--linear icon css-->
		<link rel="stylesheet" href="https://cdn.linearicons.com/free/1.0.0/icon-font.min.css">
		
		<!--animate.css-->
        <link rel="stylesheet" href="assets/css/animate.css">
		
		<!--hover.css-->
        <link rel="stylesheet" href="assets/css/hover-min.css">
		
		<!--owl.carousel.css-->
        <link rel="stylesheet" href="assets/css/owl.carousel.min.css">
		<link href="assets/css/owl.theme.default.min.css" rel="stylesheet"/>

		<!--vedio player css-->
        <link rel="stylesheet" href="assets/css/magnific-popup.css">

		
        <!--bootstrap.min.css-->
        <link rel="stylesheet" href="assets/css/bootstrap.min.css">
		
		<!-- bootsnav -->
		<link href="assets/css/bootsnav.css" rel="stylesheet"/>	
        
        <!--style.css-->
        <link rel="stylesheet" href="assets/css/style.css">
        
        <!--responsive.css-->
        <link rel="stylesheet" href="assets/css/responsive.css">
        
        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		
        <!--[if lt IE 9]>
			<script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
			<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->

    </head>
	
	<body>
		<!--[if lte IE 9]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
        <![endif]-->
		
		
		
	
		
		<!--menu start-->
		<section id="menu">
			<div class="container">
				<div class="menubar">
					<nav class="navbar navbar-default">
					
						<!-- Brand and toggle get grouped for better mobile display -->
						<div class="navbar-header">
							<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
								<span class="sr-only">Toggle navigation</span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>
							<a class="navbar-brand" href="about.html">
								<div class="service-img">
									<img src="assets/images/home/1Poli.png" alt="index" />
								</div><!--/.service-img-->
							</a>
						</div><!--/.navbar-header -->

						<!-- Collect the nav links, forms, and other content for toggling -->
						<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
							<ul class="nav navbar-nav navbar-right">
								
								<li><a href="about.html">Teor??a</a></li>
								<li ><a href="service.html">M??todos</a></li>
								
								<li class="active"><a href="index.html">Equipo</a></li>
								
							</ul><!-- / ul -->
						</div><!-- /.navbar-collapse -->
					</nav><!--/nav -->
				</div><!--/.menubar -->
			</div><!-- /.container -->

		</section><!--/#menu-->
		<!--menu end-->
		
		<!--about-part start-->
		<section class="about-part team-part">
			<div class="container">
				<div class="about-part-details text-center"> 
					<h2>M??todo de Bisecci??n</h2>
					<div class="about-part-content

					">
						<div class="breadcrumbs">
							<div class="container">
								<ol class="breadcrumb">
								  <li><a href="index.html">home</a></li>
								</ol><!--/.breadcrumb-->
							</div><!--/.container-->
						</div><!--/.breadcrumbs-->
					</div><!--/.about-part-content-->
				</div><!--/.about-part-details-->	
			</div><!--/.container-->

		</section><!--/.about-part-->
		<!--about-part end-->

		<!--team start -->
		<section id="biseccion">
			<div class="container">
			<div class="row row-eq-height">
				<div class="col-md-3 h-100">
					<br/>
					<div class="card"  style="height: 38.59rem;">
						<div class="card-header">
							<b>Encontrar Raiz por Bisecci??n</b>
						</div>
						<div class="card-body">
							<form action="biseccion.php" method="post" id="form">
								<br/> La ecuaci??n Ingresada debe ser un polinomio de m??ximo 
								grado 3, por lo que solo se aceptan ecuaciones de la forma 
								a*x^3+b*x^2+c*x+d. <br/><br/>

								Ecuaci??n: <input required class="form-control" type="text" name="ecuacion" id="eq">
								<br/>
								Valor a: <input class="form-control" type="text" name="a" id="a">
								<br/>
								Valor b: <input  class="form-control" type="text" name="b" id="b">
								<br/>
								Tolerancia: <input  class="form-control" type="text" name="tolerancia" id="tol">
								<br/>
								<button class="btn btn-success" type="submit">Calcular Raiz</button>
							</form>
						</div>
					</div>
				</div>
				<div class="col-md-4 h-100">
					<br/>
					<div class="card" style="height: 38.59rem;">
						<div class="card-header">
							<b>Resultados</b>
						</div>
						<div class="card-body">
							<table class="table" id="tabla">
							<thead>
								<tr>
									<th>Iter</th>
									<th>Raiz</th>
									<th>Error</th>
								</tr>
							</thead>
							<tbody>
								<tr>
								</tr>
							</tbody>
						</table>
						<pre>
						<?php
							//Llamar a la clase functions
							require("functions.php");
							/*Crear una instancia --> Esta parte $obj solo es un 
							ejemplo revisar functions para entender sintaxis
							$obj = new functions("x^3+x^2+x+1"); */
							if($_POST){
								$ecuacionU = $_POST['ecuacion'];
								$intervaloA = $_POST['a'];
								$intervaloB = $_POST['b'];
								$tolerancia = $_POST['tolerancia'];
								
								function bisection($ecuacionU, $intervaloA, $intervaloB, $tolerancia){
									if($intervaloA != null && $intervaloB != null && $tolerancia != null){
										$toleranciaAprox=1;
										$contador=0;
								
										//Convertir string a float
										$tolerancia = floatval($tolerancia);
										$intervaloA = floatval($intervaloA);
										$intervaloB = floatval($intervaloB);
								
										//Encontrar imagen de a en la ecuacion
										
										$funcionUser = new functions($ecuacionU);
										$fa=$funcionUser->getImage($intervaloA);
								
										while ($tolerancia <= $toleranciaAprox) {
											//Encontrar tolearancia Aproximada
											$toleranciaAprox=($intervaloB-$intervaloA)/2;
		
											//Encontrar el punto medio y su imagen
											$medio=$intervaloA + ($intervaloB-$intervaloA)/2;
											$fmedio=$funcionUser->getImage($medio);
		
											$contador=$contador+1;
		
											echo "  ".$contador."\t\t".round($medio,4)."\t\t".$toleranciaAprox."<br/>";
		
											//Aplicar el algoritmo para cambiar puntos
											if($fmedio==0||$toleranciaAprox<$tolerancia){
												return $medio;
											}
											if($fa*$fmedio>0){
												$intervaloA=$medio;
												$fa=$fmedio;
											}
											else{
												$intervaloB=$medio;
											}
										}
									}
								}

								if($intervaloA != null && $intervaloB != null && $tolerancia != null){
									$raiz=bisection($ecuacionU, $intervaloA, $intervaloB, $tolerancia);
									echo "<br>"."La raiz es: ".$raiz."<br>";
									echo "En el intervalo [".$intervaloA.",".$intervaloB."]";
								}
								else{
									echo "Puedes visualizar la funci??n"."<br>"."Busca el intervalo adecuado";
								}
							}
						?>
						</pre>
						</div>
					</div>
				</div>
				<div class="col-md-5 h-100">
					<br/>
					<div class="card" style="height: 38.59rem;">
						<div class="card-header">
							<b>Gr??fica</b>
						</div>
						<div class="card-body">
						<div id="plot" id="plotG"></div>
						<p>
						Used plot library: <a href="https://plot.ly/javascript/">Plotly</a>
						</p>
					</div>
				</div>
			</div>
		

		</div>

		<script>
			function draw() {
				try {
				//Recupear datos guardados en el localStorage
				const expression = window.localStorage.getItem('expression');
				const expr = math.compile(expression)

				// evaluate the expression repeatedly for different values of x
				const xValues = math.range(-10, 10, 0.5).toArray()
				const yValues = xValues.map(function (x) {
					return expr.evaluate({x: x})
				})

				// render the plot using plotly
				const trace1 = {
					x: xValues,
					y: yValues,
					type: 'scatter'
				}
				const data = [trace1]
				Plotly.newPlot('plot', data)
				}
				catch (err) {
				console.error(err)
				alert(err)
				}
			}

			document.getElementById('form').onsubmit = function (event) {
				// Buscar el elemento por su ID
				let expressionM = document.getElementById('eq').value
				// Guardar el elemento en el localStorage 
				window.localStorage.setItem('expression', expressionM)
				draw()
			}
			draw()
		</script>
		<br/> <br/> <br/> <br/> <br/> <br/> <br/>
		
			<h1 class="display-3" id="recomen">Puedes ingresar solo la funci??n para busca en la gr??fica un intervalo adecuado</h3>
		<br/> <br/> <br/> <br/> <br/> <br/> <br/>
		</section><!--/.team-->
		<!--team end-->

		
		<!--hm-footer end-->
		
		<!-- footer-copyright start -->
		<footer class="footer-copyright">
			<div class="container">
				<div class="row">
					<div class="col-sm-7">
						
					</div><!--/.col-->
					<div class="col-sm-5">
						
					</div><!--/.col-->
				</div><!--/.row-->
				<div id="scroll-Top">
					<i class="fa fa-angle-double-up return-to-top" id="scroll-top" data-toggle="tooltip" data-placement="top" title="" data-original-title="Back to Top" aria-hidden="true"></i>
				</div><!--/.scroll-Top-->
			</div><!-- /.container-->

		</footer><!-- /.footer-copyright-->
		<!-- footer-copyright end -->



		<!-- jaquery link -->

		<script src="assets/js/jquery.js"></script>
        <!-- Include all compiled plugins (below), or include individual files as needed -->
        
        <!--modernizr.min.js-->
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js"></script>
		
		
		<!--bootstrap.min.js-->
        <script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
		
		<!-- bootsnav js -->
		<script src="assets/js/bootsnav.js"></script>
		
		<!-- for manu -->
		<script src="assets/js/jquery.hc-sticky.min.js" type="text/javascript"></script>

		
		<!-- vedio player js -->
		<script src="assets/js/jquery.magnific-popup.min.js"></script>


		<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>
		
		<!--owl.carousel.js-->
        <script type="text/javascript" src="assets/js/owl.carousel.min.js"></script>

		<!-- counter js -->
		<script src="assets/js/jquery.counterup.min.js"></script>
		<script src="assets/js/waypoints.min.js"></script>

		
        
        <!--Custom JS-->
        <script type="text/javascript" src="assets/js/jak-menusearch.js"></script>
        <script type="text/javascript" src="assets/js/custom.js"></script>
		

    </body>
	
</html>