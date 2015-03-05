<?php
 class Medicamento{
 	protected $id_medicamento;
	protected $id_tipo_unidad;
	protected $id_unidad_medida;
	protected $descripcion;
	protected $activo;
	
		public function getId_medicamento() {return $this->id_medicamento;}
		public function setId_medicamento($id_medicamento){$this->id_medicamento = $id_medicamento;}

		public function getId_tipo_unidad() {return $this->id_tipo_unidad;}
		public function setId_tipo_unidad($id_tipo_unidad){$this->id_tipo_unidad = $id_tipo_unidad;}

		public function getId_unidad_medida() {return $this->id_unidad_medida;}
		public function setId_unidad_medida($id_unidad_medida){$this->id_unidad_medida = $id_unidad_medida;}

		public function getDescripcion() {return $this->descripcion;}
		public function setDescripcion($descripcion){$this->descripcion = $descripcion;}

		public function getActivo() {return $this->activo;}
		public function setActivo($activo){$this->activo = $activo;}
}	
?>