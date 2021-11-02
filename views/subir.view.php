<?php require_once('includes/header.php'); ?>


<div class="contendor">
    <form action=<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?> method="post" class="formulario" enctype="multipart/form-data">

        <label for="img"> Seleciona tu foto</label>
        <input type="file" name="img" id="img">

        <label for="titulo">Titulo de la foto</label>
        <input type="text" name="titulo" id="titulo">

        <label for="texto">Description: </label>
        <textarea name="texto" id="texto" placeholder="Introduce una descripcion"></textarea>

        <input type="submit" class='submit' value="Subir foto">

        <?=$mensaje; ?>
    </form>
</div>

<?php require_once('includes/footer.php'); ?>