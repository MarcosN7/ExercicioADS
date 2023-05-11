<?php
error_reporting(0);
include("conexao.php");
$up = $_GET["up"];
$sql = "SELECT * FROM teste WHERE id='$up'";
$res = mysqli_query($conect, $sql);
while ($r = mysqli_fetch_array($res)) {
    echo '<form method="POST">
<table>
    <tr>
    <td width="100">
    <label>Nome</label></td><td><input name="nome" value="' . $r['nome'] . '"
type="text"></td></tr>
    <tr>
    <td width="100">
    <label>Cidade</label></td><td><input name="cidade"
    value="' . $r['cidade'] . '" type="text"> </td></tr>
    <tr>
    <td align="center" colspan="2"><input type="submit" name="update">
    </form>
      <br><br>
      <br><br>
       ';
}
$nome = $_POST["nome"];
$cidade = $_POST["cidade"];
$update = $_POST["update"];
if (isset($update)) {

    $altera = "UPDATE teste SET nome='$nome', cidade='$cidade' WHERE id='$up'";
    if (mysqli_query($conect, $altera)) {
        echo "<script>
alert('Seu cadastro foi atualizado com sucesso!');
window.location='index.php';
</script>";
    } else {
        echo "Atualização falhou; " . mysqli_error($alterar);
    }
}
