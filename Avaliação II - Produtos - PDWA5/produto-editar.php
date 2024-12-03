<?php
session_start();
require 'conexao.php';
?>
<!doctype html>
<html lang="pt-br">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" href="favicon.ico" type="image/x-icon">
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <!-- Bootstrap Icons CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
  <link rel="stylesheet" href="./style.css">
  <title>Produtos - Editar</title>
</head>

<body>

  <?php include('header.php'); ?>

  <div class="container mt-5">
    <div class="row justify-content-md-center">
      <div class="card card-produto p-0">
        <div class="card-top px-3 d-flex justify-content-between align-items-center pt-2">
          <h4>Editar Produto</h4>
          <a href="lista-produtos.php" class="btn btn-danger float-end">Voltar</a>
        </div>

        <hr class="hr-add">

        <div class="card-body">
          <?php
          if (isset($_GET['id'])) {
            $produto_id = mysqli_real_escape_string($conexao, $_GET['id']);
            $sql = "SELECT * FROM produto WHERE id = '$produto_id'";
            $query = mysqli_query($conexao, $sql);

            if (mysqli_num_rows($query) > 0) {
              $produto = mysqli_fetch_array($query);
          ?>

          <form action="acoes.php" method="POST">
            <input type="hidden" name="produto_id" value="<?= $produto['id'] ?>">

            <div class="mb-3">
              <label for="nome" class="form-label">Nome</label>
              <input type="text" value="<?= $produto['nome'] ?>" class="form-control" id="nome" name="nome" required>
            </div>
            <div class="mb-3">
              <label for="categoria" class="form-label">Categoria</label>
              <input type="text" value="<?= $produto['categoria'] ?>" class="form-control" id="categoria" name="categoria" required>
            </div>
            <div class="mb-3">
              <label for="descricao" class="form-label">Descrição</label>
              <textarea class="form-control" id="descricao" name="descricao" rows="3" required><?= $produto['descricao'] ?></textarea>
            </div>
            <div class="mb-3">
              <label for="fabricante" class="form-label">Fabricante</label>
              <input type="text" value="<?= $produto['fabricante'] ?>" class="form-control" id="fabricante" name="fabricante" required>
            </div>
            <div class="mb-3">
              <label for="preco" class="form-label">Preço</label>
              <input type="number" step="0.01" value="<?= $produto['preco'] ?>" class="form-control" id="preco" name="preco" required>
            </div>

            <div class="mb-3">
              <label for="imagem" class="form-label">Imagem</label>
              <input type="text" value="<?= $produto['imagem'] ?>" class="form-control" id="imagem" name="imagem" placeholder="https://exemplo.com/imagem.jpg" required>
            </div>

            <div class="d-grid gap-2">
              <button type="submit" name="update_produto" class="btn btn-primary btn_add">
                Salvar
              </button>
            </div>
          </form>
          <?php
            } else {
              echo "<h5>Produto não encontrado</h5>";
            }
          }
          ?>
        </div>
      </div>
    </div>
</body>

</html>