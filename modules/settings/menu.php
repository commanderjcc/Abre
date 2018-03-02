<?php

	/*
	* Copyright (C) 2016-2017 Abre.io LLC
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
	require_once(dirname(__FILE__) . '/../../core/abre_verification.php');
	require_once(dirname(__FILE__) . '/../../core/abre_functions.php');

?>

<?php

	if(superadmin()){

    //Get Variables Passed to Page
		if(isset($_GET["id"])){ $id = htmlspecialchars($_GET["id"], ENT_QUOTES); }else{ $id = ""; }

	  echo "<div class='col s12'>";
      echo "<ul class='tabs_2' style='background-color:".getSiteColor()."'>";
        echo "<li class='tab col s3 tab_1 formmenu pointer'><a href='#settings'>General</a></li>";
				echo "<li class='tab col s3 tab_2 formmenu pointer'><a href='#settings/integrations'>Integrations</a></li>";
				echo "<li class='tab col s3 tab_3 formmenu pointer'><a href='#settings/authentication'>Authentication</a></li>";
        if($_SESSION['auth_service'] == "google"){
          echo "<li class='tab col s3 tab_4 formmenu pointer'><a href='#settings/usage'>Usage</a></li>";
        }
			echo "</ul>";
		echo "</div>";

	}

?>


<script>

	$(function()
	{
		$( ".formmenu" ).click(function()
		{
			window.open($(this).attr("data"), '_self');
		});
	});

</script>