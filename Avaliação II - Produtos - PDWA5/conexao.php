<?php
define('HOST', '127.0.0.1');
define('PRODUTO', 'root');
define('SENHA', '');
define('BD', 'loja_db');


$conexao = mysqli_connect(HOST, PRODUTO, SENHA, BD) or die('Não foi possível conectar ao banco de dados');