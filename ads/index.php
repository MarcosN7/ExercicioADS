<body>
<form method="POST" action="cadastro.php">
<h2>Cadastro de Clientes</h2>

<table>
    <tr>
    <td width="100">
    <label>Nome</label></td><td><input name="nome" type="text"></td></tr>
    <tr>
    <td width="100">
    <label>Cidade</label></td><td><input name="cidade" type="text"></td></tr>
    <tr>
    <td align="center" colspan="2"><input type="submit" name="enviar">
</form>
<br><br>
<h2> Lista de Cadastro </h2>
<br>
<div class ="card">
<table class="table">
    <thead class="thead-light">
    <tr>
    <th scope="col">Nome</th>
    <th scope="col">Cidade</th>
    <th scope="col">Editar</th>
    <th scope="col">Excluir</th>
    </tr></thead><tbody>
        
<?php
include("conexao.php");
$sql = "SELECT * FROM teste";
$res = mysqli_query( $conect, $sql);
while ($r =mysqli_fetch_array($res)) {
echo '<tbody>
<tr>
<td>'.$r['nome'].'</td>
<td>'.$r['cidade'].'</td>
<td>
<a href="update.php?up='.$r['id'].'""><img src="update.png" width="16" height="16" > </a></td>
<td><a href="excluir.php?ex='.$r['id'].'"> <img src="excluir.png" width="16" height="16"> </a>
</td>
</tr>';



}
?>