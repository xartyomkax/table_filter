<template>
    <form @submit.prevent="subscribe">
        <div class="row">
            <label for="recipient" class="col-3">Recipient</label>
            <input id="recipient" class="col-6" type="text" v-model="recipient">
            <div class="col-3">
                <button type="submit">Subscribe to notifications</button>
            </div>
        </div>
    </form>
</template>

<script>
  import axios from 'axios'
  export default {
    data() {
      return {
        recipient: ''
      }
    },
    methods: {
      subscribe(){
        if(this.recipient.trim()) {
          axios.post('http://localhost:8081/sender/subscribe',{ recipient: this.recipient})
              .then(function(response){
                if(response.data.status){
                  alert(this.recipient + ' email has been added')
                  this.recipient = ''
                }
              }.bind(this))
              .catch(error => console.error(error))
        }
      }
    }
  }
</script>