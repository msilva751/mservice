<?php
include_once 'includes/header.php';
include_once 'action/check-login.php';
include_once 'includes/mensage.php';
//include_once 'logo.php';
?>
<header class="container">
    <div class="cabecalho">
        <div class="logo">
            <h5>M Services BR</h5><br><br>
        </div>
        <div class="clock">
            <h5 id="oclock"></h5> 
        </div>
        <div class="logout">
            <?php echo 'Olá: ' . mb_convert_case(substr($_SESSION['nome_usuario'], 0, 15), MB_CASE_TITLE); ?>
            <p><a href="logout.php"><img src="icon/icons8-logout-30.png" alt="logout" title="Sair do Sistema?"></a></p>
        </div>

    </div>
    <div class="navbar-fixed">
        <nav class="nav-wrapper">
            <ul class="menu">
                <li><a href="#">Administrador</a>
                    <ul>
                        <li><a href="#">Empresa</a></li>
                        <li><a href="cad-empresa.php">Cadastrar Empresa</a></li>
                        <li><a href="#">Usuário</a></li>
                        <li><a href="cad-usuario.php">Cadastrar Usuário</a></li>
                        <li><a href="consul-usuario.php">Consultar Usuário</a><li>
                    </ul>
                </li>
                <li><a href="#">Cliente</a>
                    <ul>
                        <li><a href="form-cad.php">Cadastrar</a></li>
                        <li><a href="consul-cliente.php">Consultar</a></li>
                        <li><a href="consul-cliente.php">Atualizar</a></li>
                    </ul>
                </li>   
                <li><a href="#">Produto</a>
                    <ul>
                        <li><a href="cad-produto.php">Cadastrar</a></li>
                        <li><a href="consul-produto.php">Consulta</a></li>
                        <li><a href="edit-produto.php">Alterar</a></li>
                    </ul>
                </li>
                <li><a href="#">Estoque</a>
                    <ul>
                        <li><a href="#">Consulta</a></li>
                        <li><a href="#">Alterar</a></li>
                    </ul>
                </li>
                <li><a href="#">Pedido</a>
                    <ul>
                        <li><a href="tela-vendas.php">Incluir</a></li>
                        <li><a href="#">Consulta</a></li>
                        <li><a href="#">Cancelar</a></li>
                    </ul>
                </li>
                <li><a href="#">Relatórios</a>
                    <ul>
                        <li><a href="#">Diário</a></li>
                        <li><a href="#">Mensal</a></li>
                        <li><a href="#">Entrega Diária</a></li>
                        <li><a href="#">Entrega Mensal</a></li>
                    </ul>                        
                </li>
            </ul>
        </nav>
    </div>
</header>
<?php
//include_once 'includes/footer.php';
