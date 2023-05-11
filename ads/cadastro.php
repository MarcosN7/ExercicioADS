<?php
$nome = $_POST["nome"];
$cidade = $_POST ["cidade"];
$enviar = $_POST["enviar"];

include("conexao.php");
if (isset($enviar)) {
$query = "INSERT INTO teste (id, nome, cidade) VALUES ('NULL','$nome','$cidade')";
$query = mysqli_query($conect,$query);

echo '<script>
alert("cadastro realizado com sucesso!");
window.location="index.php";
</script>';

}
?>