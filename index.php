<?php 
session_start();
require 'conexao.php';
?>
<!doctype html>
<html lang="pt-br">
  <head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <title>Usuários</title>
  </head>
<body class="bg-gray-100 min-h-screen">
  <?php include('navbar.php'); ?>

  <div class="container mx-auto px-4 mt-6">
    <?php include('mensagem.php') ?> 
    <div class="bg-white rounded-2xl shadow-md">
      <div class="flex items-center justify-between border-b border-gray-200 px-6 py-4">
        <h4 class="text-xl font-semibold text-gray-800">
          Lista de Usuários
        </h4>
        <!-- usuario-create -->
        <a href="usuario-create.php"
           class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg text-sm font-medium transition">
          Adicionar Usuário
        </a>
      </div>

      <div class="p-6 overflow-x-auto">
        <table class="w-full border border-gray-200 rounded-lg overflow-hidden text-left">
          <thead class="bg-gray-200 text-gray-700 uppercase text-sm">
            <tr>
              <th class="px-4 py-3 border-b">ID</th>
              <th class="px-4 py-3 border-b">Nome</th>
              <th class="px-4 py-3 border-b">Email</th>
              <th class="px-4 py-3 border-b">Data Nascimento</th>
              <th class="px-4 py-3 border-b text-center">Ações</th>
            </tr>
          </thead>
          <tbody class="text-gray-800">
            <?php 
            $sql = 'SELECT * FROM usuarios';
            $usuarios = mysqli_query($conexao, $sql);
            if (mysqli_num_rows($usuarios) > 0) {
              foreach($usuarios as $usuario) {
            ?>
            <tr class="hover:bg-gray-50 transition">

              <td class="px-4 py-3 border-b"><?=$usuario['id']?></td>
              <td class="px-4 py-3 border-b"><?=$usuario['nome']?></td>
              <td class="px-4 py-3 border-b"><?=$usuario['email']?></td>
              <td class="px-4 py-3 border-b"><?=date('d/m/Y', strtotime($usuario['data_nascimento']))?></td>
              <td class="px-4 py-3 border-b text-center space-x-2">
                <a href="usuario-view.php?id=<?=$usuario['id']?>" class="bg-gray-600 hover:bg-gray-700 text-white px-5 py-2 rounded text-sm transition">
                  Visualizar
                </a>
                <a href="#" class="bg-green-600 hover:bg-green-700 text-white px-5 py-2 rounded text-sm transition">
                  Editar
                </a>
                <form action="" method="POST" class="inline-block">
                  <button type="submit" name="delete_usuario" value="1"
                    class="bg-red-600 hover:bg-red-700 text-white px-5 py-2 rounded text-sm transition">
                    Excluir
                  </button>
                </form>
              </td>
            </tr>
            <?php 
              }
            }else{
              echo '<h5> nenhum usuário encontrado</h5>';
            }
            ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</body>
</html>