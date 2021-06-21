<?php

namespace CapsuleB\ZohoSubscriptions\Resources;

use CapsuleB\ZohoSubscriptions\Client;
use Exception;

/**
 * Class Settings
 * @link https://www.zoho.com/subscriptions/api/v1/#Settings
 * @package CapsuleB\ZohoSubscriptions\Resources
 *
 * @property Client $client
 */
class Settings {

  const BASE_URL = 'settings';

  /**
   * Settings constructor.
   * @param Client $client
   */
  public function __construct(Client $client) {
    $this->client = $client;
  }

  /**
   * Retrieve list of taxes
   * Retrieves the list of taxes along with their details
   *
   * @return mixed
   * @throws Exception
   */
  public function retrieveTaxes() {
    return $this->client->get([self::BASE_URL, 'taxes']);
  }

  /**
   * Retrieve list of tax Exemptions
   * Retrieves the list of tax Exemptions.
   *
   * @return mixed
   * @throws Exception
   */
  public function retrieveTaxExemptions() {
    return $this->client->get([self::BASE_URL, 'taxexemptions']);
  }

  /**
   * Retrieve list of tax Authorities
   * Retrieves the list of tax Authorities
   *
   * @return mixed
   * @throws Exception
   */
  public function retrieveTaxAuthorities() {
    return $this->client->get([self::BASE_URL, 'taxauthorities']);
  }

  /**
   *
   * @throws Exception
   */
  public function retrieveChurnMessagePreferences() {
    throw new Exception('Not implemented');
  }

}
