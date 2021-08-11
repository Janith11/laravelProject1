<template>
    <div class="feed" ref="feed">
        <ul v-if="contact">
            <li v-for="message in messages" :class="`message${message.to == contact.id ? ' sent' : ' received'}`" :key="message.id">
                <div class="text">
                    {{ message.text }} <br>
                    <small>{{message.created_at}}</small>
                </div>
            </li>
        </ul>
    </div>
</template>

<script>
    export default {
        props: {
            contact: {
                type: Object
            },
            messages: {
                type: Array,
                required: true
            }
        },
        methods: {
            scrollToBottom() {
                setTimeout(() => {
                    this.$refs.feed.scrollTop = this.$refs.feed.scrollHeight - this.$refs.feed.clientHeight;
                }, 50);
            }
        },
        watch: {
            contact(contact) {
                this.scrollToBottom();
            },
            messages(messages) {
                this.scrollToBottom();
            }
        }
    }
</script>pt>

<style lang="scss" scoped>
    .feed{
        // background: #8b2c2c;
        background: #16222A;  /* fallback for old browsers */
        background: -webkit-linear-gradient(to right, #3A6073, #16222A);  /* Chrome 10-25, Safari 5.1-6 */
        background: linear-gradient(to right, #3A6073, #16222A); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */

        height: 100vh;
        max-height: 470px;
        overflow: scroll;

        ul{
            list-style-type: none;
            padding: 5px;
            
        
            li{
                 &.message{
                    margin: 10px 0;
                    width: 100%;   
                    
                    .text{
                        max-width: 400px;
                        border-radius: 10px;
                        padding: 12px;
                        display: inline-block;
                    }
               
                    &.received{
                        text-align: left;

                        .text{
                            background:#1776D2;
                            color: beige;
                        }                       
                    }

                     &.sent{
                        text-align: right;

                        .text{
                            // background: #165F55;
                            background: #02AAB0;  /* fallback for old browsers */
                            background: -webkit-linear-gradient(to right, #00CDAC, #02AAB0);  /* Chrome 10-25, Safari 5.1-6 */
                            background: linear-gradient(to right, #00CDAC, #02AAB0); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */

                            color: white;
                        }                       
                    }
                 }
            }
        }
    }

    @media only screen and (max-width: 600px) {
        .feed{
            max-height: 60vh;
        }
  }

</style>