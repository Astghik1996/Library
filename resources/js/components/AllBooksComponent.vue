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
                    <div class="l-flex">
                        <v-card-actions class="pa-4"
                                        @click="rateChange(book,book.rate)">
                        <v-rating
                            v-model="book.rate"
                            background-color="grey darken-1"
                            color="yellow accent-4"
                            empty-icon="$ratingFull"
                            half-increments
                            hover
                            size="16"
                        ></v-rating>
                        </v-card-actions>
                        <input type="text" v-if="book.rate > 0" class="text--lighten-2 text-caption mr-2" v-model="book.rate">
                    </div>

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
            rating:0
        }
    },
    props:['data'],
    mounted() {

        let _this =this
        axios.get(`api/library/${_this.data}`).then((response)=>{
            _this.bookList=response.data.books
            Object.values(_this.bookList).forEach(function (value, key) {
                let sum =0
                value.show = false
                if(value.likes.length !==0){
                    value.likes.forEach(function (item, key) {
                        sum += parseFloat(item.rate);
                    });
                    sum = sum/value.likes.length
                }
                value.rate = sum
                console.log(_this.bookList)
            });
        })
    },
    methods:{
        show(book){
            book.show = !book.show
        },
        rateChange(book,rate){
            book.rate = rate
        }
    },
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
