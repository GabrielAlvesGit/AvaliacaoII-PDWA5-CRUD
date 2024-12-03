<?php
session_start();
require 'conexao.php';

/* Criar Produto */
if (isset($_POST['create_produto'])) {
  $nome = mysqli_real_escape_string($conexao, $_POST['nome']);
  $categoria = mysqli_real_escape_string($conexao, $_POST['categoria']);
  $descricao = mysqli_real_escape_string($conexao, $_POST['descricao']);
  $fabricante = mysqli_real_escape_string($conexao, $_POST['fabricante']);
  $preco = mysqli_real_escape_string($conexao, $_POST['preco']);
  $imagem = mysqli_real_escape_string($conexao, $_POST['imagem']);

  $sql = "INSERT INTO produto (nome, categoria, descricao, fabricante, preco, imagem) VALUES ('$nome', '$categoria', '$descricao', '$fabricante', '$preco', '$imagem')";


  if (mysqli_query($conexao, $sql)) {
    $_SESSION['mensagem'] = "Produto cadastrado com sucesso!";
    header('Location: lista-produtos.php');
    exit();
  } else {
    $_SESSION['mensagem'] = "Erro ao cadastrar produto: " . mysqli_error($conexao);
    header('Location: lista-produtos.php');
    exit();
  }
}

/* UP Produto */
if (isset($_POST['update_produto'])) {

  $produto_id = mysqli_real_escape_string($conexao, $_POST['produto_id']);
  $nome = mysqli_real_escape_string($conexao, trim($_POST['nome']));
  $categoria = mysqli_real_escape_string($conexao, trim($_POST['categoria']));
  $descricao = mysqli_real_escape_string($conexao, trim($_POST['descricao']));
  $fabricante = mysqli_real_escape_string($conexao, trim($_POST['fabricante']));
  $preco = floatval(mysqli_real_escape_string($conexao, trim($_POST['preco'])));
  $imagem = mysqli_real_escape_string($conexao, trim($_POST['imagem']));

  $sql = "UPDATE produto SET nome = '$nome', categoria = '$categoria', descricao = '$descricao', fabricante = '$fabricante', preco = '$preco', imagem = '$imagem' WHERE id = '$produto_id'";


  if (mysqli_query($conexao, $sql)) {
    $_SESSION['mensagem'] = 'Produto atualizado com sucesso';
    header('Location: lista-produtos.php');
    exit;
  } else {
    $_SESSION['mensagem'] = 'Produto não foi atualizado';
    header('Location: lista-produtos.php');
    exit;
  }
}

/* Delete Produto */
if (isset($_POST['delete_produto'])) {
  $produto_id = mysqli_real_escape_string($conexao, $_POST['delete_produto']);
  $sql = "DELETE FROM produto WHERE id = '$produto_id'";

  if (mysqli_query($conexao, $sql)) {
    $_SESSION['mensagem'] = 'Produto excluído com sucesso';
    header('Location: lista-produtos.php');
    exit;
  } else {
    $_SESSION['mensagem'] = 'Produto não foi excluído';
    header('Location: lista-produtos.php');
    exit;
  }
}