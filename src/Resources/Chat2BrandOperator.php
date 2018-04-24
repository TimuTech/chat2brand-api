<?php

namespace TimuTech\Chat2Brand\Resources;

use Carbon\Carbon;
use TimuTech\Chat2Brand\Resources\Abstracts\SupportOperator;

class Chat2BrandOperator extends SupportOperator
{
    protected $phone;
    protected $role;
    protected $offline_type;
    protected $opened_dialogs;

    /**
     * Carbon\Carbon
     */
    protected $last_visit;

    /**
     * TODO role setter getter
     */

    public function setOpenedDialogs(int $dialogs)
    {
        $this->opened_dialogs = $dialogs;
	}
	
	public function getOpenedDialogs()
	{
		return $this->opened_dialogs;
    }
    
    public function setOfflineType($type)
    {
        $this->offline_type = $type;
	}
	
	public function getOfflineType()
	{
		return $this->offline_type;
    }

    public function setLastVisit(Carbon $date)
    {
        $this->last_visit = $date;
	}
	
	public function getLastVisit()
	{
		return $this->last_visit;
    }
    
    public function setPhone(string $phone)
	{
		$this->phone = $phone;

		return $this;
	}
	
	public function getPhone()
	{
		return $this->phone;
    }

    public function fill(array $data)
	{
		$this->role = isset($data['role']) ? $data['role'] : null;
        $this->offline_type = isset($data['offline_type']) ? $data['offline_type'] :  null;
        $this->opened_dialogs = isset($data['opened_dialogs']) ? $data['opened_dialogs'] : null;
        $this->last_visit = isset($data['last_visit']) ? Carbon::parse($data['last_visit']) : null;

		return parent::fill($data);
	}
}