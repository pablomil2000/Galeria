    <?php require_once('includes/header.php') ?>

    <section class="fotos">
        <div class="contenedor">

            <!--Imagenes-->
            <?php
            foreach ($registros as $registro) {
            ?>

                <div class="thumb">
                    <a href="fotos/<?= $registro["imagen"]; ?>"><img src="fotos/<?= $registro["imagen"]; ?>" alt=""></a>
                </div>
            <?php
            } ?>

            <!-- navegacion -->

            <div class="paginacion">
                <a href="?prev" class="izquierda">Pagina Anterior</a>
                <a href="?next" class="derecha">Pagina Sigiente</a>
            </div>
        </div>
    </section>

    <?php require_once('includes/footer.php'); ?>