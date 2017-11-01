<?php
namespace Monitor;

/**
 * Manage the search engine table
 *
 * @author Fil <filjoseph22@gmail.com>
 * @since 1.0.0
 * @version 1.0
 */
class SearchEngine
{
  /**
   * Monitor API
   * @var object
   */
  private $monitor;

  /**
   * Table name
   * @var string
   */
  private $table = "search_engines";

  /**
   * Database object
   * @var object
   */
  private $database;

  /**
   * List of regions
   * @var array
   */
  private $regions = [];

  /**
   * Keepers of the $this->regions keys
   * @var array
   */
  private $preserveKeys = [];

  /**
   * Instanstiate
   */
  public function __construct($object, $database)
  {
    $this->monitor  = $object;
    $this->database = $database;
  }

  /**
   * Store the list of search engine in the database
   *
   * Issue 2:
   * The problem here is how to prevent dupication of entries
   *
   * @return boolean
   */
  public function store()
  {
    # Get the list of search engines
    $searchEngines = $this->monitor->searchEngines();

    if (is_array($searchEngines)) {
      foreach ($searchEngines as $key => $searchEngine) {
        if (count($searchEngine['regions']) > 0) {
          $this->regions[] = $searchEngine['regions'];
        }

        unset($searchEngine['regions']);

        $data = [
          'reference_id'        => $searchEngine['id'],
          'reference_region_id' => $searchEngine['regionid'],
          'name'                => $searchEngine['name'],
        ];

        $result = $this->database->Insert($this->table, $data);

        if ($result === false) {
          return false;
        }
      }
    }

    return true;
  }

  /**
   * return the list of regions
   *
   * @return array
   */
  public function getRegions()
  {
    if (self::isEqualRegion()) {
      self::sortRegions();
      return $this->regions;
    }

    return false;
  }

  /**
   * Sort the list of regions
   *
   * @return void
   */
  private function sortRegions()
  {
    array_multisort($this->regions, SORT_ASC, SORT_REGULAR);
  }

  /**
   * Check the given region if equal
   *
   * @return boolean
   */
  private function isEqualRegion()
  {
    $regions = $this->regions[0];
    array_shift($this->regions);

    if (is_array($this->regions)) {
      foreach ($this->regions as $key => $otherRegion) {
        if ($otherRegion !== $regions) {
          $this->preserveKey[] = $key;
        } else {
          unset($this->regions[$key]);
        }
      }
    }

    if (empty($this->regions)) {
      $this->regions = $regions;
    }

    return empty($this->preserveKey) ? true : false ;
  }

}
