<template>
    <div>
        <button @click="getComment" class="btn btn-default">
            댓글 불러오기
        </button>

        <comment-item
            v-for="(comment, index) in comments"
            :key="index"
            :comment="comment"
        />
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
            comments: []
        };
    },
    methods: {
        getComment() {
            this.comments = ["1번째", "2번째", "3번째"];
            //서버에 현재 게시글의 댓글 리스트를 비동기적으로 요청
            //즉, axios를 이용해서 요청
            //서버가 댓글 리스트를 주면 그놈을 어디에 할당해?
            //this.comments에 할당
        }
    }
};
</script>
