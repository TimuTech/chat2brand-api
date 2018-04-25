<?php

namespace TimuTech\Chat2Brand\Resources;

use TimuTech\Chat2Brand\Resources\Abstracts\ChatMessage;

class Chat2BrandMessage extends ChatMessage
{
    protected $transport;
    protected $type;
    protected $read;
    protected $dialog_id;

    public function setTransport(string $transport)
    {
        $this->transport = $transport;

        return $this;
    }

    public function getDialogueID()
    {
        return $this->transport;
    }

    public function setDialogueID(int $id)
    {
        $this->dialog_id = $id;

        return $this;
    }

    public function getTransport()
    {
        return $this->transport;
    }

    public function setType(string $type)
    {
        $this->type = $type;

        return $this;
    }

    public function getType()
    {
        return $this->type;
    }

    public function setRead(string $read)
    {
        $this->read = $read;

        return $this;
    }

    public function getRead()
    {
        return $this->read;
    }

    public function fill($data)
	{
		$this->transport = $data['transport'] ?: null;
        $this->type = $data['type'] ?: null;
        $this->read = $data['read'] ?: null;
        $this->dialog_id = isset($data['dialog_id']) ? $data['dialog_id'] : null;

		return parent::fill($data);
	}
}