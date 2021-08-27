<template>
<div class="chat-app row bg-light">
    <div class="col-3">
        <ContactListI :contacts="contacts"  @selected="startConversationWith"/>
    </div>
    <div class="col-9">
        <ConversationI :contact="selectedContact" :messages="messages" @new="saveNewMessage"/>   
    </div>
</div>
</template>

<script>
    import ConversationI from './ConversationI.vue';
    import ContactListI from './ContactListI.vue';

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
            
            axios.get('/contactsI')
                .then((response) =>{
                     
                    this.contacts=response.data;
                });
        },

        methods: {
            startConversationWith(contact){
                this.updateUnreadCount(contact, true);
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
        components:{ConversationI, ContactListI}
    }
</script>

<style lang="scss" scoped>
// .chat-app{
//     display: flex ;
// }
@media only screen and (max-width: 600px) {
    .chat-app{
        max-height: 80vh;
    }

}
</style>