<?php

namespace ZohoSubscriptions\Resources;

use Client;

/**
 * Class Coupons
 * @package ZohoSubscriptions\Resources
 *
 * @property Client $client
 */
class Coupons {

  const BASE_URL = 'coupons';

  /**
   * Coupons constructor.
   * @param Client $client
   */
  public function __construct(Client $client) {
    $this->client = $client;
  }

}
