<div class="main-page">
    <div class="container-fluid">
        <div class="row page-title-div">
            <div class="col-md-12">
                <h2 class="title">Cadastro de Tipo de Administrador</h2>
                <p class="sub-title"></p>
            </div>
        </div>
        <div class="row breadcrumb-div">
            <div class="col-md-12">
                <ul class="breadcrumb">
                    <li><a href="<?=LINK?>home/painelAdministrador"><i class="fa fa-home"></i> Início</a></li>
                    <li><a href="<?=LINK?>tipoAdministrador">Tipo de Administrador</a></li>
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
                            <form action="<?=LINK?>tipoAdministrador/inserir" method="post" class="p-20">
                                <div class="row">

                                    <h5 class="underline mt-n">Informações</h5>

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="tipo">Tipo <sup class="color-danger">*</sup></label>
                                            <input type="text" class="form-control" id="tipo" name="tipo" placeholder="Tipo de administrador" maxlength="50" value="<?=$Sessao::retornaFormulario("tipo")?>" required>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <label for="tipo">Permissões <sup class="color-danger">*</sup></label>
                                    </div>

                                    <?php
                                    foreach ($viewVar['lista'] as $item){
                                    ?>
                                    <div class="col-md-6">
                                        <div class="checkbox">
                                            <input type="checkbox" name="permissao[]" class="js-switch-small" <?= in_array($item['id'], $Sessao::retornaFormulario("permissao")) ? 'checked':'' ?> value="<?=$item['id']?>"/> <?=$item['permissao']?>
                                        </div>
                                    </div>
                                    <?php
                                    }
                                    ?>

                                    <div class="col-md-12">
                                        <br>
                                    </div>

                                    <div class="col-md-12">
                                        <label>Status <sup class="color-danger">*</sup></label>
                                        <div class="checkbox">
                                            Inativo <input type="checkbox" name="status" class="js-switch-small" <?=$Sessao::retornaFormulario("status") == 'off' ? '':'checked'?> /> Ativo
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="btn-group pull-right mt-10" role="group">
                                            <a href="<?=LINK?>tipoAdministrador/listar" class="btn bg-gray btn-wide"><i class="fa fa-mail-reply"></i>Voltar</a>
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
                        A tela de cadastro é usada para inserir um novo tipo de administrador.<br><br>
                        <b>Os campos disponíveis são:</b><br>
                        <i class="fa fa-check"></i> Tipo - Descrição do tipo de administrador;<br>
                        <i class="fa fa-check"></i> Permissões - Permissões do tipo de administrador.
                        <i class="fa fa-check"></i> Status - Status ativo ou inativo.
                        <br><br>
                        <b>Os campos obrigatórios são:</b><br>
                        <i class="fa fa-check"></i> Tipo - Com um limite de 50 caracteres;<br>
                        <i class="fa fa-check"></i> Permissões - No mínimo de 1 (uma) permissão;<br>
                        <i class="fa fa-check"></i> Status - Selecionado(Ativo) ou não selecionado(Inativo).
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>