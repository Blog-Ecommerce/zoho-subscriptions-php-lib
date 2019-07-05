<?php

namespace ZohoSubscriptions\Resources;

use Client;
use Exception;

/**
 * Class Subscriptions
 * @package ZohoSubscriptions\Resources
 *
 * @property Client $client
 */
class Subscriptions {

  const BASE_URL = 'subscriptions';

  /**
   * Subscriptions constructor.
   * @param Client $client
   */
  public function __construct(Client $client) {
    $this->client = $client;
  }

  /**
   * Create a subscription
   *
   * Create a new subscription. To create a subscription for a new customer, you have to pass the customer object.
   * To create a subscription for a existing customer pass the customer_id of that customer.
   *
   * @param array $params
   * @return mixed
   * @throws Exception
   */
  public function create($params = []) {
    return $this->client->post(self::BASE_URL, null, $params);
  }

  /**
   * Retrieve a subscription
   *
   * Details of an existing subscription.
   *
   * @param $subscriptionId
   * @return mixed
   * @throws Exception
   */
  public function retrieve($subscriptionId) {
    return $this->client->get([self::BASE_URL, $subscriptionId]);
  }

  /**
   * Update a subscription
   *
   * Update details of an existing subscription.
   *
   * @param $subscriptionId
   * @return mixed
   * @throws Exception
   */
  public function update($subscriptionId) {
    return $this->client->put(self::BASE_URL, $subscriptionId);
  }

}
