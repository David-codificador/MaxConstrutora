<div class="main-page">
    <div class="container-fluid">
        <div class="row page-title-div">
            <div class="col-md-12">
                <h2 class="title">Edição de Serviço</h2>
                <p class="sub-title"></p>
            </div>
        </div>
        <div class="row breadcrumb-div">
            <div class="col-md-12">
                <ul class="breadcrumb">
                    <li><a href="<?= LINK ?>servicos"><i class="fa fa-home"></i> Início</a></li>
                    <li><a>Serviços</a></li>
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
                            <form action="<?= LINK ?>servicos/salvar" method="post" enctype="multipart/form-data" class="p-20">
                                <input type="hidden" name="servicos" id="servicos" value="<?= $viewVar['item']['id'] ?>" required>

                                <h5 class="underline mt-n">Informações</h5>

                                <div class="row">                                 
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="tipo_servico">Tipo de  Serviço</label>
                                            <input type="text" class="form-control" id="tipo_servico" name="tipo_servico" placeholder="Tipo de Serviço" maxlength="50" value="<?= $viewVar['item']['tipo_servico'] ?>">
                                        </div>
                                    </div>                                    
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="titulo">Título</label>
                                            <input type="text" class="form-control" id="titulo" name="titulo" placeholder="Título" maxlength="50" value="<?= $viewVar['item']['titulo'] ?>">
                                        </div>
                                    </div>                                    
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="texto">Descrição do Serviço <sup class="color-danger">*</sup></label>
                                            <textarea class="form-control" id="texto" name="texto" placeholder="Descrição do Serviço" required><?= $viewVar['item']['texto'] ?></textarea>
                                        </div>
                                    </div>                                   
                                </div>

                                <div class="row">

                                    <div class="col-md-12">
                                        <div class="btn-group pull-right mt-10" role="group">
                                            <a href="<?= LINK ?>servicos/visualizar/<?= $viewVar['item']['id'] ?>" class="btn bg-gray btn-wide"><i class="fa fa-mail-reply"></i>Voltar</a>
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
