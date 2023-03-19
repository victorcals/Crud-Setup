<template>
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h4>
                    Pessoas cadastradas

                    <RouterLink to="/estudante/create" class=" btn btn-primary float-end">add</RouterLink>
                </h4>
            </div>
            <div class="card body">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nome</th>
                            <th>cpf</th>
                            <th>email</th>
                            <!-- <th>endereço</th> -->
                            <th>rua</th>
                            <th>bairro</th>
                            <th>numero</th>
                            <!-- <th>complento</th> -->
                            <!-- <th>Create At</th> -->
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody v-if="this.estudante.length > 0">
                        <tr v-for="(estudante, index) in this.estudante" :key="index">
                            <td>{{ estudante.id }}</td>
                            <td>{{ estudante.nome }}</td>
                            <td>{{ estudante.cpf }}</td>
                            <td>{{ estudante.email }}</td>
                            <td>{{ estudante.rua }}</td>
                            <td>{{ estudante.bairro }}</td>
                            <td>{{ estudante.numero }}</td>
                            <!-- <td>{{ estudante.complemento }}</td> -->
                            <!-- <td>{{ estudante.create_at }}</td> -->
                            <td>
                                <router-link :to="'estudante/' + estudante.id + '/editar'" class="btn btn-success">
                                    editar
                                </router-link>
                                <button type="button" class=" btn btn-danger ">delete</button>
                            </td>

                        </tr>
                    </tbody>
                    <tbody v-else>
                        <tr>
                            <td colspan="7"> carregando</td>
                        </tr>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</template>
  
<script>
import axios from 'axios'


export default {
    name: 'estudante',
    data() {
        return {
            estudante: []
        }
    },
    mounted() {

        this.getEstudante();
        //console de teste dps
    },
    methods: {
        getEstudante() {
            axios.get('http://127.0.0.1:8000/api/estudante/').then(res => {
                this.estudante = res.data.estudante
                //  console.log(this.estudante)
            })
        }
    }
}
</script>
