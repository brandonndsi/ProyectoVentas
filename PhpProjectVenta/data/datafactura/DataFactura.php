<?php

class DataFactura {

    private $conexion;

    function DataFactura() {
        include_once '../../data/dbconexion/Conexion.php';
        include_once '../../domain/facturas/Facturas.php';
        $this->conexion = new Conexion();
    }

    function mostrarFactura() {
        if ($this->conexion->crearConexion()->set_charset('utf8')) {

            $array = array();

            $mostrarproductos = $this->conexion->crearConexion()->query("SELECT facturaid,facturafecha,empleadoid
              FROM tbfacturas
              WHERE facturaestado=1");

            $this->conexion->cerrarConexion();
            while ($resultado = $mostrarproductos->fetch_assoc()) {
                array_push($array, $resultado);
            }
            return $array;
        }
    }

    /**
     * Lo que hace es por medio de la fecha d ela factura mostrar todos los datos de la misma factura.
     * @param  [type] resive la fecha de la factura para ejecutar la busqueda de la misma en la base de datos
     * @return [type] Retorna lo que los datos de esa factura todos.
     */
    function buscarFactura($facturaid) {
        if ($this->conexion->crearConexion()->set_charset('utf8')) {
            $array = array();

            $verFactura = $this->conexion->crearConexion()->query("SELECT f.facturaid, f.ventaid, p.personanombre,
                c.clientedescuento, c.clienteacumulado, v.ventaproducto, v.ventacantidad, f.facturafecha,
                f.facturabruta, f.facturaneta, c.clientedireccionexacta, p.personatelefono
                FROM tbfacturas f
                INNER JOIN tbempleados e ON e.empleadoid= f.empleadoid
                INNER JOIN tbpersonas p ON p.personaid= f.empleadoid   
                INNER JOIN tbclientes c ON c.clienteid= f.clienteid
                INNER JOIN tbventas v ON v.ventaid= f.ventaid    
                WHERE facturaid= '" . $facturaid . "' AND facturaestado=1;");
            
            $this->conexion->cerrarConexion();
            while ($resultado = $verFactura->fetch_assoc()) {
                array_push($array, $resultado);
            }
            return $array;
        }
    }

}
