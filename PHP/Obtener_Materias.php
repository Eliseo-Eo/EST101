<?php
session_start();
require_once 'Config.php';

$mi_id = $_SESSION['User_Id'];

// Consulta para traer tus materias asignadas
$query = "SELECT m.Nombre_Materia, g.Grado, g.Grupo, a.Ciclo, a.Id as Asignacion_Id 
          FROM Asignaciones a
          JOIN Materias m ON a.Materia_Id = m.Id
          JOIN Grupos g ON a.Grupo_Id = g.Id
          WHERE a.Usuario_Id = ?";

$stmt = $pdo->prepare($query);
$stmt->execute([$mi_id]);
echo json_encode($stmt->fetchAll(PDO::FETCH_ASSOC));