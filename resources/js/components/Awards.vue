<template>
<section class="resume-section p-3 p-lg-5 d-flex flex-column" id="awards">
        <div class="my-auto">
          <h2 class="mb-5 text-primary" v-if="mounted">{{ title }}</h2>
           
          <ul class="fa-ul mb-0" >
            <li v-for = "award in awards">
              <i class="fa-li fa fa-trophy text-warning"></i>
              {{ award.award_title }}</li>
           
          </ul>
        </div>
          <div v-if = "!mounted">
              <img src="/img/loader.gif">
          </div>
          
      </section>
</template>
  <script>
    export default {
        data() {
          return{
            awards: [],
            loading: false,
            title: 'Awards and Certifications',
            mounted: false
          }
        },
        created() {
            this.loading = true;
            axios.get('/awards').then(response => { this.awards = response.data;
            this.mounted = true; });
           
        },
       
    }
   </script>
    <style type="text/css">
      .fade-enter-active,
     .fade-leave-active {
        transition-duration: 0.3s;
        transition-property: opacity;
        transition-timing-function: ease;
      }

      .fade-enter,
      .fade-leave-active {
        opacity: 0
      }
  </style>
