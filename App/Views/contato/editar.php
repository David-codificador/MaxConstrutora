<div class="main-page">
    <div class="container-fluid">
        <div class="row page-title-div">
            <div class="col-md-12">
                <h2 class="title">Edição de Contato</h2>
                <p class="sub-title"></p>
            </div>
        </div>
        <div class="row breadcrumb-div">
            <div class="col-md-12">
                <ul class="breadcrumb">
                    <li><a href="<?= LINK ?>home/contato"><i class="fa fa-home"></i> Início</a></li>
                    <li><a href="<?= LINK ?>contato">Contato</a></li>
                    <li class="active">Editar</li>
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
                            <form action="<?= LINK ?>contato/salvar" method="post" class="p-20">
                                <input type="hidden" name="contato" id="contato" value="<?= $viewVar['item']['id'] ?>" required>

                                <h5 class="underline mt-n">Informações</h5>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="nome">Nome</label>
                                            <input type="text" class="form-control" id="nome" name="nome" placeholder="Nome do Contato" maxlength="50" value="<?= $viewVar['item']['nome'] ?>">
                                        </div>
                                    </div>   
                                    <div class="col-md-6">
                                        <div class="form-group ">
                                            <label for="telefone">Telefone</label>
                                            <input type="text" class="form-control telefone" id="telefone" name="telefone" placeholder="Telefone do Contato" maxlength="50" value="<?= $viewVar['item']['telefone'] ?>">
                                        </div>
                                    </div>   
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="email">Email</label>
                                            <input type="text" class="form-control" id="email" name="email" placeholder="Email do Contato" maxlength="50" value="<?= $viewVar['item']['email'] ?>">
                                        </div>
                                    </div>   
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="assunto">Assunto</label>
                                            <textarea class="form-control" id="assunto" name="assunto" placeholder="Assunto" ><?= $viewVar['item']['assunto'] ?></textarea>
                                        </div>
                                    </div>    
                                    <div class="col-md-6">
                                        <label>Status <sup class="color-danger">*</sup></label>
                                        <div class="checkbox">
                                            Inativo <input type="checkbox" name="status" class="js-switch-small" <?= $viewVar['item']['status'] == '2' ? '' : 'checked' ?> /> Ativo
                                        </div>
                                    </div>   
                                </div>

                                <div class="row">

                                    <div class="col-md-12">
                                        <div class="btn-group pull-right mt-10" role="group">
                                            <a href="<?= LINK ?>contato/visualizar/<?= $viewVar['item']['id'] ?>" class="btn bg-gray btn-wide"><i class="fa fa-mail-reply"></i>Voltar</a>
                                            <button type="submit" class="btn bg-black btn-wide"><i class="fa fa-arrow-right"></i>Salvar</button>
                                        </div>
                                    </div>
                                </div>

                            </form>
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
                        A tela de edição é usada para editar as informações da contato exibida.<br><br>
                        <b>Os campos disponíveis são:</b><br>
                        <i class="fa fa-check"></i> Nome - Nome do Contato(a);<br>
                        <i class="fa fa-check"></i> Região - Região do Contato(a);<br>
                        <i class="fa fa-check"></i> Observação - Observação do Contato(a);<br>
                        <i class="fa fa-check"></i> Status - Status ativo ou inativo de profissão.
                        <br><br>
                        <b>Os campos obrigatórios são:</b><br>
                        <i class="fa fa-check"></i> Nome do Contato(a) - Com um limite de 200 caracteres;<br>
                        <i class="fa fa-check"></i> Status - Selecionado(Ativo) ou não selecionado(Inativo).
                        <br><br>
                        O botão "Voltar" da acesso a tela de visualizar informações da contato exibida.<br>
                        O botão "Salvar" é usado para salvar as informações relativas a contato exibida.
                        <br><br>
                        *Ao salvar a edição não é possível reverter o processo.
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="exibirImgContato" tabindex="-1" role="dialog" aria-labelledby="exibirImgContato">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <center>
                    <img id="tag_exibir_img" src="" style="width: 60%; margin: auto !important">
                </center>
                <br>
                <form action="<?= LINK ?>contato/editarImagem" method="post" id="uploadImagem" enctype="multipart/form-data">
                    <input type="hidden" name="id" value="<?= $viewVar['item']["id"] ?>" required />
                    <input type="file" name="imagem" class="form-control" onchange="$('#uploadImagem').submit()" required/>
                </form>
                <br>
                <p>Basta selecionar a imagem que ela será enviada automaticamente</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
            </div>
        </div>
    </div>
</div>