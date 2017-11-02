<?php
namespace Monitor;

/**
 * Manage the search engine table
 *
 * Issue 5
 * Pag add og isa pa ka field dinhi, para sa yandex nga tima ilhan
 *
 * @author Fil <filjoseph22@gmail.com>
 * @since 1.0.0
 * @version 1.0
 */
class Regions
{
  /**
   * name of the table
   * @var string
   */
  private $table = "regions";

  /**
   * list of regions
   * @var array
   */
  private $regions = [];

  /**
   * databse connection
   * @var object
   */
  private $database;

  /**
   * Instanstiate
   *
   * @param array $regions
   * @param object $database
   */
  public function __construct($regions, $database)
  {
    $this->regions  = $regions;
    $this->database = $database;
  }

  /**
   * store regions in the database
   *
   * Issue 3
   * The problem here is to check wether
   * theres a need to update the region list
   *
   * @return boolean
   */
  public function store()
  {
    foreach ($this->regions as $key => $region) {
      $data = [
        'reference_id'  => $region['id'],
        'name'          => $region['name'],
        'is_for_yandex' => 'true'
      ];

      $result = $this->database->Insert($this->table, $data);

      if ($result === false) {
        return false;
      }
    }

    return true;
  }
}
