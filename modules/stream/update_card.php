<?php

	/*
	* Copyright (C) 2016-2018 Abre.io Inc.
	*
	* This program is free software: you can redistribute it and/or modify
    * it under the terms of the Affero General Public License version 3
    * as published by the Free Software Foundation.
	*
    * This program is distributed in the hope that it will be useful,
    * but WITHOUT ANY WARRANTY; without even the implied warranty of
    * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    * GNU Affero General Public License for more details.
	*
    * You should have received a copy of the Affero General Public License
    * version 3 along with this program.  If not, see https://www.gnu.org/licenses/agpl-3.0.en.html.
    */

	//Required configuration files
	require(dirname(__FILE__) . '/../../configuration.php');
	require_once(dirname(__FILE__) . '/../../core/abre_verification.php');
	require(dirname(__FILE__) . '/../../core/abre_dbconnect.php');
	require_once(dirname(__FILE__) . '/../../core/abre_functions.php');

  $link = base64_decode($_POST["url"]);
	$link = mysqli_real_escape_string($db, $link);
  $type = $_POST["type"];
	if(isset($_POST["redirect"])){
		$redirect = $_POST["redirect"];
	}

  if($type == "comment"){
    $query = "SELECT * FROM streams_comments WHERE url = '$link' and comment != ''";
    $dbreturn = databasequery($query);
    $num_rows_comment = count($dbreturn);

		if(isset($redirect)){
			if($redirect == "comments"){
				$query = "SELECT COUNT(*) FROM streams_comments WHERE url = '$link' AND comment != '' AND user = '".$_SESSION['useremail']."'";
				$dbreturn = $db->query($query);
				$row = $dbreturn->fetch_assoc();
				$num_rows_comment_current_user = $row["COUNT(*)"];

				$query = "SELECT COUNT(*) FROM streams_comments WHERE user = '".$_SESSION['useremail']."' AND comment != '' GROUP BY url ORDER BY ID DESC";
				$dbreturn = $db->query($query);
				$row = $dbreturn->fetch_assoc();
				$streamCardsLeft = $row["COUNT(*)"];
			}
		}
		if(!isset($num_rows_comment_current_user)){
			$num_rows_comment_current_user = 0;
		}
		if(!isset($streamCardsLeft)){
			$streamCardsLeft = 0;
		}

    $db->close();
    $json = array("count"=>$num_rows_comment, "currentusercount"=>$num_rows_comment_current_user, "streamcardsleft"=>$streamCardsLeft);
    header("Content-Type: application/json");
    echo json_encode($json);
  }
  if($type == "like"){

		$query = "SELECT * FROM streams_comments WHERE url = '$link' AND comment = '' AND liked = '1'";
		$dbreturn = databasequery($query);
		$num_rows_like = count($dbreturn);

		$query = "SELECT * FROM streams_comments WHERE url = '$link' AND liked = '1' AND user = '".$_SESSION['useremail']."'";
		$dbreturn = databasequery($query);
		$num_rows_like_current_user = count($dbreturn);

		$json = array("count"=>$num_rows_like, "currentusercount"=>$num_rows_like_current_user);
		header("Content-Type: application/json");
		echo json_encode($json);
  }

?>
