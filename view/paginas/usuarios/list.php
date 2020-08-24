<main>

<div class="alert alert-success" role="alert">Bem vindo, <?php echo $_SESSION['nome']; ?>!</div>

<a href="<?php echo HOME_URI;?>usuario/criar" class="btn">Adicionar Usuário</a>
<a href="<?php echo HOME_URI;?>usuario/deslogar" class="btn">Sair</a>
<table class="table">
<thead>
    <tr><td>ID</td><td>Nome</td><td>Email</td></tr>

<?php

    $conexao=Conexao::getConexao();
    $resultado=$conexao->prepare("SELECT id,nome, email FROM usuario ORDER BY id ASC LIMIT 12");
    $resultado->execute();
    while($usuarios=$resultado->fetch(PDO::FETCH_ASSOC)):
?>

    <tr>
    <td><?php echo $usuarios["id"]; ?></td>
    <td><?php echo $usuarios["nome"]; ?></td>
    <td><?php echo $usuarios["email"]; ?></td>
    </tr>

<?php
endwhile;
?>

</thead>

</table>
</main>