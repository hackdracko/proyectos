<?php
 class Usuario{
 	protected $IdUsuario;
	protected $nombre;
	protected $apm;
	protected $f_nacimiento;
	protected $email;
	protected $telefono;
	protected $activo;
	
		public function getIdUsuario() {return $this->IdUsuario;}
		public function setIdUsuario($IdUsuario){$this->IdUsuario = $IdUsuario;}

		public function getNombre() {return $this->nombre;}
		public function setNombre($nombre){$this->nombre = $nombre;}

		public function getApp() {return $this->app;}
		public function setApp($app){$this->app = $app;}

		public function getApm() {return $this->apm;}
		public function setApm($apm){$this->apm = $apm;}

		public function getF_nacimiento() {return $this->f_nacimiento;}
		public function setF_nacimiento($f_nacimiento){$this->f_nacimiento = $f_nacimiento;}

		public function getEmail() {return $this->email;}
		public function setEmail($email){$this->email = $email;}

		public function getTelefono() {return $this->telefono;}
		public function setTelefono($telefono){$this->telefono = $telefono;}

		public function getActivo() {return $this->activo;}
		public function setActivo($activo){$this->activo = $activo;}
}	
?>