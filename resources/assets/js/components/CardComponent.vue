<template> 
  <div class="row">
    <div v-bind:class="size">
      <div v-bind:class="color" class="card">
        <div v-bind:class="text" class="card-content">
            <span class="card-title">
              <slot name="title"></slot>
            </span>
            <p>
              <slot name="body"></slot>
            </p>

            <br>
            

        </div>
      </div>
    </div>
  </div>
</template>

<script>

    export default {

        data () {
            return {
                date : '',
            }
        },
        props : ['size','color','text'],
        created () {
            this.getDate()
        },
        methods : {
            getDate() {
                var today = new Date();
                var dd = today.getDate();
                var mm = today.getMonth()+1; //January is 0!
                var yyyy = today.getFullYear();

                if(dd<10) {
                    dd = '0'+dd
                } 

                if(mm<10) {
                    mm = '0'+mm
                } 

                today = mm + '/' + dd + '/' + yyyy;

                this.date = today;
                
            }
        }
    
    }
</script>
