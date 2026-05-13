<section class="seccion contenido">
    <div class="header-modulo">
        <h1>Gestión de Clientes</h1>
        <a href="<?= URL_BASE ?>/clientes/crear" class="btn-nuevo-simple">
            <i class="bi bi-person-plus"></i> Nuevo Cliente
        </a>
    </div>

    <div class="tabla-contenedor">
        <table class="tabla-minimal">
            <thead>
                <tr>
                    <th>DNI</th>
                    <th>Cliente</th>
                    <th>Teléfono</th>
                    <th>Dirección</th>
                    <th style="text-align:right">Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($clientes)): ?>
                    <?php foreach ($clientes as $c): ?>
                    <tr>
                        <td><?= $c['dni'] ?></td>
                        <td>
                            <strong><?= $c['nombres'] ?> <?= $c['apellidoP'] ?></strong>
                        </td>
                        <td><?= $c['telefono'] ?? '---' ?></td>
                        <td><?= $c['direccion'] ?? '---' ?></td>
                        <td style="text-align:right">
                            <a href="<?= URL_BASE ?>/clientes/editar/<?= $c['id_cliente'] ?>" class="accion-link">
                                <i class="bi bi-pencil"></i>
                            </a>
                            <button class="accion-link btn-borrar" 
                                    onclick="confirmarEliminarCliente(<?= $c['id_cliente'] ?>, '<?= URL_BASE ?>')">
                                <i class="bi bi-trash"></i>
                            </button>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr><td colspan="5" style="text-align:center;">No hay clientes registrados.</td></tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</section>