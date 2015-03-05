
<?php
class conexionDB{
	public function conecta() {
		try {
		    $cnn = new PDO('mysql:host=localhost;dbname=proyecto', 'root', '');
		    $cnn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		    return $cnn;
		} catch (PDOException $e) {
		    print "¡Error!: " . $e->getMessage() . "<br/>";
		    die();
		}
	}
}
?>
