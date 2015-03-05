<?php
 class TipoUnidad{
	protected $id_tipo_unidad;
	protected $descripcion;
	protected $activo;

		public function getId_tipo_unidad() {return $this->id_tipo_unidad;}
		public function setId_tipo_unidad($id_tipo_unidad){$this->id_tipo_unidad = $id_tipo_unidad;}

		public function getDescripcion() {return $this->descripcion;}
		public function setDescripcion($descripcion){$this->descripcion = $descripcion;}

		public function getActivo() {return $this->activo;}
		public function setActivo($activo){$this->activo = $activo;}
}	
?>