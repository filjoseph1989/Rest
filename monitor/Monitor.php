<?php
namespace Monitor;

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
  protected $password = "";

  /**
   * Login token
   *
   * @var string
   */
  protected $token = "";

  /**
   * Result from process
   *
   * @var mixed
   */
  public $attribute;

  /**
   * Make an instance
   */
  public function __construct()
  {
    $this->password = md5('VyI3mEtnm9');
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
    $url         = "{$this->url}?method=login&login={$this->username}&pass={$this->password}";
    $loginData   = self::request($url);
    $this->token = $loginData['token'];

    return $loginData;
  }

  /**
   * Invalidate the token received after login
   *
   * @return boolean
   */
  public function logout()
  {
    $url    = "{$this->url}?method=logout&{$this->token}";
    $logout = (object)self::request($url);

    return $logout->message == 'no token' ? true : false;
  }

  /**
   * Return the list of search engines
   *
   * @return array
   */
  public function searchEngines()
  {
    $url = "{$this->url}?method=searchEngines&token={$this->token}";
    return self::request($url);
  }

  /**
   * Return the list of user belongs to seranking
   *
   * @return object
   */
  public function sites()
  {
    $url = "{$this->url}?method=sites&token={$this->token}";
    return (object)self::request($url);
  }

  /**
   * Return the list of keywords
   *
   * @return array
   */
  public function keywords(int $userId)
  {
    $url = "{$this->url}?method=siteKeywords&siteid={$userId}&token={$this->token}";
    return (object)self::request($url);
  }

  /**
   * Return the website statistics
   *
   * @param  int    $siteid
   * @param  string $dateStart
   * @param  string $dateEnd
   * @param  string $SE Search Engine ID
   * @return string
   */
  public function stats(int $siteid, $dateStart = null, $dateEnd = null, $SE = null)
  {
    $options = "";
    $options .= isset($dateStart) ? "dateStart={$dateStart}" : "";
    $options .= isset($dateEnd) ? "dateEnd={$dateEnd}" : "";
    $options .= isset($SE) ? "SE={$SE}" : "";

    $url = "{$this->url}?method=stat&siteid={$siteid}&{$options}&token={$this->token}";
    return (object)self::request($url);
  }

  /**
   * Returns a list of all regions for getting avg.search volume
   *
   * @return object
   */
  public function searchVolumeRegions()
  {
    $url = "{$this->url}?method=searchVolumeRegions&token={$this->token}";
    return (object)self::request($url);
  }

  /**
   * Connect to the given api and make a request
   *
   * @param  string $url
   * @return array
   */
  private function request($url)
  {
    $ch  = curl_init($url);
    curl_setopt($ch, CURLOPT_HTTPGET, true);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $responseJson = curl_exec($ch);
    curl_close($ch);

    return json_decode($responseJson, true);
  }
}
