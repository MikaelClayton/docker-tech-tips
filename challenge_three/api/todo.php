<?php
try {
    require_once("todo.controller.php");
    
    $uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
    $path = explode( '/', $uri);
    $requestType = $_SERVER['REQUEST_METHOD'];
    $body = file_get_contents('php://input');
    $pathCount = count($path);

    $controller = new TodoController();

    switch($requestType) {
        case 'GET':

            if ($path[$pathCount - 2] == 'todo' && isset($path[$pathCount - 1]) && strlen($path[$pathCount - 1])) {
                $id = $path[$pathCount - 1];
                $todo = $controller->load($id);
                if ($todo) {
                    http_response_code(200);
                    die(json_encode($todo));
                }
                http_response_code(404);
                die();
            } else {
                http_response_code(200);
                die(json_encode($controller->loadAll()));
            }
            break;
        case 'POST':
            $BodyArr = json_decode($body, true);
            $TodoObj = new Todo(
                $BodyArr["id"],
                $BodyArr["title"],
                $BodyArr["description"],
                $BodyArr["done"]
            );

            if ($controller->create($TodoObj)) {
                http_response_code(201);
                die(json_encode(["message" => "Todo created successfully"]));
            }

            http_response_code(404);
            die();
            break;
        case 'PUT':
            $BodyArr = json_decode($body, true);
            $IdStr = $BodyArr["id"];
            if (isset($IdStr) && strlen($IdStr)) {
                $TodoObj = new Todo(
                    $IdStr,
                    $BodyArr["title"],
                    $BodyArr["description"],
                    $BodyArr["done"]
                );
                if ($controller->update($IdStr, $TodoObj)) {
                    http_response_code(200);
                    die(json_encode(["message" => "Todo updated successfully"]));
                }

                http_response_code(404);
                die();
            }
            break;
        case 'DELETE':
            $BodyArr = json_decode($body, true);
            $IdStr = $BodyArr["id"];
            if (isset($IdStr) && strlen($IdStr)) {
                if ($controller->delete($IdStr)) {
                    http_response_code(200);
                    die(json_encode(["message" => "Todo deleted successfully"]));
                }

                http_response_code(404);
                die();
            }

            break;
        default:
            http_response_code(501);
            die();
            break;
    }
} catch(Throwable $e) {
    error_log($e->getMessage());
    http_response_code(500);
    die();
}
