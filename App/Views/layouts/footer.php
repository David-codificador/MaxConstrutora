</div>
<!-- /.content-container -->
</div>
<!-- /.content-wrapper -->

</div>
<!-- /.main-wrapper -->


<!-- ========== COMMON JS FILES ========== -->
<script src="<?= JSTEMPLATE ?>jquery/jquery-2.2.4.min.js"></script>
<script src="<?= JSTEMPLATE ?>jquery-ui/jquery-ui.min.js"></script>
<script src="<?= JSTEMPLATE ?>bootstrap/bootstrap.min.js"></script>
<script src="<?= JSTEMPLATE ?>pace/pace.min.js"></script>
<script src="<?= JSTEMPLATE ?>lobipanel/lobipanel.min.js"></script>
<script src="<?= JSTEMPLATE ?>iscroll/iscroll.js"></script>
<script src="<?= JSTEMPLATE ?>toastr/toastr.min.js"></script>

<!-- ========== PAGE JS FILES ========== -->
<?= $js ?>
<?= $arquivoJS ?>
<!-- ========== THEME JS ========== -->
<script src="<?= JSTEMPLATE ?>main.js"></script>
<script>
    // Welcome notification
    toastr.options = {
        "closeButton": true,
        "debug": false,
        "newestOnTop": true,
        "progressBar": true,
        "positionClass": "toast-top-right",
        "preventDuplicates": true,
        "onclick": null,
        "showDuration": "300",
        "hideDuration": "1000",
        "timeOut": "5000",
        "extendedTimeOut": "1000",
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut"
    }
    
    <?php
      if ($Sessao::retornaMensagem() != '') {
    ?>
        toastr["<?=$Sessao::retornaTipo()?>"]("<?=$Sessao::retornaMensagem()?>", "<?=$Sessao::retornaTitulo()?>");
    <?php
      $Sessao::limpaMensagem();
      }
    ?>
</script>

<!-- ========== ADD custom.js FILE BELOW WITH YOUR CHANGES ========== -->
</body>
</html>
