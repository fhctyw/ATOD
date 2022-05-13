<?php
?>
<h1> DataBse content </h1>
<?php 
foreach ((array) $users as $user) {
    echo $user->id. '<br>';
}

?>
