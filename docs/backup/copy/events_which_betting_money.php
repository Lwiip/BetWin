<?php
function events_which_betting_money($user_id,$events_id)
{
  global $db;

  $response = mysqli_query( $db, "SELECT betting_money as result FROM bets WHERE id_users='$user_id' AND id_events='$events_id'");
    $row = mysqli_fetch_assoc($response);

  return $row['result'];
}
