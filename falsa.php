<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Proyecto Metodos Numericos</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css"
          rel="stylesheet"
          integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3"
          crossorigin="anonymous" />

    <link rel="stylesheet" href="../styles/styles.css" media="screen">

</head>

<body>

    <div class="container-fluid">
        
        <br />
        <br />



        <!doctype html>
        <html lang="en">
        <head>
            <title>Falsa Posición</title>
            <!-- Required meta tags -->
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

            <!-- Bootstrap CSS v5.0.2 -->
            <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

            <script src="https://unpkg.com/mathjs@10.0.1/lib/browser/math.js"></script>
            <script src="https://cdn.plot.ly/plotly-1.35.2.min.js"></script>

            <link rel="stylesheet" href="../styles/styles.css" media="screen">

        </head>
        <body>

            <div class="container">
                <div class="row row-eq-height">
                    <div class="col-md-3 h-100">
                        <br />
                        <div class="card" style="height: 38.59rem;">
                            <div class="card-header">
                                Encontrar Raiz por Biseccion
                            </div>
                            <div class="card-body">
                                <form action="falsa.php" method="post" id="form">
                                    <br /> La ecuacion Ingresada debe ser un polinomio de maximo
                                    grado 3, por lo que solo se aceptan ecuaciones de la forma
                                    a*x^3+b*x^2+c*x+d. <br /><br />

                                    Ecuacion: <input required class="form-control" type="text" name="ecuacion" id="eq">
                                    <br />
                                    Valor a: <input class="form-control" type="text" name="a" id="a">
                                    <br />
                                    Valor b: <input class="form-control" type="text" name="b" id="b">
                                    <br />
                                    Tolerancia: <input class="form-control" type="text" name="tolerancia" id="tol">
                                    <br />
                                    <button class="btn btn-success" type="submit">Calcular Raiz</button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 h-100">
                        <br />
                        <div class="card" style="height: 38.59rem;">
                            <div class="card-header">
                                Resultados
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
                    
                    </pre>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-5 h-100">
                        <br />
                        <div class="card" style="height: 38.59rem;">
                            <div class="card-header">
                                Grafica
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
                <br />
                <br />
                <h1 class="display-3" id="recomen">
                    
                    

                    
                    
                    Puedes ingresar solo la funcion para busca en la grafica un intervalo adecuado</h1>
                    <br />
        </body>
    </html>




</div>
</body>
</html>