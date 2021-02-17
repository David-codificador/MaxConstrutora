<div class="main-page">
    <div class="container-fluid">
        <div class="row page-title-div">
            <div class="col-md-12">
                <h2 class="title">Cadastro de Banner</h2>
                <p class="sub-title"></p>
            </div>
        </div>
        <div class="row breadcrumb-div">
            <div class="col-md-12">
                <ul class="breadcrumb">
                    <li><a href="<?= LINK ?>banner"><i class="fa fa-home"></i> Início</a></li>
                    <li<a href="<?=LINK?>banner">Galeria</a></li>
                    <li class="active">Cadastro</li>
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
                            <form action="<?= LINK ?>banner/salvar" method="post" class="p-20" enctype="multipart/form-data">
                                <input type="hidden" name="banner" id="banner" value="<?= $viewVar['item']['id'] ?>" required>
                                <h5 class="underline mt-n">Informações</h5>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="col-md-12">
                                            <img src="<?= IMAGEMSITE ?>banners/<?= $viewVar['item']['imagem'] != '' ? $viewVar['item']['imagem'] : 'padrao.jpg' ?>" class="img-circle profile-img" width="10%" onclick="exibirImgBanerRotativo('<?= IMAGEMSITE ?>banners/<?= $viewVar['item']['imagem'] != '' ? $viewVar['item']['imagem'] : 'padrao.jpg' ?>')" >
                                        </div>
                                    </div>  
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="titulo">Título </label>
                                            <input type="text" class="form-control" id="titulo" name="titulo" placeholder="Título" maxlength="100" value="<?= $viewVar['item']['titulo'] ?>" required>
                                        </div>
                                    </div>  
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="sub_titulo">Sub Título</label>
                                            <input type="text" class="form-control" id="sub_titulo" name="sub_titulo" placeholder="Sub Títlo" maxlength="60" value="<?= $viewVar['item']['sub_titulo'] ?>" required>
                                        </div>
                                    </div>  
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="link">Link <sup class="color-danger">*</sup></label>
                                            <input type="text" class="form-control" id="link" name="link" placeholder="link"  value="<?= $viewVar['item']['link'] ?>" required>
                                        </div>
                                    </div> 
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="titulo_link">Título Link <sup class="color-danger">*</sup></label>
                                            <input type="text" class="form-control" id="titulo_link" name="titulo_link" placeholder="Título do Link"  value="<?= $viewVar['item']['titulo_link'] ?>" required>
                                        </div>
                                    </div> 
                                    <div class="col-md-12">
                                        <label>Status <sup class="color-danger">*</sup></label>
                                        <div class="checkbox">
                                            Inativo <input type="checkbox"  name="status" class="js-switch-small" <?= $viewVar['item']['status'] == '2' ? '' : 'checked' ?> /> Ativo
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="btn-group pull-right mt-10" role="group">
                                            <a href="<?= LINK ?>banner/listar>" class="btn bg-gray btn-wide"><i class="fa fa-mail-reply"></i>Voltar</a>
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

<div class="modal fade" id="exibirImgBanerRotativo" tabindex="-1" role="dialog" aria-labelledby="exibirImgBanerRotativo">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <center>
                    <img id="tag_exibir_img" src="" style="width: 60%; margin: auto !important">
                </center>
                <br>
                <form action="<?= LINK ?>banner/editarImagem" method="post" id="uploadImagem" enctype="multipart/form-data">
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