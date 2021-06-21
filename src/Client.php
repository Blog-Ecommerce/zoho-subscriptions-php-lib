<?php

namespace CapsuleB\ZohoSubscriptions;

use Exception;
use CapsuleB\ZohoSubscriptions\Resources\Addons;
use CapsuleB\ZohoSubscriptions\Resources\BankAccounts;
use CapsuleB\ZohoSubscriptions\Resources\Cards;
use CapsuleB\ZohoSubscriptions\Resources\ContactPersons;
use CapsuleB\ZohoSubscriptions\Resources\Coupons;
use CapsuleB\ZohoSubscriptions\Resources\CreditNotes;
use CapsuleB\ZohoSubscriptions\Resources\Customers;
use CapsuleB\ZohoSubscriptions\Resources\Events;
use CapsuleB\ZohoSubscriptions\Resources\HostedPages;
use CapsuleB\ZohoSubscriptions\Resources\Invoices;
use CapsuleB\ZohoSubscriptions\Resources\Payments;
use CapsuleB\ZohoSubscriptions\Resources\Plans;
use CapsuleB\ZohoSubscriptions\Resources\Products;
use CapsuleB\ZohoSubscriptions\Resources\Refunds;
use CapsuleB\ZohoSubscriptions\Resources\Settings;
use CapsuleB\ZohoSubscriptions\Resources\Subscriptions;
use CapsuleB\ZohoSubscriptions\Resources\UnbilledCharges;

/**
 * Class Client
 * @package CapsuleB\ZohoSubscriptions
 *
 * @property $apiKey
 * @property $baseUrl
 * @property $curlClient
 * @property $requestHeader
 * @property $requestQuery
 *
 * @property Addons           $addons
 * @property BankAccounts     $bankAccounts
 * @property Cards            $cards
 * @property ContactPersons   $contactPersons
 * @property Coupons          $coupons
 * @property CreditNotes      $creditNotes
 * @property Customers        $customers
 * @property Events           $events
 * @property HostedPages      $hostedPages
 * @property Invoices         $invoices
 * @property Payments         $payments
 * @property Plans            $plans
 * @property Products         $products
 * @property Refunds          $refunds
 * @property Settings         $settings
 * @property Subscriptions    $subscriptions
 * @property UnbilledCharges  $unbilledCharges
 */
class Client {

  const BASE_URL = 'https://subscriptions.zoho.eu/api/v1';

  /**
   * Client constructor.
   * @param $apiKey
   */
  public function __construct($apiKey) {
    $this->curlClient = curl_init();
    $this->apiKey     = $apiKey;
    $this->baseUrl    = self::BASE_URL;

    // Init the request header
    $this->requestHeader = [
      'Content-Type: application/x-www-form-urlencoded;charset=UTF-8',
      'Authorization: Zoho-authtoken ' . $this->apiKey
    ];

    // Init the request base query
    $this->requestQuery = [];

    // Init the Resources
    $this->addons           = new Addons($this);
    $this->bankAccounts     = new BankAccounts($this);
    $this->cards            = new Cards($this);
    $this->contactPersons   = new ContactPersons($this);
    $this->coupons          = new Coupons($this);
    $this->creditNotes      = new CreditNotes($this);
    $this->customers        = new Customers($this);
    $this->events           = new Events($this);
    $this->hostedPages      = new HostedPages($this);
    $this->invoices         = new Invoices($this);
    $this->payments         = new Payments($this);
    $this->plans            = new Plans($this);
    $this->products         = new Products($this);
    $this->refunds          = new Refunds($this);
    $this->settings         = new Settings($this);
    $this->subscriptions    = new Subscriptions($this);
    $this->unbilledCharges  = new UnbilledCharges($this);
  }

  /**
   * @param array $query
   */
  protected function appendQuery(array $query = []) {
    $this->requestQuery += $this->wrap($query);
  }

  /**
   * @param array $header
   */
  protected function appendHeader(array $header = []) {
    $this->requestHeader = array_merge($this->requestHeader, $this->wrap($header));
  }

  /**
   * @param $organizationId
   */
  public function setOrganizationId($organizationId) {
    $this->appendHeader([
      'X-com-zoho-subscriptions-organizationid:' . $organizationId,
    ]);
  }

  /**
   * @param $method
   * @param $path
   * @param array $query
   * @param array $params
   * @return array|mixed|object
   * @throws Exception
   */
  protected function request($method, $path, array $query = [], array $params = []) {
    // Reset any previous request
    $this->curlClient = curl_init();

    // Create path
    if (is_array($path)) {
      $path = implode('/', $path);
    }

    // Append the query to the request base queries
    $query = array_merge($this->requestQuery, $query);

    // Add query params
    if (!empty($query)) {
      $path .= '?' . http_build_query($query);
    }

    // Set the request params
    curl_setopt($this->curlClient, CURLOPT_URL, $this->baseUrl . '/' . $path);
    curl_setopt($this->curlClient, CURLOPT_RETURNTRANSFER, TRUE);
    curl_setopt($this->curlClient, CURLOPT_HEADER, FALSE);
    curl_setopt($this->curlClient, CURLOPT_CUSTOMREQUEST, $method);
    curl_setopt($this->curlClient, CURLOPT_HTTPHEADER, $this->requestHeader);

    // Add params if any
    if (!empty($params)) {
      curl_setopt($this->curlClient, CURLOPT_POSTFIELDS, json_encode($params));
    }

    // Does the request
    $response = json_decode(curl_exec($this->curlClient));
    $httpcode = curl_getinfo($this->curlClient, CURLINFO_HTTP_CODE);
    curl_close($this->curlClient);

    // Return the response
    if ($httpcode == 200 || $httpcode == 201) {
      return $response;
    } else {
      throw new Exception($response->message);
    }
  }

  /**
   * GET Method
   *
   * @param $path
   * @param array $query
   * @param array $params
   * @return mixed
   * @throws Exception
   */
  public function get($path, array $query = [], array $params = []) {
    return $this->request('GET', $path, $this->wrap($query), $this->wrap($params));
  }

  /**
   * POST Method
   *
   * @param $path
   * @param array $query
   * @param array $params
   * @return mixed
   * @throws Exception
   */
  public function post($path, array $query = [], array $params = []) {
    return $this->request('POST', $path, $this->wrap($query), $this->wrap($params));
  }

  /**
   * PUT Method
   *
   * @param $path
   * @param array $query
   * @param array $params
   * @return mixed
   * @throws Exception
   */
  public function put($path, array $query = [], array $params = []) {
    return $this->request('PUT', $path, $this->wrap($query), $this->wrap($params));
  }

  /**
   * DELETE Method
   *
   * @param $path
   * @param array $query
   * @param array $params
   * @return mixed
   * @throws Exception
   */
  public function delete($path, array $query = [], array $params = []) {
    return $this->request('DELETE', $path, $this->wrap($query), $this->wrap($params));
  }

  /**
   * If the given value is not an array, wrap it in one.
   *
   * @param  mixed  $value
   * @return array
   */
  private static function wrap($value): array {
    return ! is_array($value) ? [$value] : $value;
  }
}
