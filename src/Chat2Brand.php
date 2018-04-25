<?php

namespace TimuTech\Chat2Brand;

use TimuTech\Chat2Brand\ApiProxy;
use TimuTech\Chat2Brand\Factories\ClientFactory;
use TimuTech\Chat2Brand\Contracts\ProviderContract;
use TimuTech\Chat2Brand\Resources\Chat2BrandClient;
use TimuTech\Chat2Brand\Resources\Chat2BrandDialogue;
use TimuTech\Chat2Brand\Resources\Abstracts\ChatClient;
use TimuTech\Chat2Brand\Resources\Abstracts\ChatMessage;
use TimuTech\Chat2Brand\Resources\Abstracts\SupportOperator;

class Chat2Brand implements ProviderContract
{
	protected $clientFactory;
	protected $httpService;

	public function __construct($accessToken)
	{
		$this->clientFactory = new ClientFactory();
		$this->httpService = new ApiProxy($accessToken);
    }

    public function updateDialogue(Chat2BrandDialogue $dialogue)
    {
        return $this->httpService->updateDialogue($dialogue->getID(), [
            'operator_id' => $dialogue->getOperatorID(),
            'state' => $dialogue->getState()
        ]);
    }

    public function assignMessage(ChatMessage $message, SupportOperator $operator)
    {
        return $this->httpService->assignMessage($message->getID(), $operator->getID());
    }

    public function updateClient(ChatClient $client)
    {
        return $this->httpService->updateClient($client->getID(), [
            'name' => $client->getName()
        ]);
    }

    public function sendMessage(ChatClient $client, ChatMessage $message, int $channelId, string $text)
    {
        return $this->httpService->createMessage($client->getID(), $message->getTransport(), $channelId, $text);
    }

    public function getClient($id)
    {
        $data = $this->httpService->getClient($id);

        return $this->clientFactory->build(Chat2BrandClient::class, $data);
    }

    public function getClients(array $params = [])
    {
        $data = $this->httpService->getClients($params);

        return $this->clientFactory->build(Chat2BrandClient::class, $data, $multiple = true);
    }
}