<?php

namespace TimuTech\Chat2Brand\Contracts;

interface ProviderContract
{
    /**
     * Get clients
     * 
     * @param  array  $params
     * @return mixed
     */
    public function getClients(array $params = []);
}