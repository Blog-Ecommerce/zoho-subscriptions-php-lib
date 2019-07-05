<?php

namespace ZohoSubscriptions\Resources;

use Client;
use Exception;

/**
 * Class HostedPages
 *
 * @link https://www.zoho.com/subscriptions/api/v1/#Hosted-Pages
 *
 * @package App\Libs\Zoho\Subscriptions
 * @property Client $client
 */
class HostedPages {

  const BASE_URL = 'hostedpages';

  /**
   * HostedPages constructor.
   * @param Client $client
   */
  public function __construct(Client $client) {
    $this->client = $client;
  }

  /**
   * Retrieve a hosted page
   *
   * Details of a specific hosted page.
   * The data field will be populated with the subscription details in case of successfull subscription via Hostedpage.
   * In case of fresh hosted pages the data field will be empty.
   *
   * @link https://www.zoho.com/subscriptions/api/v1/#Hosted-Pages_Retrieve_a_hosted_page
   *
   * @param $hostedPageId
   * @return mixed
   * @throws Exception
   */
  public function retrieve($hostedPageId) {
    return $this->client->get([self::BASE_URL, $hostedPageId]);
  }

  /**
   * List of HostedPages
   *
   * Retrieve the list of all hosted pages.
   *
   * @link https://www.zoho.com/subscriptions/api/v1/#Hosted-Pages_List_of_HostedPages
   *
   * @return mixed
   * @throws Exception
   */
  public function listAll() {
    return $this->client->get(self::BASE_URL);
  }

  /**
   * Create a subscription
   *
   * Create a hosted page for a new subscription.
   * To create a subscription for a new customer, you have to pass the customer object.
   * To create a subscription for a existing customer pass the customer_id of that customer.
   *
   * @link https://www.zoho.com/subscriptions/api/v1/#Hosted-Pages_Create_a_subscription
   *
   * @param array $params
   * @return mixed
   * @throws Exception
   */
  public function create($params = []) {
    return $this->client->post([self::BASE_URL, 'newsubscription'], null, $params);
  }

  /**
   * Update a subscription
   *
   * Create a hosted page for a updating a subscription.
   *
   * @link https://www.zoho.com/subscriptions/api/v1/#Hosted-Pages_Update_a_subscription
   *
   * @param array $params
   * @return mixed
   * @throws Exception
   */
  public function update($params = []) {
    return $this->client->post([self::BASE_URL, 'updatesubscription'], null, $params);
  }

  /**
   * Update card for a subscription
   * Create hosted page for updating card information for a subscription.
   *
   * @link https://www.zoho.com/subscriptions/api/v1/#Hosted-Pages_Update_card_for_a_subscription
   *
   * @param array $params
   * @return mixed
   * @throws Exception
   */
  public function updateCard($params = []) {
    return $this->client->post([self::BASE_URL, 'updatecard'], null, $params);
  }

  /**
   * Buy one-time addon for a subscription
   * Create hosted page for buying a one-time addon for a subscription.
   *
   * @link https://www.zoho.com/subscriptions/api/v1/#Hosted-Pages_Buy_one-time_addon_for_a_subscription
   *
   * @param array $params
   * @return mixed
   * @throws Exception
   */
  public function buyOneTimeAddon($params = []) {
    return $this->client->post([self::BASE_URL, 'buyonetimeaddon'], null, $params);
  }
}
