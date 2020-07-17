<template>
    <div class="container">
       <div class="row">
          <div class="col-md-12">
              <form v-if="showform" @submit.prevent="update" style="margin-top: 60px">
                  <div class="form-group">
                    <h3 class="text-primary">Edit Details</h3>
                    <label for="exampleFormControlInput1">FirstName</label>
                    <input type="text" class="form-control" id="exampleFormControlInput1"  v-model="user.name">
                  </div>
                   <div class="form-group">
                    <label for="exampleFormControlInput1"> SurName</label>
                    <input type="text" class="form-control" id="exampleFormControlInput1" v-model="user.surname">
                  </div>
                   <div class="form-group">
                    <label for="exampleFormControlInput1">Email</label>
                    <input type="text" class="form-control"  v-model="user.email">
                  </div>
                   <div class="form-group">
                    <label for="exampleFormControlInput1">Address</label>
                    <input type="text" class="form-control"  v-model="user.location">
                  </div>
                 
                  <div class="form-group">
                    <label for="exampleFormControlTextarea1">Personal Summary</label>
                    <textarea class="form-control"  rows="3" v-model="user.personal_summary"></textarea>
                  </div>
                  <button class="btn btn-info pull-right"><i class="fa fa-save"></i> update</button>
            </form>
          </div>
       </div>
         <section class="resume-section p-3 p-lg-5 d-flex d-column" id="about">
        <div class="my-auto">
          <div v-if="!showform">
              <h1 class="mb-0">{{ user.name }}
                <span class="text-primary">{{ user.surname }}</span>
              </h1>
              <div class="subheading mb-5">{{ user.location }}
                <a href="mailto:name@email.com"> {{ user.email }}</a>
              </div>
              <p class="mb-5 medi"> {{ user.personal_summary }}</p>
               <ul class="list-inline list-social-icons mb-0" v-if="loaded"> 
            <li class="list-inline-item">
              <a href="#">
                <span class="fa-stack fa-lg">
                  <i class="fa fa-circle fa-stack-2x"></i>
                  <i class="fa fa-facebook fa-stack-1x fa-inverse"></i>
                </span>
              </a>
            </li>
            <li class="list-inline-item">
              <a href="#">
                <span class="fa-stack fa-lg">
                  <i class="fa fa-circle fa-stack-2x"></i>
                  <i class="fa fa-twitter fa-stack-1x fa-inverse"></i>
                </span>
              </a>
            </li>
            <li class="list-inline-item">
              <a href="#">
                <span class="fa-stack fa-lg">
                  <i class="fa fa-circle fa-stack-2x"></i>
                  <i class="fa fa-linkedin fa-stack-1x fa-inverse"></i>
                </span>
              </a>
            </li>
            <li class="list-inline-item">
              <a href="#">
                <span class="fa-stack fa-lg">
                  <i class="fa fa-circle fa-stack-2x"></i>
                  <i class="fa fa-github fa-stack-1x fa-inverse"></i>
                </span>
              </a>
            </li>
          </ul>
              <button v-if = "is_loggedin" class="btn btn-secondary pull-right" @click = "showform = true"> <i class="fa fa-edit"></i> edit</button>

          </div>
         
         
          
           <div v-if = "!loaded">
              <img src="/img/loader.gif">
          </div>
         
        </div>
      </section>
    </div>

</template>

<script>
    export default {
        data() {
          return{
            user: [],
            loaded: false,
            is_loggedin: false,
            showform: false
          }
        },
        mounted() {
            axios.get('/personal_summary').then(response =>{
             this.user = response.data; 
             this.loaded = true;
             if(window.auth_user !== null){
               this.is_loggedin = true;
             };
           });
           
        },
        methods: {
          update(){
              let uri = '/personal_summary/update';
              axios.post(uri, this.user).then((response) => {
                 console.log(response);
                 this.$notification.success("Details Updated Successfully", {  timer: 10 });

                 this.showform = false; 

              }).catch(error => {
                   console.log(error.response);
              });
               
             
          }
        }
    }
</script>
