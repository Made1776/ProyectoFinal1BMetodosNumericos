<!DOCTYPE html>
<html>
	<head><title>Tarea 06. Capúz Sebastián</title></head>
	<body style = "background-color:#fa2323;">
		
		<div style="text-align:center; background-color:#000000">
			<h1>
				<font color="White" face="Comic Sans MS,arial">Escuela Politécnica Nacional<br>Métodos Numéricos
				<li>Sebastián Capúz</li>
				</font>
			</h1>
		</div>

		<div style="background-color:LIGHTBLUE">
		<font color="White" face="Comic Sans MS,arial">
		<h2 style="text-align:center;">
			Programa para calcular las raices de una función por varios métodos<br>
		</h2>
		<h3>Ingrese una funcion, use sintaxis PHP. (No abreviar multiplicaciones usar siempre *)<br>Los límites del intervalo de interés, 
		el numero de subintervalos y una tolerancia.</h3>
		</div>

		 <form action="Tarea06Capuz.php" method="post" >
			<div><label>X:</label><br>			<input type="text" name="ecuacion" value="<?php if(isset($_POST['ecuacion'])){echo $_POST['ecuacion'];}?>"><br></div>
			<div><label>a:</label><br>      	<input type="text" name="linf" value="<?php if(isset($_POST['linf'])){echo $_POST['linf'];}?>"><br></div>
			<div><label>b:</label><br>   		<input type="text" name="lsup" value="<?php if(isset($_POST['lsup'])){echo $_POST['lsup'];}?>"><br></div>
			<div><label>n:</label><br> 			<input type="text" name="inter" value="<?php if(isset($_POST['inter'])){echo $_POST['inter'];}?>"><br></div>
			<div><label>Tolerancia:</label><br> <input type="text" name="toler" value="<?php if(isset($_POST['toler'])){echo $_POST['toler'];}?>"><br></div>
			<div><label>Método: </label><br>	<select id = "metodo" name="metodo">
												<option value = "bisec">Bisección</option>
												<option value = "newton">Newton</option>
												<option value = "secante">Secante</option>
												<option value = "hibrid">Híbrido</option>
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
	
	function biseccion ($ak,$bk, $k,$func, $eps){
		$c;
		for($i=0; $i<=$k; $i++){
			$c = ($ak + $bk)/2;
			$arr['k'][] = $i;
			$arr['a'][] = $ak;
			$arr['b'][] = $bk;
			$arr['c'][] = $c;
			$arr['fc'][] = fnEval($c,$func);
			if( abs($bk - $c) <= $eps && abs(fnEval($c,$func)) < $eps){
				echo 'Raiz: '.$arr['c'][$i];
				return $arr;
			}else if (fnEval($bk,$func)*fnEval($c,$func) <= 0){
				$ak = $c;
			}else{
				$bk = $c;
			}
		}
	}
	
	function imprimirBisec($arr, $f, $eps){
		echo "<br><table class = 'default'; border = '0.5'; cellspacing = '5'; cellpading = '25'; width = '50%'; align = 'center'; bgcolor = 'C0C0C0'>
			<tr>
				<th>Ecuación:</th>
				<th>".$f."</th>
				<th>Tolerancia: ".$eps."</th>
			</tr>
			<tr></tr>
			<tr>
				<th>k</th>
				<th>a</th>
				<th>b</th>
				<th>c</th>
				<th>fc</th>
			</tr>";
		for($j=0; $j < count($arr['k']); $j++){
			printf("<tr>
					<td align='center'>%d</td>
					<td align='center'>%.8f</td>
					<td align='center'>%.8f</td>
					<td align='center'>%.8f</td>
					<td align='center'>%.8f</td>
				</tr>", $arr['k'][$j], $arr['a'][$j], $arr['b'][$j], $arr['c'][$j], $arr['fc'][$j]);
		}
		echo '</table><br>';
	}
	
	function derivadaNumer($x,$eps, $func){
		$delta = 1;
		$anterior = 0;
		$derivada;
		do{
			$derivada = (fnEval($x+$delta,$func) - fnEval($x,$func))/$delta;
			$error = abs($anterior - $derivada);
			$anterior = $derivada;
			$delta/=2;
		}while($eps < $error);
		return $derivada;
	}
	
	function metodoNewton($func, $xo, $eps, $kmax){
		$arr['k'][] = 0;
		$arr['x'][] = $xo;
		$arr['fx'][] = fnEval($xo,$func);
		$arr['f1x'][] = derivadaNumer($xo, $eps, $func);
		for($i=1; $i<=$kmax; $i++){ 
			$arr['k'][$i] = $i;
			$arr['x'][$i] = $arr['x'][$i-1] - ($arr['fx'][$i-1]/$arr['f1x'][$i-1]);
			$arr['fx'][$i] = fnEval($arr['x'][$i],$func);
			$arr['f1x'][$i] = derivadaNumer($arr['x'][$i], $eps, $func);
			if( abs($arr['fx'][$i-1]) < $eps ){
				echo 'Raiz en la aprox inicial: '.$arr['x'][$i-1].'<br>';
				return;
			}elseif ( $arr['f1x'][$i-1] == 0 ){
				echo 'Raiz nula en la '.$i.' iteracion';
				imprimirNewton($arr);
				return;
			}elseif ( abs($arr['x'][$i] - $arr['x'][$i-1]) <= $eps ){
				echo 'Raiz: '.$arr['x'][$i];
				imprimirNewton($arr);
				return;
			}
		}
		echo 'La solucion no converge en '.$kmax.' iteraciones';
	}
	
	function imprimirNewton($arr){
		echo "<br><table class = 'default'; border = '0.5'; cellspacing = '5'; cellpading = '25'; width = '50%'; align = 'center'; bgcolor = 'C0C0C0'>
			<tr></tr>
			<tr>
				<th>k</th>
				<th>x</th>
				<th>fx</th>
				<th>f1x</th>
			</tr>";
		for($j=0; $j < count($arr['k']); $j++){
			printf("<tr>
					<td align='center'>%d</td>
					<td align='center'>%.8f</td>
					<td align='center'>%.8f</td>
					<td align='center'>%.8f</td>
				</tr>", $arr['k'][$j], $arr['x'][$j], $arr['fx'][$j], $arr['f1x'][$j]);
		}
		echo '</table><br>';
	}
	
	function metodoSecante($func, $xo, $x1, $eps, $kmax){
		$arr['k'][] = 0;
		$arr['k'][] = 1;
		$arr['x'][] = $xo;
		$arr['x'][] = $x1;
		$arr['fx'][] = fnEval($xo,$func);
		$arr['fx'][] = fnEval($x1,$func);
		for($i=2; $i<=$kmax; $i++){ 
			
			$arr['k'][$i] = $i;
			$arr['x'][$i] = $arr['x'][$i-1] - ($arr['fx'][$i-1])*(($arr['x'][$i-1] - $arr['x'][$i-2])/($arr['fx'][$i-1] - $arr['fx'][$i-2]));
			$arr['fx'][$i] = fnEval($arr['x'][$i],$func);
			
			if( abs($arr['fx'][$i-1]) < $eps ){
				echo 'Raiz en la aprox inicial: '.$arr['x'][$i-1].'<br>';
				return;
			}elseif ( abs($arr['x'][$i] - $arr['x'][$i-1]) <= $eps && abs($arr['fx'][$i]) <= $eps){
				echo 'Raiz: '.$arr['x'][$i];
				imprimirSecante($arr);
				return;
			}
		}
		echo 'La solucion no converge en '.$kmax.' iteraciones';
	}
	
	function imprimirSecante($arr){
		echo "<br><table class = 'default'; border = '0.5'; cellspacing = '5'; cellpading = '25'; width = '50%'; align = 'center'; bgcolor = 'C0C0C0'>
			<tr></tr>
			<tr>
				<th>k</th>
				<th>x</th>
				<th>fx</th>
			</tr>";
		for($j=0; $j < count($arr['k']); $j++){
			printf("<tr>
					<td align='center'>%d</td>
					<td align='center'>%.8f</td>
					<td align='center'>%.8f</td>
				</tr>", $arr['k'][$j], $arr['x'][$j], $arr['fx'][$j]);
		}
		echo '</table><br>';
	}
	
	function metodoHibrido($func, $ak, $bk, $eps, $kmax){
		
		for($i=0; $i<=$kmax; $i++){ 
			
			$arr['k'][] = $i;
			$arr['a'][] = $ak;
			$arr['b'][] = $bk;
			$arr['fa'][] = fnEval($ak,$func);
			$arr['fb'][] = fnEval($bk,$func);
			$arr['c'][] = ($arr['fb'][$i]*$arr['a'][$i] - $arr['fa'][$i]*$arr['b'][$i])/($arr['fb'][$i] - $arr['fa'][$i]);
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
	
	function imprimirHibrido($arr){
		echo "<br><table class = 'default'; border = '0.5'; cellspacing = '5'; cellpading = '25'; width = '50%'; align = 'center'; bgcolor = 'C0C0C0'>
			<tr></tr>
			<tr>
				<th>k</th>
				<th>a</th>
				<th>fa</th>
				<th>b</th>
				<th>fb</th>
				<th>c</th>
				<th>fc</th>
			</tr>";
		for($j=0; $j < count($arr['k']); $j++){
			printf("<tr>
					<td align='center'>%d</td>
					<td align='center'>%.8f</td>
					<td align='center'>%.8f</td>
					<td align='center'>%.8f</td>
					<td align='center'>%.8f</td>
					<td align='center'>%.8f</td>
					<td align='center'>%.8f</td>
				</tr>", $arr['k'][$j], $arr['a'][$j], $arr['fa'][$j], $arr['b'][$j], $arr['fb'][$j],
				$arr['c'][$j], $arr['fc'][$j]);
		}
		echo '</table><br>';
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
					switch($metod){
						case 'bisec':
							$arr = biseccion($a+$i*$h, $a + ($i+1)*$h, $kmax, $f, $epsilon);
							imprimirBisec($arr, $f, $epsilon);
							break;
						case 'newton':
							metodoNewton($f, ($a+$i*$h), $epsilon, $kmax);
							break;
						case 'secante':
							metodoSecante($f, ($a+$i*$h), ($a+($i+1)*$h), $epsilon, $kmax);
							break;
						case 'hibrid':
							metodoHibrido($f, ($a+$i*$h), ($a+($i+1)*$h), $epsilon, $kmax);
							break;
						case 'falsa':
							metodoFalsa($f, ($a+$i*$h), ($a+($i+1)*$h), $epsilon, $kmax);
							break;
					}
					
				}else{
					echo '<br>Subintervalo '.($i+1). ' :[ ' .$a+$i*$h. ' - '.$a + ($i+1)*$h.' ]<br>';
					echo 'No se encontró un cambio de signo <br>';
				}
			}
		}
	}
?>
</html>