<h2>
    <span>App Cordova</span>
    <small style="display:block; font-size: 12px; color: #38bdf8;">
        <?= $_SESSION['nombres'] ?? 'Usuario' ?>
    </small>
</h2>

<nav class="menu">
    <ul class="menuEnumerate">
        <!-- DASHBOARD (Se queda en el PanelController) -->
        <li>
            <a href="<?= URL_BASE ?>/panel" class="menuLink" data-view="dashboard">
                <i class="bi bi-columns-gap"></i>
                <span>Dashboard</span>
            </a>
        </li>

        <br>
        <!-- PRODUCTOS (Va a su propio controlador) -->
        <li>
            <label>Control de productos</label>
            <a href="<?= URL_BASE ?>/productos" class="menuLink" data-view="productos">
                <i class="bi bi-box"></i>
                <span>Productos</span>
            </a>
        </li>
        <li>
            <a href="<?= URL_BASE ?>/categorias" class="menuLink" data-view="categorias">
                <i class="bi bi-boxes"></i>
                <span>Categorias</span>
            </a>
        </li>
        <li>
            <a href="<?= URL_BASE ?>/materiales" class="menuLink" data-view="material">
                <i class="bi bi-box-seam"></i>
                <span>Material</span>
            </a>
        </li>
        <li>
            <a href="<?= URL_BASE ?>/medidas" class="menuLink" data-view="medidas">
                <i class="bi bi-highlighter"></i>
                <span>Medidas</span>
            </a>
        </li>

        <br>
        <!-- USUARIOS (Va a su propio controlador) -->
        <li>
            <label>Control de usuarios</label>
            <a href="<?= URL_BASE ?>/usuarios" class="menuLink" data-view="usuarios">
                <i class="bi bi-person"></i>
                <span>Usuarios</span>
            </a>
        </li>

        <br>
        <!-- VENTAS Y CLIENTES (Van a sus propios controladores) -->
        <li>
            <label>Control de ventas</label>
            <a href="<?= URL_BASE ?>/ventas" class="menuLink" data-view="ventas">
                <i class="bi bi-list-check"></i>
                <span>Ventas</span>
            </a>
        </li>
        <li>
            <a href="<?= URL_BASE ?>/clientes" class="menuLink" data-view="clientes">
                <i class="bi bi-people"></i>
                <span>Clientes</span>
            </a>
        </li>
        <li>
            <a href="<?= URL_BASE ?>/disenos" class="menuLink" data-view="disenos">
                <i class="bi bi-images"></i>
                <span>Diseños</span>
            </a>
        </li>

        <br>
        <li class="logout-item">
            <a href="<?= URL_BASE ?>/auth/logout" class="menuLink" style="color: #f87171; font-weight: bold;">
                <i class="bi bi-power"></i>
                <span>Cerrar sesión</span>
            </a>
        </li>
    </ul>
</nav>