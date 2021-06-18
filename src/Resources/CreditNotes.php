<?php

namespace CapsuleB\ZohoSubscriptions\Resources;

use CapsuleB\ZohoSubscriptions\Client;

/**
 * Class CreditNotes
 * @package ZohoSubscriptions\Resources
 *
 * @property Client $client
 */
class CreditNotes {

  const BASE_URL = 'creditnotes';

  /**
   * CreditNotes constructor.
   * @param Client $client
   */
  public function __construct(Client $client) {
    $this->client = $client;
  }

}
