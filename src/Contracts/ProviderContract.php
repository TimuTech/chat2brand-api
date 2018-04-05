<?php

namespace TimuTech\Chat2Brand\Contracts;

use TimuTech\Chat2Brand\Resources\Abstracts\ChatClient;

interface ProviderContract
{
    /**
     * Update client
     * 
     * @param  TimuTech\Chat2Brand\Resources\Abstracts\ChatClient  $client
     * @return array
     */
    public function updateClient(ChatClient $client);

    /**
     * Send message to client
     * 
     * @param  TimuTech\Chat2Brand\Resources\Abstracts\ChatClient  $client
     * @param  string  $transport
     * @param  int  $channelId
     * @param  string  $text
     * @return array
     */
    public function sendMessage(ChatClient $client, string $transport, int $channelId, string $text);

    /**
     * Get clients
     * 
     * @param  array  $params
     * @return TimuTech\Chat2Brand\Resources\Chat2BrandClient
     */
    public function getClients(array $params = []);

    /**
     * Get client
     * 
     * @param  integer  $id
     * @return TimuTech\Chat2Brand\Resources\Chat2BrandClient
     */
    public function getClient($id);
}