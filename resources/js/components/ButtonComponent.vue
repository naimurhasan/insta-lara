<template>
    <a class="btn btn-primary" @click="followUser" href="#" v-text="followButtonText">Follow</a>
</template>

<script>
    export default {
        props: ['userId', 'follows'],
        mounted() {
            console.log('Component mounted.')
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
                    this.status = !this.status
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
