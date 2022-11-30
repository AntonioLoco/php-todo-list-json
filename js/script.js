const {createApp} = Vue;

createApp({
    data(){
        return{
            todoList: [],
            newTask: ""
        }
    },
    methods: {
        addTask(){
            if(this.newTask.length > 0){
                //Creiamo il data da inviare nel post
                const data = {
                    text: this.newTask
                }
    
                //Facciamo la chiamata ad axios
                axios
                    .post("server.php", data, 
                    {
                        headers: {"Content-Type": "multipart/form-data"}
                    })
                    .then( resp => {
                        this.todoList = resp.data;

                    });

                this.newTask = "";
            }
        },
        toggleTask(index){
            const data = {
                indexToggle: index,
            }

            //Facciamo la chiamata ad axios
            axios
            .post("server.php", data, 
            {
                headers: {"Content-Type": "multipart/form-data"}
            })
            .then( resp => {
                this.todoList = resp.data;
            });
        },
        removeTask(index){

            const data = {
                removeIndex: index
            }

            // Facciamo la chiamata ad axios
            axios
            .post("server.php", data, 
            {
                headers: {"Content-Type": "multipart/form-data"}
            })
            .then( resp => {
                this.todoList = resp.data;
            });
        }
    },
    created(){
        //Facciamo la chiamata al server per poter prendere i dati, con axios
        axios
            .get("server.php")
            .then( resp => {
                this.todoList = resp.data
            })
    }
}).mount("#app");