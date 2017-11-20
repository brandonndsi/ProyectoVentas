<?php
class HistoricoVenta{


	private $historicoventaid;
	private $historicoventaidcliente;
	private $historicoventafecha;
	private $historicoventahora;
	private $historicoventacategoriaproducto;
	private $historicoventaidproducto;
	private $historicoventaprecioproducto;
	private $historicoventaidaccion;

	public function HistoricoVenta($historicoventaid,$historicoventaidcliente,$historicoventafecha,
		$historicoventahora,$historicoventacategoriaproducto,$historicoventaidproducto,
		$historicoventaprecioproducto,$historicoventaidaccion){

		$this->historicoventaid=$historicoventaid;
		$this->historicoventaidcliente=$historicoventaidcliente;
		$this->historicoventafecha=$historicoventafecha;
		$this->historicoventahora=$historicoventahora;
		$this->historicoventacategoriaproducto=$historicoventacategoriaproducto;
		$this->historicoventaidproducto=$historicoventaidproducto;
		$this->historicoventaprecioproducto=$historicoventaprecioproducto;
		$this->historicoventaidaccion=$historicoventaidaccion;

	}

	function getHistoricoVentaId(){
		return $this->historicoventaid;
	}

	function getHistoricoVentaIdCliente(){
		return $this->historicoventaidcliente;
	}

	function getHistoricoVentaFecha(){
		return $this->historicoventafecha;
	}

	function getHistoricoVentaHora(){
		return $this->historicoventahora;
	}

	function getHistoricoVentaCategoriaProducto(){
		return $this->historicoventacategoriaproducto;
	}

	function getHistoricoVentaIdProducto(){
		return $this->historicoventaidproducto;
	}

	function getHistoricoVentaPrecioProducto(){
		return $this->historicoventaprecioproducto;
	}

	function getHistoricoVentaIdAccion(){
		return $this->historicoventaidaccion;
	}
	//generando lo que es los set de los datos.
	
	function setHistoricoVentaId($historicoventaid){
		$this->historicoventaid=$historicoventaid;
	}

	function setHistoricoVentaIdCliente($historicoventaidcliente){
		$this->historicoventaidcliente=$historicoventaidcliente;
	}

	function setHistoricoVentaFecha($historicoventafecha){
		$this->historicoventafecha=$historicoventafecha;
	}

	function setHistoricoVentaHora($historicoventahora){
		$this->historicoventahora=$historicoventahora;
	}

	function setHistoricoVentaCategoriaProducto($historicoventacategoriaproducto){
		$this->historicoventacategoriaproducto=$historicoventacategoriaproducto;
	}

	function setHistoricoVentaIdProducto($historicoventaidproducto){
		$this->historicoventaidproducto=$historicoventaidproducto;
	}

	function setHistoricoVentaPrecioProducto($historicoventaprecioproducto){
		$this->historicoventaprecioproducto=$historicoventaprecioproducto;
	}

	function setgetHistoricoVentaIdAccion($historicoventaidaccion){
		$this->historicoventaidaccion=$historicoventaidaccion;
	}

}

?>