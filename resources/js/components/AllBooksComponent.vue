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
                        <input type="text" class="text--lighten-2 text-caption mr-2" v-model="book.rate"  :id="`rate${book.id}`">
                    </div>
                    <v-expand-transition>
                        <div>
                            <v-divider></v-divider>
                            <v-card-title  class="orange--text"
                                           >
                                Description
                            </v-card-title>
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
        let id = parseInt(_this.$route.params.id)
        axios.get(`/api/library/${id}`).then((response)=>{
            _this.bookList=response.data.data.library.books
            Object.values(_this.bookList).forEach(function (value, key) {
                let sum =0
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
        rateChange(book,rate){
            document.getElementById(`rate${book.id}`).value = rate
            axios.post(`/like/${book.id}`,{
                rate:book.rate
            }).then((response)=>{
                console.log(response)
            })
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
