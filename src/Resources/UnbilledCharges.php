<?php

namespace CapsuleB\ZohoSubscriptions\Resources;

use CapsuleB\ZohoSubscriptions\Client;
use Exception;

/**
 * Class UnbilledCharges
 * @package ZohoSubscriptions\Resources
 *
 * @property Client $client
 */
class UnbilledCharges {

  const BASE_URL = 'unbilledcharges';

  /**
   * UnbilledCharges constructor.
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

  /**
   *
   * @throws Exception
   */
  public function convertToInvoice() {
    throw new Exception('Not implemented');
  }

  /**
   *
   * @throws Exception
   */
  public function delete() {
    throw new Exception('Not implemented');
  }

}
