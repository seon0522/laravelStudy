<template>
<div>
    <button @click="getComments" class="btn btn-default">댓글 불러오기</button>
    <comment-item v-for="(comment, index) in comments" :key="index" :content="comment">
        {{comment}}
    </comment-item>
</div>
</template>

<script>
import CommentItem from './CommentItem.vue';

export default {
    props: ['post','loginuserId'],
    components:{CommentItem},
    data(){
        return {
            comments: [],
        }
    },
    methods:{
        getComments(){
            ['list comment', '2nd Comment', '2nd Comment', '4nd Comment', '5nd Comment'];
        }
    }

}
</script>

<style scoped>

</style>
