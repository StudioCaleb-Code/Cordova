<?php
// Si existe $producto, estamos editando, si no, estamos creando
$isEdit = isset($producto) && !empty($producto);
$titulo = $isEdit ? "Editar Producto" : "Nuevo Producto";
$action = $isEdit ? URL_BASE . "/productos/actualizar/" . $producto['id_producto'] : URL_BASE . "/productos/guardar";
?>

<section class="seccion contenido">
    <div class="header-modulo">
        <h1><?= $titulo ?></h1>
        <a href="<?= URL_BASE ?>/productos" class="btn-regresar">
            <i class="bi bi-arrow-left"></i> Volver
        </a>
    </div>

    <form action="<?= $action ?>" method="POST" enctype="multipart/form-data" class="form-minimal">
        <div class="grid-form">
            <!-- Columna Izquierda: Datos -->
            <div class="col-datos">
                <div class="campo">
                    <label>Nombre del Producto</label>
                    <input type="text" name="nombre" value="<?= $isEdit ? $producto['nombre'] : '' ?>" required
                        placeholder="Ej: Volante Publicitario">
                </div>

                <div class="campo">
                    <label>Categoría</label>
                    <select name="id_categoria" required>
                        <option value="">Seleccione una categoría</option>
                        <?php foreach ($categorias as $cat): ?>
                            <option value="<?= $cat['id_categoria'] ?>" <?= ($isEdit && $producto['id_categoria'] == $cat['id_categoria']) ? 'selected' : '' ?>>
                                <?= $cat['tipo_categoria'] ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div class="campo">
                    <label>Medida y Precio Base</label>
                    <select name="id_medida" required>
                        <option value="">Seleccione medida</option>
                        <?php foreach ($medidas as $med): ?>
                            <option value="<?= $med['id_medida'] ?>" <?= ($isEdit && $producto['id_medida'] == $med['id_medida']) ? 'selected' : '' ?>>
                                <?= $med['tipo_medida'] ?> - ($<?= number_format($med['precio'], 2) ?>)
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div class="campo">
                    <label>Descripción</label>
                    <textarea name="descripcion" rows="4"><?= $isEdit ? $producto['descripcion'] : '' ?></textarea>
                </div>
            </div>

            <!-- Columna Derecha: Foto -->
            <div class="col-foto">
                <label>Foto del Producto</label>
                <div class="preview-container">
                    <?php
                    $imgActual = ($isEdit && !empty($producto['foto'])) ? $producto['foto'] : 'default.png';
                    ?>
                    <img id="imgPreview" src="<?= URL_BASE ?>/public/uploads/productos/<?= $imgActual ?>" alt="Preview">
                </div>
                <input type="file" name="foto" id="inputFoto" accept="image/*">
                <small class="txt-muted">Formatos: JPG, PNG. Tamaño máx: 2MB</small>
            </div>
        </div>

        <div class="form-footer">
            <button type="submit" class="btn-guardar">
                <i class="bi bi-check-lg"></i> <?= $isEdit ? "Actualizar Cambios" : "Guardar Producto" ?>
            </button>
        </div>
    </form>
</section>

<style>
    .form-minimal {
        background: #fff;
        padding: 30px;
        border-radius: 8px;
    }

    .grid-form {
        display: grid;
        grid-template-columns: 2fr 1fr;
        gap: 30px;
    }

    .campo {
        margin-bottom: 20px;
    }

    .campo label {
        display: block;
        margin-bottom: 8px;
        font-weight: 500;
        color: #555;
        font-size: 0.9rem;
    }

    .campo input,
    .campo select,
    .campo textarea {
        width: 100%;
        padding: 10px;
        border: 1px solid #ddd;
        border-radius: 5px;
        font-family: inherit;
    }

    .preview-container {
        width: 100%;
        height: 200px;
        background: #f9f9f9;
        border: 2px dashed #eee;
        border-radius: 10px;
        display: flex;
        align-items: center;
        justify-content: center;
        margin-bottom: 10px;
        overflow: hidden;
    }

    .preview-container img {
        max-width: 100%;
        max-height: 100%;
        object-fit: contain;
    }

    .btn-guardar {
        background: #333;
        color: #fff;
        border: none;
        padding: 12px 25px;
        border-radius: 5px;
        cursor: pointer;
        transition: 0.2s;
    }

    .btn-guardar:hover {
        background: #000;
    }

    @media (max-width: 768px) {
        .grid-form {
            grid-template-columns: 1fr;
        }
    }
</style>

<script>
    // Preview de imagen antes de subir
    document.getElementById('inputFoto').onchange = evt => {
        const [file] = document.getElementById('inputFoto').files;
        if (file) {
            document.getElementById('imgPreview').src = URL.createObjectURL(file);
        }
    }
</script>