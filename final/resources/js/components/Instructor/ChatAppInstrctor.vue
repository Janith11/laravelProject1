<template>
<div class="chat-app">
    <ConversationI :contact="selectedContact" :messages="messages" @new="saveNewMessage"/>   
    <ContactsListI :contacts="contacts"  @selected="startConversationWith"/>
</div>
</template>

<script>
    import ConversationI from './ConversationI.vue';
    import ContactsListI from './ContactListI.vue';

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

            // console.log(this.user);
            axios.get('/contactsI')
                .then((response) =>{
                    console.log(response); 
                    this.contacts=response.data;
                });
        },

        methods: {
            startConversationWith(contact){
                axios.get(`/conversationI/${contact.id}`)
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
                alert(message.text);
            }

        },
        components:{ConversationI, ContactsListI}
    }
</script>

<style lang="scss" scoped>
.chat-app{
    display: flex ;
}
</style>