<?php

namespace MikrotikSdk;

use MikrotikSdk\MikrotikSdk;

class StaticIp extends MikrotikSdk
{
    // CREATE A STATIC IP
    public function addStaticIp($ip, $login, $password, $interface, $address, $network, $gateway)
    {
        try {
            $connect = $this->connect($ip, $login, $password);
            if (!$connect) {
                throw new \Exception('Failed to connect to the Mikrotik');
            }

            // Add the Static IP
            $this->api->write('/ip/address/add', false);
            $this->api->write('=interface=' . $interface, false);
            $this->api->write('=address=' . $address, false);
            $this->api->write('=network=' . $network, false);
            $this->api->write('=gateway=' . $gateway);
            $static = $this->api->read();
            $this->disconnect();

            return json_encode($static);
        } catch (\Exception $e) {
            return json_encode(['error' => $e->getMessage()]);
        }
    }

    // REMOVE A STATIC IP
    public function removeStaticIp($ip, $login, $password, $id)
    {
        try {
            $connect = $this->connect($ip, $login, $password);
            if (!$connect) {
                throw new \Exception('Failed to connect to the Mikrotik');
            }

            // Remove the Static IP
            $this->api->write('/ip/address/remove', false);
            $this->api->write('=.id=' . $id);
            $static = $this->api->read();
            $this->disconnect();

            return json_encode($static);
        } catch (\Exception $e) {
            return json_encode(['error' => $e->getMessage()]);
        }
    }

    // EDIT A STATIC IP
    public function editStaticIp($ip, $login, $password, $id, $interface, $address, $network, $gateway)
    {
        try {
            $connect = $this->connect($ip, $login, $password);
            if (!$connect) {
                throw new \Exception('Failed to connect to the Mikrotik');
            }

            // Edit the Static IP
            $this->api->write('/ip/address/set', false);
            $this->api->write('=.id=' . $id, false);
            $this->api->write('=interface=' . $interface, false);
            $this->api->write('=address=' . $address, false);
            $this->api->write('=network=' . $network, false);
            $this->api->write('=gateway=' . $gateway);
            $static = $this->api->read();
            $this->disconnect();

            return json_encode($static);
        } catch (\Exception $e) {
            return json_encode(['error' => $e->getMessage()]);
        }
    }


    //Get active static ip
    public function getStaticIp($ip, $login, $password)
    {
        try {
            $connect = $this->connect($ip, $login, $password);
            if (!$connect) {
                throw new \Exception('Failed to connect to the Mikrotik');
            }

            // Get all Static IP
            $this->api->write('/ip/address/print');
            $static = $this->api->read();
            $this->disconnect();

            return json_encode($static);
        } catch (\Exception $e) {
            return json_encode(['error' => $e->getMessage()]);
        }
    }
}
