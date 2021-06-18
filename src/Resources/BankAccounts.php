<?php

namespace CapsuleB\ZohoSubscriptions\Resources;

use CapsuleB\ZohoSubscriptions\Client;

/**
 * Class BankAccounts
 * @package ZohoSubscriptions\Resources
 *
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

}
