<section class="seccion contenido">
    <div class="header-modulo">
        <h1>Gestión de Productos</h1>
        <a href="<?= URL_BASE ?>/productos/crear" class="btn-nuevo-simple">
            <i class="bi bi-plus"></i> Nuevo Producto
        </a>
    </div>

    <div class="cards-grid">
        <?php if (!empty($productos)): ?>
            <?php foreach ($productos as $p): ?>
                <div class="card-producto">
                    <div class="card-img">
                        <?php
                        // Usamos 'foto' que es el nombre en tu SQL
                        $nombreFoto = !empty($p['foto']) ? $p['foto'] : 'default.png';
                        $rutaImg = URL_BASE . "/public/uploads/productos/" . $nombreFoto;
                        ?>
                        <img src="<?= $rutaImg ?>" alt="<?= $p['nombre'] ?>"
                            onerror="this.src='<?= URL_BASE ?>/assets/img/no-image.png';">
                    </div>

                    <div class="card-info">
                        <small class="txt-muted"><?= strtoupper($p['tipo_categoria'] ?? 'General') ?></small>
                        <h3><?= $p['nombre'] ?></h3>
                        <div class="detalles-prod">
                            <!-- El precio viene del JOIN con la tabla medidas -->
                            <span class="precio-simple">$<?= number_format($p['precio'] ?? 0, 2) ?></span>
                            <small><?= $p['tipo_medida'] ?? '' ?></small>
                        </div>
                    </div>

                    <div class="card-acciones">
                        <a href="<?= URL_BASE ?>/productos/detalle/<?= $p['id_producto'] ?>" class="accion-link"><i
                                class="bi bi-eye"></i></a>
                        <a href="<?= URL_BASE ?>/productos/editar/<?= $p['id_producto'] ?>" class="accion-link"><i
                                class="bi bi-pencil"></i></a>
                        <button class="accion-link btn-borrar" onclick="confirmarEliminar(<?= $p['id_producto'] ?>)"><i
                                class="bi bi-trash"></i></button>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <p class="aviso-vacio">No hay productos registrados.</p>
        <?php endif; ?>
    </div>
</section>

<style>
    /* Estructura General */
    .header-modulo {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 30px;
        padding-bottom: 10px;
        border-bottom: 1px solid #f1f1f1;
    }

    .btn-nuevo-simple {
        text-decoration: none;
        color: #444;
        font-size: 0.9rem;
        padding: 8px 15px;
        background: #f5f5f5;
        border-radius: 5px;
        transition: 0.2s;
    }

    .btn-nuevo-simple:hover {
        background: #e2e2e2;
    }

    /* Grid de Tarjetas */
    .cards-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(240px, 1fr));
        gap: 25px;
    }

    .card-producto {
        background: #fff;
        display: flex;
        flex-direction: column;
        /* Sin bordes ni sombras pesadas */
        border-bottom: 2px solid #f5f5f5;
        transition: 0.3s;
    }

    .card-producto:hover {
        border-bottom-color: #38bdf8;
        /* Un detalle sutil al pasar el mouse */
    }

    /* Imagen */
    .card-img {
        width: 100%;
        height: 180px;
        background: #fafafa;
        overflow: hidden;
    }

    .card-img img {
        width: 100%;
        height: 100%;
        object-fit: contain;
        /* Para que no se corte la imagen del producto */
        padding: 10px;
    }

    /* Información */
    .card-info {
        padding: 15px 5px;
        flex-grow: 1;
    }

    .txt-muted {
        color: #888;
        font-size: 0.75rem;
        letter-spacing: 0.5px;
    }

    .card-info h3 {
        margin: 5px 0;
        font-size: 1rem;
        color: #333;
        font-weight: 500;
    }

    .detalles-prod {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-top: 10px;
    }

    .precio-simple {
        font-weight: 600;
        color: #333;
        font-size: 1.1rem;
    }

    .stock-simple {
        font-size: 0.85rem;
        color: #666;
    }

    /* Acciones - Iconos no coloridos */
    .card-acciones {
        display: flex;
        padding: 10px 0;
        gap: 5px;
    }

    .accion-link {
        flex: 1;
        text-align: center;
        padding: 8px;
        color: #666;
        /* Color gris neutro */
        text-decoration: none;
        background: none;
        border: none;
        cursor: pointer;
        font-size: 1.1rem;
        border-radius: 4px;
        transition: 0.2s;
    }

    .accion-link:hover {
        background: #f8f8f8;
        color: #000;
        /* Se oscurece al pasar el mouse */
    }

    .btn-borrar:hover {
        color: #ef4444;
        /* Solo el de borrar tiene color al pasar el mouse */
    }

    .aviso-vacio {
        color: #999;
        grid-column: 1 / -1;
        text-align: center;
        padding: 50px;
    }
</style>