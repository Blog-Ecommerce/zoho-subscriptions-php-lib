<?php

namespace CapsuleB\ZohoSubscriptions\Resources;

use CapsuleB\ZohoSubscriptions\Client;
use Exception;

/**
 * Class CreditNotes
 *
 * @package CapsuleB\ZohoSubscriptions\Resources*
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
  public function email() {
    throw new Exception('Not implemented');
  }

  /**
   *
   * @throws Exception
   */
  public function void() {
    throw new Exception('Not implemented');
  }

  /**
   *
   * @throws Exception
   */
  public function openVoided() {
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
  public function applyCredits() {
    throw new Exception('Not implemented');
  }

}
