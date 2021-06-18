<?php

namespace CapsuleB\ZohoSubscriptions\Resources;

use CapsuleB\ZohoSubscriptions\Client;
use Exception;

/**
 * Class BankAccounts
 *
 * @package CapsuleB\ZohoSubscriptions\Resources*
 * @property Client $client
 */
class BankAccounts {

  const BASE_URL = 'bankaccounts';

  /**
   * BankAccounts constructor.
   * @param Client $client
   */
  public function __construct(Client $client) {
    $this->client = $client;
  }

  /**
   *
   * @throws Exception
   */
  public function retrieve() {
    throw new Exception('Not implemented');
  }

}
