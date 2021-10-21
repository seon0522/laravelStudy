<template>
    <div>
        <button @click="getComment" class="btn btn-default">
            댓글 불러오기
        </button>
        <div
            v-for="value in comments"
            :key="value">
            <comment-item v-bind:comment="value" :userss="userss"></comment-item>
        </div>
<!--        <comment-item-->
<!--            v-for="(comment, index) in userss"-->
<!--            :key="index"-->
<!--            :comment="comment"-->
<!--        ></comment-item>-->
        <!-- <comment-create /> -->
    </div>
</template>

<script>
import CommentItem from "./CommentItem.vue";
// import CommentCreate from "./CommentCreate.vue";

export default {
    components: {
        CommentItem
        // CommentCreate
    },
    props: ["post", "loginuser"],
    data() {
        return {
            // hello:{
            //     comments:[],
            //     userss:[]
            // },
            comments: [],
            userss: []
        };
    },
    methods: {
        getComment() {
            this.comments = ["1번째", "2번째", "3번째"];
            this.userss = ["살려줘", "힘들어","무서워"];
            //서버에 현재 게시글의 댓글 리스트를 비동기적으로 요청
            //즉, axios를 이용해서 요청
            //서버가 댓글 리스트를 주면 그놈을 어디에 할당해?
            //this.comments에 할당
        }
    }
};
</script>
