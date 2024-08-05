<?php

namespace MikrotikSdk;

use MikrotikSdk\MikrotikSdk;
use Exception;


class Hotspot extends MikrotikSdk
{
    //GET ALL HOTSPOT PROFILES
    public function getHotspotProfiles($ip, $login, $password)
    {
        $connect = $this->connect($ip, $login, $password);
        if ($connect) {
            // Get all Hotspot Profiles
            $this->api->write('/ip/hotspot/user/profile/print');
            $hotspot = $this->api->read();
            $this->disconnect();
            return json_encode($hotspot);
        } else {
            return json_encode(['error' => 'Failed to connect to the Mikrotik']);
        }
    }

    //ADD A HOTPOT PROFILE
    public function addHotspotProfile($ip, $login, $password, $name, $rateLimit, $sharedUsers, $poolname)
    {
        // Attempt to connect to the Mikrotik device
        $connect = $this->connect($ip, $login, $password);

        // Check if the connection was successful
        if (!$connect) {
            return json_encode(['error' => 'Failed to connect to the Mikrotik']);
        }

        try {
            // Add the Hotspot Profile
            $this->api->write('/ip/hotspot/user/profile/add', false);
            $this->api->write('=name=' . $name, false);
            $this->api->write('=shared-users=' . $sharedUsers, false);
            $this->api->write('=address-pool=' . $poolname, false);
            $this->api->write('=rate-limit=' . $rateLimit, true); // true to send and wait for a response
            // true to send and wait for a response

            // Read the response from the Mikrotik device
            $hotspot = $this->api->read();

            // Disconnect from the Mikrotik device
            $this->disconnect();

            // Check if the response contains an error message
            if (isset($hotspot['!trap'])) {
                // Handle the error
                return json_encode(['error' => $hotspot['!trap'][0]['message']]);
            }

            // Return the successful response
            return json_encode($hotspot);
        } catch (Exception $e) {
            // Handle any exceptions that occur
            return json_encode(['error' => $e->getMessage()]);
        }
    }


    //REMOVE A HOTSPOT PROFILE
    public function removeHotspotProfile($ip, $login, $password, $id)
    {
        $connect = $this->connect($ip, $login, $password);
        if ($connect) {
            // Remove the Hotspot Profile
            $this->api->write('/ip/hotspot/user/profile/remove', false);
            $this->api->write('=.id=' . $id);
            $hotspot = $this->api->read();
            $this->disconnect();
            return json_encode($hotspot);
        } else {
            return json_encode(['error' => 'Failed to connect to the Mikrotik']);
        }
    }

    //EDIT A HOTSPOT PROFILE
    public function editHotspotProfile($ip, $login, $password, $id, $name, $rateLimit, $sharedUsers, $poolname)
    {
        $connect = $this->connect($ip, $login, $password);
        if ($connect) {
            // Edit the Hotspot Profile
            $this->api->write('/ip/hotspot/user/profile/set', false);
            $this->api->write('=.id=' . $id, false);
            $this->api->write('=name=' . $name, false);
            $this->api->write('=shared-users=' . $sharedUsers, false);
            $this->api->write('=address-pool=' . $poolname, false);
            $this->api->write('=rate-limit=' . $rateLimit, true);
            $hotspot = $this->api->read();
            $this->disconnect();
            return json_encode($hotspot);
        } else {
            return json_encode(['error' => 'Failed to connect to the Mikrotik']);
        }
    }

    //GET ALL HOTSPOT USERS
    public function getHotspotUsers($ip, $login, $password)
    {
        $connect = $this->connect($ip, $login, $password);
        if ($connect) {
            // Get all Hotspot Users
            $this->api->write('/ip/hotspot/user/print');
            $hotspot = $this->api->read();
            $this->disconnect();
            return json_encode($hotspot);
        } else {
            return json_encode(['error' => 'Failed to connect to the Mikrotik']);
        }
    }


    //ADD A HOTSPOT USER
    public function addHotspotUser($ip, $login, $password, $name, $userpassword, $profile, $bitrate, $comment)
    {
        $connect = $this->connect($ip, $login, $password);
        if ($connect) {
            // Add the Hotspot User
            $this->api->write('/ip/hotspot/user/add', false);
            $this->api->write('=server=all', false);
            $this->api->write('=name=' . $name, false);
            $this->api->write('=password=' . $userpassword, false);
            $this->api->write('=profile=' . $profile, false);
            $this->api->write('=limit-bytes-total=' . $bitrate, false); // Use limit-bytes-total for byte rate
            $this->api->write('=disabled=no', false);
            $this->api->write('=comment=' . $comment);
            $hotspot = $this->api->read();
            $this->disconnect();
            return json_encode($hotspot);
        } else {
            return json_encode(['error' => 'Failed to connect to the Mikrotik']);
        }
    }





    //REMOVE A HOTSPOT USER
    public function removeHotspotUser($ip, $login, $password, $id)
    {
        $connect = $this->connect($ip, $login, $password);
        if ($connect) {
            // Remove the Hotspot User
            $this->api->write('/ip/hotspot/user/remove', false);
            $this->api->write('=.id=' . $id);
            $hotspot = $this->api->read();
            $this->disconnect();
            return json_encode($hotspot);
        } else {
            return json_encode(['error' => 'Failed to connect to the Mikrotik']);
        }
    }


    //EDIT A HOTSPOT USER

    public function editHotspotUser($ip, $login, $password, $id, $name, $userpassword, $profile, $uptimelimit, $bitrate)
    {
        $connect = $this->connect($ip, $login, $password);
        if ($connect) {
            // Edit the Hotspot User
            $this->api->write('/ip/hotspot/user/set', false);
            $this->api->write('=.id=' . $id, false);
            $this->api->write('=name=' . $name, false);
            $this->api->write('=password=' . $userpassword, false);
            $this->api->write('=profile=' . $profile, false);
            $this->api->write('=uptime-limit=' . $uptimelimit);
            $this->api->write('=limit-bytes-total=1G');
            $hotspot = $this->api->read();
            $this->disconnect();
            return json_encode($hotspot);
        } else {
            return json_encode(['error' => 'Failed to connect to the Mikrotik']);
        }
    }

    //GET ALL HOTSPOT ACTIVE USERS

    public function getHotspotActiveUsers($ip, $login, $password)
    {
        $connect = $this->connect($ip, $login, $password);
        if ($connect) {
            // Get all Hotspot Active Users
            $this->api->write('/ip/hotspot/active/print');
            $hotspot = $this->api->read();
            $this->disconnect();
            return json_encode($hotspot);
        } else {
            return json_encode(['error' => 'Failed to connect to the Mikrotik']);
        }
    }
}
