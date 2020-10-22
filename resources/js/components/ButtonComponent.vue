<template>
    <div>
        <a class="btn btn-primary" v-on:click="followUser" href="#" v-text="followButtonText">Follow</a>
    </div>
</template>

<script>
    export default {
        props: ['userId', 'follows'],
        mounted() {
            console.log('Follow Button mounted.')
        },
        data: function(){
            return {
                'status': this.follows
            }
        },
        methods: {
            followUser(){
                axios.post('/follow/'+this.userId)
                .then((response) => {
                    // handle success
                    //change the button text
                    this.status = !this.status
                    // change follower count
                    if(this.status){
                        this.$parent.followerCountSet(1)
                    }else{
                        this.$parent.followerCountSet(-1)
                    }
                    console.log(response.data);
                })
                .catch((error) => {
                    // handle error
                    if(error.response.status == 401){
                        window.location = '/login'
                    }
                    console.log(error.response);
                })
            }
        },
        computed: {
            followButtonText(){
                return (this.status) ? 'Unfollow' : 'Follow'
            }
        }
    }
</script>
