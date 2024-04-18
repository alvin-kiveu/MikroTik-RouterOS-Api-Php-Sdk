<?php

namespace MikrotikSdk;

use MikrotikSdk\MikrotikSdk;


class Pool extends MikrotikSdk
{


    public function getPool($ip, $login, $password)
    {
       $connect = $this->connect($ip, $login, $password);
       if ($connect) {
          // Get the pool
          $this->api->write('/ip/pool/print');
          $pool = $this->api->read();
          $this->disconnect();
          return json_encode($pool);
       }else{
            return json_encode(['error' => 'Failed to connect to the Mikrotik']);
       }
    }


    public function addPool($ip, $login, $password, $name, $ranges)
    {
       $connect = $this->connect($ip, $login, $password);
       if ($connect) {
          // Add the pool
          $this->api->write('/ip/pool/add', false);
          $this->api->write('=name='.$name, false);
          $this->api->write('=ranges='.$ranges);
          $pool = $this->api->read();
          $this->disconnect();
          return json_encode($pool);
       }else{
            return json_encode(['error' => 'Failed to connect to the Mikrotik']);
       }
    }


    public function removePool($ip, $login, $password, $id)
    {
       $connect = $this->connect($ip, $login, $password);
       if ($connect) {
          // Remove the pool
          $this->api->write('/ip/pool/remove', false);
          $this->api->write('=.id='.$id);
          $pool = $this->api->read();
          $this->disconnect();
          return json_encode($pool);
       }else{
            return json_encode(['error' => 'Failed to connect to the Mikrotik']);
       }
    }

    public function editPool($ip, $login, $password, $id, $name, $ranges)
    {
       $connect = $this->connect($ip, $login, $password);
       if ($connect) {
          // Edit the pool
          $this->api->write('/ip/pool/set', false);
          $this->api->write('=.id='.$id, false);
          $this->api->write('=name='.$name, false);
          $this->api->write('=ranges='.$ranges);
          $pool = $this->api->read();
          $this->disconnect();
          return json_encode($pool);
       }else{
            return json_encode(['error' => 'Failed to connect to the Mikrotik']);
       }
    }

    
}