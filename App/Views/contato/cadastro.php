<div class="main-page">
    <div class="container-fluid">
        <div class="row page-title-div">
            <div class="col-md-12">
                <h2 class="title">Cadastro de Contato</h2>
                <p class="sub-title"></p>
            </div>
        </div>
        <div class="row breadcrumb-div">
            <div class="col-md-12">
                <ul class="breadcrumb">
                    <li><a href="<?= LINK ?>contato"><i class="fa fa-home"></i> Início</a></li>
                    <li><a>Contato</a></li>
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
                            <form action="<?= LINK ?>contato/inserir" method="post" class="p-20" enctype="multipart/form-data">
                                <h5 class="underline mt-n">Informações</h5>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="nome">Nome do Contato<sup class="color-danger">*</sup></label>
                                            <input type="text" class="form-control" id="nome" name="nome" placeholder="Nome do Contato" maxlength="50" value="<?= $Sessao::retornaFormulario("nome") ?>" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="telefone">Telefone<sup class="color-danger">*</sup></label>
                                            <input type="text" class="form-control telefone" id="telefone" name="telefone" placeholder="(99) 99999 - 9999" maxlength="200" value="<?= $Sessao::retornaFormulario("telefone") ?>" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="email">E-mail</label>
                                            <input type="email" class="form-control" id="email" name="email" placeholder="E-mail" maxlength="200" value="<?= $Sessao::retornaFormulario("email") ?>">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="assunto">Assunto <sup class="color-danger">*</sup></label>
                                            <textarea class="form-control" id="assunto" name="assunto" placeholder="Assunto" required><?= $Sessao::retornaFormulario("assunto") ?></textarea>
                                        </div>
                                    </div>  
                                </div>

                                <div class="row">
                                                                        
                                    <div class="col-md-12">
                                        <div class="btn-group pull-right mt-10" role="group">
                                            <a href="<?= LINK ?>contato/listar" class="btn bg-gray btn-wide"><i class="fa fa-mail-reply"></i>Voltar</a>
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
                        A tela de cadastro é usada para inserir uma novo Contato(a).<br><br>
                        <b>Os campos disponíveis são:</b><br>
                        <i class="fa fa-check"></i> Nome - Nome do Contato(a);<br>
                        
                        <br><br>
                        <b>Os campos obrigatórios são:</b><br>
                        <i class="fa fa-check"></i> Nome do Contato(a) - Com um limite de 200 caracteres;<br>
                        
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
