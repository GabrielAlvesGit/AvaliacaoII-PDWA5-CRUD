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
  <title>Produtos</title>
</head>

<body>

  <?php include('header.php'); ?>

  <!-- Mensagem com sucesso -->
  <?php include('mensagem.php'); ?>

  <div class="container mt-4">
    <div class="row justify-content-md-center">
      <div class="card col-md-12">
        <div class="card-top d-flex justify-content-between align-items-center pt-2">
          <h4>Produtos</h4>
          <span class="float-end">
            <a href="produto-create.php" class="btn btn-success" title="Registrar um novo produto"><i class="bi bi-person-plus"></i>
            </a>
          </span>
        </div>

        <hr>

        <div class="card-bottom">
          <table class="table table-bordered table-striped">
            <thead>
              <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Categoria</th>
                <th>Descricao</th>
                <th>Fabricante</th>
                <th>Preço</th>
                <th>Imagem</th>
                <th>Ações</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $sql = "SELECT * FROM produto";
              $produtos = mysqli_query($conexao, $sql);

              if (mysqli_num_rows($produtos) > 0) {
                foreach ($produtos as $produto) {
                  echo '<tr>';
                  echo '<td>' . htmlspecialchars($produto['id']) . '</td>';
                  echo '<td>' . htmlspecialchars($produto['nome']) . '</td>';
                  echo '<td>' . htmlspecialchars($produto['categoria']) . '</td>';
                  echo '<td>' . htmlspecialchars($produto['descricao']) . '</td>';
                  echo '<td>' . htmlspecialchars($produto['fabricante']) . '</td>';
                  echo '<td>' . htmlspecialchars($produto['preco']) . '</td>';
                  echo '<td><img src="' . htmlspecialchars($produto['imagem']) . '" alt="Imagem do Produto" style="max-width: 100px; height: auto;"></td>';
                  echo '<td>
                        <a title="Visualizar" href="produto-view.php?id=' . $produto['id'] . '" class="btn btn-success">
                            <i class="bi bi-binoculars"></i>
                        </a>
                        <a title="Editar" href="produto-editar.php?id=' . $produto['id'] . '" class="btn btn-warning">
                            <i class="bi bi-pencil-square"></i>
                        </a>
                        <form action="acoes.php" method="POST" class="d-inline">
                            <button title="Excluir" type="submit" name="delete_produto" value="' . $produto['id'] . '" class="btn btn-danger">
                                <i class="bi bi-trash"></i>
                            </button>
                        </form>
                    </td>';
                  echo '</tr>';
                }
              } else {
                echo '<tr><td colspan="8">Nenhum produto encontrado.</td></tr>';
              }
              ?>
            </tbody>
          </table>
        </div>

      </div>
    </div>
  </div>

  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-5CWtdu4Fr68yfe9t1wZjx07rHn08nHiJ4eq7lx2kMt22IklPRv5FqC/R58qrcgqE" crossorigin="anonymous"></script>
</body>

</html>