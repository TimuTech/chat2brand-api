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
        $buildData['id'] = $data['message_id'];
        $buildData['text'] = $data['text'];
        $buildData['photo'] = isset($data['photo']) ? $data['photo'] : null;
        $buildData['client_id'] = $data['client_id'];
        $buildData['sent_at'] = isset($data['created']) ? (Carbon::parse($data['created'])) : null;
        $buildData['transport'] = $data['transport'];
        $buildData['type'] = $data['type'];
        $buildData['read'] = isset($data['read']) ? $data['read'] : null;
        $buildData['channel_id'] = isset($data['channel_id']) ? $data['channel_id'] : null;
        $buildData['dialog_id'] = isset($data['dialog_id']) ? $data['dialog_id'] : null;
        $message = (new Chat2BrandMessage)->fill($buildData);

        return (new Chat2BrandMessage)->fill($buildData);
    }
}