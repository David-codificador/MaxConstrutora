<div class="main-page">
    <div class="container-fluid">
        <div class="row page-title-div">
            <div class="col-md-12">
                <h2 class="title">Visualizar Serviços</h2>
                <p class="sub-title"></p>
            </div>
        </div>
        <div class="row breadcrumb-div">
            <div class="col-md-12">
                <ul class="breadcrumb">
                    <li><a href="<?= LINK ?>home/painelServiços"><i class="fa fa-home"></i> Início</a></li>
                    <li><a href="<?= LINK ?>servicos">Serviços</a></li>
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
                                    <div class="col-md-6 col-sm-6">
                                        <div class="form-group">
                                            <label>Tipo de Serviço</label>
                                            <p><?= $viewVar['item']['tipo_servico'] ?></p>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label>Titulo</label>
                                            <p><?= $viewVar['item']['titulo'] ?></p>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label>Observaçao</label>
                                            <p><?= $viewVar['item']['texto'] ?></p>
                                        </div>
                                    </div>
                                 
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="btn-group pull-right mt-10" role="group">
                                            <a href="<?= LINK ?>servicos/listar" class="btn bg-gray btn-wide"><i class="fa fa-mail-reply"></i>Voltar</a>
                                            <a href="<?= LINK ?>servicos/editar/<?= $viewVar['item']['id'] ?>" class="btn bg-black btn-wide"><i class="fa fa-pencil"></i>Editar</a>
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
                        A tela de visualização exibe todas as informações relacionadas a uma Serviços(a).<br><br>
                        <b>Os campos exibidos são:</b><br>
                        <i class="fa fa-check"></i> Serviços - Nome da Serviços;<br>
                        <i class="fa fa-check"></i> Região - Região da Serviços(a);<br>
                        <i class="fa fa-check"></i> Observação - Observação do Serviços(a);<br>
                        <i class="fa fa-check"></i> Status - Status ativo ou inativo de Serviços;<br>
                        <i class="fa fa-check"></i> Data de Cadastro - Data de Cadastro do Serviços.<br>
                        
                        <br><br>
                        O botão "Voltar" da acesso a tela de listagem de Serviçoses(as).<br>
                        O botão "Editar" é usado para poder editar as informações relativas a Serviços(a) exibida.
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
