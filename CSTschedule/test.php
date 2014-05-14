		<?php	
			session_start();
			include "functions.php"; 
			
			if (isLoggedIn()){
				echo '<div class="loginInfo" id="userName">' . $_SESSION["SESS_LOGIN_NAME"] . '</div>';
				echo '<div class="loginInfo"><form method="link" action="forum/logout.php">
					<input type="submit" class="button" value="Logout"></form></div>';
			} 
			?>