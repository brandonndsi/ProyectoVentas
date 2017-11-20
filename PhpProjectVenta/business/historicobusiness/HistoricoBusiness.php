<?php

/**
 * AUTOR: David Salas Lorente.
 */
class HistoricoBusiness {

    private $DataHistorial;

    public function HistoricoBusiness() {
        
        require_once '../../data/datahistorial/DataHistorial.php';
        $this->DataHistorial= new DataHistorial();
    }
    /**
     * Inserta todo lo que el usuario clikea en la venta
     * @param  [type] manda la instancio de la clase historial con todos los datos del producto
     * @return [type] true si se guardo en la base de datos.
     */
    public function insertarHistorial($historial) {
        return $this->DataHistorial->insertarHistorial($historial);
    }
    /**
     * muestra un String con los datos de todos los productos mas vendidos por fecha.
     * @param  [type] manda la fecha a comparar para poder obtener los datos en la base de datos.
     * @return [type] retorna todos los productos mas vendidos pero por fecha.
     */
    public function mostrarHistorialFecha($historialfecha) {
        return $this->DataHistorial->mostrarHistoralFecha($historialfecha);
    }
    /**
     * muestra los datos de todos los productos mas vendidos en el origin de los tiempos.
     * @param  [type] muestra parametro ams vendidos para probar  el atgoritmo y que retorme el mas vendido.
     * @return [type]retorna una lista de los productos mas vendidos.
     */
    public function mostrarHistorialMasVendidos($historialmasvendido) {
        return $this->DataHistorial->mostrarHistorialMasVendidos($historialmasvendido);
    }

    public function mostrarHistorialMenosVendidos($historialmenosvendido){
    	return $this->DataHistorial->mostrarHistorialMenosVendidos($historialmenosvendido);
    }
    /**
     * retorna todo lo relacionado a el cliente a buscar y lo que el mas o menos compro de producto
     * @param  [type] mandamos el id del cliente o el numero de cedula
     * @return [type] retorna todo un array con la informacion de los datos del cliente.
     */
    public function mostrarHistorialCliente($historialCliente){
    	return $this->DataHistorial->mostrarHistorialCliente($historialCliente);
    }
    /**
     * retorna el dia y los datos de los productos mas vendidos
     * @param  [type] manda los datos del dia para buscar lo datos
     * @return [type]  retorna toda la informacion de ese dia a 
     */
    public  function mostrarHistorialPorDia($historialdia){
    	return $this->DataHistorial->mostrarHistorialPorDia($historialdia);
    }
}

?>