<?php
	
	/*
	* Copyright 2015 Hamilton City School District	
	* 		
	* This program is free software: you can redistribute it and/or modify
    * it under the terms of the GNU General Public License as published by
    * the Free Software Foundation, either version 3 of the License, or
    * (at your option) any later version.
	* 
    * This program is distributed in the hope that it will be useful,
    * but WITHOUT ANY WARRANTY; without even the implied warranty of
    * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    * GNU General Public License for more details.
	* 
    * You should have received a copy of the GNU General Public License
    * along with this program.  If not, see <http://www.gnu.org/licenses/>.
    */
	
	//Required configuration files
	require(dirname(__FILE__) . '/../../configuration.php');
	require_once(dirname(__FILE__) . '/../../core/abre_verification.php');
	require(dirname(__FILE__) . '/../../core/abre_dbconnect.php');
	require_once('permissions.php');
	
	//Display Search Results
	if($pageaccess==1 or $_SESSION['usertype']=="staff")
	{
		
		//Retrieve Search Query
		if(isset($_POST["searchquery"])){ $searchquery=mysqli_real_escape_string($db, $_POST["searchquery"]); }else{ $searchquery=""; }
		$searchqueryuppercase=encrypt(ucwords($searchquery), ""); 
		$searchquerylowercase=encrypt(strtolower($searchquery), "");
		
		//Display the Page
		echo "<div class='row'>";
		
			if($searchquery!="")
			{
				$sql = "SELECT *  FROM directory where (lastname='$searchqueryuppercase' or firstname='$searchqueryuppercase' or email='$searchqueryuppercase' or location='$searchqueryuppercase' or classification='$searchqueryuppercase' or lastname='$searchquerylowercase' or firstname='$searchquerylowercase' or email='$searchquerylowercase' or location='$searchquerylowercase' or classification='$searchquerylowercase') and archived=0";
			}
			else
			{
				$sql = "SELECT *  FROM directory where archived=0 order by updatedtime DESC limit 10";
			}
			$result = $db->query($sql);
			$resultscount = $result->num_rows;
			$resultscounter = 0;
			while($row = $result->fetch_assoc())
			{
				$resultscounter++;
				if($resultscounter==1){ echo "<table id='myTable' class='tablesorter highlight pointer'><thead style='display:none'><tr><th></th><th></th><th></th><th></th><th></th></tr></thead><tbody>"; }
				$employeeid=htmlspecialchars($row["id"], ENT_QUOTES);
				$firstname=htmlspecialchars($row["firstname"], ENT_QUOTES);
				$firstname=stripslashes(htmlspecialchars(decrypt($firstname, ""), ENT_QUOTES));
				$lastname=htmlspecialchars($row["lastname"], ENT_QUOTES);
				$lastname=stripslashes(htmlspecialchars(decrypt($lastname, ""), ENT_QUOTES));
				$location=htmlspecialchars($row["location"], ENT_QUOTES);
				$location=stripslashes(htmlspecialchars(decrypt($location, ""), ENT_QUOTES));
				$email=htmlspecialchars($row["email"], ENT_QUOTES);
				$email=stripslashes(htmlspecialchars(decrypt($email, ""), ENT_QUOTES));
				$title=htmlspecialchars($row["title"], ENT_QUOTES);
				$title=stripslashes(htmlspecialchars(decrypt($title, ""), ENT_QUOTES));
				$picture=htmlspecialchars($row["picture"], ENT_QUOTES);
				if($picture==""){ 
					$picture=$portal_root."/modules/directory/images/user.png";
				}
				else
				{
					$picture=$portal_root."/modules/directory/serveimage.php?file=$picture";
				}
				$id=htmlspecialchars($row["id"], ENT_QUOTES);
				
				echo "<tr class='employeeview' data-employeeid='$employeeid' data-searchquerysaved='$searchquery'>";
					echo "<td width='75px;'><img src='$picture' class='profile-avatar-small' style='margin-left:5px;'></td>";
					echo "<td><strong class='demotext_dark'>$firstname $lastname</strong></td>";
					echo "<td class='hide-on-small-only demotext_dark'>$email</td>";
					echo "<td class='hide-on-small-only demotext_dark'>$location</td>";
					echo "<td class='hide-on-med-and-down demotext_dark'>$title</td>";	
				echo "</tr>";

				if($resultscounter==$resultscount){ echo "</tbody></table>"; }
			
			}
			
		echo "</div>";
		
		?>
		<script>
			
			$(document).ready(function() 
			{ 

 				$("#myTable").tablesorter({ 
					sortList: [[1,0]]
    			});   			
			}); 
			
		</script>
		<?php
	}
	
?>