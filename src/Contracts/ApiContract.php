<?php

namespace TimuTech\Chat2Brand\Contracts;

use TimuTech\Chat2Brand\Resources\Chat2BrandClient;

interface ApiContract
{
    /**
     * Assign message to operator
     * 
     * @param  integer  $messageId
     * @param  integer  $operatorId
     * @return array
     */
    public function assignMessage(int $messageId, int $operatorId);

    /**
     * Update client
     * 
     * @param  integer  $id
     * @param  array  $clientData
     * @return array
     */
    public function updateClient(int $id, array $clientData);

    /**
     * Create chat message
     * 
     * @param  int  $clientId
     * @param  string  $transport
     * @param  int  $channelId
     * @param  string  $text
     * @return array
     */
    public function createMessage(int $clientId, string $transport, int $channelId, string $text);

    /**
     * Get clients
     * 
     * @param  array  $params
     * @return array
     */
    public function getClients(array $params = []);

    /**
     * Get client
     * 
     * @param  integer  $id
     * @return array
     */
    public function getClient(int $id);
}