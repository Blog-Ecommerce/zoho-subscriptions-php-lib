<?php

namespace CapsuleB\ZohoSubscriptions\Resources;

use CapsuleB\ZohoSubscriptions\Client;
use Exception;

/**
 * Class Refunds
 * @link https://www.zoho.com/subscriptions/api/v1/#Refunds
 *
 * @package CapsuleB\ZohoSubscriptions\Resources*
 * @property Client $client
 */
class Refunds {

  const BASE_URL = 'refunds';

  /**
   * Refunds constructor.
   * @param Client $client
   */
  public function __construct(Client $client) {
    $this->client = $client;
  }

  /**
   * Refund a credit note
   * Refund is made on the credit note.
   *
   * @param $creditNoteId
   * @param array $params
   * @return mixed
   * @throws Exception
   */
  public function creditNote($creditNoteId, array $params = []) {
    return $this->client->post(['creditnotes', self::BASE_URL, $creditNoteId], null, $params);
  }

  /**
   * Refund a payment
   * A new credit note is created for the amount to be refund. Refund is then made for the credit note.
   *
   * @param $paymentId
   * @param array $params
   * @return mixed
   * @throws Exception
   */
  public function payment($paymentId, array $params = []) {
    return $this->client->post(['creditnotes', self::BASE_URL, $paymentId], null, $params);
  }

  /**
   * Retrieve refund details
   * Details of an existing refund.
   *
   * @param $refundId
   * @return mixed
   * @throws Exception
   */
  public function retrieve($refundId) {
    return $this->client->get('creditnotes', self::BASE_URL, $refundId);
  }
}
