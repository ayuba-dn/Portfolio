<template>
<section class="resume-section p-3 p-lg-5 d-flex flex-column" id="interests">
        <div class="my-auto">
          <h2 class="mb-5 text-primary" v-if="loaded">Interests</h2>
          <div v-if = "!loaded">
              <img src="/img/loader.gif">
          </div>
          <ul class="fa-ul mb-0" >
            <li v-for = "interest in interests">
              <i class="fa-li fa fa-trophy text-warning"></i>
              {{ interest.interest }}</li>
           
          </ul>
        </div>
      </section>
</template>
  <script>
    export default {
        data() {
          return{
            interests: [],
            loaded:false
          }
        },
        created() {
            axios.get('/interests').then(response => { 
              this.interests = response.data; 
              this.loaded = true;

            });
             
        }
    }
   </script>
  
