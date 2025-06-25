<?php

namespace App\Controllers;

use App\Models\Venta_Model;
use App\Models\Detalle_Venta_Model;
use App\Models\Usuario_Model;
use App\Models\Productos_Model;

class VentaController extends BaseController
{
    public function listarVentas()
    {
        $ventaModel = new Venta_Model();
        $detalleModel = new Detalle_Venta_Model();
        $usuarioModel = new Usuario_Model();
        $productoModel = new Productos_Model();

        $ventas = $ventaModel->orderBy('id_venta', 'DESC')->findAll();


        $ventasDetalladas = [];

        foreach ($ventas as $venta) {
            $usuario = $usuarioModel->withDeleted()->find($venta['id_usuario']);
            $detalles = $detalleModel->where('id_venta', $venta['id_venta'])->findAll();

            $productosVendidos = [];
            $importeTotal = 0;

            foreach ($detalles as $detalle) {
                $producto = $productoModel->find($detalle['id_producto']);
                $subtotal = $detalle['detalle_cantidad'] * $detalle['detalle_precio'];
                $importeTotal += $subtotal;

                $productosVendidos[] = [
                    'nombre' => $producto['nombre_producto'],
                    'precio' => $detalle['detalle_precio'],
                    'cantidad' => $detalle['detalle_cantidad'],
                    'subtotal' => $subtotal,
                ];
            }

            $ventasDetalladas[] = [
                'id_venta' => $venta['id_venta'],
                'fecha' => $venta['venta_fecha'],
                'usuario' => $usuario ? $usuario['nombre'] . ' ' . $usuario['apellido'] : 'No encontrado',
                'productos' => $productosVendidos,
                'total' => $importeTotal
            ];
        }

        $data = [
            'titulo' => 'Listado de Ventas',
            'active' => 'ventas',
            'ventas' => $ventasDetalladas,
        ];

        return view('plantilla/header_view', $data)
            . view('plantilla/navbar_view', $data)
            . view('contenido/listar_ventas', $data)
            . view('plantilla/footer_view');
    }

    public function verDetalle($id_venta)
    {
        $ventaModel = new \App\Models\Venta_Model();
        $detalleModel = new \App\Models\Detalle_Venta_Model();
        $usuarioModel = new \App\Models\Usuario_Model();
        $productoModel = new \App\Models\Productos_Model();

        $venta = $ventaModel->find($id_venta);

        if (!$venta) {
            return redirect()->to('listar_ventas')->with('mensaje_error', 'Venta no encontrada.');
        }

        $usuario = $usuarioModel->withDeleted()->find($venta['id_usuario']);
        $detalles = $detalleModel->where('id_venta', $id_venta)->findAll();

        $productos = [];
        $total = 0;

        foreach ($detalles as $detalle) {
            $producto = $productoModel->find($detalle['id_producto']);
            $subtotal = $detalle['detalle_cantidad'] * $detalle['detalle_precio'];
            $total += $subtotal;

            $productos[] = [
                'nombre' => $producto['nombre_producto'],
                'precio' => $detalle['detalle_precio'],
                'cantidad' => $detalle['detalle_cantidad'],
                'subtotal' => $subtotal,
            ];
        }

        $data = [
            'titulo' => 'Detalle de Venta',
            'active' => 'ventas',
            'venta' => $venta,
            'usuario' => $usuario,
            'productos' => $productos,
            'total' => $total
        ];

        return view('plantilla/header_view', $data)
            . view('plantilla/navbar_view', $data)
            . view('contenido/detalle_venta', $data)
            . view('plantilla/footer_view');
    }

}
