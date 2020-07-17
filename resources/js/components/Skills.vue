<template>
  <section class="resume-section p-3 p-lg-5 d-flex flex-column" id="skills">
        <div class="my-auto">
          <h2 class="mb-5 text-primary">Skills</h2>

          <div class="subheading mb-1" v-if="loaded">Programming Languages &amp; Tools <br>
               <button v-if="!addskill" @click = "addskill = true" class="btn btn-secondary pull-right">add <i class="fa fa-plus"></i></button>
                  <form class="p-1 p-lg-2" v-else action="/skills/add" method="post" >
                  <div class="form-group">
                    <label for="exampleFormControlInput1">Skill</label>
                    <input type="text" class="form-control" placeholder="e.g Vuejs" name="skill" v-model = "new_skill.skill_name">
                  </div>
                 
                  <button  @click.prevent = "addSkill" class="btn btn-info pull-right"><i class="fa fa-save"></i> Submit</button>
                
                  <!--  -->
               </form>
          </div>

          <ul class="list-inline list-icons" >
            <li class="list-inline-item" v-for = "skill in skills">
              <i  :class="['devicon-'+skill.skill_name+'-plain colored skill']"></i>
               <p> {{skill.skill_name}}  <a  href="#delete-modal" @click.prevent = "comfirmModal(skill.id,'skill')"><i class="fa fa-trash"></i></a> </p>
            </li>
           
          </ul>
           <div v-if = "!loaded">
              <img src="/img/loader.gif"> 
          </div>

          <div class="subheading mb-3" v-if="loaded">Other Abilities/Strengths</div>
           <button v-if="!addability" @click = "addability = true" class="btn btn-secondary pull-right top-element">Add Ability<i class="fa fa-plus "></i></button>
            <form class="p-1 p-lg-2" v-else action="/abilities/add" method="post" >
                  <div class="form-group">
                    <label for="exampleFormControlInput1">Ability</label>
                    <input type="text" class="form-control" placeholder="e.g Agile System Development" name="ability" v-model = "new_ability.ability">
                  </div>
                 
                  <button style="" @click.prevent = "addAbility" class="btn btn-info pull-right top-element"><i class="fa fa-save"></i> Submit</button>
                
                  <!--  -->
               </form>
          <ul class="fa-ul mb-0" >
            <li v-for = "ability in abilities">
              <i class="fa-li fa fa-check"></i>
              {{ability.ability}} 
             <a  href="#delete-modal" @click.prevent = "comfirmModal(ability.id,'ability')"><i class="fa fa-trash"></i></a>
           </li>
          </ul>
        </div>
         <delete-modal message="Are you sure you want to delete this Item"
                        @comfirmDelete = "deleteSkill">
            
          </delete-modal>
      </section>
</template>
 <script>
    import DeleteModal from './DeleteModal.vue';
     function Skill({ id,skill_name}){
          this.id = id;
          this.skill_name = skill_name;
         
      }
      function Ability({id,ability}){
          this.id = id;
          this.ability = ability;
      }
    export default {
        data() {
          return{
            skills: [],
            abilities: [],
            loaded: false,
            delete_id: 1,
            addskill: false,
            addability: false,
            delete_type: "",
            new_skill: {},
            new_ability: {},
            noti_msg: "",
          }
        },
        mounted() {
            axios.get('/skills').then(({data}) => { 
               data.forEach(skill => {
                 this.skills.push(new Skill(skill));
             });
              this.loaded = true;

            });
             axios.get('/abilities').then(({data}) => { 
               console.log(data);
               data.forEach(ability => {
                 this.abilities.push(new Ability(ability));
             });

            });
        },
        methods: {
          addSkill(){
              console.log(this.new_skill);
              let uri = "/skills/add";
               axios.post(uri, this.new_skill).then((response) => {
               
                this.skills.push(new Skill(this.new_skill));
                   this.$notification.success("Record added Successfully", {  timer: 10 });
              }).catch(error => {
                    console.log(error);
                   this.$notification.error("Unable to add record, please try again", {  timer: 10 });
              });
          },
          addAbility(){
              console.log(this.new_ability);
              let uri = "/abilities/add";
               axios.post(uri, this.new_ability).then((response) => {
                this.abilities.unshift(new Ability(this.new_ability));
                   this.$notification.success("Record added Successfully", {  timer: 10 });
              }).catch(error => {
                    console.log(error);
                   this.$notification.error("Unable to add record, please try again", {  timer: 10 });
              });
          },
          comfirmModal(delete_id,delete_type){
            this.delete_id = delete_id;
            this.delete_type = delete_type;
            $("#delete-modal").modal("show");
          },
          deleteSkill(){
              alert(this.delete_type);
              if(this.delete_type == 'skill'){
              let uri = "/skills/delete/"+this.delete_id+"";
              axios.get(uri).then((response) => {
                   var foundIndex = this.skills.findIndex(x => x.id == this.delete_id);
                    this.skills.splice(foundIndex,1);
                    this.$notification.success("Deleted Successfully", {  timer: 3 });
              }).catch(error => {
                 $("#delete-modal").modal("hide");
                 this.$notification.error("Unable to Delete", {  timer: 3 });

              });
              }
              else if(this.delete_type == 'ability'){
                 let uri = "/abilities/delete/"+this.delete_id+"";
                 axios.get(uri).then((response) => {
                   var foundIndex = this.abilities.findIndex(x => x.id == this.delete_id);
                    this.abilities.splice(foundIndex,1);
                    this.$notification.success("Deleted Successfully", {  timer: 3 });
                 }).catch(error => {
                 $("#delete-modal").modal("hide");
                 this.$notification.error("Unable to Delete", {  timer: 3 });

              });
              }
          },
          deleteAbility(){
              let uri = "/abilities/delete/"+this.delete_id+"";
              axios.get(uri).then((response) => {
                   //$("#delete-modal").modal("hide");
                   var foundIndex = this.abilities.findIndex(x => x.id == this.delete_id);
                    this.abilities.splice(foundIndex,1);
                    this.$notification.success("Deleted Successfully", {  timer: 3 });
              }).catch(error => {
                 //$("#delete-modal").modal("hide");
                 this.$notification.error("Unable to Delete", {  timer: 3 });

              });
          }
        },

        components:{
            
            DeleteModal
            
          },
        
      }
   </script>
   <style type="text/css">
     p{
        font-size: 15px;
        margin-top: -20px;
     }
     .skill{

     }
     .top-element{
      position:relative;z-index:1
     }

   </style>