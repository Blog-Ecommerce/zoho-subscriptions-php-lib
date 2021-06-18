<?php

namespace CapsuleB\ZohoSubscriptions\Resources;

use CapsuleB\ZohoSubscriptions\Client;
use Exception;

/**
 * Class Customers
 *
 * @package CapsuleB\ZohoSubscriptions\Resources*
 * @property Client $client
 */
class Customers {

  const BASE_URL = 'customers';

  /**
   * Customers constructor.
   * @param Client $client
   */
  public function __construct(Client $client) {
    $this->client = $client;
  }

  /**
   * Create a customer
   * A new customer can a be created separately as well as at the time of creation of a new subscription.
   *
   * @param $params
   * @return mixed
   * @throws Exception
   */
  public function create($params) {
    return $this->client->post([self::BASE_URL], null, $params);
  }

  /**
   * Retrieve a customer
   * Details of an existing customer.
   *
   * @param $customerId
   * @return mixed
   * @throws Exception
   */
  public function retrieve($customerId) {
    return $this->client->get([self::BASE_URL, $customerId]);
  }

  /**
   * Update a customer
   * Update details of an existing customer
   *
   * @param $customerId
   * @param $params
   * @return mixed
   * @throws Exception
   */
  public function update($customerId, $params) {
    return $this->client->put([self::BASE_URL, $customerId], null, $params);
  }

  /**
   * Delete a customer
   * Delete an existing customer.
   *
   * @param $customerId
   * @return mixed
   * @throws Exception
   */
  public function delete($customerId) {
    return $this->client->delete([self::BASE_URL, $customerId]);
  }


  /**
   * List all customers
   * List of all customers. You can list customers based on various filter criterias.
   * The allowed values for filter_by are Status.(All, Active, Inactive, Gapps, Crm, NonSubscribers, PortalEnabled, PortalDisabled).
   *
   * @param array $query
   * @return mixed
   * @throws Exception
   */
  public function listAll(array $query = []) {
    return $this->client->get([self::BASE_URL], $query);
  }

  /**
   * List of transactions
   * List of all transactions associated with a particular customer.
   * Transactions of particular type can be filtered by passing a param filter_by.
   * The allowed values for filter_by are TransactionType.(All, INVOICE, PAYMENT, CREDIT, REFUND).
   *
   * @param array $query
   * @return mixed
   * @throws Exception
   */
  public function listTransactions(array $query = []) {
    return $this->client->get([self::BASE_URL], $query);
  }

  /**
   * Mark as active
   * Change status of the customer to active.
   *
   * @param $customerId
   * @return mixed
   * @throws Exception
   */
  public function markAsActive($customerId) {
    return $this->client->post([self::BASE_URL, $customerId, 'markasactive']);
  }

  /**
   * Mark as inactive
   * Change status of the customer to inactive.
   * A cutomer can be marked as inactive only if there is no active subscription associated with the customer.
   *
   * @param $customerId
   * @return mixed
   * @throws Exception
   */
  public function markAsInactive($customerId) {
    return $this->client->post([self::BASE_URL, $customerId, 'markasinactive']);
  }
}
