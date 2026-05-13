-- ======================================
-- TABLA ROLES
-- ======================================
CREATE TABLE rol (
    id_rol INT AUTO_INCREMENT PRIMARY KEY,
    tipo_rol VARCHAR(100) NOT NULL
);

INSERT INTO rol (tipo_rol) VALUES ('Dueño'), ('Cliente');

-- ======================================
-- TABLA USUARIOS
-- ======================================
CREATE TABLE usuario (
    id_usuario INT AUTO_INCREMENT PRIMARY KEY,
    id_rol INT DEFAULT 2,
    correo VARCHAR(255) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    nombres VARCHAR(100) NOT NULL,
    apellidos VARCHAR(100) NOT NULL,
    foto VARCHAR(255),
    estado BOOLEAN DEFAULT TRUE,
    fecha_creacion TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (id_rol) REFERENCES rol (id_rol)
);

-- ======================================
-- TABLA MEDIDAS
-- ======================================
CREATE TABLE medidas (
    id_medida INT AUTO_INCREMENT PRIMARY KEY,
    tipo_medida VARCHAR(100) NOT NULL,
    precio DECIMAL(10, 2) NOT NULL
);

-- ======================================
-- TABLA CATEGORIAS
-- ======================================
CREATE TABLE categoria (
    id_categoria INT AUTO_INCREMENT PRIMARY KEY,
    tipo_categoria VARCHAR(200) NOT NULL
);

-- ======================================
-- TABLA PRODUCTOS
-- ======================================
CREATE TABLE producto (
    id_producto INT AUTO_INCREMENT PRIMARY KEY,
    foto VARCHAR(255),
    nombre VARCHAR(100) NOT NULL,
    descripcion TEXT,
    id_medida INT,
    id_categoria INT,
    FOREIGN KEY (id_medida) REFERENCES medidas (id_medida),
    FOREIGN KEY (id_categoria) REFERENCES categoria (id_categoria)
);

-- ======================================
-- TABLA PRODUCTOS
-- ======================================
CREATE TABLE material (
    id_material INT AUTO_INCREMENT PRIMARY KEY,
    tipo_material VARCHAR(100)
);
-- ======================================
-- TABLA CLIENTES
-- ======================================
CREATE TABLE cliente (
    id_cliente INT AUTO_INCREMENT PRIMARY KEY,
    dni VARCHAR(8) NOT NULL UNIQUE,
    nombres VARCHAR(200) NOT NULL,
    apellidoP VARCHAR(100) NOT NULL,
    apellidoM VARCHAR(100) NOT NULL,
    telefono VARCHAR(15),
    direccion VARCHAR(255)
);

-- ======================================
-- TABLA VENTAS
-- ======================================
CREATE TABLE venta (
    id_venta INT AUTO_INCREMENT PRIMARY KEY,
    id_cliente INT,
    fecha_venta DATETIME DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (id_cliente) REFERENCES cliente (id_cliente)
);

-- ======================================
-- DETALLE DE VENTAS
-- ======================================
CREATE TABLE detalle_ventas (
    id_detalleV INT AUTO_INCREMENT PRIMARY KEY,
    id_venta INT,
    id_producto INT,
    id_material INT,
    id_medida INT,
    cantidad INT NOT NULL DEFAULT 1,
    precio_unitario DECIMAL(10, 2),
    subtotal DECIMAL(10, 2),
    FOREIGN KEY (id_venta) REFERENCES venta (id_venta),
    FOREIGN KEY (id_producto) REFERENCES producto (id_producto),
    FOREIGN KEY (id_material) REFERENCES material (id_material),
    FOREIGN KEY (id_medida) REFERENCES medidas (id_medida)
);

-- ======================================
-- DETALLE DE ESTADOS PARA DISEÑO
-- ======================================
CREATE TABLE estado (
    id_estado INT AUTO_INCREMENT PRIMARY KEY,
    tipo_estado VARCHAR(100)
);

-- ======================================
-- TABLA DISEÑOS
-- ======================================
CREATE TABLE diseno (
    id_diseno INT AUTO_INCREMENT PRIMARY KEY,
    id_usuario INT NOT NULL,
    id_estado INT DEFAULT 1,
    foto VARCHAR(255),
    nombre VARCHAR(100) NOT NULL,
    descripcion TEXT,
    fecha_creacion TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (id_usuario) REFERENCES usuario (id_usuario),
    FOREIGN KEY (id_estado) REFERENCES estado (id_estado)
);

-- ======================================
-- TABLA LIKES
-- ======================================
CREATE TABLE likes (
    id_like INT AUTO_INCREMENT PRIMARY KEY,
    id_usuario INT NOT NULL,
    id_diseno INT NOT NULL,
    fecha_like TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (id_usuario) REFERENCES usuario (id_usuario),
    FOREIGN KEY (id_diseno) REFERENCES diseno (id_diseno)
);