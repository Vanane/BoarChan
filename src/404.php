Page not found.
<?php
$jokes = array("You weren't trying to make shadowy URLs, were you ?", "But you know what you've found ? Love.", "Or is it ? Hey VSauce, Michael here.");
$rand = rand(0, count($jokes) - 1);

$picked = $jokes[$rand];
echo " $picked";


?>