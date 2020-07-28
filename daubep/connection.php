<?php 
    $bkfood_db = new mysqli("localhost","root","","bk-food");

    if ($bkfood_db->connect_error)
    {
        die("Connection failed: ".$bkfood_db->connect_error);
    }
    $listorder_db = new mysqli("localhost","root","","list_order");

    if ($listorder_db->connect_error)
    {
        die("Connection failed: ".$listorder_db->connect_error);
    }

?>