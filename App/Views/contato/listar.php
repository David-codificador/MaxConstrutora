<div class="main-page">
    <div class="container-fluid">
        <div class="row page-title-div">
            <div class="col-md-12">
                <h2 class="title">Listagem de Contato</h2>
                <p class="sub-title"></p>
            </div>
        </div>
        <div class="row breadcrumb-div">
            <div class="col-md-12">
                <ul class="breadcrumb">
                    <li><a href="<?= LINK ?>home/administrador"><i class="fa fa-home"></i> Início</a></li>
                    <li><a href="<?= LINK ?>contato">Contato</a></li>
                    <li class="active">Lista</li>
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
                            <table class="table table-hover">
                                <div class="row ">
                                    <div class="form-group col-sm-12 col-md-8">
                                        <h4><?= $viewVar['paginacao']['quanContato'] ?> Registro<?= $viewVar['paginacao']['quanContato'] == 1 ? '' : 's' ?></h4>
                                        <a href="<?= LINK ?>contato/cadastro" class="btn bg-gray btn-wide"><i class="fa fa-plus"></i>Cadastrar</a>
                                    </div>
                                    <div class="form-group col-sm-12 col-md-4">
                                        <div class="col-sm-12 pt-30">
                                            <input type="busca" class="form-control" id="busca" onchange="buscar()" placeholder="Digite sua busca">
                                            <?= $viewVar['paginacao']['busca'] != '' ? 'Dados da busca: ' . $viewVar['paginacao']['busca'] . ' [<a href="' . LINK . 'contato/listar">Limpar</a>]' : '' ?>
                                        </div>
                                    </div>                                
                                </div>
                                <thead>
                                    <tr>
                                        <th style="width: 50%">Nome</th>
                                        <th style="width: 30%">Telefone</th>
                                        <th style="width: 20%">Status</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    foreach ($viewVar['contato'] as $item) {
                                        ?>
                                        <tr>

                                            <td><a href="<?= LINK ?>contato/visualizar/<?= $item['id'] ?>"><?= $item['nome'] ?></a></td>  
                                            <td><?= $item['telefone'] ?></td>
                                            <td><?= $this->status($item['status']) ?></td>
                                            <td>
                                                <div class="dropdown pull-right">
                                                    <button class="btn btn-default dropdown-toggle" type="button" id="menu<?= $item['id'] ?>" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                                        <i class="fa fa-bars"></i>
                                                        <span class="caret"></span>
                                                    </button>
                                                    <ul class="dropdown-menu btn_listar" aria-labelledby="menu<?= $item['id'] ?>">
                                                        <li class="dropdown-header">Opções</li>
                                                        <li><a href="<?= LINK ?>contato/visualizar/<?= $item['id'] ?>"><i class="fa fa-search"></i> Visualizar</a></li>
                                                        <li><a href="<?= LINK ?>contato/editar/<?= $item['id'] ?>"><i class="fa fa-edit"></i>Editar</a></li>
                                                        <li><a href="<?= LINK ?>contato/excluir/<?= $item['id'] ?>/0" data-toggle="confirmation" data-placement="top" data-btn-ok-label="Excluir" data-btn-ok-icon="glyphicon glyphicon-share-alt" data-btn-ok-class="btn-success" data-btn-cancel-label="Cancelar" data-btn-cancel-icon="glyphicon glyphicon-ban-circle" data-btn-cancel-class="btn-danger" data-title="Confirmação" data-content="Apagar <?= $item['nome'] ?>?"><i class="fa fa-trash-o color-danger"></i> Excluir</a></li>
                                                    </ul>
                                                </div>
                                            </td>
                                        </tr>
                                        <?php
                                    }
                                    ?>
                                </tbody>
                            </table>
                            <?php
                            $pagina = $viewVar['paginacao']['pagina'];
                            $total = $viewVar['paginacao']['quanPaginas'];
                            $i = $viewVar['paginacao']['inicio'];
                            $fim = $viewVar['paginacao']['fim'];
                            ?>
                            <nav class="text-right">
                                <ul class="pagination">
                                    <li class="<?php
                                    if ($pagina == 1) {
                                        echo 'disabled';
                                    }
                                    ?>">
                                        <a <?php
                                        if ($pagina != 1) {
                                            echo 'href="' . LINK . 'contato/listar/' . $viewVar['paginacao']['anterior'] . '/' . $viewVar["paginacao"]["busca"] . '"';
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
                                        ?>"><a href="<?= LINK ?>contato/listar/<?= $i + 1 ?>/<?= $viewVar['paginacao']['busca'] ?>"><?= str_pad($i + 1, 2, "0", STR_PAD_LEFT); ?></a></li>
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
                                            echo 'href="' . LINK . 'contato/listar/' . $viewVar['paginacao']['proxima'] . '/' . $viewVar["paginacao"]["busca"] . '"';
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
                        A tela de listagem é usada para exibir todos os registros de Contatoes(as) que estejam ativos ou inativos.<br><br>
                        <b>Os campos exibidos são:</b><br>
                        <i class="fa fa-check"></i> Contato - Nome do Contato(a);<br>
                        <i class="fa fa-check"></i> Status - Status ativo ou inativo da aministrador;<br>
                        <i class="fa fa-check"></i> Opções - Opções de visualizar e excluir.<br>
                        *Uma vez excluido, um registro só poderá ser restaurado por um contato.
                        <br><br>
                        É possível realizar busca através do campo "Digite sua busca". Também é exibido a quantidade de Pordutores(as) encontradas. São exibidas no máximo 10 registros por página, sendo assim na parte inferior é possível mudar de página.
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    function buscar() {
        var busca = $("#busca").val();

        window.location.replace($("#link").val() + 'contato/listar/' + busca);
    }
</script>