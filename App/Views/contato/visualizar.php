<div class="main-page">
    <div class="container-fluid">
        <div class="row page-title-div">
            <div class="col-md-12">
                <h2 class="title">Visualizar Contato</h2>
                <p class="sub-title"></p>
            </div>
        </div>
        <div class="row breadcrumb-div">
            <div class="col-md-12">
                <ul class="breadcrumb">
                    <li><a href="<?= LINK ?>home/contato"><i class="fa fa-home"></i> Início</a></li>
                    <li><a href="<?= LINK ?>contato">Contato</a></li>
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
                                <div class="row">
                                    <div class="col-md-11 col-sm-6">
                                        <div class="form-group">
                                            <label>Nome</label>
                                            <p><?= $viewVar['item']['nome'] ?></p>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Telefone</label>
                                            <p><?= $viewVar['item']['telefone'] ?></p>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                         <div class="form-group">
                                            <label>Email</label>
                                            <p><?= $viewVar['item']['email'] ?></p>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>assunto</label>
                                            <p><?= $viewVar['item']['assunto'] ?></p>
                                        </div>
                                    </div>
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
                                            <a href="<?= LINK ?>contato/listar" class="btn bg-gray btn-wide"><i class="fa fa-mail-reply"></i>Voltar</a>
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
                        A tela de visualização exibe todas as informações relacionadas a uma Contato.<br><br>
                        <b>Os campos exibidos são:</b><br>
                        <i class="fa fa-check"></i> Nome - Nome da Contato;<br>
                        <i class="fa fa-check"></i> Status - Status ativo ou inativo de Contato.
                        <br><br>
                        O botão "Voltar" da acesso a tela de listagem de profissões.<br>
                        O botão "Editar" é usado para poder editar as informações relativas a Contato exibida.
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="exibirImgPessoa" tabindex="-1" role="dialog" aria-labelledby="exibirImgPessoa">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <center>
                    <img id="tag_exibir_img" src="" style="width: 60%; margin: auto !important">
                </center>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
            </div>
        </div>
    </div>
</div>
