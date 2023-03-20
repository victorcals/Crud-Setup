<template>
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <div class="container mt - 5">
        <div class="card">
            <div class="card-header">

                <h4>Editar</h4>
            </div>
            <div class="card-body">


                <ul class="alert alert-warning" v-if="Object.keys(this.errorListe).length > 0">
                    <li class="mb-0 ms-3" v-for="(error, index) in this.errorListe" :key="index">
                        {{ error[0] }}
                    </li>
                </ul>


                <div class="mb-3">
                    <label for="">Nome</label>
                    <input type="text" class="form-control" v-model="model.estudante.nome">
                </div>
                <div class="mb-3">
                    <label for="">cpf</label>
                    <input type="text" class="form-control" v-model="model.estudante.cpf">
                </div>
                <div class="mb-3">
                    <label for="">email</label>
                    <input type="text" class="form-control" v-model="model.estudante.email">
                </div>
                <h4>Prencha o endereço</h4>
                <div class="mb-3">
                    <label for="">rua</label>
                    <input type="text" class="form-control" v-model="model.estudante.rua">
                </div>
                <div class="mb-3">
                    <label for="">bairro</label>
                    <input type="text" class="form-control" v-model="model.estudante.bairro">
                </div>
                <div class="mb-3">
                    <label for="">numero</label>
                    <input type="text" class="form-control" v-model="model.estudante.numero">
                </div>
                <div class="mb-3">
                    <label for="">complemento</label>
                    <input type="text" class="form-control" v-model="model.estudante.complemento">
                </div>
                <div class="mb-3">
                    <button type="button" @click="editarEstudante($route.params.id)" class="btn btn-primary">Editar</button>

                    <Button class="btn btn-dark">
                        <RouterLink class=" nav-link active" to="/"> voltar pra home</RouterLink>
                    </Button>



                </div>
            </div>
        </div>
    </div>
</template>

<script>


import axios from 'axios';

export default {
    name: 'estudanteEditar',
    data() {
        return {
            errorListe: {},
            model: {
                estudante: {
                    nome: '',
                    email: '',
                    cpf: '',
                    rua: '',
                    bairro: '',
                    numero: '',
                    complemento: '',
                }
            },
            estudanteId: null,
        }
    },
    mounted() {
        this.getEstudanteData(this.$route.params.id)
        this.estudanteId = this.$route.params.id;
    },
    methods: {
        getEstudanteData(estudanteId) {
            const url = `http://127.0.0.1:8000/api/estudante/${estudanteId}/editar`;
            axios.get(url)
                .then(res => {
                    this.model.estudante = res.data.estudante
                })
                .catch(function (error) {
                    if (error.response) {
                        if (error.response.status == 404) {
                            alert(error.response.data.message)
                        }
                    } else if (error.request) {
                        console.log(error.request);
                    } else {
                        console.log('Error', error.message);
                    }
                    console.log(error.config);
                });
        },
        editarEstudante() {
            let validador = this;
            axios.put(`http://127.0.0.1:8000/api/estudante/${this.estudanteId}/update`, this.model.estudante)
                .then(res => {
                    console.log(res)
                    alert(res.data.message)
                })
                .catch(function (error) {
                    if (error.response) {
                        if (error.response.status == 422) {
                            validador.errorListe = error.response.data.error;
                        }
                        if (error.response.status == 404) {
                            alert(error.response.data.message)
                        }
                        console.log(error.response.data);
                        console.log(error.response.status);
                        console.log(error.response.headers);
                    } else if (error.request) {
                        console.log(error.request);
                    } else {
                        console.log('Error', error.message);
                    }
                    console.log(error.config);
                });
        }
    }
}


</script>