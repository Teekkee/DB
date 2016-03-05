<?php
    $dsn = 'sqlite:Poke';
	$sql = new PDO($dsn);
	$Name = $_POST["Name"];
	$Evolution = $_POST["Evolution"];
	$Elements = $_POST["Elements"];
		$ins = $sql -> prepare("INSERT INTO Pokemons(Name, Evolution, Elements) VALUES (:Name, :Evolution, :Elements)");
		$ins -> bindValue(":Name", $Name);
		$ins -> bindValue(":Evolution", $Evolution);
		$ins -> bindValue(":Elements", $Elements);
		$ins -> execute();
	$select =$sql -> prepare("SELECT * FROM Pokemons");
	$select->execute();
	$results=$select->fetchAll(PDO::FETCH_ASSOC);
	header('Content-Type: application/json');
	echo json_encode($results);
?>

