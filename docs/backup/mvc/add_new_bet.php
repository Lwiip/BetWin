<?php

function add_new_bet($team1, $team2, $odds1, $odds2, $sport, $championship, $date)
{
	global $db;
	$sql ="INSERT INTO  events ( team1, team2, odds1, odds2, sport, championship, dateofbet   )
                      VALUES  ('$team1', '$team2', '$odds1', '$odds2', '$sport', '$championship', '$date')";

    $query=mysqli_query($db,$sql);
		return $query;
}
