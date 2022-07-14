<?php include("head.php"); ?>

<html>
    <head>
        <meta http-equiv="Content-Type" Content="text/html; charset=UTF-8">
        <Title>Método Punto Fijo</Title>
</head>
<body>
    <?php
    
/*1. Definimos una función de variable real */

    function f($x){
        return ($x*$x)-(2*$x)+1;
    }

/* 2. Definimos una función de iteración de punto fijo*/
/* Nota: ($x*$x)-(2*$x)+1=0 ssi $x=1 + ($x*$x)/2*/

    function g($x){
        return (1 + ($x*$x))/2;
    }

/** 3. Probamos que todo lo cresdo funcione como debe de ser */

    $x=0;
    while(f($x)>1e-5){
        $x = g($x);
    }

    echo "La raíz aproximada es r = $x"."<br>";
    echo "f($x) = ".f($x)."(Este valor es cercano a 0)"."<br>";

    ?>

</body>
</html>

