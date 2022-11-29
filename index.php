<?php

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Axios -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.27.2/axios.min.js" integrity="sha512-odNmoc1XJy5x1TMVMdC7EMs3IVdItLPlCeL5vSUPN2llYKMJ2eByTTAIiiuqLg+GdNr9hF6z81p27DArRFKT7A==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <!-- Vue -->
    <script src="https://unpkg.com/vue@3/dist/vue.global.js"></script>
    <!-- My CSS -->
    <link rel="stylesheet" href="css/style.css">

    <title>ToDo List</title>
</head>

<body>
    <div id="app">
        <div class="container py-5">
            <h1 class="text-center">ToDo List</h1>

            <ul class="list-group mt-5">
                <li class="list-group-item d-flex justify-content-between align-items-center" v-for="(task,index) in todoList">
                    <span @click="toggleTask(index)" :class="{ 'text-decoration-line-through' : task.done }">{{ task.text }}</span>
                    <button @click="removeTask(index)" class="btn btn-danger"><i class="fa-solid fa-trash-can"></i></button>
                </li>
            </ul>

            <div class="input-group justify-content-center mt-5">
                <input class="form-control" type="text" v-model="newTask">
                <button @click="addTask" class="btn btn-primary">Add Task <i class="fa-solid fa-plus"></i></button>
            </div>
        </div>
    </div>

    <!-- My JS -->
    <script src="js/script.js"></script>
</body>

</html>