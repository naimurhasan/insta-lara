<template>
        <span class="mr-3"><strong>{{followersCount}}</strong> {{ followersText }} </span>
</template>

<script>
    export default {
        props: ['count'],
        data: function(){
            return {
                'followersCount' : Number(this.count)
            }
        },
        mounted() {
            console.log('Count Component mounted.')
        },
        methods: {
            follwerCountSet(count){
                this.followersCount += count
            }
        },
        computed: {
            followersText(){
                return this.followersCount < 2 ? 'follower' : 'follwers'
            }
        }
    }
</script>
