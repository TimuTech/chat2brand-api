<?php

namespace TimuTech\Chat2Brand\Contracts;

use TimuTech\Chat2Brand\Resources\Abstracts\ChatClient;
use TimuTech\Chat2Brand\Resources\Abstracts\ChatMessage;
use TimuTech\Chat2Brand\Resources\Abstracts\SupportOperator;

interface ProviderContract
{
    /**
     * Assign chat message to operator
     * 
     * @param  int  $dialogueId
     * @param  int  $operatorId
     * @param  string  $status
     * @return array
     */
    public function updateDialogue(int $dialogueId, int $operatorId, string $status);

    /**
     * Assign chat message to operator
     * 
     * @param  TimuTech\Chat2Brand\Resources\Abstracts\ChatMessage  $client
     * @param  TimuTech\Chat2Brand\Resources\Abstracts\SupportOperator  $operator
     * @return array
     */
    public function assignMessage(ChatMessage $message, SupportOperator $operator);

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
     * @param  TimuTech\Chat2Brand\Resources\Abstracts\ChatMessage  $message
     * @param  int  $channelId
     * @param  string  $text
     * @return array
     */
    public function sendMessage(ChatClient $client, ChatMessage $message, int $channelId, string $text);

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