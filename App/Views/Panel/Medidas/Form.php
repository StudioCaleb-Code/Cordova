<?php
$isEdit = isset($medida);
$titulo = $isEdit ? "Editar Medida" : "Nueva Medida";
$action = $isEdit ? URL_BASE . "/medidas/actualizar/" . $medida['id_medida'] : URL_BASE . "/medidas/guardar";
?>

<section class="seccion contenido">
    <div class="header-modulo">
        <h1>
            <?= $titulo ?>
        </h1>
        <a href="<?= URL_BASE ?>/medidas" class="btn-regresar">Volver</a>
    </div>

    <div class="card-form-simple">
        <form action="<?= $action ?>" method="POST" class="form-minimal">
            <div class="campo">
                <label>Descripción de la Medida</label>
                <input type="text" name="tipo_medida" value="<?= $isEdit ? $medida['tipo_medida'] : '' ?>" required
                    placeholder="Ej: A4, 1x1 metros, etc.">
            </div>

            <div class="campo">
                <label>Precio (S/)</label>
                <input type="number" step="0.01" name="precio" value="<?= $isEdit ? $medida['precio'] : '' ?>" required
                    placeholder="0.00">
            </div>

            <div class="form-footer">
                <button type="submit" class="btn-guardar">
                    <?= $isEdit ? "Actualizar" : "Guardar" ?>
                </button>
            </div>
        </form>
    </div>
</section>