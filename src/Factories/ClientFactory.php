<?php

namespace TimuTech\Chat2Brand\Factories;

use TimuTech\Chat2Brand\Resources\Chat2BrandClient;

class ClientFactory
{
	/**
     * Build our user object from the data received from Chat2Brand.
     * Through this abstraction Chat2Brand changing attribute names keeps us from refactoring with them
     * 
     * @param  string  $type
     * @param  array  $data
     * @param  bool  $multiple
     * @return TimuTech\Chat2Brand\Resources\Chat2BrandClient|array
     */
	public function build($type, array $data, bool $multiple = false)
	{
		switch($type)
		{
            case Chat2BrandClient::class:
                if ($multiple)
                {
                    $users = [];
                    foreach($data['data'] as $client)
                        array_push($users, $this->chatClient($client));

                    return $users;
                }
                else
                {
                    return $this->chatClient($data);
                }	    
		}
    }

    public function chatClient($data)
    {
        $buildData = [];
        $buildData['id'] = $data['id'];
        $buildData['name'] = $data['assigned_name'];
        $buildData['avatar'] = $data['avatar'];
        $buildData['phone'] = $data['phone'];

        return (new Chat2BrandClient)->fill($buildData);
    }
}