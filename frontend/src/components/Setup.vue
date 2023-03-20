

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

<style scoped>
h1 {
  font-weight: 500;
  font-size: 2.6rem;
  top: -10px;
}

h3 {
  font-size: 1.2rem;
}

.greetings h1,
.greetings h3 {
  text-align: center;
}

@media (min-width: 1024px) {

  .greetings h1,
  .greetings h3 {
    text-align: left;
  }
}
</style>
