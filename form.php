<?php
function renderForm($id = '', $nome_completo = '', $email = '', $erro = '', $is_edit = false) {
?>
<!DOCTYPE html>
<html>
<head>
    <title><?php echo $is_edit ? 'Editar Usuário' : 'Cadastrar Usuário'; ?></title>
</head>
<body>
    <h2><?php echo $is_edit ? 'Editar Usuário' : 'Cadastrar Usuário'; ?></h2>
    <?php if ($erro) { echo "<div style='color: red;'>$erro</div>"; } ?>
    <form action="" method="post">
        <input type="hidden" name="id" value="<?php echo $id; ?>">
        <label for="nome_completo">Nome Completo:</label>
        <input type="text" name="nome_completo" value="<?php echo $nome_completo; ?>" required><br>
        <label for="email">Email:</label>
        <input type="email" name="email" value="<?php echo $email; ?>" required><br>
        <label for="senha">Senha:</label>
        <input type="password" name="senha" required><br>
        <input type="submit" name="submit" value="<?php echo $is_edit ? 'Atualizar' : 'Cadastrar'; ?>">
    </form>
    <br>
    <a href="index.php">Voltar</a>
</body>
</html>
<?php
}
?>
