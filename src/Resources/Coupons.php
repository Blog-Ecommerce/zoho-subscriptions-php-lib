<?php

namespace CapsuleB\ZohoSubscriptions\Resources;

use CapsuleB\ZohoSubscriptions\Client;
use Exception;

/**
 * Class Coupons
 *
 * @package CapsuleB\ZohoSubscriptions\Resources*
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

  /**
   *
   * @throws Exception
   */
  public function create() {
    throw new Exception('Not implemented');
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

  /**
   *
   * @throws Exception
   */
  public function listAll() {
    throw new Exception('Not implemented');
  }

  /**
   *
   * @throws Exception
   */
  public function markAsActive() {
    throw new Exception('Not implemented');
  }

  /**
   *
   * @throws Exception
   */
  public function markAsInactive() {
    throw new Exception('Not implemented');
  }

}
