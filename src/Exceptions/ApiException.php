<?php

namespace TimuTech\Chat2Brand\Exceptions;

class ApiException extends \Exception
{
	public static function invalidGetClientsParams(string $params)
	{
		return new static("Invalid get parameters for clients. Valid parameters: ".$params);
	}

	public static function missingParameters(string $params)
	{
		return new static("Missing parameters for api proxy, needs: ".$params);
	}
}