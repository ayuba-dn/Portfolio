<template>
<div id="delete-modal" class="modal fade" role="dialog"  >
    <div class="modal-dialog">
      <div class="modal-content">
       
        <div class="modal-body">
        
          <div class="modal-footer">
             <h6 class="message">{{ message }}</h6>

             <form>
                <button @click = "comfirmDelete" type="button" class="del btn btn-success comfirmdelete btn-sm" data-dismiss="modal" >
                   Yes
                </button>
            </form>
            <a class = "btn  btn-warning btn-sm" href="/product/cart" data-dismiss="modal"> No </a>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>
<script type="text/javascript" >
     export default {
        data() {
          return{
            message1: "Are you sure You want to delete this item?"
          }
        }, 
        props: ['message'],
        methods: {
          comfirmDelete(){
            this.$emit('comfirmDelete');
          },
        }
      }
</script>
<style type="text/css" scoped>
    .modal-body{ 
      background-color: #BD5D38;
    }
    .modal-dialog{
      border-radius: 23px;
    }
    .modal{
      border-radius: 23px;
    }
    .message{
      color: white; font-size: 20px;
    }
</style>