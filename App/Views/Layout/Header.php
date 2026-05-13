<button class="btnMenu" id="btnMenu">
    <i class="bi bi-list"></i>
</button>

<div class="usuario">
    <i class="bi bi-person-circle"></i>
    <span id="nombreUsuario">
        <?= $_SESSION['nombres'] ?? 'Invitado' ?>
    </span>
</div>