let carrito = [];

function actualizarPrecio() {
    const medidaSelect = document.getElementById('sel_medida');
    if (!medidaSelect) return;
    const precioBase = parseFloat(medidaSelect.options[medidaSelect.selectedIndex].dataset.precio) || 0;
    document.getElementById('sel_precio').value = precioBase.toFixed(2);
}

function agregarAlCarrito() {
    const p = document.getElementById('sel_producto');
    const m = document.getElementById('sel_material');
    const med = document.getElementById('sel_medida');
    const cant = parseInt(document.getElementById('sel_cantidad').value);
    const precioUnit = parseFloat(document.getElementById('sel_precio').value);

    if (!med.value || cant <= 0 || precioUnit <= 0) {
        alert("Seleccione producto, medida y cantidad válida.");
        return;
    }

    const item = {
        id_producto: p.value,
        nombre_p: p.options[p.selectedIndex].dataset.nombre,
        id_material: m.value,
        nombre_m: m.options[m.selectedIndex].dataset.nombre,
        id_medida: med.value, // <--- Importante
        nombre_medida: med.options[med.selectedIndex].dataset.nombre,
        cantidad: cant,
        precio_unitario: precioUnit,
        subtotal: cant * precioUnit
    };

    carrito.push(item);
    renderizarCarrito();

    document.getElementById('sel_cantidad').value = "1";
    document.getElementById('sel_medida').value = "";
    document.getElementById('sel_precio').value = "";
}

function renderizarCarrito() {
    const tabla = document.getElementById('carrito_ventas');
    let totalGral = 0;
    tabla.innerHTML = '';

    carrito.forEach((item, index) => {
        totalGral += item.subtotal;
        tabla.innerHTML += `
            <tr>
                <td>${item.nombre_p}</td>
                <td>${item.nombre_m} | ${item.nombre_medida}</td>
                <td>${item.cantidad}</td>
                <td>S/ ${item.precio_unitario.toFixed(2)}</td>
                <td>S/ ${item.subtotal.toFixed(2)}</td>
                <td><button type="button" onclick="eliminarItem(${index})" style="color:red; border:none; background:none; cursor:pointer;">❌</button></td>
            </tr>
        `;
    });
    document.getElementById('total_venta').innerText = totalGral.toFixed(2);
}

function eliminarItem(index) {
    carrito.splice(index, 1);
    renderizarCarrito();
}

function procesarVenta() {
    if (carrito.length === 0) return alert("Agregue productos al carrito");

    const data = new FormData();
    data.append('id_cliente', document.getElementById('id_cliente').value);

    carrito.forEach((item, index) => {
        data.append(`productos[${index}][id_producto]`, item.id_producto);
        data.append(`productos[${index}][id_material]`, item.id_material);
        data.append(`productos[${index}][id_medida]`, item.id_medida); // <--- Ahora se envía
        data.append(`productos[${index}][cantidad]`, item.cantidad);
        data.append(`productos[${index}][precio_unitario]`, item.precio_unitario);
        data.append(`productos[${index}][subtotal]`, item.subtotal);
    });

    fetch(URL_BASE + '/ventas/guardar', {
        method: 'POST',
        body: data
    })
        .then(res => {
            if (!res.ok) {
                // Esto permite ver el error de PHP en la consola si no es un JSON válido
                return res.text().then(text => { throw new Error(text) });
            }
            return res.json();
        })
        .then(res => {
            if (res.status === 'success') {
                alert("Venta realizada correctamente");
                window.location.href = URL_BASE + '/ventas';
            }
        })
        .catch(err => {
            console.error("Error detallado del servidor:", err.message);
            alert("Error al procesar la venta. Revisa la consola.");
        });
}