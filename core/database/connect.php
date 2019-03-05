<?php
try{
    $conn = new PDO('mysql:host=localhost;dbname=u1751546', 'u1751546', '03jan98');
    $conn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
}
catch (PDOException $exception)
{
	echo "Oh no, there was a problem" . $exception->getMessage();
}

?>
