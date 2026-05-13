<section class="seccion contenido">
    <div class="header-modulo">
        <h1>Medidas y Precios</h1>
        <a href="<?= URL_BASE ?>/medidas/crear" class="btn-nuevo-simple">
            <i class="bi bi-plus"></i> Nueva Medida
        </a>
    </div>

    <div class="tabla-contenedor">
        <table class="tabla-minimal">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Tipo de Medida</th>
                    <th>Precio Sugerido</th>
                    <th style="text-align:right">Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($medidas)): ?>
                    <?php foreach ($medidas as $m): ?>
                    <tr>
                        <td>#<?= $m['id_medida'] ?></td>
                        <td><strong><?= $m['tipo_medida'] ?></strong></td>
                        <td>S/ <?= number_format($m['precio'], 2) ?></td>
                        <td style="text-align:right">
                            <a href="<?= URL_BASE ?>/medidas/editar/<?= $m['id_medida'] ?>" class="accion-link">
                                <i class="bi bi-pencil"></i>
                            </a>
                            <button class="accion-link btn-borrar" 
                                    onclick="confirmarEliminarMedida(<?= $m['id_medida'] ?>, '<?= URL_BASE ?>')">
                                <i class="bi bi-trash"></i>
                            </button>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr><td colspan="4" style="text-align:center;">No hay registros.</td></tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</section>