<style>

    .row {
        margin-left: auto;
        margin-right: auto;
        margin-bottom: 20px;
    }

    .row:after {
        content: "";
        display: table;
        clear: both;
    }

    .row .col {
        float: left;
        -webkit-box-sizing: border-box;
        box-sizing: border-box;
        padding: 0 0.75rem;
        min-height: 1px;
    }

    .row .col[class*="push-"], .row .col[class*="pull-"] {
        position: relative;
    }
    .row .col.s12 {
        width: 100%;
        margin-left: auto;
        left: auto;
        right: auto;
    }
    .row .col.m10 {
        width: 83.3333333333%;
        margin-left: auto;
        left: auto;
        right: auto;
    }
    .row .col.offset-m1 {
        margin-left: 8.3333333333%;
    }
    .row .col.pull-m1 {
        right: 8.3333333333%;
    }
    .row .col.push-m1 {
        left: 8.3333333333%;
    }
    table, th, td {
        border: none;
    }

    table {
        width: 100%;
        display: table;
        border-collapse: collapse;
        border-spacing: 0;
    }
    table.striped tr {
        border-bottom: none;
    }

    table.striped > tbody > tr:nth-child(odd) {
        background-color: rgba(242, 242, 242, 0.5);
    }

    table.striped > tbody > tr > td {
        border-radius: 0;
    }

    table.highlight > tbody > tr {
        -webkit-transition: background-color .25s ease;
        transition: background-color .25s ease;
    }

    table.highlight > tbody > tr:hover {
        background-color: rgba(242, 242, 242, 0.5);
    }

    table.centered thead tr th, table.centered tbody tr td {
        text-align: center;
    }

    tr {
        border-bottom: 1px solid rgba(0, 0, 0, 0.12);
    }

    td, th {
        padding: 15px 5px;
        display: table-cell;
        text-align: left;
        vertical-align: middle;
        border-radius: 2px;
    }
</style>
<?php
include_once 'includes/header.php';
include_once 'action/check-login.php';
include_once 'includes/mensage.php';
include_once ('link.php');
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
<br>
<br>
<div class="row">   
    <div class="col s12 m10 push-m1">
        <table class="striped">
            <thead>
                <tr>
                    <th>CPF</th>
                    <th>Nome</th>
                    <th>Endereço</th>
                    <th>E-mail</th>
                    <th>Telefone Celular</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $sql = "SELECT * FROM cadastro";
                $result = mysqli_query($link, $sql);
                while ($dados = mysqli_fetch_array($result)):
                    ?>
                    <tr>
                        <td><?php echo $dados['cpf_cnpj']; ?></td>
                        <td><?php echo $dados['nome']; ?></td>
                        <td><?php echo $dados['endereco']; ?></td>
                        <td><?php echo $dados['email']; ?></td>
                        <td><?php echo $dados['tel_celular']; ?></td>
                    </tr>    
                <?php
            endwhile;
            ?>
            </tbody>
        </table>
    </div>
</div>
