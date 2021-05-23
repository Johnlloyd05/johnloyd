<?php
session_start();

function login(){
return isset($_SESSION['email']);
}
function confirm_login(){
	if(!login()){
		?>
		<script type="text/javascript">
			window.location = "login.php";
		</script>
		<?php
	}
}
?>