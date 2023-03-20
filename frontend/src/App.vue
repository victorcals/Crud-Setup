<script setup>
import { RouterLink, RouterView } from 'vue-router'
import Setup from './components/Setup.vue';
import HelloWorld from './components/Setup.vue'
import TheWelcome from './components/TheWelcome.vue';

</script>

<template>
  <header>

    <div class="wrapper">

      <nav class="navbar navbar-expand-lg " data-bs-theme="dark" style="background-color: #52223c;">
        <div class="container">

          <RouterLink class="navbar-brand" to="/">Navbar</RouterLink>


          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <RouterLink class="nav-link active" to="/">>Home</RouterLink>
              </li>

              <li class="nav-item">
                <RouterLink class="nav-link" to="/about">sobre o sistma</RouterLink>
              </li>

              <li class="nav-item">
                <RouterLink class="nav-link" to="/estudante">Cadastro</RouterLink>
              </li>

            </ul>

          </div>
        </div>
      </nav>


    </div>
  </header>

  <RouterView />




  <!-- <Setup /> -->
  <TheWelcome />
</template>


