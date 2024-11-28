<?php


use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

require 'BlockchainService.php';

$blockchainService = new BlockchainService();


// Home route - Display Blockchain
// Home route - Display Blockchain
$app->get('/', function (Request $request, Response $response, $args) use ($blockchainService) {
    // Get the renderer from the container
    $renderer = $this->get('view');

    $data = $blockchainService->getChain();
    return $renderer->render($response, 'blockchain.php', ['data' => $data]);
});


// Add Transaction
$app->map(['GET', 'POST'], '/transactions', function (Request $request, Response $response, $args) use ($blockchainService) {
    $message = '';
    if ($request->getMethod() == 'POST') {
        $params = (array)$request->getParsedBody();
        $sender = $params['sender'] ?? '';
        $receiver = $params['receiver'] ?? '';
        $amount = $params['amount'] ?? '';
        if ($sender && $receiver && $amount) {
            $result = $blockchainService->addTransaction($sender, $receiver, $amount);
            $message = $result['message'];
        } else {
            $message = 'Please fill in all fields.';
        }
    }
    return $this->get('view')->render($response, 'transactions.php', ['message' => $message]);
});

// Mine Block
$app->get('/mine', function (Request $request, Response $response, $args) use ($blockchainService) {
    $data = $blockchainService->mineBlock();
    return $this->get('view')->render($response, 'mine.php', ['data' => $data]);
});

// Check Validity
$app->get('/is_valid', function (Request $request, Response $response, $args) use ($blockchainService) {
    $data = $blockchainService->isValid();
    return $this->get('view')->render($response, 'is_valid.php', ['data' => $data]);
});

// Replace Chain
$app->get('/replace_chain', function (Request $request, Response $response, $args) use ($blockchainService) {
    $data = $blockchainService->replaceChain();
    return $this->get('view')->render($response, 'replace_chain.php', ['data' => $data]);
});
