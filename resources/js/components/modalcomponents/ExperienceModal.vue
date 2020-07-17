<template>
<div id="edit-modal" class="modal fade" role="dialog"  >
    <div class="modal-dialog">
      <div class="modal-content">
       
        <div class="modal-body">
             <button  aria-hidden="true" data-dismiss="modal" class="close pull-right" type="button">×</button>
                        <h6 class="message">{{ title }}</h6>

             <form action="/experience/add" method="post" >
                  <div class="form-group">
                    <label for="exampleFormControlInput1">Organisation</label>
                    <input type="text" class="form-control" id="exampleFormControlInput1"   v-model="experience_to_edit.company">
                  </div>
                   <div class="form-group">
                    <label for="exampleFormControlInput1"> Job Title</label>
                    <input type="text" class="form-control" id="exampleFormControlInput1" v-model="experience_to_edit.job_title">
                  </div>
                   <div class="form-group">
                    <label for="exampleFormControlInput1">Responsibilities</label>
                    <textarea class="form-control" rows="6"  class="form-control"  v-model="experience_to_edit.responsibilities"></textarea>
                  </div>
                  
                  <div class="form-group">
                    <label for="exampleFormControlInput1">Start Date</label>
                    <input type="date" name="start_date" class="form-control"  v-model="experience_to_edit.start_date">
                  </div>
                   <div class="form-group">
                    <label for="exampleFormControlInput1">End Date</label>
                    <input type="date" name="start_date" class="form-control"  v-model="experience_to_edit.end_date">
                  </div>
                 
                  <button v-if = "adding" @click.prevent = "addExperience" class="btn btn-info pull-right"><i class="fa fa-save"></i> Add</button>
                  <button v-else  @click.prevent = "updateExperience" class="btn btn-info pull-right"><i class="fa fa-save"></i> update</button>
                 <!--  -->
            </form>
          <div class="modal-footer">
             
          </div>
        </div>
      </div>
    </div>
  </div>
</template>
<script type="text/javascript" >
     export default {
        methods: {
          updateExperience(){
            this.$emit('updateExperience');
          },
          addExperience(){
            this.$emit('addExperience');
          }
        },
        props: ['title','adding','experience_to_edit'],
      }
</script>
<style type="text/css" scoped>
   
    .modal-dialog{
      border-radius: 23px;
    }
    .modal{
      border-radius: 23px;
    }
    .message{
      font-size: 30px;
    }
</style>