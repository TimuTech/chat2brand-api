<?php

namespace TimuTech\Chat2Brand\Resources;

use TimuTech\Chat2Brand\Resources\Abstracts\ChatMessage;

class Chat2BrandMessage extends ChatMessage
{
    protected $transport;
    protected $type;
    protected $read;

    public function setTransport(string $transport)
    {
        $this->transport = $transport;
    }

    public function setType(string $type)
    {
        $this->type = $type;
    }

    public function setRead(string $read)
    {
        $this->read = $read;
    }

    public function fill($data)
	{
		$this->transport = $data['transport'] ?: null;
        $this->type = $data['type'] ?: null;
        $this->read = $data['read'] ?: null;

		return parent::fill($data);
	}
}