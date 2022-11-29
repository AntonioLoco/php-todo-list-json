<?php
// Leggo il contenuto di todo.json
$string = file_get_contents("todo.json");

//Convertiamo la stringa ricevuta in una variabile php
$todo_list = json_decode($string, true);

//Controlliamo se sono avvenute modifiche nella lista
if (isset($_POST["text"])) {
    $new_task = $_POST["text"];
    $todo_list[] = ["text" => $new_task, "done" => false];

    // Scriviamo il file json
    file_put_contents("todo.json", json_encode($todo_list));
}

if (isset($_POST["done"])) {
    $new_done = $_POST["done"] == "true" ? true : false;

    $todo_list[$_POST["index"]]["done"] = $new_done;

    // Scriviamo il file json
    file_put_contents("todo.json", json_encode($todo_list));
}

if (isset($_POST["removeIndex"])) {
    $remove_index = intval($_POST["removeIndex"]);
    unset($todo_list[$remove_index]);

    // Scriviamo il file json
    file_put_contents("todo.json", json_encode($todo_list));
}

//Trasformiamo il dato preso dal file in json in modo da poterlo passare al file js,
// con header diciamo che il contenuto è un json
header("Content-Type: application/json");
//con echo lo inviamo
echo json_encode($todo_list);
