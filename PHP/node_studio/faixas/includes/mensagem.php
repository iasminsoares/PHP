<?php
//SESSÂO
session_start();
if(isset($_SESSION['mensagem'])): ?>
    <script>
    //MENSAGEM
        window.onload = function(){ //alerta de erros
        M.toast({html: '<?php echo $_SESSION['mensagem']; ?>'});
    }
    </script>
<?php
endif;
session_unset(); //limpando a sessão
?>