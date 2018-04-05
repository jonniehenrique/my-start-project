<?php

function connect() {
	try {
		$conn = new PDO('mysql:host=localhost;dbname=sysejc', 'root', '');
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	} catch (PDOException $E) {
		echo 'ERROR! ' . $E->getMessage();
	}

	return $conn;
}

function getAll($table) {
	$conn = connect();

	$table = filter_var($table, FILTER_SANITIZE_STRING);

	$sql = "SELECT * FROM $table";

	$res = $conn->prepare($sql);
	$res->execute();

	if ($res->rowCount() > 0):
		$result = $res->fetchAll(PDO::FETCH_OBJ);
	else:
		$result = '';
	endif;

	return $result;
}

function countAll($table) {
    $conn = connect();

	$table = filter_var($table, FILTER_SANITIZE_STRING);

	$sql = "SELECT * FROM $table";

	$res = $conn->prepare($sql);
	$res->execute();

	if ($res->rowCount() > 0):
		$result = $res->fetchAll();
	else:
		$result = '';
	endif;

	return count($result);
}

function getByID($table, $id) {
    $conn = connect();

	$table = filter_var($table, FILTER_SANITIZE_STRING);
	$id    = filter_var($id, FILTER_SANITIZE_NUMBER_INT);

	$sql = "SELECT * FROM $table WHERE id = '$id' LIMIT 1";

	$res = $conn->prepare($sql);
	$res->execute();

	if ($res->rowCount() > 0):
		$result = $res->fetch(PDO::FETCH_OBJ);
	else:
		header('Location: ' . urlBase() . 'admin/painel?view=404');
	endif;

	return $result;
}

function getUserByLogin($login) {
    $conn = connect();

	$login = filter_var($login, FILTER_SANITIZE_STRING);

	$sql = "SELECT * FROM login WHERE usuario = '$login' LIMIT 1";

	$res = $conn->prepare($sql);
	$res->execute();

	if ($res->rowCount() > 0):
		$result = $res->fetch(PDO::FETCH_OBJ);
	endif;

	return ucfirst($result->name);
}