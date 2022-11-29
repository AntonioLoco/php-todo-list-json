<?php
// Leggo il contenuto di todo.json
$string = file_get_contents("todo.json");

//Convertiamo la stringa ricevuta in una variabile php
$todo_list = json_decode($string, true);

//Trasformiamo il dato preso dal file in json in modo da poterlo passare al file js,
// con header diciamo che il contenuto è un json
header("Content-Type: application/json");
//con echo lo inviamo
echo json_encode($todo_list);
