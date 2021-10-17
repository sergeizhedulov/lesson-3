<?php

define("TEMPLATES_DIR", "./templates/");
define("LAYOUTS_DIR", "layouts/");

if (isset($_GET["page"])) {
    $page = $_GET["page"];
} else {
    $page = "index";
}

$params = ["login" => "admin"];
switch ($page) {
    case "index":
        $params["name"] = "Клен";
        break;
    case "catalog":
        $params["catalog"] = [
            [
                "name" => "Пицца",
                "price" => 24
            ],
            [
                "name" => "Чай",
                "price" => 1
            ],
            [
                "name" => "Яблоко",
                "price" => 12
            ],
        ];
        break;

        // Запрос для frontend части.
    case "apicatalog":
        $params["catalog"] = [
            [
                "name" => "Пицца",
                "price" => 24
            ],
            [
                "name" => "Яблоко",
                "price" => 12
            ],
        ];
        echo json_encode($params, JSON_UNESCAPED_UNICODE);
        exit;
        break;
}

echo render($page, $params);

function render($page, $params = [])
{
    return renderTemplate(LAYOUTS_DIR . "main", [
        "content" => renderTemplate($page, $params),
        "menu" => renderTemplate('menu'),
    ]);
}

function renderTemplate($page, $params = [])
{
    ob_start();

    if (!is_null($params))
        extract($params);
//    foreach ($params as $key => $param) {
//        $$key = $param;
//    }

    $fileName = TEMPLATES_DIR . $page . ".php";
    if (file_exists($fileName)) {
        include $fileName;
    } else {
        die("Такой страницы не существует. 404");
    }

    return ob_get_clean();
}