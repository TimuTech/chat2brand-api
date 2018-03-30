<?php

namespace TimuTech\Chat2Brand\Contracts;

interface ApiContract
{
    /**
     * Get clients
     * 
     * @param  array  $params
     * @return array
     */
    public function getClients(array $params = []);
}