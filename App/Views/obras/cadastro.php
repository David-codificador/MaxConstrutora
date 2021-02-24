<div class="main-page">
    <div class="container-fluid">
        <div class="row page-title-div">
            <div class="col-md-12">
                <h2 class="title">Cadastro de Obras</h2>
                <p class="sub-title"></p>
            </div>
        </div>
        <div class="row breadcrumb-div">
            <div class="col-md-12">
                <ul class="breadcrumb">
                    <li><a href="<?= LINK ?>obras"><i class="fa fa-home"></i> Início</a></li>
                    <li><a>Obras</a></li>
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
                            <form action="<?= LINK ?>obras/inserir" method="post" enctype="multipart/form-data" class="p-20">
                                <h5 class="underline mt-n">Informações</h5>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="imagem">Imagem <sup class="color-danger">*</sup></label>
                                            <input type="file" class="form-control" id="imagem" name="imagem" required>
                                            <b> A Imagem deve conter 450px de largura e 300px de altura</b>
                                        </div>
                                    </div>                                    
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="titulo">Título</label>
                                            <input type="text" class="form-control" id="titulo" name="titulo" placeholder="Titulo" maxlength="50" value="<?= $Sessao::retornaFormulario("titulo") ?>">
                                        </div>
                                    </div>                                    
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="sub_titulo">Sub Título</label>
                                            <input type="text" class="form-control" id="sub_titulo" name="sub_titulo" placeholder="Sub Título" maxlength="50" value="<?= $Sessao::retornaFormulario("sub_titulo") ?>">
                                        </div>
                                    </div>                                    
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="categoria">Categoria <sup class="color-danger">*</sup></label>
                                            <select class="form-control" id="categoria" name="categoria" required="">
                                                <option value="1">Construção civil</option>
                                                <option value="2">Meio Fio</option>
                                                <option value="3">Sarjeta</option>
                                                <option value="4">Rede Pluvial</option>
                                                <option value="5">Rede Esgoto</option>
                                                <option value="6">Reservatório</option>
                                                <option value="7">Elevatória de Esgoto</option>
                                            </select>
                                        </div>
                                    </div>                                    
                                </div>

                                <div class="row">

                                    <div class="col-md-12">
                                        <div class="btn-group pull-right mt-10" role="group">
                                            <a href="<?= LINK ?>obras/listar" class="btn bg-gray btn-wide"><i class="fa fa-mail-reply"></i>Voltar</a>
                                            <button type="reset" class="btn btn-gray btn-wide"><i class="fa fa-times"></i>Cancelar</button>
                                            <button type="submit" class="btn bg-black btn-wide"><i class="fa fa-arrow-right"></i>Inserir</button>
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
                        A tela de cadastro é usada para inserir uma nova Obras.<br><br>
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
