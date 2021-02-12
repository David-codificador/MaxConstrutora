
<body class="top-navbar-fixed">
    <div class="main-wrapper">

        <!-- ========== TOP NAVBAR ========== -->
        <nav class="navbar top-navbar bg-white box-shadow">
            <div class="container-fluid">
                <div class="row">
                    <div class="navbar-header no-padding">
                        <a class="navbar-brand" href="index.html">
                            MVCPadrao
                        </a>
                        <span class="small-nav-handle hidden-sm hidden-xs"><i class="fa fa-outdent"></i></span>
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse-1" aria-expanded="false">
                            <span class="sr-only">Toggle navigation</span>
                            <i class="fa fa-ellipsis-v"></i>
                        </button>
                        <button type="button" class="navbar-toggle mobile-nav-toggle" >
                            <i class="fa fa-bars"></i>
                        </button>
                    </div>
                    <!-- /.navbar-header -->

                    <div class="collapse navbar-collapse" id="navbar-collapse-1">
                        <ul class="nav navbar-nav" data-dropdown-in="fadeIn" data-dropdown-out="fadeOut">
                            <li class="hidden-sm hidden-xs"><a href="#" class="user-info-handle"><i class="fa fa-user"></i></a></li>
                            <li class="hidden-sm hidden-xs"><a href="#" class="full-screen-handle"><i class="fa fa-arrows-alt"></i></a></li>
                        </ul>
                        <!-- /.nav navbar-nav -->

                        <ul class="nav navbar-nav navbar-right" data-dropdown-in="fadeIn" data-dropdown-out="fadeOut">

                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><?= $Sessao::getAdministrador('nome') ?> <span class="caret"></span></a>
                                <ul class="dropdown-menu profile-dropdown">
                                    <li class="profile-menu bg-gray">
                                        <div class="">
                                            <img src="http://placehold.it/60/c2c2c2?text=User" alt="John Doe" class="img-circle profile-img">
                                            <div class="profile-name">
                                                <h6><?= $Sessao::getAdministrador('nome') ?></h6>
                                                <a href="#"><?= $Sessao::getAdministrador('tipo') ?></a>
                                            </div>
                                            <div class="clearfix"></div>
                                        </div>
                                    </li>
                                    <li><a href="#"><i class="fa fa-cog"></i> Settings</a></li>
                                    <li><a href="#"><i class="fa fa-sliders"></i> Account Details</a></li>
                                    <li role="separator" class="divider"></li>
                                    <li><a href="<?= LINK ?>administrador/sair" class="color-danger text-center"><i class="fa fa-sign-out"></i> sair</a></li>
                                </ul>
                            </li>
                            <!-- /.dropdown -->
                            <li><a href="#" class="hidden-xs hidden-sm open-right-sidebar"><i class="fa fa-question"></i></a></li>
                        </ul>
                        <!-- /.nav navbar-nav navbar-right -->
                    </div>
                    <!-- /.navbar-collapse -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </nav>

        <!-- ========== WRAPPER FOR BOTH SIDEBARS & MAIN CONTENT ========== -->
        <div class="content-wrapper">
            <div class="content-container">

                <!-- ========== LEFT SIDEBAR ========== -->
                <div class="left-sidebar fixed-sidebar bg-black-300 box-shadow">
                    <div class="sidebar-content">
                        <div class="user-info closed">
                            <img src="<?= IMAGEM ?>administrador/<?= $Sessao::getAdministrador("foto") != '' ? $Sessao::getAdministrador("foto") : 'padrao.jpg' ?>" class="img-circle profile-img" style="width: 35%">
                            <h6 class="title"><?= $Sessao::getAdministrador("nome") ?></h6>
                            <small class="info"><?= $Sessao::getAdministrador('tipo') ?></small>

                        </div>
                        <!-- /.user-info -->

                        <div class="sidebar-nav">
                            <ul class="side-nav color-gray">
                                <li class="nav-header">
                                    <span class="">Acesso</span>
                                </li>
                                <li class="has-children">
                                    <a href="#"><i class="fa fa-cog"></i> <span>Administrador</span> <i class="fa fa-angle-right arrow"></i></a>
                                    <ul class="child-nav">
                                        <li><a href="<?= LINK ?>administrador/cadastro"><i class="fa fa-plus-circle"></i> <span>Cadastro</span></a></li>
                                        <li><a href="<?= LINK ?>administrador/listar"><i class="fa fa-bars"></i> <span>Listagem</span></a></li>
                                    </ul>
                                </li>
                                <li class="has-children">
                                    <a href="#"><i class="fa fa-gears"></i> <span>Tipo de Administrador</span> <i class="fa fa-angle-right arrow"></i></a>
                                    <ul class="child-nav">
                                        <li><a href="<?= LINK ?>tipoAdministrador/cadastro"><i class="fa fa-plus-circle"></i> <span>Cadastro</span></a></li>
                                        <li><a href="<?= LINK ?>tipoAdministrador/listar"><i class="fa fa-bars"></i> <span>Listagem</span></a></li>
                                    </ul>
                                </li>
                                <li class="nav-header">
                                    <span class="">Configuração</span>
                                </li>
                                <li class="has-children">
                                    <a href="#"><i class="fa fa-headphones"></i> <span>Contato</span> <i class="fa fa-angle-right arrow"></i></a>
                                    <ul class="child-nav">
                                        <li><a href="<?= LINK ?>contato/listar"><i class="fa fa-bars"></i> <span>Caixa de Entrada</span></a></li>
                                    </ul>
                                </li>
                                <li class="nav-header">
                                    <span class="">Histórico</span>
                                </li>
                                <?php
                                if (in_array(3, $Sessao::getAdministrador('permissao'))) {
                                    ?>
                                    <li class="has-children">
                                        <a href="#"><i class="fa fa-gavel"></i> <span>Auditoria</span> <i class="fa fa-angle-right arrow"></i></a>
                                        <ul class="child-nav">
                                            <li><a href="<?= LINK ?>auditoria"><i class="fa fa-bars"></i> <span>Histórico</span></a></li>
                                        </ul>
                                    </li>
                                    <?php
                                }
                                ?>
                            </ul>

                        </div>
                        <!-- /.sidebar-nav -->
                    </div>
                    <!-- /.sidebar-content -->
                </div>
                <!-- /.left-sidebar -->
