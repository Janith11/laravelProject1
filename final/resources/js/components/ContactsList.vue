<template>
    <div class="contact-lists">
        <ul class="list-group ">
            <li class=" d-flex justify-content-between align-items-center" v-for="contact in sortedContacts" :key="contact.id" @click="selectContact(contact)" :class="{'selected': contact==selected}">
                <div class="avatar">
                    <img class="img-fluid " :src="'./uploadimages/students_profiles/default_profiles.jpg'" :alt="contact.name">
                </div>
                <div class="contact">
                    <p class="name">{{contact.f_name}}</p>
                    <p class="name">ID: {{contact.id}}</p>
                </div>
                <span class="unread" v-if="contact.unread" >{{contact.unread}}</span>
            </li>
        </ul>
    </div>
</template>

<script>
export default {
    props:{
        contacts : {
            type: Array,
            default:[]
        }
    },

    data() {
        return {
            selected: this.contacts.length ? this.contacts[0] : null 
        };
    },
        methods: {
            selectContact(contact){
                this.selected = contact;

                this.$emit('selected', contact);
            }
        },
        computed :{
            sortedContacts(){
                return _.sortBy(this.contacts, [(contact) =>{
                    if(contact == this.selected){
                        return Infinity;
                    }
                    return contact.unread;
                }]).reverse();
            }
        }
    }


</script>

<style lang="scss" scoped>
    // .contact-lists{
    //     flex: 2;
    //     max-height: 600px;
    //     overflow: scroll;
    //     border-right: 1px solid #979797;
    // }
    // ul{
    //     list-style-type: none;
    //     scroll-padding-left: 0;
        
        
    //     li{
            
    //         display: flex;
    //         padding: 2px;
    //         border-bottom: 1px solid #0b156e6b;
    //         height:80px;
    //         position:relative;
    //         cursor: pointer;
         
    
    //         &.selected{
    //             background: rgba(27, 34, 139, 0.157);
    //         }
    
    //         .avatar{
    //             flex: 1;
    //             display: flex;
    //             align-items: center ;

    //             img{
    //                 width: 35px;
    //                 border-radius: 50%;
    //                 margin: 0 auto ;
    //             }
    //         }
    //         .contact{
    //             flex: 3;
    //             font-size: 12px;
    //             overflow: hidden;
    //             display: flex;
    //             flex-direction: column;
    //             justify-content: left ;

    //             p{
    //                 margin: 0;

    //                 &.name{
    //                     font-weight: bold;
    //                 }
    //             }
    //         }
    //     }
    // }
</style>