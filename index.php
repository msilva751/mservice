<?php
session_start();
include_once 'includes/header.php';
?>
<div class="brand-logo">
    <h2>Sistema Corporativo - M Services</h2>
</div>
<?php
if (isset($_SESSION['nao_autenticado'])):
    ?>
    <div class="validate">
        <p>ERRO: Usuário ou senha inválidos!</p>
    </div>
    <?php
endif;
unset($_SESSION['nao_autenticado']);
?>
<div class="box-login">
    <form name="login" action="login.php" method="POST">
        <div>
            <input class="login-input" type="text" name="login_usuario" placeholder="Nome do usuário" autocomplete="off" autofocus="">   
            <input class="pass-input" onclick="showPass()" type="password" name="senha_usuario" id="senha_usuario" placeholder="Senha do usuário">
            <!--<button type="button" onclick="mostrarSenha()" class="show-pass">Mostrar</button>-->
            <div id="icon" onclick="showPass()"></div>
        </div>
        <div class="btn-enter">                
            <button class="enter" type="submit" name="btn-entrar" id="btn-entrar" value="Entrar"> Entrar </button>
        </div>
    </form>
</div>
<script>
    function showPass() {
        var tipo = document.getElementById("senha_usuario");
        if (tipo.type === "password") {
            tipo.type = "text";
            icon.classList.add("hide");
        } else {
            tipo.type = "password";
            icon.classList.remove("hide");
        }
    }
</script>
<script>
    function mostrarSenha() {
        var tipo = document.getElementById("senha_usuario");
        if (tipo.type === "password") {
            tipo.type = "text";
        } else {
            tipo.type = "password";
        }
    }
</script>

<?php
//include_once 'includes/footer.php';



