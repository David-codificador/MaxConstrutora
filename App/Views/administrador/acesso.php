<div class="login-bg" style="background-image: url(<?= IMAGEM ?>login.jpg)">
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <div class="login-box">
                <h4 class="text-center mt-10 mb-20 cor_titulo">Login</h4>
                <form action="<?= LINK ?>administrador/entrar" method="POST">
                    <div class="form-group cor_titulo">
                        <label for="usuario">Usuário</label>
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-user"></i></span>
                            <input type="text" class="form-control input-lg" id="usuario" value="<?=$viewVar['info']['usuario']?>" placeholder="Usuário de Acesso " autocomplete="off" name="usuario" required>
                        </div>
                    </div>
                    <div class="form-group cor_titulo">
                        <label for="senha">Senha</label>
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-expeditedssl"></i></span>
                            <input type="password" class="form-control input-lg" id="senha" value="<?=$viewVar['info']['senha']?>" placeholder="******" name="senha" required>
                        </div>
                    </div>
                    <div class="checkbox cor_titulo">
                        <label>
                            <input type="checkbox" name="lembrarSenha" <?=$viewVar['info']['checkbox']?>> Lembrar Senha?
                        </label>
                    </div>
                    <div class="form-group mt-20">
                        <div class="">
                            <a href="<?= LINK ?>" class="btn btn-danger bg-danger-300 btn-labeled text-left"><span class="btn-label btn-label-left"><i class="fa fa-reply"></i></span>Voltar</a>
                            <button type="submit" class="btn btn-success btn-labeled pull-right">Entrar<span class="btn-label btn-label-right"><i class="fa fa-check"></i></span></button>

                            <div class="clearfix"></div>
                        </div>                   
                    </div>
                </form>
                <hr>
                <p class="text-muted text-center mb-n cor_titulo"><small>Copyright © David Natan Seabra</small></p>
            </div>
            <!-- /.login-box -->
        </div>
        <!-- /.col-md-6 col-md-offset-3 -->
    </div>
    <!-- /.row -->
</div>
<!-- /. -->

