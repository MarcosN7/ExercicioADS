<?php
include("conexao.php");
error_reporting(0);
$ex = $_GET["ex"];
if (isset($ex)) {
    $sql ="DELETE FROM teste WHERE id='$ex'";
    if(mysqli_query($conect, $sql)){
    echo "<script>
alert('Seu cadastro foi excluido com sucesso!');
window.location='index.php';
</script>";
    }
    else{
    echo "Error ao deletar os dados $sqlm. ". mysqli_error($conect);
} }
?>