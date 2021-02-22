<section id="home-section" class="slider1">

    <div id="rev_slider_206_1_wrapper" class="rev_slider_wrapper fullscreen-container" data-alias="creative-freedom" style="background-color:#1f1d24;padding:0px;">
        <!-- START REVOLUTION SLIDER 5.1.1RC fullscreen mode -->
        <div id="rev_slider_206_1" class="rev_slider fullscreenbanner" style="display:none;" data-version="5.1.1RC">
            <ul>
                <!-- SLIDE  -->

                <?php
                $i = 1;
                foreach ($viewVar['banner'] as $item) {
                    ?>
                    <li  data-transition="fadethroughdark" data-slotamount="default" data-easein="default" data-easeout="default" data-masterspeed="2000" data-rotate="0" data-saveperformance="off" data-title="<?= $item['titulo'] ?>" data-param1="<?= $i++ ?>" >
                        <!-- MAIN IMAGE -->
                        <img src="<?= IMAGEMSITE ?>/banners/<?= $item['imagem'] ?>" alt="" data-bgposition="center center" data-bgfit="cover" data-bgrepeat="no-repeat" data-bgparallax="3" class="rev-slidebg" data-no-retina>
                        <!-- LAYERS -->

                        <!-- LAYER NR. 1 -->
                        <div class="tp-caption tp-shape tp-shapewrapper  rs-parallaxlevel-tobggroup" id="slide-688-layer-1" data-x="['center','center','center','center']" data-hoffset="['0','0','0','0']" data-y="['middle','middle','middle','middle']" data-voffset="['0','0','0','0']" data-fontweight="['100','100','400','400']" data-width="full" data-height="full" data-whitespace="nowrap" data-transform_idle="o:1;" data-transform_in="opacity:0;s:1500;e:Power2.easeInOut;" data-transform_out="opacity:0;s:1500;e:Power2.easeInOut;s:1500;e:Power2.easeInOut;" data-start="150" data-basealign="slide" data-responsive_offset="off" data-responsive="off" style="z-index: 5;background-color:rgba(18, 12, 20, 0.6);border-color:rgba(0, 0, 0, 0);">
                        </div>

                        <!-- LAYER NR. 2 -->
                        <div class="tp-caption tp-shape tp-shapewrapper  rs-parallaxlevel-3" id="slide-688-layer-4" data-x="['center','center','center','center']" data-hoffset="['0','0','0','0']" data-y="['middle','middle','middle','middle']" data-voffset="['-178','-178','-168','-141']" data-width="1" data-height="100" data-whitespace="nowrap" data-transform_idle="o:1;" data-transform_in="y:[-100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;s:1500;e:Power3.easeInOut;" data-transform_out="y:[100%];s:500;e:Power1.easeIn;s:500;e:Power1.easeIn;" data-mask_in="x:0px;y:0px;s:inherit;e:inherit;" data-mask_out="x:inherit;y:inherit;s:inherit;e:inherit;" data-start="1500" data-responsive_offset="on" data-responsive="off" style="z-index: 6;background-color:rgba(205, 176, 131, 1.00);border-color:rgba(0, 0, 0, 0);">
                        </div>

                        <!-- LAYER NR. 3 -->
                        <div class="tp-caption Creative-SubTitle   tp-resizeme rs-parallaxlevel-2" id="slide-688-layer-3" data-x="['center','center','center','center']" data-hoffset="['0','0','0','0']" data-y="['middle','middle','middle','middle']" data-voffset="['-95','-95','-84','-67']" data-fontsize="['16','16','16','14']" data-lineheight="['14','14','14','12']" data-width="none" data-height="none" data-whitespace="nowrap" data-transform_idle="o:1;" data-transform_in="y:50px;opacity:0;s:1500;e:Power3.easeOut;" data-transform_out="x:0;y:0;z:0;rX:0;rY:0;rZ:0;sX:0.9;sY:0.9;skX:0;skY:0;opacity:0;s:1000;e:Power3.easeInOut;s:1000;e:Power3.easeInOut;" data-start="2350" data-splitin="none" data-splitout="none" data-responsive_offset="on" style="z-index: 7; white-space: nowrap;text-align:center;"><?= $item['titulo'] ?>
                        </div>

                        <!-- LAYER NR. 4 -->
                        <div class="tp-caption Creative-Title   tp-resizeme rs-parallaxlevel-1" id="slide-688-layer-2" data-x="['center','center','center','center']" data-hoffset="['0','0','0','0']" data-y="['middle','middle','middle','middle']" data-voffset="['-10','-10','-10','-10']" data-fontsize="['70','70','50','40']" data-lineheight="['70','70','55','45']" data-width="['none','none','none','320']" data-height="none" data-whitespace="nowrap" data-transform_idle="o:1;" data-transform_in="y:50px;opacity:0;s:1500;e:Power3.easeOut;" data-transform_out="x:0;y:0;z:0;rX:0;rY:0;rZ:0;sX:0.9;sY:0.9;skX:0;skY:0;opacity:0;s:1000;e:Power3.easeInOut;s:1000;e:Power3.easeInOut;" data-start="2550" data-splitin="none" data-splitout="none" data-responsive_offset="on" style="z-index: 8; white-space: nowrap;text-align:center;"><?= $item['sub_titulo'] ?>
                        </div>

                        <!-- LAYER NR. 5 -->
                        <div class="tp-caption tp-shape tp-shapewrapper  rs-parallaxlevel-3" id="slide-688-layer-5" data-x="['center','center','center','center']" data-hoffset="['0','0','0','0']" data-y="['middle','middle','middle','middle']" data-voffset="['137','137','119','100']" data-width="1" data-height="100" data-whitespace="nowrap" data-transform_idle="o:1;" data-transform_in="y:[-100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;s:1500;e:Power3.easeInOut;" data-transform_out="y:[-100%];s:500;e:Power1.easeIn;s:500;e:Power1.easeIn;" data-mask_in="x:0px;y:0px;s:inherit;e:inherit;" data-mask_out="x:inherit;y:inherit;s:inherit;e:inherit;" data-start="2900" data-responsive_offset="on" data-responsive="off" style="z-index: 9;background-color:rgba(205, 176, 131, 1.00);border-color:rgba(0, 0, 0, 0);">
                        </div>

                        <!-- LAYER NR. 6 -->
                        <div class="tp-caption Creative-Button rev-btn  rs-parallaxlevel-15" id="slide-688-layer-6" data-x="['center','center','center','center']" data-hoffset="['0','0','0','0']" data-y="['top','top','top','top']" data-voffset="['694','611','689','540']" data-fontweight="['400','500','500','500']" data-width="none" data-height="none" data-whitespace="nowrap" data-transform_idle="o:1;" data-transform_hover="o:1;rX:0;rY:0;rZ:0;z:0;s:300;e:Power1.easeInOut;" data-style_hover="c:rgba(205, 176, 131, 1.00);bc:rgba(205, 176, 131, 1.00);cursor:pointer;" data-transform_in="z:0;rX:0;rY:0;rZ:0;sX:0.9;sY:0.9;skX:0;skY:0;opacity:0;s:1500;e:Power2.easeOut;" data-transform_out="x:0;y:0;z:0;rX:0;rY:0;rZ:0;sX:0.75;sY:0.75;skX:0;skY:0;opacity:0;s:500;e:Power1.easeIn;s:500;e:Power1.easeIn;" data-start="3850" data-splitin="none" data-splitout="none" data-actions='[{"event":"click","action":"jumptoslide","slide":"next","delay":""}]' data-responsive_offset="on" data-responsive="off" style="z-index: 10; white-space: nowrap;outline:none;box-shadow:none;box-sizing:border-box;-moz-box-sizing:border-box;-webkit-box-sizing:border-box;"><?= $item['titulo_link'] ?>.
                        </div>
                    </li>
                    <?php
                }
                ?>
            </ul>
            <div class="tp-bannertimer tp-bottom" style="visibility: hidden !important;"></div>
        </div>
    </div>

    <!-- END REVOLUTION SLIDER -->
