<?php

namespace Drupal\search_api_solr;

use Solarium\Core\Client\Endpoint;
use Solarium\QueryType\Stream\Query;

/**
 *
 */
interface SolrCloudConnectorInterface extends SolrConnectorInterface {

  /**
   * Returns a link to the Solr collection, if the necessary options are set.
   *
   * @return \Drupal\Core\Link
   */
  public function getCollectionLink();

  /**
   * Gets information about the Solr Collection.
   *
   * @param bool $reset
   *   If TRUE the server will be asked regardless if a previous call is cached.
   *
   * @return object
   *   A response object with system information.
   *
   * @throws \Drupal\search_api_solr\SearchApiSolrException
   */
  public function getCollectionInfo($reset = FALSE);

  /**
   * Pings the Solr collection to tell whether it can be accessed.
   *
   * @return mixed
   *   The latency in milliseconds if the core can be accessed,
   *   otherwise FALSE.
   */
  public function pingCollection();

  /**
   * Creates a new Solarium stream query.
   *
   * @return \Solarium\QueryType\Stream\Query
   *   The Stream query.
   */
  public function getStreamQuery();

  /**
   * Executes a stream query.
   *
   * @param \Solarium\QueryType\Stream\Query $query
   * @param \Solarium\Core\Client\Endpoint|null $endpoint
   *
   * @return \Solarium\Core\Query\Result\ResultInterface
   */
  public function stream(Query $query, Endpoint $endpoint = NULL);

}
