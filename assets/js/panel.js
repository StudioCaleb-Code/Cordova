document.addEventListener("DOMContentLoaded", () => {
    iniciarMenuMobile();
    autoActivarMenu();
});

// ======================================
// ACTIVE MENU (Automático)
// ======================================
function autoActivarMenu() {
    const path = window.location.pathname;
    const segments = path.split('/').filter(segment => segment !== "");

    // Buscamos el índice de 'panel' para determinar el módulo
    const panelIndex = segments.indexOf('panel');
    const moduloActual = (panelIndex !== -1 && segments[panelIndex + 1])
        ? segments[panelIndex + 1]
        : 'dashboard';

    const links = document.querySelectorAll(".menuLink");

    links.forEach(link => {
        link.classList.remove("active");
        if (link.dataset.view === moduloActual) {
            link.classList.add("active");
        }
    });
}

// ======================================
// MENU MOBILE
// ======================================
function iniciarMenuMobile() {
    const btnMenu = document.getElementById("btnMenu");
    const sidebar = document.getElementById("sidebar");
    const overlay = document.getElementById("overlay");

    const cerrarMenu = () => {
        if (sidebar) sidebar.classList.remove("active");
        if (overlay) overlay.classList.remove("active");
    };

    if (btnMenu && sidebar && overlay) {
        btnMenu.addEventListener("click", () => {
            sidebar.classList.toggle("active");
            overlay.classList.toggle("active");
        });

        overlay.addEventListener("click", cerrarMenu);
    }

    document.addEventListener("keydown", (e) => {
        if (e.key === "Escape") cerrarMenu();
    });
}

// ======================================
// CONFIRMAR ELIMINAR
// ======================================

// elimianr productos
function confirmarEliminar(id, urlBase) {
    if (confirm('¿Estás seguro de eliminar este producto?')) {
        // Redirigimos usando la URL base que viene de la vista
        window.location.href = urlBase + '/productos/eliminar/' + id;
    }
}

// eliminar materiales
function confirmarEliminarMat(id, urlBase) {
    if (confirm('¿Deseas eliminar este material permanentemente?')) {
        window.location.href = urlBase + '/materiales/eliminar/' + id;
    }
}

// eliminar medidas
function confirmarEliminarMedida(id, urlBase) {
    if (confirm('¿Eliminar esta medida?')) {
        window.location.href = urlBase + '/medidas/eliminar/' + id;
    }
}

// eliminar cliente
function confirmarEliminarCliente(id, urlBase) {
    if (confirm('¿Deseas eliminar este cliente? Esta acción no se puede deshacer.')) {
        window.location.href = urlBase + '/clientes/eliminar/' + id;
    }
}

// diseño
function eliminarDiseno(id) {
    if (confirm("¿Estás seguro de eliminar este diseño?")) {
        fetch(URL_BASE + '/disenos/eliminar/' + id, {
            method: 'DELETE'
        })
            .then(res => res.json())
            .then(res => {
                if (res.status === 'success') {
                    location.reload();
                }
            });
    }
}