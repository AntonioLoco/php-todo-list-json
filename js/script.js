const {createApp} = Vue;

createApp({
    data(){
        return{
            todoList: []
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