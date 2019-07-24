<?php require_once 'global.php' ?>
<?php
session_start();
$mensagem = $_SESSION['mensagem'];
unset($_SESSION['mensagem']);

$categoria = new Categoria();
$lista = $categoria->listar();

if (isset($_GET['id'])) {
    $categoria->id = $_GET['id'];
    $categoria->buscar();
}

var_dump(Produto::listar());

?>

<section>
    <?= $mensagem ? '<p>'. $mensagem. '</p>' : '' ?>

    <h2>Categoria</h2>

    <form action="categoria-criar.php" method="post">
        <label for="nome">
            <input id="nome" type="text" name="nome" <?= 'value="'. $categoria->nome .'"' ?>>
        </label>
        <?php if($categoria->id): ?>
            <input hidden name="id" value="<?= $categoria->id ?>">
        <?php endif; ?>
        <button type="submit"><?= $categoria->id ? 'Atualizar' : 'Criar' ?></button>
    </form>

    <table>
        <tr>
            <th>Id</th>
            <th>Nome</th>
            <th>Ações</th>
        </tr>

        <?php foreach ($lista as $cat): ?>
        <tr>
            <td><?= $cat['id'] ?></td>
            <td><?= $cat['nome'] ?></td>
            <td><a href="?id=<?= $cat['id'] ?>" title="editar">✎</a></td>
            <td><a href="categoria-remover.php?id=<?= $cat['id'] ?>" title="remover">✖</a></td>
        </tr>
        <?php endforeach; ?>

    </table>
</section>

<section>
    <h2>Produto</h2>

    <table>
        <tr>
            <th>Id</th>
            <th>Nome</th>
            <th>Preço</th>
            <th>Quantidade</th>
            <th>Categoria</th>
        </tr>
        <?php foreach (Produto::listar() as $produto): ?>
            <tr>
                <td><?= $produto['id'] ?></td>
                <td><?= $produto['nome'] ?></td>
                <td><?= $produto['preco'] ?></td>
                <td><?= $produto['quantidade'] ?></td>
                <td>
                    <a href="?id=<?= $produto['categoria_id'] ?>" title="Editar <?= $produto['categoria'] ?>">
                        <?= $produto['categoria'] ?>
                    </a>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
</section>