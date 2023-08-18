<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>

    <h1 class="h1class">index.php</h1>
    <?
    require_once('system/loader.php');
    $uri = getRequestUri();
    $uri = str_replace('/notes2-uncox-withMVC/', '/', $uri);
    $parts = explode('/', $uri);
    $controller = $parts[1];
    $method = $parts[2];

    $params = array();
    for ($i = 3; $i < count($parts); $i++) {
        $params[] = $parts[$i];
    }
    $controllerClassname = ucfirst($controller) . "Controller";
    // $controllerFilePath = "mvc/controller/" . $controller .  ".php";
    // require_once($controllerFilePath);
    $controllerInstance = new  $controllerClassname();

    $controllerInstance->$method($params[0]);
    // echo "PARAMS-1:  $params[0] <hr>";
    // br();
    // echo $controllerClassname;
    // br();
    // echo $method;
    // br();
    // dump($params);
    ?>
</body>

</html>