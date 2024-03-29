<?php

namespace CapsuleB\ZohoSubscriptions\Resources;

use CapsuleB\ZohoSubscriptions\Client;
use Exception;

/**
 * Class Products
 * @package CapsuleB\ZohoSubscriptions\Resources
 *
 * @property Client $client
 */
class Products {

  const BASE_URL = 'products';

  /**
   * Products constructor.
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
    $this->client->post(self::BASE_URL, [], $params);
  }

  /**
   * @param $productId
   * @return mixed
   * @throws Exception
   */
  public function retrieve($productId) {
    return $this->client->get([self::BASE_URL, $productId]);
  }

  /**
   * @param $productId
   * @param array $params
   * @return mixed
   * @throws Exception
   */
  public function update($productId, array $params = []) {
    return $this->client->put([self::BASE_URL, $productId], [], $params);
  }

  /**
   * @param $productId
   * @return mixed
   * @throws Exception
   */
  public function delete($productId) {
    return $this->client->delete([self::BASE_URL, $productId]);
  }

  /**
   * @return mixed
   * @throws Exception
   */
  public function listAll() {
    return $this->client->get(self::BASE_URL);
  }

  /**
   * @param $productId
   * @return mixed
   * @throws Exception
   */
  public function markAsActive($productId) {
    return $this->client->post([self::BASE_URL, $productId, 'markasactive']);
  }

  /**
   * @param $productId
   * @return mixed
   * @throws Exception
   */
  public function markAsInactive($productId) {
    return $this->client->post([self::BASE_URL, $productId, 'markasinactive']);
  }
}
