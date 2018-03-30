<?php

namespace TimuTech\Chat2Brand;

use GuzzleHttp\Client;
use TimuTech\CodeCombat\Contracts\ApiContract;
use TimuTech\Chat2Brand\Exceptions\ApiException;

class ApiProxy implements ApiContract
{
    const ALLOWED_CLIENT_PARAMS = ['phone'];

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

    public function getClients(array $params = [])
    {
        if (!empty($params) && !array_intersect(array_keys($params), self::ALLOWED_CLIENT_PARAMS))
            throw ApiException::invalidGetClientsParams(implode(self::ALLOWED_CLIENT_PARAMS));

        $response = $this->httpClient->get($this->apiUrl."clients", [
            'query' => $params
        ]);

        return json_decode($response->getBody(), true);
    }
}