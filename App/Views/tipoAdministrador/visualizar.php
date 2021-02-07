<div class="main-page">
    <div class="container-fluid">
        <div class="row page-title-div">
            <div class="col-md-12">
                <h2 class="title">Visualizar Tipo de Administrador</h2>
                <p class="sub-title"></p>
            </div>
        </div>
        <div class="row breadcrumb-div">
            <div class="col-md-12">
                <ul class="breadcrumb">
                    <li><a href="<?=LINK?>home/administrador"><i class="fa fa-home"></i> Início</a></li>
                    <li><a href="<?=LINK?>tipoAdministrador">Tipo de Administrador</a></li>
                    <li class="active">Visualizar</li>
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
                            <div class="p-20">
                                <h5 class="underline mt-n">Informações</h5>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Descrição</label>
                                            <p><?=$viewVar['item']['tipo']?></p>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <label>Permissões</label>
                                    </div>

                                    <?php
                                    foreach ($viewVar['permissao'] as $permissao){
                                    ?>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <p> <i class="fa fa-check-square-o"></i> <?=$permissao['permissao']?></p>
                                        </div>
                                    </div>
                                    <?php
                                    }
                                    ?>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Status</label>
                                            <p><?=$this->status($viewVar['item']['status'])?></p>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="btn-group pull-right mt-10" role="group">
                                            <a href="<?=LINK?>tipoAdministrador/listar" class="btn bg-gray btn-wide"><i class="fa fa-mail-reply"></i>Voltar</a>
                                            <a href="<?=LINK?>tipoAdministrador/editar/<?=$viewVar['item']['id']?>" class="btn bg-black btn-wide"><i class="fa fa-pencil"></i>Editar</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
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
                        A tela de visualização exibe todas as informações relacionadas a uma tipo de administrador.<br><br>
                        <b>Os campos exibidos são:</b><br>
                        <i class="fa fa-check"></i> Nome - Nome da tipo de administrador;<br>
                        <i class="fa fa-check"></i> Status - Status ativo ou inativo de tipo de administrador.
                        <br><br>
                        O botão "Voltar" da acesso a tela de listagem de tipos de administradors.<br>
                        O botão "Editar" é usado para poder editar as informações relativas a tipo de administrador exibida.
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
