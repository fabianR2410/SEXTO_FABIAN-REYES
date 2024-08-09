<?php
//controlador de producto
require_once '../models/producto.model.php';
//error reporting
$producto = new Producto();

switch ($_GET["op"]) {
    //operacion para productos
    case 'todos':
        $data =array() ;
        $data = $producto->todos();
        while ($row = mysqli_fetch_assoc($data)) {
            $todos[] = $row;
        }
        echo json_encode($todos);
            break;

            case 'uno':
                $$IDProducto = $_POST["idproducto"];
                $data = array() ; //seteo respuesta 
                $data = $producto->uno($IDProducto);
                $res = mysqli_fetch_assoc($data);
                echo json_encode($res);
                break;


                case 'insertar':
                    $nombre = $_POST["nombre"];
                    $descripcion = $_POST["descripcion"];
                    $precio = $_POST["precio"];
                    $stock = $_POST["stock"];
                    $idcategoria = $_POST["idcategoria"];
                    $data = array() ;
                    $data = $producto->insertar($NombreProducto, $Descripcion, $Precio, $StockInicial, $IDCategorias);
                    echo json_encode($data);
                break;


                case 'actualizar':
                    $$IDProducto = $_POST["IDProducto"];
                    $nombre = $_POST["nombre"];
                    $descripcion = $_POST["descripcion"];
                    $precio = $_POST["precio"];
                    $stock = $_POST["stock"];
                    $idcategoria = $_POST["idcategoria"];
                    $data = array() ;
                    $data = $producto->actualizar($IDProducto,$NombreProducto, $Descripcion, $Precio, $StockInicial, $IDCategorias);
                    echo json_encode($data);
                break;

                case 'eliminar':
                    $$IDProducto = $_POST["IDProducto"];
                    $data = array() ;
                    $data = $producto->eliminar($IDProducto);
                    echo json_encode($data);
                break;
                }