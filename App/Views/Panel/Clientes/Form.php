<?php
$isEdit = isset($cliente);
$titulo = $isEdit ? "Editar Cliente" : "Registrar Nuevo Cliente";
$action = $isEdit ? URL_BASE . "/clientes/actualizar/" . $cliente['id_cliente'] : URL_BASE . "/clientes/guardar";
?>

<section class="seccion contenido">
    <div class="header-modulo">
        <h1><?= $titulo ?></h1>
        <a href="<?= URL_BASE ?>/clientes" class="btn-regresar">Volver</a>
    </div>

    <div class="card-form-simple">
        <form action="<?= $action ?>" method="POST" class="form-minimal">
            <div class="fila-form">
                <div class="campo">
                    <label>DNI</label>
                    <input type="text" name="dni" maxlength="8" value="<?= $isEdit ? $cliente['dni'] : '' ?>" required>
                </div>
                <div class="campo">
                    <label>Nombres</label>
                    <input type="text" name="nombres" value="<?= $isEdit ? $cliente['nombres'] : '' ?>" required>
                </div>
            </div>

            <div class="fila-form">
                <div class="campo">
                    <label>Apellido Paterno</label>
                    <input type="text" name="apellidoP" value="<?= $isEdit ? $cliente['apellidoP'] : '' ?>" required>
                </div>
                <div class="campo">
                    <label>Apellido Materno</label>
                    <input type="text" name="apellidoM" value="<?= $isEdit ? $cliente['apellidoM'] : '' ?>" required>
                </div>
            </div>

            <div class="fila-form">
                <div class="campo">
                    <label>Teléfono</label>
                    <input type="text" name="telefono" value="<?= $isEdit ? $cliente['telefono'] : '' ?>">
                </div>
                <div class="campo">
                    <label>Dirección</label>
                    <input type="text" name="direccion" value="<?= $isEdit ? $cliente['direccion'] : '' ?>">
                </div>
            </div>
            
            <div class="form-footer">
                <button type="submit" class="btn-guardar">
                    <?= $isEdit ? "Actualizar Cliente" : "Guardar Cliente" ?>
                </button>
            </div>
        </form>
    </div>
</section>