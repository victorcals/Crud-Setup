<template>
    <div class="container mt - 5">
        <div class="card">
            <div class="card-header">

                <h4>ADd</h4>
            </div>
            <div class="card-body">


                <ul class="alert alert-info" role="alert" v-if="Object.keys(this.errorListe).length > 0">
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
                    <button type="button" @click="saveEstudante" class="btn btn-primary">Enviar</button>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import axios from 'axios';
// import { ErrorCodes } from 'vue'; ESSA MERDA FAZ DA TELA BRANCA 

export default {
    name: 'estudanteCreate',
    data() {
        return {
            errorListe: '',
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
            }
        }
    },
    methods: {
        saveEstudante() {
            var validador = this;
            axios.post('http://127.0.0.1:8000/api/estudante', this.model.estudante)
                .then(res => {
                    console.log(res)
                    alert(res.data.message)
                    this.model.estudante = {
                        nome: '',
                        email: '',
                        cpf: '',
                        rua: '',
                        bairro: '',
                        numero: '',
                        complemento: '',
                    }
                })
                .catch(function (error) {
                    if (error.response) {
                        if (error.response.status == 422) {
                            validador.errorListe = error.response.data.error;
                        }
                        // console.log(error.response.data);
                        // console.log(error.response.status);
                        // console.log(error.response.headers);
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