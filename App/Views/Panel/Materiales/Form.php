<?php
$isEdit = isset($material);
$titulo = $isEdit ? "Editar Material" : "Nuevo Material";
$action = $isEdit ? URL_BASE . "/materiales/actualizar/" . $material['id_material'] : URL_BASE . "/materiales/guardar";
?>

<section class="seccion contenido">
    <div class="header-modulo">
        <h1><?= $titulo ?></h1>
        <a href="<?= URL_BASE ?>/materiales" class="btn-regresar">Volver</a>
    </div>

    <div class="card-form-simple">
        <form action="<?= $action ?>" method="POST" class="form-minimal">
            <div class="campo">
                <label>Tipo de Material</label>
                <input type="text" name="tipo_material" value="<?= $isEdit ? $material['tipo_material'] : '' ?>"
                    required placeholder="Ej: Vinil, Lona, Mate...">
            </div>

            <div class="form-footer">
                <button type="submit" class="btn-guardar">
                    <?= $isEdit ? "Actualizar" : "Guardar" ?>
                </button>
            </div>
        </form>
    </div>
</section>