<?php

    class Producto {
        public $id;
        public $codigoDeBarra;
        public $nombre;
        public $tipo;
        public $stock;
        public $precio;

        public function __construct($codigoDeBarra, $nombre, $tipo, $stock, $precio, $id = null) {
            $this->codigoDeBarra = $codigoDeBarra;
            $this->nombre = $nombre;
            $this->tipo = $tipo;
            $this->stock = $stock;
            $this->precio = $precio;
            $this->id = $id ?? rand(1, 10000);
        }

        public static function ProductoExiste($productoLista, $producto) {
            if ($productoLista->id === $producto->id || 
                $productoLista->codigoDeBarra == $producto->codigoDeBarra
                ) {
                $productoLista->stock++;

                return true;
            }

            return false;
        }

        public static function ValidarProducto($listaProductos, $producto) {
            foreach($listaProductos as $productoEnLista) {
                if (Producto::ProductoExiste($productoEnLista, $producto)) {
                    return true;
                }
            }

            return false;
        }

        public static function GuardarEnArchivo($listaProductos, $producto) {
            $modoAperturaArchivo = 'w';
            $productoExistente = Producto::ValidarProducto($listaProductos, $producto);

            if ($productoExistente) {
                echo 'Actualizado<br>';
            } else {
                array_push($listaProductos, $producto);
                echo 'Ingresado<br>';
            }
            
            $archivo = fopen('productos.json', $modoAperturaArchivo);

            if ($archivo !== false) {
                foreach($listaProductos as $producto) {
                    $productoJSON = json_encode($producto) . PHP_EOL;

                    fwrite($archivo, $productoJSON);
                }

                fclose($archivo);

                return true;
            }

            return false;
        }

        public static function CargarArchivo() {
            $archivo = fopen('productos.json', 'a+');
            $productos = [];

            while(!feof($archivo)) {
                $data = json_decode(fgets($archivo), true);

                if ($data === null) {
                    break;
                } 

                $producto = new Producto($data['codigoDeBarra'], $data['nombre'], $data['tipo'], $data['stock'], $data['precio'], $data['id']);
                array_push($productos, $producto);
            }

            fclose($archivo);

            return $productos;
        }

        public static function BuscarPorCodigo($listaProductos, $codigo) {
            foreach($listaProductos as $producto) {
                if ($producto->codigoDeBarra === $codigo) {
                    return $producto;
                }
            }

            return null;
        }
    }