<?php

namespace CapsuleB\ZohoSubscriptions\Resources;

use CapsuleB\ZohoSubscriptions\Client;
use Exception;

/**
 * Class Plans
 *
 * @package CapsuleB\ZohoSubscriptions\Resources*
 * @property Client $client
 */
class Plans {

  const BASE_URL = 'plans';

  /**
   * Plans constructor.
   * @param Client $client
   */
  public function __construct(Client $client) {
    $this->client = $client;
  }

  /**
   * @param array $params
   * @throws Exception
   */
  public function create(array $params = []) {
    $this->client->post(self::BASE_URL, $params);
  }

  /**
   * @param $planId
   * @return mixed
   * @throws Exception
   */
  public function retrieve($planId) {
    return $this->client->get([self::BASE_URL, $planId]);
  }

  /**
   * @param $planId
   * @param array $params
   * @return mixed
   * @throws Exception
   */
  public function update($planId, array $params = []) {
    return $this->client->put([self::BASE_URL, $planId], null, $params);
  }

  /**
   * @param $planId
   * @param array $params
   * @return mixed
   * @throws Exception
   */
  public function delete($planId, array $params = []) {
    return $this->client->delete([self::BASE_URL, $planId], null, $params);
  }

  /**
   * @return mixed
   * @throws Exception
   */
  public function listAll() {
    return $this->client->get(self::BASE_URL);
  }

  /**
   * @param $planId
   * @return mixed
   * @throws Exception
   */
  public function markAsActive($planId) {
    return $this->client->post([self::BASE_URL, $planId, 'markasactive']);
  }

  /**
   * @param $planId
   * @return mixed
   * @throws Exception
   */
  public function markAsInactive($planId) {
    return $this->client->post([self::BASE_URL, $planId, 'markasin-active']);
  }
}
