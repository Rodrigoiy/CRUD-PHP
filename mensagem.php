<?php 

if (isset($_SESSION['mensagem'])):

?>

<div class="flex items-center justify-between px-4 py-3 rounded-lg text-white
    <?= ($_SESSION['mensagem'] === 'Usuário criado com sucesso') ? 'bg-green-600' : 'bg-red-600'; ?>
    mb-6">
    
    <span class="mr-4"><?= $_SESSION['mensagem']; ?></span> 
    
    <button type="button" class="ml-auto text-white font-bold" onclick="this.parentElement.remove();">
        ×
    </button>
</div>


<?php 
    unset($_SESSION['mensagem']);
    endif;
?>