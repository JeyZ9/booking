<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- <link rel="stylesheet" href="index.css" /> -->
</head>
<body class="overflow-x-hidden py-5">
    <div class="min-w-screen h-auto lg:px-[15em] md:px-[5em] px-[2em]">

    <?php require './component/header.php'; ?>

        <main class="w-full h-auto my-10">
            <?php

                $routes = [
                    '/booking/index.php' => 'HomeController@index',
                    '/booking/index.php/ticket' => 'TicketController@index',
                    '/booking/index.php/dev' => 'DevController@index',
                    '/booking/index.php/dev/ticket/edit' => 'EditTicketController@index',
                    '/booking/index.php/dev/ticket/create' => 'TicketCreateController@index',
                ];

                $request_uri = $_SERVER['REQUEST_URI'];

                $request_uri = strtok($request_uri, '?');

                if (array_key_exists($request_uri, $routes)) {
                    $controller_action = $routes[$request_uri];
                    list($controller_name, $action_name) = explode('@', $controller_action);
                                        
                    require_once 'controllers/' . $controller_name . '.php';
                    
                    $controller = new $controller_name();
                    
                    $controller->$action_name();

                    // echo "controller test : " . $controller_name;
                    
                } else {
                    http_response_code(404);
                    echo '404 Not Found';
                }
                ?>
        </main>
        <?php require './component/footer.php'; ?>

    </div>
</body>
</html>


