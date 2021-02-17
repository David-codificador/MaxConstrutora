<hr>

<!-- services-offer 
        ================================================== -->
<section class="services-offer-section">
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <?php
                foreach ($viewVar['servicos'] as $item) {
                    ?>
                    <div class="side-navigation">
                        <ul class="side-navigation-list">
                            <li><a class="active" href="<?= LINK ?>home/servicos/<?= $item['id'] ?>/<?= $this->remover_caracter($item['titulo']) ?>.html"></a></li>
                        </ul>
                    </div>
                    <?php
                }
                ?>
            </div>
            <div class="col-md-9">
                <div class="offer-post">
                    <!--<a href="#"><img src="upload/others/con1.jpg" alt=""></a>-->
                    <h2>Construção Civil </h2>

                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                        tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                        quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                        consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                        cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                        proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End services-page section -->