<template> 
        <div>
            <div class="resume-content mr-auto">
              <h3 class="mb-0">{{ experience.job_title }}</h3>
              <div class="subheading mb-3">{{ experience.company }}</div> <br>
              <p class="medi">{{ experience.responsibilities }}</p>
            </div>
            <div class="resume-date text-md-right">
              <span class="text-primary">{{ experience.start_date }} - {{ experience.end_date }}</span>
            </div>
              <div class="pull-right" style="margin-top: 60px" v-if="is_loggedin">
               <a href="#addInfo" @click.prevent = "update">  <span class="fa-stack fa-lg">
                  <i class="fa fa-circle fa-stack-2x"></i>
                  <i class="fa fa-edit fa-stack-1x fa-inverse"></i>
                </span></a>
              <a href="#" @click.prevent = "del(experience.id)">           
                <span class="fa-stack fa-lg">
                  <i class="fa fa-circle fa-stack-2x"></i>
                  <i class="fa fa-trash fa-stack-1x fa-inverse"></i>
                </span>
              </a>
            </div>
             <div class="pull-right" style="margin-top: 60px" v-if="!is_loggedin">
               <a href="#addInfo" @click.prevent = "update">  <span class="fa-stack fa-lg">
                  <i class="fa fa-circle fa-stack-2x"></i>
                  <i class="fa fa-edit fa-stack-1x fa-inverse"></i>
                </span></a>
              <a href="#" @click.prevent = "del(experience.id)">           
                <span class="fa-stack fa-lg">
                  <i class="fa fa-circle fa-stack-2x"></i>
                  <i class="fa fa-trash fa-stack-1x fa-inverse"></i>
                </span>
              </a>
            </div>
         </div>
           
  </template>
    <script>
      function Experience({ id,job_title,company,responsibilities,start_date,end_date,user_id,created_at,updated_at}) {
          this.id = id;
          this.job_title = job_title;
          this.company = company;
          this.responsibilities = responsibilities;
          this.start_date = start_date;
          this.end_date = end_date;
          this.user_id = user_id;
          this.created_at = created_at;
          this.updated_at = updated_at;
      }

    export default {
        data(){
          return{
            is_loggedin: false,
            showform: false,
          }
        },
        props: {
           experience: Experience
        },

        created(){
          if(window.auth_user !== null){
               this.is_loggedin = true;
           }
          
        },
       
        methods:{
          update(){
            this.$emit('showEditForm',this.experience);
          },
         
          del(){
            console.log(this.experience);
            this.$emit('del',this.experience.id);
          },
        },

       
    }
   </script>
   <style type="text/css">
      .medi{
        font-size: 20px;
      }
      .resume-item{
        border-bottom: 2px solid #FFDAB9;
      }
   </style>