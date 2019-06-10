<template>
    <div>
        <nav aria-label="Page navigation example">
            <ul class="pagination">
                <li v-bind:class="[{disabled: !pagination.prev_page_url}]" class="page-item"><a class="page-link" href="#" @click="getArticles(pagination.prev_page_url)">Previous</a></li>

                <li class="page-item disabled"><a class="page-link text-dark" href="#">Page {{ pagination.current_page }} of {{ pagination.last_page }}</a></li>
            
                <li v-bind:class="[{disabled: !pagination.next_page_url}]" class="page-item"><a class="page-link" href="#" @click="getArticles(pagination.next_page_url)">Next</a></li>
            </ul>
        </nav>
        <div class="card card-body mb-2" v-for="article in articles" v-bind:key="article.id">
            <h3>{{article.article_title}}</h3>
            <p>{{article.article_body}}</p>
            <span>{{article.article_id}} -- {{article.article_user_id}}</span>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            page: 1,
            articles: [],
            article: {
                article_title: "",
                article_body: "",
                article_user_id: 1
            },
            pagination: {},
        }
    }, 

    created: function(){
        this.getArticles();
    },

    methods: {
        getArticles(page_url){
            let vm = this;
            page_url = page_url || '/api/article/read';
            fetch(page_url)
            .then(res => res.json())
            .then(res => {
                this.articles = res.data;
                console.log(res);
                vm.getPage(res.links, res.meta);
            })
            .catch(err => console.log(err));
        },

        getPage(links, meta){
            console.log("the hell", links, meta);
            let paginate = {
                current_page: meta.current_page,
                last_page: meta.last_page,
                prev_page_url: links.prev,
                next_page_url: links.next,
            };
            this.pagination = paginate;
            console.log(paginate)
        }
    },
}
</script>

