<?php

namespace CapsuleB\ZohoSubscriptions\Resources;

use CapsuleB\ZohoSubscriptions\Client;
use Exception;

/**
 * Class Cards
 * @package ZohoSubscriptions\Resources
 *
 * @property Client $client
 */
class Cards {

  const BASE_URL = 'cards';

  /**
   * Cards constructor.
   * @param Client $client
   */
  public function __construct(Client $client) {
    $this->client = $client;
  }

  /**
   * Retrieve a credit card information
   * Details of an existing credit card.
   *
   * @param $customerId
   * @param $cardId
   * @return mixed
   * @throws Exception
   */
  public function retrieve($customerId, $cardId) {
    return $this->client->get(['customers', $customerId, self::BASE_URL, $cardId]);
  }

  /**
   * Delete a credit card
   * Delete an existing credit card.
   *
   * @param $customerId
   * @param $cardId
   * @return mixed
   * @throws Exception
   */
  public function delete($customerId, $cardId) {
    return $this->client->delete(['customers', $customerId, self::BASE_URL]);
  }

  /**
   * List all Active Credit Cards of a Customer
   * List of all the Active Credit Cards of a Customer
   *
   * @param $customerId
   * @return mixed
   * @throws Exception
   */
  public function listAll($customerId) {
    return $this->client->get(['customers', $customerId, self::BASE_URL]);
  }

}
