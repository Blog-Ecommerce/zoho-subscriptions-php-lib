<?php

namespace ZohoSubscriptions\Resources;

use Client;

/**
 * Class ContactPersons
 * @package ZohoSubscriptions\Resources
 *
 * @property Client $client
 */
class ContactPersons {

  const BASE_URL = 'contactpersons';

  /**
   * ContactPersons constructor.
   * @param Client $client
   */
  public function __construct(Client $client) {
    $this->client = $client;
  }

}
