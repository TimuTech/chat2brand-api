<?php

namespace TimuTech\Chat2Brand;

use GuzzleHttp\Client;
use TimuTech\Chat2Brand\Contracts\ApiContract;
use TimuTech\Chat2Brand\Exceptions\ApiException;
use TimuTech\Chat2Brand\Resources\Chat2BrandClient;

class ApiProxy implements ApiContract
{
    const ALLOWED_CLIENT_PARAMS = ['phone', 'limit'];

	protected $httpClient;
	protected $apiUrl = 'https://api.chat2brand.co.za/v1/';
	protected $accessToken;

	public function __construct($accessToken)
	{
        $this->accessToken = $accessToken;
		$this->httpClient = new Client([
				'headers' => [
					'Authorization' => $this->accessToken
				]
			]);
    }

    public function assignMessage(int $messageId, int $operatorId)
    {
        if (!$messageId || !$operatorId)
            throw ApiException::missingParameters('message_id, operator_id');

		$response = $this->httpClient->post($this->apiUrl.'messages/'.$messageId.'/assign', [
				'json' => [
					'operator_id' => $operatorId
				]
			]);

		return json_decode($response->getBody(), true);
    }

    public function updateClient(int $id, array $clientData)
    {
        if (!$id || !isset($clientData['name']))
            throw ApiException::missingParameters('client_id, name');

		$response = $this->httpClient->put($this->apiUrl.'clients/'.$id, [
				'json' => [
					'nickname' => $clientData['name']
				]
			]);

		return json_decode($response->getBody(), true);
    }

    public function createMessage(int $clientId, string $transport, int $channelId, string $text)
    {
        if (!$clientId || !$transport || !$channelId)
			throw ApiException::missingParameters('client_id', 'transport', 'channel_id');

		$response = $this->httpClient->post($this->apiUrl.'messages', [
				'json' => [
					'client_id' => $clientId,
                    'text' => $text,
                    'transport' => $transport,
                    'channel_id' => $channelId
				]
			]);

		return json_decode($response->getBody(), true);
    }

    public function getClients(array $params = [])
    {
        if (!empty($params) && !array_intersect(array_keys($params), self::ALLOWED_CLIENT_PARAMS))
            throw ApiException::invalidGetClientsParams(implode(self::ALLOWED_CLIENT_PARAMS));

        $response = $this->httpClient->get($this->apiUrl."clients", [
            'query' => $params
        ]);

        return json_decode($response->getBody(), true);
    }

    public function getClient(int $id)
    {
        if (!$id)
            throw ApiException::missingParameters('client_id');

        $response = $this->httpClient->get($this->apiUrl."clients/".$id);

        return json_decode($response->getBody(), true);
    }
}