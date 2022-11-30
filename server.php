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
} elseif (isset($_POST["indexToggle"])) {
    $todo_list[$_POST["indexToggle"]]["done"] = !$todo_list[$_POST["indexToggle"]]["done"];

    // Scriviamo il file json
    file_put_contents("todo.json", json_encode($todo_list));
} elseif (isset($_POST["removeIndex"])) {
    $remove_index = intval($_POST["removeIndex"]);
    array_splice($todo_list, $remove_index, 1);

    // Scriviamo il file json
    file_put_contents("todo.json", json_encode($todo_list));
}

//Trasformiamo il dato preso dal file in json in modo da poterlo passare al file js,
// con header diciamo che il contenuto è un json
header("Content-Type: application/json");
//con echo lo inviamo
echo json_encode($todo_list);
