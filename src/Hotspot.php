<?php

namespace MikrotikSdk;

use MikrotikSdk\MikrotikSdk;

class Hotspot extends MikrotikSdk
{

  //ADD A HOTPOT PROFILE
  public function addHotspotProfile($ip, $login, $password, $name, $rateLimit, $sharedUsers)
  {
    $connect = $this->connect($ip, $login, $password);
    if ($connect) {
      // Add the Hotspot Profile
      $this->api->write('/ip/hotspot/user/profile/add', false);
      $this->api->write('=name=' . $name, false);
      $this->api->write('=shared-users=' . $sharedUsers, false);
      $this->api->write('=rate-limit=' . $rateLimit, false);
      $hotspot = $this->api->read();
      $this->disconnect();
      return json_encode($hotspot);
    } else {
      return json_encode(['error' => 'Failed to connect to the Mikrotik']);
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
  public function editHotspotProfile($ip, $login, $password, $id, $name, $rateLimit, $sharedUsers)
  {
    $connect = $this->connect($ip, $login, $password);
    if ($connect) {
      // Edit the Hotspot Profile
      $this->api->write('/ip/hotspot/user/profile/set', false);
      $this->api->write('=.id=' . $id, false);
      $this->api->write('=name=' . $name, false);
      $this->api->write('=shared-users=' . $sharedUsers, false);
      $this->api->write('=rate-limit=' . $rateLimit);
      $hotspot = $this->api->read();
      $this->disconnect();
      return json_encode($hotspot);
    } else {
      return json_encode(['error' => 'Failed to connect to the Mikrotik']);
    }
  }


  //ADD A HOTSPOT USER
  public function addHotspotUser($ip, $login, $password, $name, $userpassword, $profile, $uptimelimit, $bitrate)
  {
    $connect = $this->connect($ip, $login, $password);
    if ($connect) {
      // Add the Hotspot User
      $this->api->write('/ip/hotspot/user/add', false);
      $this->api->write('=name=' . $name, false);
      $this->api->write('=password=' . $userpassword, false);
      $this->api->write('=profile=' . $profile);
      $this->api->write('=uptime-limit=' . $uptimelimit);
      $this->api->write('=total-bytes-limit=' . $bitrate);
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
      $this->api->write('=total-bytes-limit=' . $bitrate);
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
