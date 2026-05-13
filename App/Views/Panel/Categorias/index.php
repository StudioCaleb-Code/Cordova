<section class="seccion contenido">
    <div class="header-modulo">
        <h1>Categorías</h1>
        <a href="<?= URL_BASE ?>/categorias/crear" class="btn-nuevo-simple">
            <i class="bi bi-plus"></i> Nueva Categoría
        </a>
    </div>

    <div class="tabla-contenedor">
        <table class="tabla-minimal">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre de Categoría</th>
                    <th style="text-align:right">Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($categorias as $c): ?>
                    <tr>
                        <td>#
                            <?= $c['id_categoria'] ?>
                        </td>
                        <td><strong>
                                <?= $c['tipo_categoria'] ?>
                            </strong></td>
                        <td style="text-align:right">
                            <a href="<?= URL_BASE ?>/categorias/editar/<?= $c['id_categoria'] ?>" class="accion-link">
                                <i class="bi bi-pencil"></i>
                            </a>
                            <button class="accion-link btn-borrar"
                                onclick="confirmarEliminarCat(<?= $c['id_categoria'] ?>, '<?= URL_BASE ?>')">
                                <i class="bi bi-trash"></i>
                            </button>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</section>

<style>
    .tabla-contenedor {
        background: #fff;
        border-radius: 8px;
        padding: 20px;
    }

    .tabla-minimal {
        width: 100%;
        border-collapse: collapse;
    }

    .tabla-minimal th {
        text-align: left;
        padding: 12px;
        border-bottom: 2px solid #f5f5f5;
        color: #888;
        font-size: 0.8rem;
        text-transform: uppercase;
    }

    .tabla-minimal td {
        padding: 15px 12px;
        border-bottom: 1px solid #f9f9f9;
        color: #333;
    }
</style>