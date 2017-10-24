<?php
require_once "vendor/autoload.php";

$url = 'https://online.seranking.com/structure/clientapi/v2.php?method=login&login=fil@239web.com&pass='. md5('VyI3mEtnm9');
$ch  = curl_init($url);
curl_setopt($ch, CURLOPT_HTTPGET, true);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$response_json = curl_exec($ch);

curl_close($ch);
$response = json_decode($response_json, true);

# ----------------------------------------------------------------------------------------------------------------------------
/*

$url = "https://online.seranking.com/structure/clientapi/v2.php?method=searchEngines&token={$response['token']}";
$ch  = curl_init($url);
curl_setopt($ch, CURLOPT_HTTPGET, true);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$response_json = curl_exec($ch);

curl_close($ch);
$engines = json_decode($response_json, true);
 */

# ----------------------------------------------------------------------------------------------------------------------------

$url = "https://online.seranking.com/structure/clientapi/v2.php?method=sites&token={$response['token']}";
$ch  = curl_init($url);
curl_setopt($ch, CURLOPT_HTTPGET, true);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$response_json = curl_exec($ch);

curl_close($ch);
$sites = json_decode($response_json, true);

# ----------------------------------------------------------------------------------------------------------------------------

/*
$url = "https://online.seranking.com/structure/clientapi/v2.php?method=siteKeywords&siteid={$sites[0]['id']}&token={$response['token']}";
$ch  = curl_init($url);
curl_setopt($ch, CURLOPT_HTTPGET, true);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$response_json = curl_exec($ch);

curl_close($ch);
$keywords = json_decode($response_json, true);
*/

# ----------------------------------------------------------------------------------------------------------------------------
$url = "https://online.seranking.com/structure/clientapi/v2.php?method=siteKeywords&siteid={$sites[0]['id']}&dateStart=2017-01-01&token={$response['token']}";
$ch  = curl_init($url);
curl_setopt($ch, CURLOPT_HTTPGET, true);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$response_json = curl_exec($ch);

curl_close($ch);
$keywords = json_decode($response_json, true);

# use to logout
# $url = "https://online.seranking.com/structure/clientapi/v2.php?method=logout&token={$response['token']}";


$url = "https://online.seranking.com/structure/clientapi/v2.php?method=searchVolumeRegions&token={$response['token']}";
$ch  = curl_init($url);
curl_setopt($ch, CURLOPT_HTTPGET, true);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$response_json = curl_exec($ch);

curl_close($ch);
$searchVolumeRegions = json_decode($response_json, true);

d($searchVolumeRegions);
