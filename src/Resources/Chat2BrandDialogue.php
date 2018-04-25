<?php

namespace TimuTech\Chat2Brand\Resources;

use TimuTech\Chat2Brand\Resources\Abstracts\ChatClient;

class Chat2BrandDialogue
{
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
}