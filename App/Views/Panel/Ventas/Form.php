<section class="seccion contenido">
    <h1>Nueva Venta</h1>
    <div class="card-form-simple">
        <div class="fila-form">
            <div class="campo">
                <label>Cliente</label>
                <select id="id_cliente" class="select-full">
                    <?php foreach ($clientes as $c): ?>
                        <option value="<?= $c['id_cliente'] ?>"><?= $c['dni'] ?> - <?= $c['nombres'] ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
        </div>

        <div class="fila-form" style="background: #f4f4f4; padding: 15px; border-radius: 8px;">
            <div class="campo">
                <label>Producto</label>
                <select id="sel_producto">
                    <?php foreach ($productos as $p): ?>
                        <option value="<?= $p['id_producto'] ?>" data-nombre="<?= $p['nombre'] ?>"><?= $p['nombre'] ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="campo">
                <label>Material</label>
                <select id="sel_material">
                    <?php foreach ($materiales as $m): ?>
                        <option value="<?= $m['id_material'] ?>" data-nombre="<?= $m['tipo_material'] ?>">
                            <?= $m['tipo_material'] ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="campo">
                <label>Medida (Precio)</label>
                <select id="sel_medida" onchange="actualizarPrecio()">
                    <option value="" data-precio="0">Seleccione...</option>
                    <?php foreach ($medidas as $me): ?>
                        <option value="<?= $me['id_medida'] ?>" data-precio="<?= $me['precio'] ?>"
                            data-nombre="<?= $me['tipo_medida'] ?>">
                            <?= $me['tipo_medida'] ?> (S/ <?= $me['precio'] ?>)
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="campo">
                <label>Cant.</label>
                <input type="number" id="sel_cantidad" value="1" min="1" oninput="actualizarPrecio()">
            </div>
            <div class="campo">
                <label>P. Unit (S/)</label>
                <input type="number" id="sel_precio" step="0.01" readonly style="background: #eee;">
            </div>
            <div class="campo" style="display: flex; align-items: flex-end;">
                <button type="button" onclick="agregarAlCarrito()" class="btn-nuevo-simple">Agregar</button>
            </div>
        </div>

        <table class="tabla-minimal" style="margin-top: 20px;">
            <thead>
                <tr>
                    <th>Producto</th>
                    <th>Material / Medida</th>
                    <th>Cant.</th>
                    <th>P. Unit</th>
                    <th>Subtotal</th>
                    <th></th>
                </tr>
            </thead>
            <tbody id="carrito_ventas"></tbody>
        </table>

        <div class="form-footer">
            <button type="button" onclick="procesarVenta()" class="btn-guardar">
                Finalizar Venta (S/ <span id="total_venta">0.00</span>)
            </button>
        </div>
    </div>
</section>
<script>
    const URL_BASE = "<?= URL_BASE ?>";
</script>
<script src="<?= URL_BASE ?>/assets/js/ventas.js"></script>