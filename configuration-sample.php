<?php
	
	/*
	This program is free software: you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation, either version 3 of the License, or
    (at your option) any later version.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program.  If not, see <http://www.gnu.org/licenses/>.
    */
	
	//The Server Timezone
	date_default_timezone_set("America/New_York");
	
	//The Domain/Location of Abre
	$portal_root = "http://example.org";
	
	//The Title of Your Site
	if (!defined('SITE_TITLE')){ define('SITE_TITLE','Abre Portal'); }
	
	//The Description of Your Site
	if (!defined('SITE_DESCRIPTION')){ define('SITE_DESCRIPTION','Our Abre Portal'); }
	
	//The Favicon for Your Site
	if (!defined('SITE_FAVICON')){ define('SITE_FAVICON','core/images/favicon.png'); }
	
	//The Chrome Icon for Your Site
	if (!defined('SITE_CHROME_ICON')){ define('SITE_CHROME_ICON','core/images/chrome-touch-icon.png'); }
	
	//The iOS Icon for Your Site
	if (!defined('SITE_SAFARI_ICON')){ define('SITE_SAFARI_ICON','core/images/apple-touch-icon.png'); }
	
	//The Windows Icon for Your Site
	if (!defined('SITE_WINDOWS_ICON')){ define('SITE_WINDOWS_ICON','core/images/ms-touch-icon.png'); } 
	
	//The Windows Icon Color for Your Site
	if (!defined('SITE_WINDOWS_ICON_COLOR')){ define('SITE_WINDOWS_ICON_COLOR','#2B2B2B'); } 
	
	//Your Google Apps Domain Name
	if (!defined('SITE_GAFE_DOMAIN')){ define('SITE_GAFE_DOMAIN','@example.org'); }
	
	//The Help Text on the Login Page
	if (!defined('SITE_LOGIN_TEXT')){ define('SITE_LOGIN_TEXT','Student and Staff Portal'); }
	
	//MySQL Host
	if (!defined('DB_HOST')){ define('DB_HOST','localhost'); }
	
	//MySQL Username
	if (!defined('DB_USER')){ define('DB_USER','username'); }
	
	//MySQL Password
	if (!defined('DB_PASSWORD')){ define('DB_PASSWORD','password'); }
	
	//MySQL Database Name
	if (!defined('DB_NAME')){ define('DB_NAME','nameofdatabse'); }
	
	//MySQL (The Encryption Key Used to Store Encrypted Data. Must be a 32 Randomly Generated Key)
	if (!defined('DB_KEY')){ define('DB_KEY','XXXXXXXXXXXXXXXXXXXXXXXXXXXXXX'); }
	
	//Google Console Client ID
	if (!defined('GOOGLE_CLIENT_ID')){ define('GOOGLE_CLIENT_ID','XXXXXXXXXXXXXXXXXXXXXXXXXXXXXX'); }
	
	//Google Console Client Secret
	if (!defined('GOOGLE_CLIENT_SECRET')){ define('GOOGLE_CLIENT_SECRET','XXXXXXXXXXXXXXXXXXXXXXXXXXXXXX'); }
	
	//Google Console API Key
	if (!defined('GOOGLE_API_KEY')){ define('GOOGLE_API_KEY','XXXXXXXXXXXXXXXXXXXXXXXXXXXXXX'); }
	
	//Google Console Domain Name (Google Apps Domain Name)
	if (!defined('GOOGLE_HD')){ define('GOOGLE_HD','domain.org'); }
	
	//Google Analytics ID
	if (!defined('GOOGLE_ANALYTICS')){ define('GOOGLE_ANALYTICS','XXXXXXXXXX'); }
	
	//Cookie (The Encryption Key Used to Store Encrypted Cookie Data. Must be a 32 Randomly Generated Key)
	if (!defined('PORTAL_COOKIE_KEY')){ define('PORTAL_COOKIE_KEY','XXXXXXXXXX'); }
	
	//Cookie (The Name Used to Store the Cookie)
	if (!defined('PORTAL_COOKIE_NAME')){ define('PORTAL_COOKIE_NAME','Cookie_Name'); }

	//Feedback Response Email (The Email where Feedback is Sent)
	if (!defined('FEEDBACK_EMAIL')){ define('FEEDBACK_EMAIL','you@example.org'); }
	
	/* That's all, stop editing! */
	ini_set('display_errors','off');
	$portal_path_root = $_SERVER['DOCUMENT_ROOT'];
	if (!defined('GOOGLE_REDIRECT')){ define('GOOGLE_REDIRECT', $portal_root.'/index.php'); }
	if (!defined('GOOGLE_SCOPES')){ define('GOOGLE_SCOPES',serialize (array('https://www.googleapis.com/auth/userinfo.email','https://www.googleapis.com/auth/plus.login', 'https://www.googleapis.com/auth/gmail.modify', 'https://www.googleapis.com/auth/drive.readonly', 'https://www.googleapis.com/auth/calendar.readonly', 'https://www.googleapis.com/auth/classroom.courses.readonly', 'https://www.googleapis.com/auth/classroom.rosters.readonly'))); }
	if (!defined('STREAM_CACHE')){ define('STREAM_CACHE','true'); }
	
?>