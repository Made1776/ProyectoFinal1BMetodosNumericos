<!DOCTYPE html>
<html>
	<head><title>Método de Posición Falsa</title></head>
	<body style = "background-color:#fa2323;">
		
		<div style="background-color:LIGHTBLUE">
		<font color="White" face="Comic Sans MS,arial">
		<h2 style="text-align:center;">
			Programa para calcular las raices de una función por el método de posición falsa<br>
		</h2>
		<h3>Ingrese una funcion, use sintaxis PHP. (No abreviar multiplicaciones usar siempre *)<br>Los límites del intervalo de interés, 
		el numero de subintervalos y una tolerancia.</h3>
		</div>

		 <form action="falsaposicion.php" method="post" >
			<div><label>X:</label><br>			<input type="text" name="ecuacion" value="<?php if(isset($_POST['ecuacion'])){echo $_POST['ecuacion'];}?>"><br></div>
			<div><label>a:</label><br>      	<input type="text" name="linf" value="<?php if(isset($_POST['linf'])){echo $_POST['linf'];}?>"><br></div>
			<div><label>b:</label><br>   		<input type="text" name="lsup" value="<?php if(isset($_POST['lsup'])){echo $_POST['lsup'];}?>"><br></div>
			<div><label>n:</label><br> 			<input type="text" name="inter" value="<?php if(isset($_POST['inter'])){echo $_POST['inter'];}?>"><br></div>
			<div><label>Tolerancia:</label><br> <input type="text" name="toler" value="<?php if(isset($_POST['toler'])){echo $_POST['toler'];}?>"><br></div>
			<div><label>Método: </label><br>	<select id = "metodo" name="metodo">
												<option value = "falsa">Falsa Posición</option>
												</div>	
		  <input type="submit" value="submit">
		</font>
		</form> 
		
		
	</body>
</html>

<?php

	function fnEval($x,$func){
		$area=0;
		$func=str_replace("x",'('.$x.')', $func);
		eval("\$area=".$func.";");
		if ($area == 0) $area="0";
		elseif ($area=='' || $area == "-1.#IND" ){
			$area = "NAN";
		}
		return (float) $area;
	}
	
	function metodoFalsa($func, $ak, $bk, $eps, $kmax){
		
		for($i=0; $i<=$kmax; $i++){ 
			
			$arr['k'][] = $i;
			$arr['a'][] = $ak;
			$arr['b'][] = $bk;
			$arr['fa'][] = fnEval($ak,$func);
			$arr['fb'][] = fnEval($bk,$func);
			$arr['c'][] = $arr['b'][$i] - ($arr['fb'][$i])*(($arr['b'][$i] - $arr['a'][$i])/($arr['fb'][$i] - $arr['fa'][$i]));
			$arr['fc'][] = fnEval($arr['c'][$i],$func);
			if( abs($arr['b'][$i] - $arr['c'][$i]) <= $eps && abs($arr['fc'][$i]) <= $eps ){
				echo 'Raiz: '.$arr['c'][$i];
				imprimirHibrido($arr);
				return;
			}elseif ( $arr['fb'][$i]*$arr['fc'][$i] <= 0 ){
				$ak = $arr['c'][$i];
			}else{
				$bk = $arr['c'][$i];
			}
		}
		echo 'La solucion no converge en '.$kmax.' iteraciones';
		imprimirHibrido($arr);
		return;
	}
	
	if ($_SERVER["REQUEST_METHOD"] == "POST" && $_POST['ecuacion']!=NULL && 
	$_POST['linf'] !=NULL && $_POST['lsup'] != NULL && $_POST['toler'] != NULL && $_POST['inter'] != NULL && $_POST['metodo'] != NULL) {
		$n = $_POST['inter'];
		$a = $_POST['linf'];
		$b = $_POST['lsup'];
		$epsilon = $_POST['toler'];
		$f = $_POST["ecuacion"];
		$h = ($b-$a)/$n;
		$raiz;
		$kmax = (int) log (($b-$a)/$epsilon, 2);
		$anterior = 0;
		$error = 0;
		$metod = $_POST['metodo'];
				
		if($b<=$a){
			echo '<br>Limites de integracion incorrectos<br>';
		}else{
			for($i=0; $i<$n; $i++){
				if(fnEval($a+$i*$h, $f) * fnEval($a + ($i+1)*$h, $f) < 0){
					echo '<br>Subintervalo '.($i+1). ' :[ ' .$a+$i*$h. ' ; '.$a + ($i+1)*$h.' ]<br>';
					echo 'Se encontró un cambio de signo <br>';
							metodoFalsa($f, ($a+$i*$h), ($a+($i+1)*$h), $epsilon, $kmax);
				}else{
					echo '<br>Subintervalo '.($i+1). ' :[ ' .$a+$i*$h. ' - '.$a + ($i+1)*$h.' ]<br>';
					echo 'No se encontró un cambio de signo <br>';
				}
			}
		}
	}
?>
</html>