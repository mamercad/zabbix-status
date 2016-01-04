<?php

// connect to the database
$mysqli = new mysqli($DB_HOST, $DB_USER, $DB_PASS, $DB_NAME);
if ($mysqli->connect_errno) {
  echo 'Failed to connect to MySQL: ('.$mysqli->connect_errno.') '.$mysqli->connect_error;
}

// broken count
$query = 'select count(*) as count
          from services
          where triggerid is null
          and status <> 0';
$res = $mysqli->query($query);
$row = $res->fetch_assoc();
$COUNT = $row['count'];
$res->close();

// total count
$query = 'select count(*) as count
          from services
          where triggerid is null';
$res = $mysqli->query($query);
$row = $res->fetch_assoc();
$TOTAL = $row['count'];
$res->close();

// zabbix config
$query = 'select
            severity_name_0, severity_color_0, severity_name_1,
            severity_color_1, severity_name_2, severity_color_2,
            severity_name_3, severity_color_3, severity_name_4,
            severity_color_4, severity_name_5, severity_color_5
          from config';
$res = $mysqli->query($query);
$row = $res->fetch_assoc();
$CONFIG = $row;
$res->close();

// page subtitle
if ($COUNT == 0) {
  $SUBTITLE = 'All IT Services are operational';
} elseif ($COUNT == 1) {
  $SUBTITLE = 'There is currently '.$COUNT.' non-operational IT Service';
} else {
  $SUBTITLE = 'There are currently '.$COUNT.' non-operational IT Services';
}

// return services + statuses
function get_stuff()
{
  global $mysqli;
  $query = 'select name, status
            from services
            where triggerid is null
            order by lower(name)';
  $res = $mysqli->query($query);
  $stuff = array();
  while ($row = $res->fetch_assoc()) {
    array_push($stuff, $row);
  }
  $res->close();
  return $stuff;
}
?>
