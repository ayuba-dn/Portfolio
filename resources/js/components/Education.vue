<template>
  <div>
   <section class="resume-section p-3 p-lg-5 d-flex flex-column" id="education">
    
     <DeleteModal @comfirmDelete = "deleteComfirmed" message = "Are you sure you want to delete this item?"></DeleteModal>
        <div class="my-auto">
          <div v-if="loaded">
              <h2 class="mb-5 text-primary" >{{title}}</h2>
              <button @click = "adding = !adding" v-if="is_loggedin" data-toggle = "modal" data-target="#editModal" class="btn btn-default pull-right"> <span class="pink"><i class="fa fa-plus"></i> add </span></button>
          </div>
          <div v-if="is_loggedin">
             <br>
             <hr>
          </div> 
          
          <academic-qualification  class="resume-item d-flex flex-column flex-md-row" 
                                   v-for="education in educations"
                                   v-bind:academic_qualification="education"
                                   @showEditForm = "showEditForm"
                                   @del = "del"
                                   :key="education.id">
               
          </academic-qualification>   
         
          <div v-if = "!loaded">
              <img src="/img/loader.gif">
          </div>
        </div>
      </section>
        <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="editModal" class="modal fade">
              <div class="modal-dialog">
                    <div class="modal-content">
                           <div class="modal-header">
                             <h3 class="text-primary" v-if="adding">Add Details</h3> 
                             <h3 class="text-primary" v-else >Edit Details</h3> 
                             <button @click = "adding = !adding" aria-hidden="true" data-dismiss="modal" class="close pull-right" type="button">×</button>
                           </div>
                <div class="modal-body">

                <form >
                  <div class="form-group">
                    <label for="exampleFormControlInput1">Institution</label>
                    <input type="text" class="form-control" id="exampleFormControlInput1"   v-model="edit_qualification.institution">
                  </div>
                   <div class="form-group">
                    <label for="exampleFormControlInput1"> Degree Type</label>
                    <input type="text" class="form-control" id="exampleFormControlInput1" v-model="edit_qualification.degree_type">
                  </div>
                   <div class="form-group">
                    <label for="exampleFormControlInput1">Course</label>
                    <input type="text" class="form-control"  v-model="edit_qualification.course">
                  </div>
                   <div class="form-group">
                    <label for="exampleFormControlInput1">CGPA</label>
                    <input type="text" class="form-control"  v-model="edit_qualification.gpa">
                  </div>
                  <div class="form-group">
                    <label for="exampleFormControlInput1">Start Date</label>
                    <input type="date" name="start_date" class="form-control"  v-model="edit_qualification.start_date">
                  </div>
                   <div class="form-group">
                    <label for="exampleFormControlInput1">End Date</label>
                    <input type="date" name="start_date" class="form-control"  v-model="edit_qualification.end_date">
                  </div>
                 
                  <button v-if = "adding" @click.prevent = "submitEducation" class="btn btn-info pull-right"><i class="fa fa-save"></i> Add</button>
                  <button v-else  @click.prevent = "update" class="btn btn-info pull-right"><i class="fa fa-save"></i> update</button>
                 
            </form>
      </div>
                                </div>
                            </div>
                        </div>
       </div>
      </template>
   
    <script>
     

    import AcademicQualification from './AcademicQualification.vue';
    import DeleteModal from './DeleteModal.vue';
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
        data() {
          return{
            educations: [],
            title: 'Education',
            loaded: false,
            is_loggedin: false,
            edit_qualification: {},
            delete_id: 1,
            adding: false
          }
        },
        created() {
            axios.get('/education').then(({data}) => { 
              data.forEach(education => {
                 this.educations.push(new Education(education));

             });
              this.loaded = true;
              if(window.auth_user !== null){
               this.is_loggedin = true;
              }
            });
        },
        methods:{
          showEditForm(education){
            this.edit_qualification = education;
            $("#editModal").modal('show');

          },
          update(){
            let uri = "/education/update";
            axios.post(uri, this.edit_qualification).then((response) => {
                 console.log(response);
                var foundIndex = this.educations.findIndex(x => x.id == this.edit_qualification.id);
                console.log(this.educations[foundIndex]);
                this.educations[foundIndex] = new Education(this.edit_qualification);
                console.log(this.educations[foundIndex]);
                 $("#editModal").modal('hide');
                  this.$notification.success("Details Updated Successfully", {  timer: 10 });
              }).catch(error => {
                  console.log(error.response);
                   this.$notification.error("Unable to Update Details", {  timer: 10 });
              });
               
          },
          del(id){
            this.delete_id = id;
            $('#delete-modal').modal('show');
          },
         
          submitEducation(){
            let uri = "/education/add";
            axios.post(uri, this.edit_qualification).then((response) => {
                this.educations.push(new Education(this.edit_qualification));
                  $('#editModal').modal('hide');
                   this.$notification.success("Record added Successfully", {  timer: 10 });
              }).catch(error => {
                   this.$notification.error("Unable to add record, please try again", {  timer: 10 });
              });
               
          },
          deleteComfirmed(){
            let uri = "/education/delete/"+this.delete_id+"";
            axios.get(uri).then((response) => {
                var foundIndex = this.educations.findIndex(x => x.id == this.delete_id);
                this.educations.splice(foundIndex,1);
                $('#delete-modal').modal('hide');
                this.$notification.success("Deleted Successfully", {  timer: 10 });
            }).catch(error => {
                  console.log(error.response);
                   this.$notification.error("Unable to Delete, pls try again", {  timer: 10 });
              });
          },
        },
       

 components:{
      AcademicQualification,
      DeleteModal
 },
 watch: {
    adding: function () {
      if(!this.adding){
         edit_qualification = [];
      }
    }
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
      .pink{
        color: #BD5D38;
      }
   </style>