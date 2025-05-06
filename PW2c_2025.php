<?php
try {
    $mySqli = new mySqli("localhost", "root", "root", "db2ads");
} catch (mysqli_sql_exception $e) {
}

dbquery('select * from tbUsuario', $mySqli);
function dbquery($cmd, $conn)
{
    try {
        $conn->query($cmd);
    } catch (mysqli_sql_exception $e) {
        echo ('Deu erro mane');
    }
}
?>