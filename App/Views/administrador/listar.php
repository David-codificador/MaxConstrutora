<div class="main-page">
    <div class="container-fluid">
        <div class="row page-title-div">
            <div class="col-md-12">
                <h2 class="title">Listagem de Administrador</h2>
                <p class="sub-title"></p>
            </div>
        </div>
        <div class="row breadcrumb-div">
            <div class="col-md-12">
                <ul class="breadcrumb">
                    <li><a href="<?= LINK ?>administrador"><i class="fa fa-home"></i> Início</a></li>
                    <li><a>Administrador</a></li>
                    <li class="active">Listagem</li>
                </ul>
            </div>
        </div>
    </div>

    <section class="section">
        <div class="container-fluid">
            <div class="row">

                <div class="col-md-12">
                    <div class="panel">
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-4">
                                    <?= $viewVar['paginacao']['quantAdministrador'] ?> Registros
                                </div>
                                <div class="col-md-4 col-md-offset-4">
                                    <div class="form-group">
                                        <input type="text" class="form-control" onchange="buscar()" id="buscar"  placeholder="Buscar" value="">
                                    </div>
                                </div>

                                <div class="col-md-12 text-right">
                                    <?= $viewVar['paginacao']['buscar'] != '' ? 'Dados da Busca: ' . $viewVar['paginacao']['buscar'] . '[<a href="' . LINK . 'administrador/listar/1">Limpar</a>]' : '' ?>
                                </div>
                            </div>

                            <table class="table table-hover ">
                                <thead>
                                    <tr>
                                        <th style="width: 50%">Nome</th>
                                        <th style="width: 20%">Tipo Administrador</th>
                                        <th style="width: 20%">Status</th>
                                        <th style="width: 10%"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    foreach ($viewVar['listar'] as $item) {
                                        ?>
                                        <tr>
                                            <td><?= $item['nome'] ?></td>
                                            <td><?= $item['tipo'] ?></td>
                                            <td><?= $this->status($item['status']) ?></td>
                                            <td><div class="dropdown">
                                                    <button class="btn btn-default dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        <i class="fa fa-bars"></i>
                                                        <span class="caret"></span>
                                                    </button>
                                                    <ul class="dropdown-menu btn_listar">
                                                        <li><a href="<?= LINK ?>administrador/visualizar/<?= $item['id'] ?>"><i class="fa fa-search"></i> Visualizar</a></li>
                                                        <li><a href="<?= LINK ?>administrador/editar/<?= $item['id'] ?>"><i class="fa fa-edit"></i>Editar</a></li>
                                                        <li><a href="<?= LINK ?>administrador/excluir/<?= $item['id'] ?>/0" data-toggle="confirmation" data-placement="top" data-btn-ok-label="Excluir" data-btn-ok-icon="glyphicon glyphicon-share-alt" data-btn-ok-class="btn-success" data-btn-cancel-label="Cancelar" data-btn-cancel-icon="glyphicon glyphicon-ban-circle" data-btn-cancel-class="btn-danger" data-title="Confirmação" data-content="Apagar <?= $item['nome'] ?>?"><i class="fa fa-trash-o color-danger"></i> Excluir</a></li>

                                                    </ul>
                                                </div></td>
                                        </tr>
                                        <?php
                                    }
                                    ?>
                                </tbody>
                            </table>
                            <?php
                            $pagina = $viewVar['paginacao']['pagina'];
                            $total = $viewVar['paginacao']['quantPaginas'];
                            $i = $viewVar['paginacao']['inicio'];
                            $fim = $viewVar['paginacao']['fim'];
                            ?>

                            <nav class="text-center">
                                <ul class="pagination">
                                    <li class="<?php
                                    if ($pagina == 1) {
                                        echo 'disabled';
                                    }
                                    ?>">
                                        <a <?php
                                    if ($pagina != 1) {
                                        echo 'href="' . LINK . 'administrador/listar/' . $viewVar['paginacao']['anterior'] . '/' . $viewVar['paginacao']['buscar'] . '"';
                                    }
                                    ?> aria-label="Previous">
                                            <span aria-hidden="true">&laquo;</span>
                                        </a>
                                    </li>
                                    <?php
                                        for ($i; $i < $fim; $i++) {
                                            ?>
                                        <li class="<?php
                                        if ($pagina == $i + 1) {
                                            echo('active');
                                        }
                                        ?>">
                                            <a href="<?= LINK ?>administrador/listar/<?= $i + 1 ?>/<?= $viewVar['paginacao']['buscar'] ?>"><?= $i + 1 ?></a>
                                        </li>
                                            <?php
                                        }
                                        ?>
                                    <li class="<?php
                                            if ($pagina == $total or $fim == 0) {
                                                echo 'disabled';
                                            }
                                        ?>">
                                        <a <?php
                                            if ($pagina != $total and $fim != 0) {
                                                echo 'href="' . LINK . 'administrador/listar/' . $viewVar['paginacao']['proxima'] . '/' . $viewVar['paginacao']['buscar'] . '"';
                                            }
                                        ?> aria-label="Next">

                                            <span aria-hidden="true">&raquo;</span>
                                        </a>
                                    </li>
                                </ul>
                            </nav>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<div class="right-sidebar bg-white fixed-sidebar">
    <div class="sidebar-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <h4>Ajuda da página<i class="fa fa-times close-icon"></i></h4>
                    <p>
                        A tela de cadastro é usada para inserir uma nova profissão.<br><br>
                        <b>Os campos disponíveis são:</b><br>
                        <i class="fa fa-check"></i> Nome - Nome da profissão;<br>
                        <i class="fa fa-check"></i> Status - Status ativo ou inativo de profissão.
                        <br><br>
                        <b>Os campos obrigatórios são:</b><br>
                        <i class="fa fa-check"></i> Nome - Com um limite de 200 caracteres;<br>
                        <i class="fa fa-check"></i> Status - Selecionado(Ativo) ou não selecionado(Inativo).
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
