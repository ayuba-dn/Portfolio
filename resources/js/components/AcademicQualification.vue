<template>
       <div>
           <div class="resume-content mr-auto">
              <h3 class="mb-0">{{ academic_qualification.institution }}</h3>
              <div class="subheading mb-3">{{ academic_qualification.degree_type }}</div>
              <p class="medi">Course: {{ academic_qualification.course }}</p>
              <p class="medi">GPA: {{ academic_qualification.gpa }}</p>
            </div>
            <div class="resume-date text-md-right">
              <span class="text-primary">{{ academic_qualification.start_date }} - {{ academic_qualification.end_date }}</span> 
            </div>
            <div class="pull-right" style="margin-top: 60px" v-if="is_loggedin">
               <a href="#addInfo" @click.prevent = "update">  <span class="fa-stack fa-lg">
                  <i class="fa fa-circle fa-stack-2x"></i>
                  <i class="fa fa-edit fa-stack-1x fa-inverse"></i>
                </span></a>
              <a href="#" @click.prevent = "del(academic_qualification.id)">           
                <span class="fa-stack fa-lg">
                  <i class="fa fa-circle fa-stack-2x"></i>
                  <i class="fa fa-trash fa-stack-1x fa-inverse"></i>
                </span>
              </a>
            </div>
          
          </div>
</template>
    <script>
      function Education({ id,institution,degree_type,course,gpa,start_date,end_date,user_id,created_at,updated_at}) {
          this.id = id;
          this.institution = institution;
          this.degree_type = degree_type;
          this.course = course;
          this.gpa = gpa;
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
            showform: false
          }
        },
        props: {
           academic_qualification: Education
        },

        created(){
          if(window.auth_user !== null){
               this.is_loggedin = true;
           }
          
        },
       
        methods:{
          update(){
            this.$emit('showEditForm',this.academic_qualification);
          },
          create(education){
             this.$emit('')
          },
          del(){
            this.$emit('del',this.academic_qualification.id);
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