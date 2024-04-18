<?php
namespace MikrotikSdk;

include_once 'RouterosAPI.php';

use RouterosAPI;

class MikrotikSdk
{
  private $api;

  public function __construct()
  {
      $this->api = new RouterosAPI();
  }

  public function connect($ip, $login, $password)
  {
      return $this->api->connect($ip, $login, $password);
  }

  public function disconnect()
  {
      $this->api->disconnect();
  }

  public function executeCommand($command, $param2 = true)
  {
      return $this->api->write($command, $param2);
  }

  public function sendCommand($com, $arr = array())
  {
      return $this->api->comm($com, $arr);
  }

  public function parseResponse($response)
  {
      return $this->api->parseResponse($response);
  }


  public function __destruct()
  {
      $this->disconnect();
  }
}
