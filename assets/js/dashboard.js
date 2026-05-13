// ======================================
// TABLA
// ======================================

const tablaProductos =
    document.getElementById(
        "tablaProductos"
    );

// ======================================
// TOTAL
// ======================================

const totalProductos =
    document.getElementById(
        "totalProductos"
    );

// ======================================
// LISTAR PRODUCTOS
// ======================================

async function listarProductos() {

    try {

        const respuesta =
            await fetch(
                "/api/productos"
            );

        const productos =
            await respuesta.json();

        // LIMPIAR TABLA

        tablaProductos.innerHTML = "";

        // TOTAL

        totalProductos.innerText =
            productos.length;

        // RECORRER

        productos.forEach(producto => {

            tablaProductos.innerHTML += `
            
                <tr>

                    <td>

                        <img
                            src="/uploads/productos/${producto.foto}"
                            width="70"
                        >

                    </td>

                    <td>

                        ${producto.nombre}

                    </td>

                    <td>

                        ${producto.descripcion}

                    </td>

                    <td>

                        ${producto.tipo_medida}

                    </td>

                    <td>

                        ${producto.tipo_categoria}

                    </td>

                    <td>

                        <button>

                            Editar

                        </button>

                        <button>

                            Eliminar

                        </button>

                    </td>

                </tr>
            `;
        });

    } catch (error) {

        console.log(error);
    }
}

// ======================================
// START
// ======================================

listarProductos();