
    <!-- Container -->
    <div id="container">
        <!-- Header
            ================================================== -->
        <header class="clearfix">
            <nav class="navbar navbar-default navbar-fixed-top" role="navigation">

                <div class="container">
                    <!-- Brand and toggle get grouped for better mobile display -->
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand" href="<?= LINK ?>home/index"><img src="<?= IMAGEMSITE ?>logo.png" alt=""></a>
                    </div>

                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                        <ul class="nav navbar-nav navbar-right">
                            <li><a href="<?= LINK ?>home/index">INÍCIO</a></li>
                            <li><a href="<?= LINK ?>home/sobre"">SOBRE NÓS</a></li>
                            <li class="drop"><a href="projects.html">SERVIÇOS</a>
                                <ul class="dropdown">
                                    <li><a href="projects-2col.html">Projects 2 Colums</a></li>
                                    <li><a href="projects.html">Projects 3 Colums</a></li>
                                    <li><a href="single-project.html">Single Project</a></li>
                                </ul>
                            </li>
                            <li class="drop"><a href="services.html">OBRAS</a>
                                <ul class="dropdown">
                                    <li><a href="construction.html">Construction</a></li>
                                    <li><a href="building.html">Building</a></li>
                                    <li><a href="electricy.html">Electricy</a></li>
                                    <li><a href="repair.html">Repair</a></li>
                                </ul>
                            </li>
                           <li><a href="contact.html">CONTATO</a></li>
                            <li class="search drop"><a href="#" class="open-search"><i class="fa fa-search"></i></a>
                                <form class="form-search">
                                    <input type="search" placeholder="Search:"/>
                                    <button type="submit">
                                        <i class="fa fa-search"></i>
                                    </button>
                                </form>
                            </li>
                        </ul>
                    </div><!-- /.navbar-collapse -->
                </div><!-- /.container -->
            </nav>
        </header>
        <!-- End Header -->

        <!-- home-section -->