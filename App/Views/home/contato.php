  <hr>

<!-- comment --><!-- contact section 
                        ================================================== -->
<section class="contact-section">
    <div class="container">
        <div class="col-md-4">
            <div class="contact-info">
                <h2>Informações de contato</h2>
                <p>Entre em contato conosco, e retornaremos o mais breve possível.</p>
                <ul class="information-list">
                    <li><i class="fa fa-map-marker"></i><span>Ceres-GO</span></li>
                    <li><i class="fa fa-whatsapp"></i><span>(62) 98475- 5437 </span><span>(62) 99623 - 5304</span></li>
                    <li><i class="fa fa-envelope-o"></i><a href="#">maxuel@maxxconstrutora.com.br</a></li>
                </ul>						
            </div>
        </div>
        <div class="col-md-8">
            <form id="contact-form" method="POST" action="<?=LINK?>contato/inserir">
                <h2>Send us a message</h2>
                <div class="row">
                    <div class="col-md-12">
                        <input name="nome" id="nome" type="text" placeholder="Nome">
                    </div>
                     <div class="col-md-6">
                        <input name="telefone" id="telefone" type="text" placeholder="Telefone">
                    </div>
                    <div class="col-md-6">
                        <input name="email" id="email" type="text" placeholder="Email">
                    </div>
                </div>
                <textarea name="assunto" id="assunto" placeholder="Assunto"></textarea>
                <input type="submit" id="submit_contact" value="Enviar Mensagem">
                <div id="msg" class="message"></div>
            </form>
        </div>
    </div>
</section>
<!-- End contact section -->