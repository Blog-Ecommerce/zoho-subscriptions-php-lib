<?php

namespace CapsuleB\ZohoSubscriptions\Resources;

use CapsuleB\ZohoSubscriptions\Client;
use Exception;

/**
 * Class Events
 * @link https://www.zoho.com/subscriptions/api/v1/#Events
 * @package CapsuleB\ZohoSubscriptions\Resources
 *
 * @property Client $client
 */
class Events {

  const BASE_URL = 'events';

  /**
   * Events constructor.
   * @param Client $client
   */
  public function __construct(Client $client) {
    $this->client = $client;
  }

  /**
   * Retrieve an event
   * Details of an existing event.
   *
   * @param $eventId
   * @return mixed
   * @throws Exception
   */
  public function retrieve($eventId) {
    return $this->client->get([self::BASE_URL, $eventId]);
  }

  /**
   * List of events
   * List of all events.
   *
   * @return mixed
   * @throws Exception
   */
  public function list() {
    return $this->client->get(self::BASE_URL);
  }

  /**
   *
   * @throws Exception
   */
  public function types() {
    throw new Exception('Not implemented');
  }

}
