<?php
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Message\ResponseInterface;

$app->setBasePath("/slimRoute/public");
$app->post("/helloPost", function(ServerRequestInterface $request, ResponseInterface $response, array $args): ResponseInterface {
    $postParams = $request->getParsedBody();
    $name = $postParams["name"];
    $age = $postParams["age"];
    print("送信されたパラメータ: 名前は" . $name . "で年齢が". $age);
    return $response;
});

$app->get("/optionPlaceholder[/{option}]", function(ServerRequestInterface $request, ResponseInterface $response, array $args): ResponseInterface {
    $option = $args["option"];
    print($option);
    return $response;
});

$app->redirect("/google", "https://www.google.com/");

$app->any("/redirectOrNot/{flg}", function(ServerRequestInterface $request, ResponseInterface $response, array $args): ResponseInterface {
    $flg = $args["flg"];
    if ($flg == 0) {
        $response = $response->withHeader("Location", "https://www.google.com/");
        $response = $response->withStatus(302);
    } else {
        $content = "リダイレクトは行いません";
        $responseBody = $response->getBody();
        $responseBody->write($content);
    }
    return $response;
});
