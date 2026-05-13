<section class="seccion contenido">
    <div class="header-seccion">
        <h1>Galería de Diseños</h1>
        <a href="<?= URL_BASE ?>/disenos/crear" class="btn-nuevo">Nuevo Diseño</a>
    </div>

    <div class="contenedor-cards">
        <?php foreach ($data['disenos'] as $d): ?>
            <div class="card-diseno">
                <div class="card-img">
                    <img src="<?= URL_BASE ?>/uploads/disenos/<?= $d['foto'] ?>" alt="Diseño">
                    <span class="badge-estado"><?= $d['tipo_estado'] ?></span>
                </div>
                <div class="card-body">
                    <h3><?= $d['nombre'] ?></h3>
                    <p><?= substr($d['descripcion'], 0, 80) ?>...</p>
                    <small>Autor: <?= $d['autor'] ?></small>
                </div>
                <div class="card-footer">
                    <button class="btn-edit">✏️</button>
                    <button onclick="eliminarDiseno(<?= $d['id_diseno'] ?>)" class="btn-delete">🗑️</button>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</section>

<style>
    .contenedor-cards {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
        gap: 20px;
        margin-top: 20px;
    }

    .card-diseno {
        background: white;
        border-radius: 12px;
        overflow: hidden;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        transition: 0.3s;
    }

    .card-diseno:hover {
        transform: translateY(-5px);
    }

    .card-img {
        position: relative;
        height: 180px;
    }

    .card-img img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .badge-estado {
        position: absolute;
        top: 10px;
        right: 10px;
        background: #3498db;
        color: white;
        padding: 4px 8px;
        border-radius: 5px;
        font-size: 0.7em;
    }

    .card-body {
        padding: 15px;
    }

    .card-footer {
        padding: 10px;
        border-top: 1px solid #eee;
        display: flex;
        justify-content: flex-end;
        gap: 10px;
    }
</style>