</section>
<!-- End home section -->

<!-- banner-section -->
<section class="banner-section">
    <div class="container">
        <h2>Maxx Construtora, conheça mais sobre os nossos seguimentos de serviços!<a href="<?= LINK ?>servicos" class="button-one">Clique Aqui!</a></h2>
    </div>
</section>
<!-- End banner section -->

<!-- services-offer 
        ================================================== -->
<section class="services-offer-section">
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="offer-post">
                    <h2><a href=""> <i class="fa fa-bar-chart-o"></i> NOSSA MISSÃO</a></h2>
                    <p>Construir e realizar obras com qualidade, em parceria com fornecedores e colaboradores, tendo como objetivo a satisfação do cliente.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="offer-post">
                    <h2><a href=""><i class="fa fa-bullseye"></i> VISÃO</a></h2>
                    <p>Ser referência nacional no segmento de construção civil.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="offer-post">
                    <h2><a href=""><i class="fa fa-star"></i>VALORES</a></h2>
                    <p>Qualidade: Total. Cliente: Satisfeito. Integridade em tudo que faz. Confiabilidade na empresa, nos clientes, nos colaboradores, nos fornecedores.</p>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End services-offer section -->

<!-- projects 
        ================================================== -->

<section class="projects-section">
    <div class="container">
        <div class="title-section">
            <h2>PORTFÓLIO</h2>
            <h1>NOSSOS - ÚLTIMOS PROJETOS</h1>
        </div>
        <ul class="filter" >
            <li><a class="active" href="#" data-filter="*">Todos</a></li>
            <li><a href="" data-filter=".1">Construção Civil</a></li>
            <li><a href="" data-filter=".2">Meio Fio</a></li>
            <li><a href="" data-filter=".3">Sarjeta</a></li>
            <li><a href="" data-filter=".4">Rede Pluvial</a></li>
            <li><a href="" data-filter=".5">Rede Esgoto</a></li>
        </ul>

        <div class="project-box iso-call " >
            <?php
            foreach ($viewVar['obras'] as $item) {
                ?>
                <div class="project-post buildings isolation <?= $item['categoria'] ?>" >
                    <a href="<?= IMAGEMSITE ?>obras/<?= $item['imagem'] ?>" class="zoom"><img src="<?= IMAGEMSITE ?>obras/<?= $item['imagem'] ?>" alt=""></a>
                    <div class="hover-box">
                        <h2><a href=""><?= $item['titulo'] ?></a></h2>
                        <span><?= $item['sub_titulo'] ?></span>
                    </div>
                </div>  
                <?php
            }
            ?>
        </div>

    </div>
</section>
<!-- End projects -->

<!-- news-section 
        ================================================== -->
<section class="news-section">
    <div class="container">
        <div class="title-section">
            <h2>Segmentos</h2>
            <h1>Nossos Serviços</h1>
        </div>
        <div class="news-box">
            <div class="row">
                <?php
                foreach ($viewVar['servicos'] as $item) {
                    ?>
                    <div class="col-md-4">
                        <div class="news-post">
                            <h2><a href="single-post.html"><?= $item['tipo_servico'] ?></a></h2>
                            <span></span>
                            <p><?= $item['texto'] ?></p>
                            <a href="single-post.html">CONTINUE LENDO...</a>
                        </div>
                    </div>
                      <?php
                    }
                    ?>
            </div>
        </div>

    </div>
</section>
<!-- End news section -->

