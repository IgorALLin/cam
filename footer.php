<?php

echo '<div id="hiddenmsg">';

if(isset($_SESSION['alert'])) {
	echo $_SESSION['alert'];
	unset($_SESSION['alert']);
};

echo '</div>
	<div id="date">
		<span>&copy</span>';
		echo date("Y");
echo '</div>';

?>