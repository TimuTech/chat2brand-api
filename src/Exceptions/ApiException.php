<?php

namespace TimuTech\Chat2Brand\Exceptions;

class ApiException extends \Exception
{
	public static function invalidGetClientsParams(string $params)
	{
		return new static("Invalid get parameters for clients. Valid parameters: ".$params);
	}
}