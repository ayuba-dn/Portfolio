<template> 
 <section class="resume-section p-3 p-lg-5 d-flex flex-column" id="experience">
        <div class="my-auto">
          <div v-if= "loaded">
          <h2 class="mb-5 text-primary">Experience</h2>
           <button @click = "adding = true" v-if="is_loggedin" data-toggle = "modal" data-target="#edit-modal" class="btn btn-default pull-right"> <span class="pink"><i class="fa fa-plus"></i> add </span></button> 
           <br><br>
           </div>
           <div v-if = "!loaded">
              <img src="/img/loader.gif">
         </div>

        <div>
          <experience-item class="resume-item d-flex flex-column flex-md-row mb-5"
                           v-for="experience in experiences"
                           v-bind:experience="experience"
                           @showEditForm="showEditForm"
                           @del="deleteExperience"
                           :key = "experience.id">
            
          </experience-item>
          <delete-modal message="Are you sure you want to delete this Experience"
                        @comfirmDelete = "comfirmDelete">
            
          </delete-modal>
          <edit-modal :title = "modal_title"
                      :adding = "adding"
                      :experience_to_edit = "experience_to_edit" 
                      @addExperience = "addExperience"
                      @updateExperience = "updateExperience">
          </edit-modal>
         </div>
        </div>
       
   </section>
      </template>

  <script>
    import ExperienceItem from './ExperienceItem.vue';
    import DeleteModal from './DeleteModal.vue';
    import EditModal from './modalcomponents/ExperienceModal.vue';
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
        data() {
          return{
            experiences: [],
            experience_to_edit: {},
            loaded:false,
            delete_id: 1,
            is_loggedin: false,
            adding:false,
            modal_title: "Edit Experience Details"

          }
        },
        mounted() {
             axios.get('/experience').then(({data}) => { 
              data.forEach(experience => {
                 this.experiences.push(new Experience(experience));
             });
              this.loaded = true;
              if(window.auth_user !== null){
               this.is_loggedin = true;
              }
            });
         },
         methods:{
           showEditForm(experience){
              this.experience_to_edit = experience;
             // console.log()
              this.adding = false;
              $("#edit-modal").modal('show');
           },
           deleteExperience(id){
            console.log(id);
               this.delete_id = id;
              $("#delete-modal").modal("show");
           },
           comfirmDelete(){
              let uri = "/experience/delete/"+this.delete_id+"";
            axios.get(uri).then((response) => {
                var foundIndex = this.experiences.findIndex(x => x.id == this.delete_id);
                this.experiences.splice(foundIndex,1);
                $('#delete-modal').modal('hide');
                this.$notification.success("Deleted Successfully", {  timer: 3 });
            }).catch(error => {
                  console.log(error.response);
                   this.$notification.error("Unable to Delete, pls try again", {  timer: 10 });
              });
           },
           addExperience(){
               let uri = "/experience/add";
               console.log(this.experience_to_edit);
               axios.post(uri, this.experience_to_edit).then((response) => {
                                 console.log(response);

                this.experiences.push(new Experience(this.experience_to_edit));
                  $('#edit-modal').modal('hide');
                   this.$notification.success("Record added Successfully", {  timer: 10 });
              }).catch(error => {
                   this.$notification.error("Unable to add record, please try again", {  timer: 10 });
              });
           },
           updateExperience(){
                 let uri = "/experience/update";
                 axios.post(uri, this.experience_to_edit).then((response) => {
                 console.log(response);
                var foundIndex = this.experiences.findIndex(x => x.id == this.experience_to_edit.id);
                console.log(this.experiences[foundIndex]);
                this.experiences[foundIndex] = new Experience(this.experience_to_edit);
                console.log(this.experiences[foundIndex]);
                 $("#edit-modal").modal('hide');
                  this.$notification.success("Details Updated Successfully", {  timer: 10 });
              }).catch(error => {
                  console.log(error.response);
                   this.$notification.error("Unable to Update Details", {  timer: 10 });
              });
           }

         },
          components:{
            ExperienceItem,
            DeleteModal,
            EditModal
          },
           watch: {
              adding: function () {
                if(this.adding == true){
                   this.experience_to_edit = [];
                   this.modal_title = "Enter Experience Details";
                }
    }
  },
    }
</script>
<style type="text/css">
     .medi{
        font-size: 17px;
      }
</style>