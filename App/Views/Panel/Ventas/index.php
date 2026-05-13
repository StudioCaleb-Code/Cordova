<section class="seccion contenido">
    <div class="header-modulo">
        <h1>Ventas Realizadas</h1>
        <a href="<?= URL_BASE ?>/ventas/crear" class="btn-nuevo-simple">Nueva Venta</a>
    </div>
    <table class="tabla-minimal">
        <thead>
            <tr>
                <th>ID</th>
                <th>Fecha</th>
                <th>Cliente</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($ventas as $v): ?>
            <tr>
                <td>#<?= $v['id_venta'] ?></td>
                <td><?= $v['fecha_venta'] ?></td>
                <td><?= $v['nombres'] ?> <?= $v['apellidoP'] ?></td>
                <td><button class="accion-link">Ver Detalle</button></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</section>