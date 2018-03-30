<?php

namespace TimuTech\Chat2Brand\Resources;

use TimuTech\Chat2Brand\Resources\Abstracts\ChatClient;

class Chat2BrandClient extends ChatClient
{
    protected $phone;

    public function fill($data)
	{
        $this->phone = $data['phone'];

        return parent::fill($data);
    }

    public function setPhone($phone)
	{
		$this->phone = $phone;

		return $this;
	}
}