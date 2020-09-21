<template>
    <form @submit.prevent="sendMessage">
        <div class="row">
            <label for="message" class="col-3">Message</label>
            <textarea id="message" class="col-6" v-model="message"></textarea>
            <div class="col-3">
                <button type="submit">Notify subscribers with message</button>
            </div>
        </div>
    </form>
</template>

<script>
  import axios from 'axios';
  export default {
    data() {
      return {
        message: ''
      }
    },
    methods: {
      sendMessage(){
        if(this.message.trim()) {
          axios.post('http://localhost:8081/sender/message',{ message: this.message})
              .then(function(response){
                if(response.data.emails){
                  const emails = response.data.emails.join(',')
                  alert(' Your message was sended to ' + emails)
                  this.message = ''
                }
              }.bind(this))
              .catch(error => console.error(error))
        }
      }
    }
  }
</script>