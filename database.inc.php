<?php
$db = new mysqli("localhost", "default", "it112", "stattool");
if ($db->connect_errno) {
    echo "Failed to connect to MySQL: (" . $db->connect_errno . ") " . $db->connect_error;
}
?>
