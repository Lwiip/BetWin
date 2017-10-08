<?php

function events_add_in_user1($user_id, $events_id, $money, $odd1, $team1)
{
	global $db;
	$result=mysqli_query($db,"INSERT INTO bets (id_users, id_events, betting_money, odds, which_team)
                  VALUES ('$user_id', '$events_id', '$money', '$odd1', '$team1')"   );




		return $result;
}
