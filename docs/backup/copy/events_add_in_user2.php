<?php

function events_add_in_user2($user_id, $events_id, $money, $odd2, $team2)
{
	global $db;	$result=mysqli_query($db,"INSERT INTO bets (id_users, id_events, betting_money, odds, which_team)
                  VALUES ('$user_id', '$events_id', '$money', '$odd2', '$team2')"   );




		return $result;
}
