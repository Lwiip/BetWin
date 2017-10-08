<?php
function events_check_money($user_id)
{
  global $db;

  $response = mysqli_query( $db, "SELECT money as result FROM users WHERE id='$user_id'");
    $row = mysqli_fetch_assoc($response);

  return $row['result'];
}
