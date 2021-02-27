<footer>
    <div class="up-footer">
        <div class="container">
            <div class="row">

                <div class="col-md-3">
                    <div class="footer-widget">

                        <h2>Tags</h2>

                        <ul class="tag-list">     
                            <?php
                            foreach ($viewVar['servicosIndex'] as $item) {
                                ?> 
                                <li><a href="<?= LINK ?>servicos/index/<?= $item['id'] ?>"><?= $item['tipo_servico'] ?></a></li>
                                <?php
                            }
                            ?>       
                        </ul>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="footer-widget">
                        <h2>NAVEGAÇÃO</h2>
                        <ul class="navigation">
                            <li><a href="<?= LINK ?>">INÍCIO</a></li>
                            <li><a href="<?= LINK ?>sobre">SOBRE NÓS</a></li>
                            <li><a href="<?= LINK ?>servicos">SERVIÇOS</a></li>
                            <li><a href="<?= LINK ?>obras">OBRAS</a></li>
                            <li><a href="<?= LINK ?>contato">CONTATO</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="footer-widget info-widget">
                        <h2>INFORMAÇÕES</h2>
                        <p class="first-par">Entre em contato conosco!. Retornaremos o mais breve possível.</p>
                        <p><span>Tel: </span> 1234 - 5678 - 9012</p>
                        <p><span>Email: </span> maxuel@maxxconstrutora.com.br</p>
                        <p><span>Horário de Trabalho: </span> 7:00 a.m - 18:00 p.m</p>
                        <p><span>Acesso Restrito: </span><a href="<?= LINK ?>administrador/" target="_blank">Login</a> </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <p class="copyright">
        &copy; Copyright 2021. "MaxxConstrutora". TODOS OS DIREITOS RESERVADOS.
    </p>
</footer>
<!-- End footer -->

</div>
<!-- End Container -->

<script type="text/javascript" src="<?= JSSITE ?>jquery.min.js"></script>
<script type="text/javascript" src="<?= JSSITE ?>jquery.migrate.js"></script>
<script type="text/javascript" src="<?= JSSITE ?>jquery.bxslider.min.js"></script>
<script type="text/javascript" src="<?= JSSITE ?>bootstrap.min.js"></script>
<script type="text/javascript" src="<?= JSSITE ?>jquery.imagesloaded.min.js"></script>
<script type="text/javascript" src="<?= JSSITE ?>jquery.magnific-popup.min.js"></script>
<script type="text/javascript" src="<?= JSSITE ?>jquery.isotope.min.js"></script>
<script type="text/javascript" src="<?= JSSITE ?>retina-1.1.0.min.js"></script>

<!-- REVOLUTION JS FILES -->
<script type="text/javascript" src="<?= JSSITE ?>jquery.themepunch.tools.min.js"></script>
<script type="text/javascript" src="<?= JSSITE ?>jquery.themepunch.revolution.min.js"></script>

<!-- SLIDER REVOLUTION 5.0 EXTENSIONS  
        (Load Extensions only on Local File Systems !  
        The following part can be removed on Server for On Demand Loading) -->	
<script type="text/javascript" src="<?= JSSITE ?>extensions/revolution.extension.actions.min.js"></script>
<script type="text/javascript" src="<?= JSSITE ?>extensions/revolution.extension.carousel.min.js"></script>
<script type="text/javascript" src="<?= JSSITE ?>extensions/revolution.extension.kenburn.min.js"></script>
<script type="text/javascript" src="<?= JSSITE ?>extensions/revolution.extension.layeranimation.min.js"></script>
<script type="text/javascript" src="<?= JSSITE ?>extensions/revolution.extension.migration.min.js"></script>
<script type="text/javascript" src="<?= JSSITE ?>extensions/revolution.extension.navigation.min.js"></script>
<script type="text/javascript" src="<?= JSSITE ?>extensions/revolution.extension.parallax.min.js"></script>
<script type="text/javascript" src="<?= JSSITE ?>extensions/revolution.extension.slideanims.min.js"></script>
<!--<script type="text/javascript" src="<?= JSSITE ?>gmap3.min.js"></script>-->
<script type="text/javascript" src="<?= JSSITE ?>script.js"></script>
<script type="text/javascript" src="<?= JSSITE ?>ini.js"></script>

<?= $js ?>
<?= $arquivoJS ?>
<!-- END REVOLUTION SLIDER -->

<script>
<?php
if ($Sessao::existeMensagemSite()) {
    ?>
        alert("<?= $Sessao::retornaMensagemSite() ?>");
    <?php
    $Sessao::limpaMensagemSite();
}
?>
</script>

</body>
</html>
