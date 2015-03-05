<?php
 class UnidadMedida{
 	protected $id_unidad_medida;
	protected $descripcion;
	protected $activo;

		public function getId_unidad_medida() {return $this->id_unidad_medida;}
		public function setId_unidad_medida($id_unidad_medida){$this->id_unidad_medida = $id_unidad_medida;}

		public function getDescripcion() {return $this->descripcion;}
		public function setDescripcion($descripcion){$this->descripcion = $descripcion;}

		public function getActivo() {return $this->activo;}
		public function setActivo($activo){$this->activo = $activo;}
}	
?>