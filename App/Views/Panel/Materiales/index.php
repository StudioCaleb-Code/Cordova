<section class="seccion contenido">
    <div class="header-modulo">
        <h1>Materiales</h1>
        <a href="<?= URL_BASE ?>/materiales/crear" class="btn-nuevo-simple">
            <i class="bi bi-plus"></i> Nuevo Material
        </a>
    </div>

    <div class="tabla-contenedor">
        <table class="tabla-minimal">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Tipo de Material</th>
                    <th style="text-align:right">Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($materiales)): ?>
                    <?php foreach ($materiales as $m): ?>
                    <tr>
                        <td>#<?= $m['id_material'] ?></td>
                        <td><strong><?= $m['tipo_material'] ?></strong></td>
                        <td style="text-align:right">
                            <a href="<?= URL_BASE ?>/materiales/editar/<?= $m['id_material'] ?>" class="accion-link">
                                <i class="bi bi-pencil"></i>
                            </a>
                            <button class="accion-link btn-borrar" 
                                    onclick="confirmarEliminarMat(<?= $m['id_material'] ?>, '<?= URL_BASE ?>')">
                                <i class="bi bi-trash"></i>
                            </button>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr><td colspan="3" style="text-align:center;">No hay registros.</td></tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</section>