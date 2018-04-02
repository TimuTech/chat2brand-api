<?php

namespace TimuTech\Chat2Brand;

use TimuTech\Chat2Brand\ApiProxy;
use TimuTech\Chat2Brand\Factories\ClientFactory;
use TimuTech\Chat2Brand\Contracts\ProviderContract;
use TimuTech\Chat2Brand\Resources\Chat2BrandClient;

class Chat2Brand implements ProviderContract
{
	protected $clientFactory;
	protected $httpService;

	public function __construct($accessToken)
	{
		$this->clientFactory = new ClientFactory();
		$this->httpService = new ApiProxy($accessToken);
    }

    public function sendMessage(ChatClient $client, string $transport, int $channelId, string $text)
    {
        return $this->httpService->createMessage($client->id, $transport, $channelId, $text);
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