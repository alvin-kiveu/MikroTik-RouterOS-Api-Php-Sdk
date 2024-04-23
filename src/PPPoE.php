<?php

namespace MikrotikSdk;

use MikrotikSdk\MikrotikSdk;

class PPPoE extends MikrotikSdk
{
  //CREATE A PPPoE Secret
  public function addPPPoESecret($ip, $login, $password, $name, $profile)
  {
    $connect = $this->connect($ip, $login, $password);
    if ($connect) {
      // Add the PPPoE Secret
      $service = 'pppoe';
      $this->api->write('/ppp/secret/add', false);
      $this->api->write('=name=' . $name, false);
      $this->api->write('=password=' . $password, false);
      $this->api->write('=service=' . $service, false);
      $this->api->write('=profile=' . $profile);
      $pppoe = $this->api->read();
      $this->disconnect();
      return json_encode($pppoe);
    } else {
      return json_encode(['error' => 'Failed to connect to the Mikrotik']);
    }
  } 

  //REMOVE A PPPoE Secret
  public function removePPPoESecret($ip, $login, $password, $id)
  {
    $connect = $this->connect($ip, $login, $password);
    if ($connect) {
      // Remove the PPPoE Secret
      $this->api->write('/ppp/secret/remove', false);
      $this->api->write('=.id=' . $id);
      $pppoe = $this->api->read();
      $this->disconnect();
      return json_encode($pppoe);
    } else {
      return json_encode(['error' => 'Failed to connect to the Mikrotik']);
    }
  }


  //EDIT A PPPoE Secret

  public function editPPPoESecret($ip, $login, $password, $id, $name, $profile)
  {
    $connect = $this->connect($ip, $login, $password);
    if ($connect) {
      // Edit the PPPoE Secret
      $service = 'pppoe';
      $this->api->write('/ppp/secret/set', false);
      $this->api->write('=.id=' . $id, false);
      $this->api->write('=name=' . $name, false);
      $this->api->write('=service=' . $service, false);
      $this->api->write('=profile=' . $profile);
      $pppoe = $this->api->read();
      $this->disconnect();
      return json_encode($pppoe);
    } else {
      return json_encode(['error' => 'Failed to connect to the Mikrotik']);
    }
  }

  //GET ALL PPPoE Secrets

  public function getPPPoESecrets($ip, $login, $password)
  {
    $connect = $this->connect($ip, $login, $password);
    if ($connect) {
      // Get all PPPoE Secrets
      $this->api->write('/ppp/secret/getall');
      $pppoe = $this->api->read();
      $this->disconnect();
      return json_encode($pppoe);
    } else {
      return json_encode(['error' => 'Failed to connect to the Mikrotik']);
    }
  }

  //Create a PPPoE Profile
  public function addPPPoEProfile($ip, $login, $password, $name, $localAddress, $remoteAddress, $rateLimit)
  {
    $connect = $this->connect($ip, $login, $password);
    if ($connect) {
      // Add the PPPoE Profile
      $this->api->write('/ppp/profile/add', false);
      $this->api->write('=name=' . $name, false);
      $this->api->write('=local-address=' . $localAddress, false);
      $this->api->write('=remote-address=' . $remoteAddress, false);
      $this->api->write('=rate-limit=' . $rateLimit);
      $pppoe = $this->api->read();
      $this->disconnect();
      return json_encode($pppoe);
    } else {
      return json_encode(['error' => 'Failed to connect to the Mikrotik']);
    }
  }

  //Remove a PPPoE Profile

  public function removePPPoEProfile($ip, $login, $password, $id)
  {
    $connect = $this->connect($ip, $login, $password);
    if ($connect) {
      // Remove the PPPoE Profile
      $this->api->write('/ppp/profile/remove', false);
      $this->api->write('=.id=' . $id);
      $pppoe = $this->api->read();
      $this->disconnect();
      return json_encode($pppoe);
    } else {
      return json_encode(['error' => 'Failed to connect to the Mikrotik']);
    }
  }

  //Edit a PPPoE Profile 
  public function editPPPoEProfile($ip, $login, $password, $id, $name, $localAddress, $remoteAddress, $rateLimit)
  {
    $connect = $this->connect($ip, $login, $password);
    if ($connect) {
      // Edit the PPPoE Profile
      $this->api->write('/ppp/profile/set', false);
      $this->api->write('=.id=' . $id, false);
      $this->api->write('=name=' . $name, false);
      $this->api->write('=local-address=' . $localAddress, false);
      $this->api->write('=remote-address=' . $remoteAddress);
      $this->api->write('=rate-limit=' . $rateLimit);
      $pppoe = $this->api->read();
      $this->disconnect();
      return json_encode($pppoe);
    } else {
      return json_encode(['error' => 'Failed to connect to the Mikrotik']);
    }
  }

  //Get all PPPoE Profiles
  public function getPPPoEProfiles($ip, $login, $password)
  {
    $connect = $this->connect($ip, $login, $password);
    if ($connect) {
      // Get all PPPoE Profiles
      $this->api->write('/ppp/profile/getall');
      $pppoe = $this->api->read();
      $this->disconnect();
      return json_encode($pppoe);
    } else {
      return json_encode(['error' => 'Failed to connect to the Mikrotik']);
    }
  }

  //Get all PPPoE Active
  public function getPPPoEActive($ip, $login, $password)
  {
    $connect = $this->connect($ip, $login, $password);
    if ($connect) {
      // Get all PPPoE Active
      $this->api->write('/ppp/active/getall');
      $pppoe = $this->api->read();
      $this->disconnect();
      return json_encode($pppoe);
    } else {
      return json_encode(['error' => 'Failed to connect to the Mikrotik']);
    }
  }


}
