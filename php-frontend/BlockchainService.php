<?php
// BlockchainService.php

use GuzzleHttp\Client;

class BlockchainService {
    private $client;
    private $api_url;

    public function __construct() {
        $this->client = new Client();
        $this->api_url = 'http://localhost:5000'; // Replace with your Flask backend URL if different
    }

    public function getChain() {
        $response = $this->client->get($this->api_url . '/get_chain');
        return json_decode($response->getBody(), true);
    }

    public function addTransaction($sender, $receiver, $amount) {
        $response = $this->client->post($this->api_url . '/add_transaction', [
            'json' => [
                'sender' => $sender,
                'receiver' => $receiver,
                'amount' => $amount
            ]
        ]);
        return json_decode($response->getBody(), true);
    }

    public function mineBlock() {
        $response = $this->client->get($this->api_url . '/mine_block');
        return json_decode($response->getBody(), true);
    }

    public function isValid() {
        $response = $this->client->get($this->api_url . '/is_valid');
        return json_decode($response->getBody(), true);
    }

    public function replaceChain() {
        $response = $this->client->get($this->api_url . '/replace_chain');
        return json_decode($response->getBody(), true);
    }
}
