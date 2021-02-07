<div class="main-page">
    <div class="container-fluid">
        <div class="row page-title-div">
            <div class="col-md-12">
                <h2 class="title">Cadastro de Administrador</h2>
                <p class="sub-title"></p>
            </div>
        </div>
        <div class="row breadcrumb-div">
            <div class="col-md-12">
                <ul class="breadcrumb">
                    <li><a href="<?=LINK?>administrador"><i class="fa fa-home"></i> Início</a></li>
                    <li><a>Administrador</a></li>
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
                            <form action="<?=LINK?>administrador/inserir" method="post" class="p-20">
                                <h5 class="underline mt-n">Informações</h5>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="nome">Nome <sup class="color-danger">*</sup></label>
                                            <input type="text" class="form-control" id="nome" name="nome" placeholder="Nome" maxlength="60" value="<?=$Sessao::retornaFormulario("nome")?>" required>
                                        </div>
                                    </div>                                    
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="telefone">Telefone</label>
                                            <input type="text" class="form-control telefone" id="telefone" name="telefone" placeholder="(00) 0 0000-0000" maxlength="45" value="<?=$Sessao::retornaFormulario("telefone")?>">
                                        </div>
                                    </div>                                    
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="email">E-mail</label>
                                            <input type="email" class="form-control" id="email" name="email" placeholder="E-mail" maxlength="200" value="<?=$Sessao::retornaFormulario("email")?>">
                                        </div>
                                    </div>                                    
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="tipo_administrador_id">Tipo de administrador <sup class="color-danger">*</sup></label>
                                            <select class="js-states form-control" id="tipo_administrador_id" name="tipo_administrador_id" required>
                                                <option></option>
                                                <?php
                                                foreach ($viewVar['tipo_administrador'] as $item){
                                                ?>
                                                <option value="<?=$item['id']?>" <?=$Sessao::retornaFormulario("tipo_administrador_id") === $item['id'] ? "selected" : ""?>><?=$item['tipo']?></option>
                                                <?php
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="usuario">Usuário <sup class="color-danger">*</sup></label>
                                            <input type="text" class="form-control" id="usuario" name="usuario" placeholder="Usuário" maxlength="30" minlength="3" value="<?=$Sessao::retornaFormulario("usuario")?>" onchange="verificaNomeUsuario()" required>
                                            <span id="respostaUsuario"></span>
                                        </div>
                                    </div>                                    
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="senha">Senha <sup class="color-danger">*</sup></label>
                                            <input type="password" class="form-control" id="senha" name="senha" placeholder="******" maxlength="30" minlength="5" value="<?=$Sessao::retornaFormulario("senha")?>" required>
                                        </div>
                                    </div>                                    
                                </div>
                                
                                <div class="row">
                                    <div class="col-md-12">
                                        <label>Status <sup class="color-danger">*</sup></label>
                                        <div class="checkbox">
                                            Inativo <input type="checkbox" name="status" class="js-switch-small" <?=$Sessao::retornaFormulario("status") == '2' ? '':'checked'?> /> Ativo
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="btn-group pull-right mt-10" role="group">
                                            <a href="<?=LINK?>administrador/listar" class="btn bg-gray btn-wide"><i class="fa fa-mail-reply"></i>Voltar</a>
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
