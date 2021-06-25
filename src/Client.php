<?php

namespace CapsuleB\ZohoSubscriptions;

use Exception;
use ReflectionException;
use CapsuleB\ZohoSubscriptions\Enums\EDataCenter;
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
 * @property $baseApiUrl
 * @property $baseAuthUrl
 * @property $curlClient
 * @property $requestUri
 * @property $requestQuery
 * @property $requestHeader
 * @property $clientId
 * @property $clientSecret
 * @property $accessToken
 * @property $refreshToken
 * @property $dataCenter
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

  /**
   * Client constructor.
   * @param string $clientId
   * @param string $clientSecret
   * @param string|null $accessToken
   * @param string|null $refreshToken
   * @param string $dataCenter
   * @throws ReflectionException
   */
  public function __construct(string $clientId, string $clientSecret, string $accessToken = null, string $refreshToken = null, string $dataCenter = EDataCenter::UNITED_STATES) {
    $this->curlClient = curl_init();

    // Init the infos
    $this->clientId     = $clientId;
    $this->clientSecret = $clientSecret;
    $this->accessToken  = $accessToken;
    $this->refreshToken = $refreshToken;
    $this->dataCenter   = $dataCenter;

    // Init the url, header and query
    $this->initBaseUrl();
    $this->initHeader();
    $this->initQuery();

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
   * Inits the Base Url by checking which one to use base on region
   * @throws ReflectionException
   */
  private function initBaseUrl() {
    if (empty($this->dataCenter) || !in_array($this->dataCenter, EDataCenter::getValues())) {
      $this->baseApiUrl = "https://subscriptions.zoho.com/api/v1";
      $this->baseAuthUrl = "https://accounts.zoho.com";
    } else {
      $this->baseApiUrl = "https://subscriptions.zoho{$this->dataCenter}/api/v1";
      $this->baseAuthUrl = "https://accounts.zoho{$this->dataCenter}";
    }

    // Defaults the base request uri
    $this->requestUri = $this->baseApiUrl;
  }

  /**
   * Init the request header
   */
  private function initHeader() {
    $this->requestHeader = [
      'Content-Type: application/x-www-form-urlencoded;charset=UTF-8',
      'Authorization: Zoho-oauthtoken ' . $this->accessToken
    ];
  }

  /**
   * Init the request base query
   */
  private function initQuery() {
    $this->requestQuery = [];
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
   * @throws Exception
   */
  public function oAuthUserInfo() {
    // Reset temporarily the header
    $this->requestHeader = [
      'Content-Type: application/json',
      'Authorization: Bearer ' . $this->accessToken
    ];

    // Make the request to Generate Access and Refresh Tokens
    $this->requestUri = $this->baseAuthUrl;
    $userInfo = $this->get(['oauth/user/info']);

    // Return the retrieved user info
    return $userInfo;
  }

  /**
   * Generating a Grant Token
   *
   * @throws Exception
   */
  public function oAuthGrantTokenUri() {
    // Return GET url to be executed from a browser
  }

  /**
   * Generate Access and Refresh Tokens
   *
   * @param string $code
   * @param string $scopes
   * @param string|null $redirectUri
   * @param string|null $state
   * @return array|mixed|object
   * @throws Exception
   */
  public function oAuthAccessToken(string $code, string $scopes, string $redirectUri = null, string $state = null) {
    // Reset temporarily the header
    $this->requestHeader = [
      'Content-Type: application/json'
    ];

    // Make the request to Generate Access and Refresh Tokens
    $this->requestUri = $this->baseAuthUrl;
    $responseToken = $this->post(['oauth/v2/token'], [
      'code'          => $code,
      'client_id'     => $this->clientId,
      'client_secret' => $this->clientSecret,
      'redirect_uri'  => $redirectUri,
      'grant_type'    => 'authorization_code',
      'scope'         => $scopes,
      'state'         => $state
    ]);

    // Store the new token
    $this->accessToken  = $responseToken->access_token ?? null;
    $this->refreshToken = $responseToken->refresh_token ?? null;

    // Return the newly created token
    return $responseToken;
  }

  /**
   * Generate Access Token From Refresh Token
   *
   * @param string $refreshToken
   * @param string|null $redirectUri
   * @return array|mixed|object
   * @throws Exception
   */
  public function oAuthRefreshToken(string $refreshToken, string $redirectUri = null) {
    // Reset temporarily the header
    $this->requestHeader = [
      'Content-Type: application/json',
    ];

    // Make the request to Generate Access and Refresh Tokens
    $this->requestUri = $this->baseAuthUrl;
    $responseToken = $this->post(['oauth/v2/token'], [
      'refresh_token' => $refreshToken,
      'client_id'     => $this->clientId,
      'client_secret' => $this->clientSecret,
      'redirect_uri'  => $redirectUri,
      'grant_type'    => 'refresh_token',
    ]);

    // Store the new token
    $this->accessToken  = $responseToken->access_token ?? null;
    $this->refreshToken = $responseToken->refresh_token ?? null;

    // Return the newly created token
    return $responseToken;
  }

  /**
   * Revoking a Refresh Token
   *
   * @param string $token
   * @return array|mixed|object
   * @throws Exception
   */
  public function oAuthRevokeToken(string $token) {
    // Reset temporarily the header
    $this->requestHeader = [
      'Content-Type: application/json',
    ];

    // Make the request to Generate Access and Refresh Tokens
    $this->requestUri = $this->baseAuthUrl;
    $responseToken = $this->post(['oauth/v2/token/revoke'], [
      'token' => $token
    ]);

    // Store the new token
    $this->accessToken  = $responseToken->access_token ?? null;
    $this->refreshToken = $responseToken->refresh_token ?? null;

    // Return the newly created token
    return $responseToken;
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
    curl_setopt($this->curlClient, CURLOPT_URL, $this->requestUri . '/' . $path);
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
    $httpCode = curl_getinfo($this->curlClient, CURLINFO_HTTP_CODE);
    curl_close($this->curlClient);

    // Return the response
    if ($httpCode == 200 || $httpCode == 201) {
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
