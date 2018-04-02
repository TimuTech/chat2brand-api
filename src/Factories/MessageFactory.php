<?php

namespace TimuTech\Chat2Brand\Factories;

use Carbon\Carbon;
use TimuTech\Chat2Brand\Resources\Chat2BrandMessage;

class MessageFactory
{
	/**
     * Build our message object from the data received from Chat2Brand.
     * Through this abstraction Chat2Brand changing attribute names keeps us from refactoring with them
     * 
     * @param  string  $type
     * @param  array  $data
     * @param  bool  $multiple
     * @return TimuTech\Chat2Brand\Resources\Chat2BrandMessage|array
     */
	public function build($type, array $data, bool $multiple = false)
	{
		switch($type)
		{
            case Chat2BrandMessage::class:
                if ($multiple)
                {
                    $users = [];
                    foreach($data['data'] as $client)
                        array_push($users, $this->chatMessage($client));

                    return $users;
                }
                else
                {
                    return $this->chatMessage($data);
                }	    
		}
    }

    public function chatMessage($data)
    {
        $buildData = [];
        $buildData['id'] = $data['id'];
        $buildData['text'] = $data['text'];
        $buildData['photo'] = $data['photo'];
        $buildData['client_id'] = $data['client_id'];
        $buildData['sent_at'] = (Carbon::parse($data['created']));
        $buildData['transport'] = $data['transport'];
        $buildData['type'] = $data['type'];
        $buildData['read'] = $data['read'];
        $message = (new Chat2BrandMessage)->fill($buildData);

        return (new Chat2BrandMessage)->fill($buildData);
    }
}