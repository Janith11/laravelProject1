<template>
<div class="chat-app row bg-light">
    <div class="col-3">
        <ContactsList :contacts="contacts"  @selected="startConversationWith"/>
    </div>
    <div class="col-9">
        <Conversation :contact="selectedContact" :messages="messages" @new="saveNewMessage"/>   
    </div>
</div>
</template>

<script>
    import Conversation from './Conversation.vue';
    import ContactsList from './ContactsList.vue';

    export default {
        
        props : {
            user: {
                type: Object,
                required:true
            }
        },
        

        data(){
            return {
                selectedContact:null,
                messages: [],
                contacts:[],
            };
        },

        mounted() {
            Echo.private(`messages.${this.user.id}`)
            .listen('NewMessage', (e) =>{
                this.handleIncoming(e.message);
            });
            
            axios.get('/contacts')
                .then((response) =>{
                     
                    this.contacts=response.data;
                });
        },

        methods: {
            startConversationWith(contact){
                this.updateUnreadCount(contact, true);
                axios.get(`/conversation/${contact.id}`)
                .then((response) =>{
                    this.messages = response.data;
                    this.selectedContact = contact;
                
                })

            }, 
            
            saveNewMessage(message) {
                this.messages.push(message);
            },
            handleIncoming(message){
                if (this.selectedContact && message.from == this.selectedContact.id) {
                    this.saveNewMessage(message);
                    return;
                }
                 this.updateUnreadCount(contact.from_contact, false);
            },
            updateUnreadCount(contact, reset){
                this.contacts= this.contacts.map((single) =>{
                    if(single.id != contact.id){
                        return single;
                    }

                    if(reset)
                        single.unread =0;
                    else
                        single.unread += 1;   
                        
                    return single;
                })
            }

        },
        components:{Conversation, ContactsList}
    }
</script>

<style lang="scss" scoped>

@media only screen and (max-width: 600px) {
    .chat-app{
        max-height: 80vh;
    }

}
</style>