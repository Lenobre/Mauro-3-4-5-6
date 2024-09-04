<!DOCTYPE html>
<html>
<head>
    <title>Calculadora Simples</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <?php
    $pg_atual = 'resultado';

    include 'navbar.php';
    ?>
    <div class='container-fluid'>
        <h1>Resultado:</h1>
    <?php
    $action = isset($_GET["action"]) ? $_GET["action"] : null;

    function actionHandler(string $action)
    {  
        $actions = [
            "sum" => function($n1, $n2) {
                return $n1 + $n2;
            },
            "sub" => function($n1, $n2) {
                return $n1 - $n2;
            },
            "mul" => function($n1, $n2, $n3) {
                return $n1 * $n2 * $n3;
            },
            "div" => function(&$n1, &$n2) {
                $resultado = $n1 / $n2;
                echo $resultado;
            }
        ];

        $values = [
            isset($_GET["n1"]) ? $_GET["n1"] : null,
            isset($_GET["n2"]) ? $_GET["n2"] : null,
            isset($_GET["n3"]) ? $_GET["n3"] : null
        ];

        return $actions[$action](...$values);
    }

    $resultado = actionHandler($action);
    echo $resultado;    
    ?>  
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
