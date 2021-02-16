<div class="main-page">
    <div class="container-fluid">
        <div class="row page-title-div">
            <div class="col-md-12">
                <h2 class="title">Listagem de Obras</h2>
                <p class="sub-title"></p>
            </div>
        </div>
        <div class="row breadcrumb-div">
            <div class="col-md-12">
                <ul class="breadcrumb">
                    <li><a href="<?= LINK ?>home/painelAdministrador"><i class="fa fa-home"></i> Início</a></li>
                    <li><a href="<?= LINK ?>obras">Obras</a></li>
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
                            <div class="row">
                                <div class="form-group col-sm-12 col-md-8">
                                    <h4><?= $viewVar['paginacao']['quanObras'] ?> Registro<?= $viewVar['paginacao']['quanObras'] == 1 ? '' : 's' ?></h4>
                                    <a href="<?= LINK ?>obras/cadastro" class="btn bg-gray btn-wide"><i class="fa fa-plus"></i>Cadastrar</a>
                                </div>
                                <div class="form-group col-sm-12 col-md-4">
                                    <div class="col-sm-12 pt-30">
                                        <input type="busca" class="form-control" id="busca" onchange="buscar()" placeholder="Digite sua busca">
                                        <?= $viewVar['paginacao']['busca'] != '' ? 'Dados da busca: ' . $viewVar['paginacao']['busca'] . ' [<a href="' . LINK . 'obras/listar">Limpar</a>]' : '' ?>
                                    </div>
                                </div>                                
                            </div>
                            <div class="row">
                                <?php
                                foreach ($viewVar['obras'] as $item) {
                                    ?>
                                    <div class="col-md-3 col-xs-6 imagem-galeria">
                                        <img src="<?= IMAGEMSITE ?>obras/<?= $item['imagem'] ?>" class="card-img-top p-10" style="width: 100%" alt="Imagem não encontrada">
                                        <div class="card-body">
                                            <h5 class="card-title p-5"><?= $this->categoria($item['categoria']) ?></h5>
                                            <p class="card-text p-5" style="height: 30px;"><?= $item['titulo'] ?></p>
                                            <p class="card-text p-5" style="height: 30px;"><?= $item['sub_titulo'] ?></p>
                                            <div style="text-align: center; background-color: #ccc; width: 100%; padding: 5px;">
                                                <a href="<?= LINK ?>obras/editar/<?= $item['id'] ?>" class="btn btn-primary">Editar</a>
                                                <a class="btn btn-danger" onclick="confirmacao(<?= $item['id'] ?>)">Excluir</a>
                                            </div>
                                        </div>
                                    </div>                                        
                                    <?php
                                }
                                ?>
                            </div>

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
                                        echo 'href="' . LINK . 'obras/listar/' . $viewVar['paginacao']['anterior'] . '/' . $viewVar["paginacao"]["busca"] . '"';
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
                                            ?>"><a href="<?= LINK ?>obras/listar/<?= $i + 1 ?>/<?= $viewVar['paginacao']['busca'] ?>"><?= str_pad($i + 1, 2, "0", STR_PAD_LEFT); ?></a></li>
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
                                                echo 'href="' . LINK . 'obras/listar/' . $viewVar['paginacao']['proxima'] . '/' . $viewVar["paginacao"]["busca"] . '"';
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
                        A tela de listagem é usada para exibir todos os registros de aministrador que estejam ativos ou inativos.<br><br>
                        <b>Os campos exibidos são:</b><br>
                        <i class="fa fa-check"></i> Nome - Nome da aministrador;<br>
                        <i class="fa fa-check"></i> Status - Status ativo ou inativo da aministrador;<br>
                        <i class="fa fa-check"></i> Opções - Opções de visualizar e excluir.<br>
                        *Uma vez excluido, um registro só poderá ser restaurado por um galeria.
                        <br><br>
                        É possível realizar busca através do campo "Digite sua busca". Também é exibido a quantidade de profissões encontradas. São exibidas no máximo 10 registros por página, sendo assim na parte inferior é possível mudar de página.
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    function buscar() {
        var busca = $("#busca").val();

        window.location.replace($("#link").val() + 'obras/listar/' + busca);
    }
</script>