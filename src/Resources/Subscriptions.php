<?php

namespace CapsuleB\ZohoSubscriptions\Resources;

use CapsuleB\ZohoSubscriptions\Client;
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
  public function create(array $params = []) {
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

  public function cancel() {}

  public function reactivate() {}

  public function delete() {}

  public function viewScheduledChanges() {}

  /**
   * List All subscriptions
   *
   * @param array $query
   * @return mixed
   * @throws Exception
   */
  public function listAll(array $query = []) {
    return $this->client->get(self::BASE_URL, $query);
  }

  /**
   *
   * @throws Exception
   */
  public function activities() {
    throw new Exception('Not implemented');
  }

  /**
   *
   * @throws Exception
   */
  public function buyOneTimeAddon() {
    throw new Exception('Not implemented');
  }

  /**
   *
   * @throws Exception
   */
  public function associateCoupon() {
    throw new Exception('Not implemented');
  }

  /**
   *
   * @throws Exception
   */
  public function removeCoupon() {
    throw new Exception('Not implemented');
  }

  /**
   *
   * @throws Exception
   */
  public function updateCard () {
    throw new Exception('Not implemented');
  }

  /**
   *
   * @throws Exception
   */
  public function removeCard() {
    throw new Exception('Not implemented');
  }

  /**
   *
   * @throws Exception
   */
  public function addCharge() {
    throw new Exception('Not implemented');
  }

  /**
   *
   * @throws Exception
   */
  public function addContactPerson() {
    throw new Exception('Not implemented');
  }

  /**
   *
   * @throws Exception
   */
  public function postponeRenewal() {
    throw new Exception('Not implemented');
  }

  /**
   *
   * @throws Exception
   */
  public function AddEditDescriptionPlan() {
    throw new Exception('Not implemented');
  }

  /**
   *
   * @throws Exception
   */
  public function AddEditDescriptionAddon() {
    throw new Exception('Not implemented');
  }

  /**
   *
   * @throws Exception
   */
  public function changeToOnlineOffline() {
    throw new Exception('Not implemented');
  }

  /**
   *
   * @throws Exception
   */
  public function updateReference() {
    throw new Exception('Not implemented');
  }

  /**
   *
   * @throws Exception
   */
  public function updateSalesPerson() {
    throw new Exception('Not implemented');
  }

  /**
   *
   * @throws Exception
   */
  public function updateCustomFields() {
    throw new Exception('Not implemented');
  }

  /**
   *
   * @throws Exception
   */
  public function addNote() {
    throw new Exception('Not implemented');
  }

  /**
   *
   * @throws Exception
   */
  public function deleteNote() {
    throw new Exception('Not implemented');
  }

}
