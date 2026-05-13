<?php
// Detectamos si es edición o creación
$diseno = $data['diseno'] ?? null;
$isEdit = (bool) $diseno;

// Definimos la URL de acción según el modo
$action = $isEdit
    ? URL_BASE . "/disenos/actualizar/" . $diseno['id_diseno']
    : URL_BASE . "/disenos/guardar";
?>

<section class="seccion contenido">
    <h1><?= $isEdit ? 'Editar Diseño' : 'Subir Nuevo Diseño' ?></h1>

    <div class="card-form-simple">
        <form action="<?= $action ?>" method="POST" enctype="multipart/form-data">

            <?php if ($isEdit): ?>
                <!-- Enviamos la foto actual por si no se sube una nueva -->
                <input type="hidden" name="foto_actual" value="<?= $diseno['foto'] ?>">
            <?php endif; ?>

            <div class="campo">
                <label>Nombre del Diseño</label>
                <input type="text" name="nombre" value="<?= $isEdit ? $diseno['nombre'] : '' ?>" required
                    placeholder="Ej: Logo Corporativo">
            </div>

            <div class="campo">
                <label>Estado del Diseño</label>
                <select name="id_estado" class="select-full" required>
                    <option value="">-- Seleccione Estado --</option>
                    <?php foreach ($data['estados'] as $e): ?>
                        <option value="<?= $e['id_estado'] ?>" <?= ($isEdit && $diseno['id_estado'] == $e['id_estado']) ? 'selected' : '' ?>>
                            <?= $e['tipo_estado'] ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="campo">
                <label>Descripción</label>
                <textarea name="descripcion" rows="4"
                    placeholder="Detalles del diseño..."><?= $isEdit ? $diseno['descripcion'] : '' ?></textarea>
            </div>

            <div class="campo">
                <label>Imagen / Foto</label>
                <?php if ($isEdit): ?>
                    <div class="preview-img" style="margin-bottom: 10px;">
                        <small>Vista actual:</small><br>
                        <img src="<?= URL_BASE ?>/uploads/disenos/<?= $diseno['foto'] ?>"
                            style="width: 100px; border-radius: 8px; border: 1px solid #ddd;">
                    </div>
                <?php endif; ?>
                <input type="file" name="foto" accept="image/*" <?= $isEdit ? '' : 'required' ?>>
                <small style="color: gray;">Formato recomendado: JPG, PNG o WebP.</small>
            </div>

            <div class="form-footer">
                <a href="<?= URL_BASE ?>/disenos" class="btn-cancelar">Cancelar</a>
                <button type="submit" class="btn-guardar">
                    <?= $isEdit ? 'Actualizar Cambios' : 'Guardar Diseño' ?>
                </button>
            </div>
        </form>
    </div>
</section>

<style>
    .card-form-simple {
        background: white;
        padding: 25px;
        border-radius: 12px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.05);
        max-width: 700px;
        margin: 0 auto;
    }

    .campo {
        margin-bottom: 20px;
        display: flex;
        flex-direction: column;
    }

    .campo label {
        font-weight: bold;
        margin-bottom: 8px;
        color: #333;
    }

    .campo input,
    .campo textarea,
    .campo select {
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 6px;
        font-size: 1rem;
    }

    .select-full {
        width: 100%;
        background-color: #fff;
    }

    .form-footer {
        display: flex;
        justify-content: flex-end;
        gap: 15px;
        margin-top: 10px;
    }

    .btn-guardar {
        background-color: #2ecc71;
        color: white;
        border: none;
        padding: 10px 20px;
        border-radius: 6px;
        cursor: pointer;
        font-weight: bold;
    }

    .btn-cancelar {
        background-color: #e74c3c;
        color: white;
        text-decoration: none;
        padding: 10px 20px;
        border-radius: 6px;
        font-weight: bold;
        display: inline-block;
    }

    .btn-guardar:hover {
        background-color: #27ae60;
    }

    .btn-cancelar:hover {
        background-color: #c0392b;
    }
</style>