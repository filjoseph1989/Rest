<?php
namespace Monitor;

/**
 * Manage the search engine region table
 *
 * @author Fil <filjoseph22@gmail.com>
 * @since 1.0.0
 * @version 1.0
 */
class SearchEngineRegion
{
  /**
   * table name used by this class
   * @var string
   */
  private $table = 'search_engine_regions';

  /**
   * database connection
   * @var object
   */
  private $database;

  /**
   * The search engine IDs
   * @var array
   */
  private $ids = [];

  /**
   * The list of regions
   * @var array
   */
  private $regions = [];

  /**
   * Count of the rows affected
   * @var int
   */
  private $rowsAffected = 1;

  /**
   * Instanstiate
   *
   * @param array $keys
   * @param array $regions
   * @param object $database
   */
  public function __construct($keys, $regions, $database)
  {
    $this->ids      = $keys;
    $this->regions  = $regions;
    $this->database = $database;
  }

  /**
   * Store the id and regions id into
   * search_engine_regions table
   *
   * @return boolean
   */
  public function store()
  {
    foreach ($this->ids as $key => $id) {
      foreach ($this->regions as $key => $region) {
        $data = [
          'search_engine_id' => $id,
          'region_id'        => ($key + 1)
        ];

        $result = $this->database->Insert($this->table, $data);

        if ($result === false) {
          return false;
        }

        $this->rowsAffected++;
      }
    }

    return true;
  }

  /**
   * return the affected rows
   *
   * @return int
   */
  public function getAffectedRows()
  {
    return $this->rowsAffected;
  }
}
