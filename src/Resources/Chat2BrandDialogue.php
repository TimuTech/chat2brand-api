<?php

namespace TimuTech\Chat2Brand\Resources;

use TimuTech\Chat2Brand\Resources\Abstracts\ChatClient;

class Chat2BrandDialogue
{
    const STATE_OPEN = 'open';
    const STATE_CLOSED = 'closed';

    protected $id;
    protected $state;
    protected $operator_id;
    
    /**
     * Carbon\Carbon
     */
    protected $begin;

    /**
     * Carbon\Carbon
     */
    protected $end;

    public function setID(int $id)
    {
        $this->id = $id;

        return $this;
    }

    public function getID()
    {
        return $this->id;
    }

    public function setState(string $state)
    {
        $this->state = $state;

        return $this;
    }

    public function getState()
    {
        return $this->state;
    }

    public function setOperatorID(int $id)
    {
        $this->operator_id = $id;

        return $this;
    }

    public function getOperatorID()
    {
        return $this->operator_id;
    }

    public function fill(array $data)
	{
		$this->id = $data['id'];
        $this->state = isset($data['state']) ? $data['state'] : null;
        $this->operator_id = isset($data['operator_id']) ? $data['operator_id'] : null;
        $this->begin = isset($data['begin']) ? Carbon::parse($data['begin']) : null;
        $this->end = isset($data['end']) ? Carbon::parse($data['end']) : null;

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