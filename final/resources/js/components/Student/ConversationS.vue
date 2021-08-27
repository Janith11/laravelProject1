<template>
    <div class="conversation">
        <h3 style="color: white ;border-radius: 8px;" class="bg-primary p-2 ">{{ contact ? contact.f_name+" "+contact.l_name : 'Select a Contact' }}</h3>
        <MessagesFeedS :contact="contact" :messages="messages"/>
        <MessageComposerS @send="sendMessage"/>
    </div>
</template>
<script>
    import MessagesFeedS from './MessagesFeedS';
    import MessageComposerS from './MessageComposerS';
    export default {

        
        props: {
            contact: {
                type: Object,
                default: null
            },
            
            messages: {
                type: Array,
                default: []
                // required: true
            }
        },
        methods: {
            sendMessage(text) {
                if (!this.contact) {
                    return;
                }
                axios.post('/conversationS/send', {
                    contact_id: this.contact.id,
                    text: text
                     
                }).then((response) => {
                     console.log(response.data); 
                    this.$emit('new', response.data);
                })
                //  .catch( error => {
                //     console.log( error );
                // })
            }
        },
        components: {MessagesFeedS, MessageComposerS}
    }
</script>

<style lang="scss" scoped>

    @media only screen and (max-width: 600px) {
        h3{
            font-size: 15px;;
        }
    }
    // .conversation{
    //     flex: 5;
    //     display: flex;
    //     flex-direction: column;
    //     justify-content: space-between ;

    //     h1{
    //         font-size: 20px;
    //         padding: 10px;
    //         margin: 0;
    //         border-bottom: 1px dashed lightgray;
    //     }
    // }
</style>