<?php

namespace TimuTech\Chat2Brand\Resources\Abstracts;

use Carbon\Carbon;
use TimuTech\Chat2Brand\Exceptions\ResourceException;
use TimuTech\Chat2Brand\Resources\Abstracts\ChatClient;

abstract class ChatMessage
{
	protected $id;
    protected $text;
    protected $photo;
	protected $client_id;
	protected $channel_id;

    /**
     * TimuTech\Chat2Brand\Resources\Abstracts\ChatClient
     */
    protected $client;

    /**
     * Carbon\Carbon
     */
	protected $sent_at;
	
	public function setChannelID($channelId)
    {
        $this->channel_id = $channelId;
		
		return $this;
	}
	
	public function getChannelID()
	{
		return $this->channel_id;
	}
    
    public function setText($text)
    {
        $this->text = $text;
		
		return $this;
	}
	
	public function getText()
	{
		return $this->text;
	}

	public function setID($id)
	{
		$this->id = $id;
		
		return $this;
	}

	public function getID()
	{
		return $this->id;
	}

	public function setPhoto($url)
	{
		$this->url = $url;

		return $this;
	}
	
	public function getPhoto()
	{
		return $this->photo;
	}
    
    public function setClient(ChatClient $client)
	{
		$this->client = $client;

		return $this;
	}
	
	public function getClient()
	{
		return $this->client;
	}
    
    public function setSentAt(Carbon $date)
    {
        $this->sent_at = $date;
	}
	
	public function getSentAt()
	{
		return $this->sent_at;
	}

	public function setClientID(int $id)
	{
		$this->client_id = $id;

		return $this;
	}

	public function getClientId()
	{
		return $this->client_id;
	}

	public function fill($data)
	{
		$this->id = $data['id'];
        $this->text = $data['text'];
        $this->photo = $data['photo'] ?: null;
        $this->client_id = $data['client_id'] ?: null;
		$this->sent_at = $data['sent_at'] ?: null;
		$this->channel_id = $data['channel_id'] ?: null;

		return $this;
	}

	public function __toString()
	{
		return serialize($this);
	}

	protected static function isAssociative(array $array)
	{
	    // Keys of the array
	    $keys = array_keys($array);

	    // If the array keys of the keys match the keys, then the array must
	    // not be associative (e.g. the keys array looked like {0:0, 1:1...}).
	    return array_keys($keys) !== $keys;
	}
}