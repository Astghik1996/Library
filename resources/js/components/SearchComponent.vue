<template>
    <div>
        <v-container>
        <v-app-bar
            color="#6A76AB"
            dark
            fade-img-on-scroll
            prominent
            shrink-on-scroll
            src="/libimg/pexels-pixabay-159711.jpg"
            height="500px"
            class="mt-12"
        >
            <template v-slot:img="{ props }">
                <v-img
                    gradient="to top right, rgba(100,115,201,.7), rgba(25,32,72,.7)"
                    v-bind="props"
                ></v-img>
            </template>
            <v-text-field
                append-icon="mdi-microphone"
                class="mx-4 mt-12"
                flat
                hide-details
                label="Search"
                prepend-inner-icon="mdi-magnify"
                solo-inverted
                v-model="searchBook"
            ></v-text-field>
        </v-app-bar>
        <div>
            <template>
                <div class="l-flex justify-space-around">
                    <v-card
                        v-for="(book,i) in result"
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
                                <input type="text" class="text--lighten-2 text-caption mr-2" v-model="book.rate"  :id="`rate${book.id}`">
                            </v-card-actions>

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
        </v-container>
    </div>
</template>

<script>
export default {
    name: "SearchComponent",
    data(){
        return{
            books:[],
            searchBook:null,
            result:[]
        }
    },

    watch:{
        searchBook (){
            this.result=[]
           this.books.forEach((book)=>{
               if(book.title.includes(this.searchBook) || book.description.includes(this.searchBook) || book.author.includes(this.searchBook)){
                   this.result.push(book)
               }
           })
        }
    },
    mounted() {
        let _this = this
        axios.get('/api/book').then((response)=>{
            this.books = response.data
            console.log(this.books)
            Object.values(_this.books).forEach(function (value, key) {
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
    flex-wrap: wrap !important;
}
</style>
