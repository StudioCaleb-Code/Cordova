<?php
$isEdit = isset($categoria);
$titulo = $isEdit ? "Editar Categoría" : "Nueva Categoría";
$action = $isEdit ? URL_BASE . "/categorias/actualizar/" . $categoria['id_categoria'] : URL_BASE . "/categorias/guardar";
?>

<section class="seccion contenido">
    <div class="header-modulo">
        <h1><?= $titulo ?></h1>
        <a href="<?= URL_BASE ?>/categorias" class="btn-regresar">Volver</a>
    </div>

    <div class="card-form-simple">
        <form action="<?= $action ?>" method="POST">
            <div class="campo">
                <label>Nombre de la Categoría</label>
                <input type="text" name="tipo_categoria" 
                       value="<?= $isEdit ? $categoria['tipo_categoria'] : '' ?>" 
                       required placeholder="Ej: Imprenta, Merchandising...">
            </div>
            <button type="submit" class="btn-guardar">
                <?= $isEdit ? "Actualizar" : "Crear Categoría" ?>
            </button>
        </form>
    </div>
</section>

<style>
    .card-form-simple { background: #fff; padding: 30px; max-width: 500px; border-radius: 8px; }
    /* Reutiliza los estilos de formulario de productos */
</style>