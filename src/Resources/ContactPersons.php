<?php

namespace CapsuleB\ZohoSubscriptions\Resources;

use CapsuleB\ZohoSubscriptions\Client;
use Exception;

/**
 * Class ContactPersons
 * @package CapsuleB\ZohoSubscriptions\Resources
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
  public function update () {
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

}
