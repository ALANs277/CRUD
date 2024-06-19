<?php
require 'db.php';

try {
    $database = new Database();
    $db = $database->dbConnection();
    $query = "SELECT id, nome_completo, email FROM usuarios";
    $stmt = $db->prepare($query);
    $stmt->execute();

    $usuarios = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $exception) {
    echo "Erro: " . $exception->getMessage();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Lista de Usuários</title>
</head>
<body>
    <h2>Lista de Usuários</h2>
    <a href="create.php">Cadastrar Novo Usuário</a><br><br>
    <?php
    if (!empty($_GET['msg'])) {
        echo "<div style='color: green;'>" . htmlspecialchars($_GET['msg']) . "</div>";
    }
    ?>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Nome Completo</th>
            <th>Email</th>
            <th>Ações</th>
        </tr>
        <?php foreach ($usuarios as $usuario) : ?>
        <tr>
            <td><?php echo htmlspecialchars($usuario['id']); ?></td>
            <td><?php echo htmlspecialchars($usuario['nome_completo']); ?></td>
            <td><?php echo htmlspecialchars($usuario['email']); ?></td>
            <td>
                <a href="update.php?id=<?php echo $usuario['id']; ?>">Editar</a>
                <a href="delete.php?id=<?php echo $usuario['id']; ?>" onclick="return confirm('Tem certeza que deseja excluir?');">Excluir</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>
