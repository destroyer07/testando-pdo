<?php require_once 'models/Categoria.php' ?>
<?php
$categoria = new Categoria();
$lista = $categoria->listar();
?>

<section>
    <h2>Categoria</h2>


    <form action="categoria-criar.php" method="post">
        <label for="nome">
            <input id="nome" type="text" name="nome">
        </label>
        <button type="submit">Criar</button>
    </form>

    <table>
        <tr>
            <th>Id</th>
            <th>Nome</th>
        </tr>

        <?php foreach ($lista as $cat): ?>
        <tr>
            <td><?= $cat['id'] ?></td>
            <td><?= $cat['nome'] ?></td>
        </tr>
        <?php endforeach; ?>

    </table>
</section>
