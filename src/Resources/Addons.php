<?php

namespace CapsuleB\ZohoSubscriptions\Resources;

use CapsuleB\ZohoSubscriptions\Client;
use Exception;

/**
 * Class Addons
 * @package ZohoSubscriptions\Resources
 *
 * @property Client $client
 */
class Addons {

  const BASE_URL = 'addons';

  /**
   * Addons constructor.
   * @param Client $client
   */
  public function __construct(Client $client) {
    $this->client = $client;
  }

  /**
   *
   * @throws Exception
   */
  public function createOfUnitType() {
    throw new Exception('Not implemented');
  }

  /**
   *
   * @throws Exception
   */
  public function createOfTierType() {
    throw new Exception('Not implemented');
  }

  /**
   *
   * @throws Exception
   */
  public function createOfVolumeType() {
    throw new Exception('Not implemented');
  }

  /**
   *
   * @throws Exception
   */
  public function createOfPackageType() {
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
