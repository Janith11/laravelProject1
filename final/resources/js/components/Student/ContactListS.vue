<template>
    <div class="contact-lists border-right overflow-auto">
        <ul class="list-group mt-1">
            <li class=" d-flex justify-content-between align-items-center p-1  m-0" v-for="contact in sortedContacts" :key="contact.id" @click="selectContact(contact)" :class="{'selected': contact==selected}">
                <div class="row">
                <div class="avatar col float-left">
                    <img class="rounded-circle border border-success" v-bind:src="'/uploadimages/students_profiles/'+contact.profile_img" alt="">
                </div>
                <div class="contact col">
                    <h5 class="name myname mb-0">{{contact.f_name}} {{contact.l_name}}</h5>
                    <p v-if="contact.role_id == 3" class="mt-0 myrole_id">(Student)</p>
                    <p v-if="contact.role_id == 1" class="mt-0 myrole_id">(Owner)</p>
                    <p v-if="contact.role_id == 2" class="mt-0 myrole_id">(Instructor)</p>
                    <!-- <p class="name studentid">ID: {{contact.id}}</p> -->
                    <!-- <p class="name studentid">ID: {{contact.profile_img}}</p> -->
                </div>
                <div class="col align-middle mt-2 mybadge">
                 <span class="badge badge-success float-right" v-if="contact.unread" >{{contact.unread}}</span>
                <!-- <span class="unread sr-only" v-if="contact.unread" > 1{{contact.unread}}</span> -->
                </div>
            </div>
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
    img{
        max-height: 55px;
        width: auto;
    }
    .myname{
        font-size: 0.8rem;
    }
    .myrole_id{
        font-size: 0.6rem;
    }
    // .avatar{
    //     display: inline-block;
    // }
    // .contact{
    //     display: inline-block;
    // }
    li{
        background-color: rgb(245, 245, 245);
        border-radius: 10px;
    &.selected{
      background-color: #1775d246;
        padding: 0px;
        margin: 0px;;
    }
    }
    @media only screen and (max-width: 600px) {
        body {
           img{
               display: none;
               
           }
           .contact{
               .name{
                   font-size: 10px;
                   padding-right: 0px; 
                   margin: 0px;
               }
               .studentid{
                       display: none;
                   }
           }
           .mybadge{
               margin: 0px;
           }
            }
        }
    
    .contact-lists{
        flex: 2;
        max-height: 90vh;
        // overflow: scroll;
        border-right: 1px solid #979797;
    }
    ul{
        list-style-type: none;
        scroll-padding-left: 0;
        
        
        li{
            
            display: flex;
            padding: 2px;
            border-bottom: 1px solid #0b156e6b;
            height:80px;
            position:relative;
            cursor: pointer;
        }
    }
    
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