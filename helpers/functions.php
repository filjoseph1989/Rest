<?php
/**
 * Dump variables
 *
 * @var mixed
 */
if (! function_exists('dd')) {
  function dd($data) {
    d($data); exit;
  }
}

if (! function_exists('getSites')) {
  function getSites($data)
  {
    $ses = [];
    $values = [];
    foreach ($data as $key => $value) {
      $ses[] = $value['SEs'];
      unset($value['SEs']);
      $values[] = siteData($value);
    }

    return [
      'search_engines' => $ses,
      'sites'          => $values
    ];
  }
}

if (! function_exists('siteData')) {
  function siteData($data)
  {
    return [
      'site_id'                => $data['id'],
      'site_group_id'          => $data['group_id'],
      'name'                   => $data['name'],
      'title'                  => $data['title'],
      'today_avg_position'     => $data['todayAvgPosition'],
      'yesterday_avg_position' => $data['yesterdayAvgPosition'],
      'total_up'               => $data['totalUp'],
      'total_down'             => $data['totalDown'],
      'keys_count'             => $data['keysCount'],
      'process'                => $data['process'],
    ];
  }
}
