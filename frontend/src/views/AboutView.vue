
<template>
  <div className="container text-center" style="width: 30rem;">
    <div class="row">
      <!-- {filmes.map((filme, i) => ( -->
      <div className="col" key={i}>
        <div className="card">
          <img src="../assets/setuptecnologia.png" className="card-img-top" />
          <div className="card-body">
            <h5 className="card-title">Setup Tecnologia </h5>
            <p>Empresa</p>

            <a href="https://www.setuptecnologia.com.br" className="btn btn-primary" target="">Ver Empresa</a>
          </div>
        </div>
      </div>
      <!-- ))} -->+
    </div>
  </div>
</template>


<!-- <script>
new Vue({
        el: '#app',
        data: {
            link: 'http://google.com.br',
            linkhtml: '<a href="http://google.com.br"> google 2</a>'
        },
        methods: {
            saudacao: function () {
                this.titulo = 'bom dia!!!'
                return this.titulo
            }
        },

    })
</script> -->

