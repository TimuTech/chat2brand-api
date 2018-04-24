<?php

namespace TimuTech\Chat2Brand\Resources\Abstracts;

use Carbon\Carbon;
use TimuTech\Chat2Brand\Exceptions\ResourceException;
use TimuTech\Chat2Brand\Resources\Abstracts\ChatClient;

abstract class SupportOperator
{
	protected $id;
    protected $email;
    protected $online;
    protected $first_name;
    protected $last_name;
    
    public function setEmail(string $text)
    {
        $this->email = $email;
		
		return $this;
	}
	
	public function getEmail()
	{
		return $this->email;
	}

	public function setID(int $id)
	{
		$this->id = $id;
		
		return $this;
	}

	public function getID()
	{
		return $this->id;
	}
    
    public function setOnline(bool $online)
	{
		$this->online = $online;

		return $this;
	}
	
	public function getOnline()
	{
		return $this->online;
	}
    
    public function setFirstName(string $firstName)
	{
		$this->first_name = $firstName;

		return $this;
	}
	
	public function getFirstName()
	{
		return $this->first_name;
    }
    
    public function setLastName(string $lastName)
	{
		$this->last_name = $lastName;

		return $this;
	}
	
	public function getLastName()
	{
		return $this->last_name;
	}

	public function fill(array $data)
	{
		$this->id = $data['id'];
        $this->email = $data['email'];
        $this->online = isset($data['online']) ? $data['online'] : null;
        $this->last_name = isset($data['last_name']) ? $data['last_name'] : null;
        $this->first_name = isset($data['first_name']) ? $data['first_name'] : null;

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