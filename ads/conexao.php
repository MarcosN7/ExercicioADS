<?php
$servidor = "localhost";
$banco = "ads";
$usuariobd = "root";
$senhabd = "";

$conect = new
mysqli($servidor,$usuariobd,$senhabd,$banco);
if ($conect->connect_error) {
    die("falha ao conectar: ".$connect->connect_error);
}
?> 