<footer>
    <div class="up-footer">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <div class="footer-widget">
                        <h2>About Us</h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipi sicing elit, sed do eiusmod
                            tempor incididunt ut labore et dolore magna.</p>
                        <img src="images/footer-logo.png" alt="">
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="footer-widget">
                        <h2>Tags</h2>
                        <ul class="tag-list">
                            <li><a href="#">Building</a></li>
                            <li><a href="#">interior</a></li>
                            <li><a href="#">isolation</a></li>
                            <li><a href="#">kitchen</a></li>
                            <li><a href="#">energy</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="footer-widget">
                        <h2>Navigation</h2>
                        <ul class="navigation">
                            <li><a href="#">Home</a></li>
                            <li><a href="#">About</a></li>
                            <li><a href="#">Services</a></li>
                            <li><a href="#">News</a></li>
                            <li><a href="#">Contact</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="footer-widget info-widget">
                        <h2>Info</h2>
                        <p class="first-par">You can contact or visit us during working time.</p>
                        <p><span>Tel: </span> 1234 - 5678 - 9012</p>
                        <p><span>Email: </span> support@konstukt.com</p>
                        <p><span>Working Hours: </span> 8:00 a.m - 17:00 a.m</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <p class="copyright">
        &copy; Copyright 2016. "Konstrukt" by Nunforest. All rights reserved.
    </p>
</footer>
<!-- End footer -->

</div>
<!-- End Container -->

<script type="text/javascript" src="<?= JSSITE ?>jquery.min.js"></script>
<script type="text/javascript" src="<?= JSSITE ?>jquery.migrate.js"></script>
<script type="text/javascript" src="<?=JSSITE?>jquery.bxslider.min.js"></script>
<script type="text/javascript" src="<?=JSSITE?>bootstrap.min.js"></script>
<script type="text/javascript" src="<?=JSSITE?>jquery.imagesloaded.min.js"></script>
<script type="text/javascript" src="<?=JSSITE?>jquery.magnific-popup.min.js"></script>
<script type="text/javascript" src="<?=JSSITE?>jquery.isotope.min.js"></script>
<script type="text/javascript" src="<?=JSSITE?>retina-1.1.0.min.js"></script>

<!-- REVOLUTION JS FILES -->
<script type="text/javascript" src="<?=JSSITE?>jquery.themepunch.tools.min.js"></script>
<script type="text/javascript" src="<?=JSSITE?>jquery.themepunch.revolution.min.js"></script>

<!-- SLIDER REVOLUTION 5.0 EXTENSIONS  
        (Load Extensions only on Local File Systems !  
        The following part can be removed on Server for On Demand Loading) -->	
<script type="text/javascript" src="<?=JSSITE?>extensions/revolution.extension.actions.min.js"></script>
<script type="text/javascript" src="<?=JSSITE?>extensions/revolution.extension.carousel.min.js"></script>
<script type="text/javascript" src="<?=JSSITE?>extensions/revolution.extension.kenburn.min.js"></script>
<script type="text/javascript" src="<?=JSSITE?>extensions/revolution.extension.layeranimation.min.js"></script>
<script type="text/javascript" src="<?=JSSITE?>extensions/revolution.extension.migration.min.js"></script>
<script type="text/javascript" src="<?=JSSITE?>extensions/revolution.extension.navigation.min.js"></script>
<script type="text/javascript" src="<?=JSSITE?>extensions/revolution.extension.parallax.min.js"></script>
<script type="text/javascript" src="<?=JSSITE?>extensions/revolution.extension.slideanims.min.js"></script>
<script type="text/javascript" src="<?=JSSITE?>gmap3.min.js"></script>
<script type="text/javascript" src="<?=JSSITE?>script.js"></script>
<script type="text/javascript" src="<?=JSSITE?>ini.js"></script>

<!-- END REVOLUTION SLIDER -->
<script type="text/javascript">
    var tpj = jQuery;

    var revapi206;
    tpj(document).ready(function () {
        if (tpj("#rev_slider_206_1").revolution == undefined) {
            revslider_showDoubleJqueryError("#rev_slider_206_1");
        } else {
            revapi206 = tpj("#rev_slider_206_1").show().revolution({
                sliderType: "standard",
                jsFileLocation: "<?=JSSITE?>",
                sliderLayout: "fullscreen",
                dottedOverlay: "none",
                delay: 9000,
                navigation: {
                    keyboardNavigation: "off",
                    keyboard_direction: "horizontal",
                    mouseScrollNavigation: "off",
                    onHoverStop: "off",
                    touch: {
                        touchenabled: "on",
                        swipe_threshold: 75,
                        swipe_min_touches: 50,
                        swipe_direction: "horizontal",
                        drag_block_vertical: false
                    },
                    tabs: {
                        style: "metis",
                        enable: true,
                        width: 250,
                        height: 40,
                        min_width: 249,
                        wrapper_padding: 0,
                        wrapper_color: "",
                        wrapper_opacity: "0",
                        tmp: '<div class="tp-tab-wrapper"><div class="tp-tab-number">{{param1}}</div><div class="tp-tab-divider"></div><div class="tp-tab-title-mask"><div class="tp-tab-title">{{title}}</div></div></div>',
                        visibleAmount: 5,
                        hide_onmobile: true,
                        hide_under: 800,
                        hide_onleave: false,
                        hide_delay: 200,
                        direction: "vertical",
                        span: true,
                        position: "inner",
                        space: 0,
                        h_align: "left",
                        v_align: "center",
                        h_offset: 0,
                        v_offset: 0
                    }
                },
                responsiveLevels: [1240, 1024, 778, 480],
                visibilityLevels: [1240, 1024, 778, 480],
                gridwidth: [1240, 1024, 778, 480],
                gridheight: [868, 768, 960, 720],
                lazyType: "none",
                parallax: {
                    type: "3D",
                    origo: "slidercenter",
                    speed: 1000,
                    levels: [2, 4, 6, 8, 10, 12, 14, 16, 45, 50, 47, 48, 49, 50, 0, 50],
                    type: "3D",
                    ddd_shadow: "off",
                    ddd_bgfreeze: "on",
                    ddd_overflow: "hidden",
                    ddd_layer_overflow: "visible",
                    ddd_z_correction: 100,
                },
                spinner: "off",
                stopLoop: "on",
                stopAfterLoops: 0,
                stopAtSlide: 1,
                shuffle: "off",
                autoHeight: "off",
                fullScreenAutoWidth: "off",
                fullScreenAlignForce: "off",
                fullScreenOffsetContainer: ".navbar-default",
                fullScreenOffset: "",
                disableProgressBar: "on",
                hideThumbsOnMobile: "off",
                hideSliderAtLimit: 0,
                hideCaptionAtLimit: 0,
                hideAllCaptionAtLilmit: 0,
                debugMode: false,
                fallbacks: {
                    simplifyAll: "off",
                    nextSlideOnWindowFocus: "off",
                    disableFocusListener: false,
                }
            });
        }
    }); /*ready*/
</script>


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
