<template>
    <div>
        <template>
            <div class="l-flex justify-space-around">
                <v-card
                    v-for="(book,i) in bookList"
                    :key="i"
                    class="mx-auto mb-12 mt-12"
                    max-width="344"

                >
                    <v-img
                        height="200px"
                        src="bookimg/null.jpg"
                    ></v-img>

                    <v-card-title>
                        {{ book.title }}
                    </v-card-title>

                    <v-card-subtitle>
                        {{ book.author }}
                    </v-card-subtitle>
                    <v-rating
                        v-model="rating"
                        color="yellow darken-3"
                        background-color="grey darken-1"
                        empty-icon="$ratingFull"
                        half-increments
                        hover
                        size="16"
                    ></v-rating>

                    <v-card-actions>
                        <v-btn
                            color="orange lighten-2"
                            text
                        >
                            Book description
                        </v-btn>

                        <v-spacer></v-spacer>

                        <v-btn
                            icon
                            @click="show(book)"
                        >
                            <v-icon>{{ book.show ? 'mdi-chevron-up' : 'mdi-chevron-down' }}</v-icon>
                        </v-btn>
                        <div>{{book.show}}</div>
                    </v-card-actions>

                    <v-expand-transition>
                        <div v-show="book.show">
                            <v-divider></v-divider>

                            <v-card-text>
                                {{ book.description }}
                            </v-card-text>
                        </div>
                    </v-expand-transition>
                </v-card>
            </div>
        </template>
    </div>
</template>

<script>
export default {
    name: "AllBooksComponent",
    data(){
        return{
            bookList:[],
            loading: false,
            selection: 1,
            rating:4.3,
        }
    },
    props:['data'],
    mounted() {
        axios.get(`api/library/${this.data}`).then((response)=>{
            console.log(response.data.books,123)
            this.bookList=response.data.books
            console.log(this.bookList,852)
            Object.values(this.bookList).forEach(function (value, key) {
                value.show = false
            });
        })


    },
    methods:{
        show(book){
            book.show = !book.show
        }
    }
}
</script>

<style scoped>
.l-margin{
    margin: 16px 0;
}
.l-flex{
    display: flex;
    justify-content:space-between !important;
}
</style>
