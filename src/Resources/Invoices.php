<?php

namespace CapsuleB\ZohoSubscriptions\Resources;

use CapsuleB\ZohoSubscriptions\Client;
use Exception;

/**
 * Class Invoices
 * @package CapsuleB\ZohoSubscriptions\Resources
 *
 * @property Client $client
 */
class Invoices {

  const BASE_URL = 'invoices';

  /**
   * Invoices constructor.
   * @param Client $client
   */
  public function __construct(Client $client) {
    $this->client = $client;
  }

  /**
   * Retrieve Invoice from Id
   *
   * @param $invoiceId
   * @return mixed
   * @throws Exception
   */
  public function retrieve($invoiceId) {
    return $this->client->get([self::BASE_URL, $invoiceId]);
  }

  /**
   * List All Invoices
   *
   * @param array $query
   * @return mixed
   * @throws Exception
   */
  public function listAll(array $query = []) {
    return $this->client->get(self::BASE_URL, $query);
  }

  /**
   * Collect charge
   *
   * Charge a customer for an invoice
   *
   * @param $invoiceId
   * @param $params
   * @return mixed
   * @throws Exception
   */
  public function collectChargeCreditCard($invoiceId, $params) {
    return $this->client->post([self::BASE_URL, $invoiceId, 'collect'], [], $params);
  }

  /**
   * Collect charge
   *
   * Charge a customer for an invoice
   *
   * @param $invoiceId
   * @param $params
   * @return mixed
   * @throws Exception
   */
  public function collectChargeBankAccount($invoiceId, $params) {
    return $this->client->post([self::BASE_URL, $invoiceId, 'collect'], [], $params);
  }

  /**
   * Convert to void
   *
   * Making an invoice void.
   *
   * @param $invoiceId
   * @return mixed
   * @throws Exception
   */
  public function convertToVoid($invoiceId) {
    return $this->client->post([self::BASE_URL, $invoiceId, 'void']);
  }

  /**
   * Convert to open
   *
   * Change the status of the invoice to open.
   *
   * @param $invoiceId
   * @return mixed
   * @throws Exception
   */
  public function convertToOpen($invoiceId) {
    return $this->client->post([self::BASE_URL, $invoiceId, 'converttoopen']);
  }

  /**
   * Email an invoice
   *
   * Email an invoice.
   *
   * @param $invoiceId
   * @param array $params
   * @return mixed
   * @throws Exception
   */
  public function email($invoiceId, array $params = []) {
    return $this->client->post([self::BASE_URL, $invoiceId, 'email'], [], $params);
  }

  /**
   * Write off
   *
   * Write off a invoice.
   *
   * @param $invoiceId
   * @return mixed
   * @throws Exception
   */
  public function writeOff($invoiceId) {
    return $this->client->post([self::BASE_URL, $invoiceId, 'writeoff']);
  }

  /**
   * Cancel Write off
   *
   * Revert write off performed for a invoice.
   *
   * @param $invoiceId
   * @return mixed
   * @throws Exception
   */
  public function cancelWriteOff($invoiceId) {
    return $this->client->post([self::BASE_URL, $invoiceId, 'cancelwriteoff']);
  }

  /**
   * Update address
   *
   * Update shipping and billing address of an invoice.
   *
   * @param $invoiceId
   * @param $params
   * @return mixed
   * @throws Exception
   */
  public function updateAddress($invoiceId, $params) {
    return $this->client->put([self::BASE_URL, $invoiceId, 'address'], [], $params);
  }

  /**
   * Update Custom Fields
   *
   * Update the custom fields of an invoice.
   *
   * @param $invoiceId
   * @param $params
   * @return mixed
   * @throws Exception
   */
  public function updateCustomFields($invoiceId, $params) {
    return $this->client->post([self::BASE_URL, $invoiceId, 'customfields'], [], ['custom_fields' => [$params]]);
  }

  /**
   * Apply Multiple Credits to Invoice
   *
   * To associate multiple creditnotes to a particular invoice.
   *
   * @param $invoiceId
   * @param $params
   * @return mixed
   * @throws Exception
   */
  public function applyMultipleCredits($invoiceId, $params) {
    return $this->client->post([self::BASE_URL, $invoiceId, 'credits'], [], $params);
  }

  /**
   * Add items to a pending invoice
   *
   * Editing a pending invoice to add usage charges.
   *
   * @param $invoiceId
   * @param $params
   * @param $reason
   * @return mixed
   * @throws Exception
   */
  public function addItemsToPending($invoiceId, $reason, $params) {
    return $this->client->post([self::BASE_URL, $invoiceId, 'lineitems'], [], ['reason' => $reason, 'invoice_items' => [$params]]);
  }

  /**
   * Delete items from a pending invoice
   *
   * Deleting an item from pending invoice.
   *
   * @param $invoiceId
   * @param $itemId
   * @return mixed
   * @throws Exception
   */
  public function deleteItemsFromPending($invoiceId, $itemId) {
    return $this->client->delete([self::BASE_URL, $invoiceId, 'lineitems', $itemId]);
  }

  /**
   *
   * @throws Exception
   */
  public function addAttachment() {
    throw new Exception('Not implemented');
  }

}
