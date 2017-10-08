<?php

function print_bet($ch)
{
	global $db;
  $query=mysqli_query($db,"SELECT * FROM events WHERE championship='$ch'");

  return $query;

}
