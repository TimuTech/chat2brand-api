<?php

namespace TimuTech\Chat2Brand\Resources\Abstracts;

use TimuTech\Chat2Brand\Exceptions\ResourceException;

abstract class ChatClient
{
	protected $id;
    protected $name;
    protected $avatar;
    
    public function setAvatar($url)
    {
        $this->avatar = $avatar;
		
		return $this;
    }

	public function setID($id)
	{
		$this->id = $id;
		
		return $this;
	}

	public function setName($name)
	{
		$this->name = $name;

		return $this;
	}

	public function fill($data)
	{
		$this->id = $data['id'];
        $this->name = $data['name'];
        $this->avatar = $data['avatar'];

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