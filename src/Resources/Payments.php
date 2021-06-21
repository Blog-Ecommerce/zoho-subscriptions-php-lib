<?php

namespace CapsuleB\ZohoSubscriptions\Resources;

use CapsuleB\ZohoSubscriptions\Client;
use Exception;

/**
 * Class Payments
 * @package CapsuleB\ZohoSubscriptions\Resources
 *
 * @property Client $client
 */
class Payments {

  const BASE_URL = 'payments';

  /**
   * Payments constructor.
   * @param Client $client
   */
  public function __construct(Client $client) {
    $this->client = $client;
  }

  /**
   * Create a Payment
   *
   * @return mixed
   * @throws Exception
   */
  public function create() {
    return $this->client->post(self::BASE_URL);
  }

  /**
   * Retrieve Payment from Id
   *
   * @param $invoiceId
   * @return mixed
   * @throws Exception
   */
  public function retrieve($invoiceId) {
    return $this->client->get([self::BASE_URL, $invoiceId]);
  }

  /**
   *
   * @throws Exception
   */
  public function update() {
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
