<!doctype html>
<html lang="pt-br">
<?php
require 'conexao.php';
?>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" href="favicon.ico" type="image/x-icon">

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

  <!-- Bootstrap Icons CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

  <link rel="stylesheet" href="./style.css">
  <title>Produtos - Visualizar</title>
</head>

<body>

  <?php include('header.php'); ?>

  <div class="container mt-5">
    <div class="row justify-content-md-center">
      <div class="card card-produto p-0">
        <div class="card-top px-3 d-flex justify-content-between align-items-center pt-2">
          <h4>Visualizar Produtos</h4>
          <a href="lista-produtos.php" class="btn btn-danger float-end">Voltar</a>
        </div>

        <hr class="hr-add">

        <div class="card-body">
          <?php
          if (isset($_GET['id'])) {
            $produto_id = mysqli_real_escape_string($conexao, $_GET['id']);
            $sql = "SELECT * FROM produto WHERE id = $produto_id";
            $query = mysqli_query($conexao, $sql);

            if (mysqli_num_rows($query) > 0) {
              $produto = mysqli_fetch_array($query);
          ?>

          <div class="mb-3">
            <label>Nome</label>
            <p class="form-control"><?= $produto['nome']; ?></p>
          </div>

          <div class="mb-3">
            <label>Categoria</label>
            <p class="form-control"><?= $produto['categoria']; ?></p>
          </div>

          <div class="mb-3">
            <label>Descrição</label>
            <p class="form-control"><?= $produto['descricao']; ?></p>
          </div>

          <div class="mb-3">
            <label>Fabricante</label>
            <p class="form-control"><?= $produto['fabricante']; ?></p>
          </div>

          <div class="mb-3">
            <label>Preço</label>
            <p class="form-control"><?= $produto['preco']; ?></p>
          </div>

          <div class="mb-3">
            <label>Imagem</label>
            <p class="form-control"><?= $produto['imagem'] ?></p>
          </div>
          <?php
            } else {
              echo "<h5>Nenhum produto encontrado</h5>";
            }
          }
          ?>
        </div>
      </div>
    </div>
  </div>

</body>

</html>