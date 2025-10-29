<?php 
require 'conexao.php';
?>
<!doctype html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <script src="https://cdn.tailwindcss.com"></script>
  <title>Usuário - Visualizar</title>
</head>
<body class="bg-gray-100 min-h-screen font-sans">
  <?php include('navbar.php'); ?>

  <div class="max-w-3xl mx-auto mt-10">
    <div class="bg-white shadow-lg rounded-2xl overflow-hidden">

      <div class="px-6 py-4 border-b border-gray-200 flex justify-between items-center">
        <h4 class="text-xl font-semibold text-gray-800">Visualizar usuário</h4>
        <a href="index.php" 
           class="inline-block px-4 py-2 text-sm font-medium text-white bg-red-500 hover:bg-red-600 rounded-lg transition">
          Voltar
        </a>
      </div>

      <div class="px-6 py-6">
        <?php 
        if (isset($_GET['id'])) {
            $usuario_id = mysqli_real_escape_string($conexao, $_GET['id']);
            $sql = "SELECT * FROM usuarios WHERE id='$usuario_id'";
            $query = mysqli_query($conexao, $sql);

            if (mysqli_num_rows($query) > 0) {
                $usuario = mysqli_fetch_array($query);
        ?>
        <div class="mb-3">
          <label class="block text-sm font-medium text-gray-600">Nome</label>
          <p class="mt-1 text-gray-800 bg-gray-50 border border-gray-200 rounded-lg px-3 py-2">
              <?=$usuario['nome'];?>
          </p>
        </div>

        <div class="mb-3">
          <label class="block text-sm font-medium text-gray-600">Email</label>
          <p class="mt-1 text-gray-800 bg-gray-50 border border-gray-200 rounded-lg px-3 py-2">
              <?=$usuario['email'];?>
          </p>
        </div>

        <div class="mb-3">
          <label class="block text-sm font-medium text-gray-600">Data de Nascimento</label>
          <p class="mt-1 text-gray-800 bg-gray-50 border border-gray-200 rounded-lg px-3 py-2">
              <?=date('d/m/Y', strtotime($usuario['data_nascimento']));?>
          </p>
        </div>
        <?php 
            } else {
                echo "<h5 class='text-red-500 font-semibold'>Usuário não encontrado</h5>";
            }
        } else {
            echo "<h5 class='text-gray-600'>Nenhum ID fornecido.</h5>";
        }
        ?>
      </div>
    </div>
  </div>
</body>
</html>
