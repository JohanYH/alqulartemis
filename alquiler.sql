-- Active: 1687258977643@@127.0.0.1@3306@Facturacion
-- SQLBook: Code
CREATE DATABASE AlquilerArtemis;

use AlquilerArtemis;

CREATE TABLE Cliente(
    Cliente_ID INT PRIMARY KEY AUTO_INCREMENT,
    Nombre_Cliente VARCHAR (100) NOT NULL,
    Telefono_Cliente VARCHAR(100) NOT NULL
);

CREATE TABLE Empleado(
    Empleado_ID INT PRIMARY KEY AUTO_INCREMENT,
    Nombre_Empleado VARCHAR (100) NOT NULL,
    Telefono_Empleado VARCHAR(100) NOT NULL
);

CREATE TABLE Productos(
    Productos_ID INT PRIMARY KEY AUTO_INCREMENT,
    Nombre_Productos VARCHAR (100) NOT NULL,
    Descripcion VARCHAR (100) NOT NULL,
    Precio INT,
    Stock INT,
    Categoria VARCHAR (100) NOT NULL
);

CREATE TABLE Obra(
    Obra_ID INT PRIMARY KEY AUTO_INCREMENT,
    Cliente_ID INT NOT NULL,
    Nombre_Obra VARCHAR(100) NOT NULL,
    FOREIGN KEY (Cliente_ID) REFERENCES Cliente(Cliente_ID)
);

CREATE TABLE Alquiler(
    Alquiler_ID INT PRIMARY KEY AUTO_INCREMENT,
    Cliente_ID INT NOT NULL,
    Fecha_Salida DATE NOT NULL,
    Hora_Salida TIME NOT NULL,
    SubtotalPeso VARCHAR (100) NOT NULL,
    Empleado_ID INT NOT NULL,
    PlacaTransporte VARCHAR (50) NOT NULL,
    Observaciones VARCHAR (200) NOT NULL,
    FOREIGN KEY (Cliente_ID) REFERENCES Cliente(Cliente_ID),
    FOREIGN KEY (Empleado_ID) REFERENCES Empleado(Empleado_ID)
);

CREATE TABLE Alquiler_Detalle(
    Alquiler_Detalle_ID INT PRIMARY KEY AUTO_INCREMENT,
    Alquiler_ID INT NOT NULL,
    Productos_ID INT NOT NULL,
    Obra_ID INT NOT NULL, /* Obra del cliente */
    Empleado_ID INT NOT NULL,
    Cantidad_Salida VARCHAR (200) NOT NULL,
    Cantidad_Propia VARCHAR (200) NOT NULL,
    Cantidad_Subalquilada VARCHAR (100) NOT NULL,
    ValorUnida VARCHAR (100) NOT NULL,
    Fecha_StanBye DATE NOT NULL,
    Estado VARCHAR (100) NOT NULL, /* alquilado, devuelto o dañado */
    FOREIGN KEY (Alquiler_ID) REFERENCES Alquiler(Alquiler_ID),
    FOREIGN KEY (Productos_ID) REFERENCES Productos(Productos_ID),
    FOREIGN KEY (Obra_ID) REFERENCES Obra(Obra_ID),
    FOREIGN KEY (Empleado_ID) REFERENCES Empleado(Empleado_ID)
);

CREATE TABLE Entrada(
    Entrada_ID INT PRIMARY KEY AUTO_INCREMENT,
    Alquiler_ID INT NOT NULL,
    Empleado_ID INT NOT NULL,
    Cliente_ID INT NOT NULL,
    Fecha_Entrada DATE  NOT NULL,
    Hora_Entrada TIME NOT NULL,
    Observaciones VARCHAR (200) NOT NULL,
    FOREIGN KEY (Alquiler_ID) REFERENCES Alquiler(Alquiler_ID),
    FOREIGN KEY (Empleado_ID) REFERENCES Empleado(Empleado_ID),
    FOREIGN KEY (Cliente_ID) REFERENCES Cliente(Cliente_ID)
);

CREATE TABLE Entrada_Detalle(
    Entrada_Detalle_ID INT PRIMARY KEY AUTO_INCREMENT,
    Entrada_ID INT NOT NULL,
    Productos_ID INT NOT NULL,
    Obra_ID INT NOT NULL,
    Entrada_Cantidad VARCHAR (100) NOT NULL,
    Entrada_Cantidad_Propia VARCHAR (150) NOT NULL,
    Entrada_Cantidad_Subaquilada VARCHAR (150) NOT NULL,
    Estado VARCHAR (100) NOT NULL, /* alquilado,devuelto o dañado */
    FOREIGN KEY (Entrada_ID) REFERENCES Entrada(Entrada_ID),
    FOREIGN KEY (Productos_ID) REFERENCES Productos(Productos_ID),
    FOREIGN KEY (Obra_ID) REFERENCES Obra(Obra_ID)
);

CREATE TABLE Inventario(
    Inventario_ID INT PRIMARY KEY AUTO_INCREMENT,
    Productos_ID INT NOT NULL,
    CantidadInicial VARCHAR (100) NOT NULL,
    CantidadIngresos VARCHAR (100) NOT NULL,
    CantidadSalidas VARCHAR (100) NOT NULL,
    CantidadFinal VARCHAR (100) NOT NULL,
    FechaInventario VARCHAR (100) NOT NULL,
    TipoOperancion VARCHAR (200) NOT NULL, /* Hacer la liquidación para cada cliente quincenal o mensual de todo lo alquilado por el cliente y gestionar los datos (columnas de tabla) que se consideren necesarios para el cobro debido. */
    FOREIGN KEY (Productos_ID) REFERENCES Productos(Productos_ID)
);
