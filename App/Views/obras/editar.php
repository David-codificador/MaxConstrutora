<div class="main-page">
    <div class="container-fluid">
        <div class="row page-title-div">
            <div class="col-md-12">
                <h2 class="title">Edição de Obras</h2>
                <p class="sub-title"></p>
            </div>
        </div>
        <div class="row breadcrumb-div">
            <div class="col-md-12">
                <ul class="breadcrumb">
                    <li><a href="<?=LINK?>home/painelAdministrador"><i class="fa fa-home"></i> Início</a></li>
                    <li><a href="<?=LINK?>obras">Obras</a></li>
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
                            <form action="<?=LINK?>obras/salvar" method="post" class="p-20">
                                <input type="hidden" name="obras" id="obras" value="<?=$viewVar['item']['id']?>" required>
                                
                                <h5 class="underline mt-n">Informações</h5>

                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="col-md-12">
                                            <img src="<?=IMAGEMSITE?>obras/<?=$viewVar['item']['imagem']?>" width="100%">
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="titulo">Título</label>
                                                <input type="text" class="form-control" id="titulo" name="titulo" placeholder="Titulo da Obra" maxlength="50" value="<?=$viewVar['item']['titulo']?>">
                                            </div>
                                        </div>                                    
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="sub_titulo">Sub Título </label>
                                                <input type="text" class="form-control" id="sub_titulo" name="sub_titulo" placeholder="Titulo da Obra" maxlength="50" value="<?=$viewVar['item']['sub_titulo']?>">
                                            </div>
                                        </div>                                    
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="categoria">Categoria <sup class="color-danger">*</sup></label>
                                                <select class="form-control" id="categoria" name="categoria" required="">
                                                    <option value="1" <?=$viewVar['item']['categoria'] == 1 ? 'selected':''?>>Construção civil</option>
                                                    <option value="2" <?=$viewVar['item']['categoria'] == 2 ? 'selected':''?>>Meio Fio</option> 
                                                    <option value="3" <?=$viewVar['item']['categoria'] == 3 ? 'selected':''?>>Sarjeta</option>
                                                    <option value="4" <?=$viewVar['item']['categoria'] == 4 ? 'selected':''?>>Rede Pluvial</option>
                                                    <option value="4" <?=$viewVar['item']['categoria'] == 5 ? 'selected':''?>>Rede Esgoto</option>
                                                </select>
                                            </div>
                                        </div>                                    
                                    </div>                                                                      
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="btn-group pull-right mt-10" role="group">
                                            <a href="<?=LINK?>obras/visualizar/<?=$viewVar['item']['id']?>" class="btn bg-gray btn-wide"><i class="fa fa-mail-reply"></i>Voltar</a>
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
                        A tela de edição é usada para editar as informações da obras exibida.<br><br>
                        <b>Os campos disponíveis são:</b><br>
                        <i class="fa fa-check"></i> Nome - Nome da obras;<br>
                        <i class="fa fa-check"></i> Status - Status ativo ou inativo de obras.
                        <br><br>
                        <b>Os campos obrigatórios são:</b><br>
                        <i class="fa fa-check"></i> Nome - Com um limite de 200 caracteres;<br>
                        <i class="fa fa-check"></i> Status - Selecionado(Ativo) ou não selecionado(Inativo).
                        <br><br>
                        O botão "Voltar" da acesso a tela de visualizar informações da obras exibida.<br>
                        O botão "Salvar" é usado para salvar as informações relativas a obras exibida.
                        <br><br>
                        *Ao salvar a edição não é possível reverter o processo.
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
