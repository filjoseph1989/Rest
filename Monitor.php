<?php
namespace Rest;
/**
 * Class to make request on seranking
 *
 * @author Fil <filjoseph22@gmail.com>
 * @since 0.0.0
 * @version 0.1
 * @date 10-24-2017
 * @date 10-24-2017 - Updated
 */
class Monitor
{
  /**
   * All the data is access in this url
   * @var [type]
   */
  protected $url = "https://online.seranking.com/structure/clientapi/v2.php";

  /**
   * Default username
   *
   * @var string
   */
  protected $username = "fil@239web.com";

  /**
   * Default password
   *
   * @var string
   */
  protected $password = md5('VyI3mEtnm9');

  /**
   * Make an instance
   */
  public function __construct()
  {
  }

  /**
   * Begin using this class
   *
   * @return object
   */
  public static function start()
  {
    return new Monitor();
  }

  /**
   * Login to seranking
   *
   * @return array
   */
  public function login()
  {
    $this->url .= "?method=login&login={$this->username}&pass={$this->password}";
    return self::request();
  }

  /**
   * Connect to the given api and make a request
   *
   * @param  string $url
   * @return array
   */
  private function request()
  {
    $ch  = curl_init($this->url);
    curl_setopt($ch, CURLOPT_HTTPGET, true);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $responseJson = curl_exec($ch);
    curl_close($ch);

    return json_decode($responseJson, true);
  }
}
