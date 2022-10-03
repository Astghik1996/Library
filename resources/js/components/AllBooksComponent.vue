<template>
<div>
    <v-card
        :loading="loading"
        class="mx-auto my-12"
        max-width="374"
        v-for="(book, i) in bookList"
        :key="i"
    >

        <v-img
            height="250"
            src="https://cdn.vuetifyjs.com/images/cards/cooking.png"
        ></v-img>

        <v-card-title>{{ book.title }}</v-card-title>

        <v-card-text>
            <v-row
                align="center"
                class="mx-0"
            >
<!--                <v-rating-->
<!--                    :value="4.5"-->
<!--                    color="amber"-->
<!--                    dense-->
<!--                    half-increments-->
<!--                    size="14"-->
<!--                ></v-rating>-->
                <v-btn icon>
                    <v-icon>mdi-heart</v-icon>
                </v-btn>

                <v-btn icon>
                    <v-icon>mdi-bookmark</v-icon>
                </v-btn>

                <v-btn icon>
                    <v-icon>mdi-share-variant</v-icon>
                </v-btn>
            </v-row>

            <div class="my-4 text-subtitle-1 mt-5   ">
                {{ book.author }}
            </div>

            <div>{{ book.description }}</div>
        </v-card-text>
    </v-card>
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
        }
    },
    props:['data'],
    mounted() {
        axios.get(`api/library/${this.data}`).then((response)=>{
            this.bookList=response.data.books
            console.log(response)
        })
    }
}
</script>

<style scoped>

</style>
