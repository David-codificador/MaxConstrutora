<hr>

<!-- projects 
        ================================================== -->
<section class="projects-section">
    <div class="container">
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