<template>
<div class="chat-app">
    <ConversationS :contact="selectedContact" :messages="messages" @new="saveNewMessage"/>   
    <ContactListS :contacts="contacts"  @selected="startConversationWith"/>
</div>
</template>

<script>
    import ConversationS from './ConversationS.vue';
    import ContactListS from './ContactListS.vue';

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
            
            axios.get('/contactsS')
                .then((response) =>{
                     
                    this.contacts=response.data;
                });
        },

        methods: {
            startConversationWith(contact){
                this.updateUnreadCount(contact, true);
                axios.get(`/conversationS/${contact.id}`)
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
        components:{ConversationS, ContactListS}
    }
</script>

<style lang="scss" scoped>
.chat-app{
    display: flex ;
}
</style>