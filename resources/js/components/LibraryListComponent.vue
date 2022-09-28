<template>
    <div>
        <v-col
            v-for="(item, i) in items"
            :key="i"
            cols="12"
        >
            <v-card
                color="#db9d9d"
                dark
            >
                <div class="d-flex flex-no-wrap justify-space-between">
                    <div>
                        <v-card-title
                            class="text-h5"
                            v-text="item.name"
                        ></v-card-title>

                        <div v-if="item.books">
<!--                            <v-card-subtitle v-for="book in item.books" v-text="book.title"></v-card-subtitle>-->
                            <p>{{item.books}}</p>
                        </div>
                        <v-card-actions>
                            <v-btn
                                class="ml-2 mt-5"
                                outlined
                                rounded
                                small
                            >
                                VIEW ALL
                            </v-btn>
                        </v-card-actions>
                    </div>

                    <v-avatar
                        class="ma-3"
                        size="125"
                        tile
                    >
                        <v-img :src="item.src"></v-img>
                    </v-avatar>
                </div>
            </v-card>
        </v-col>
    </div>
</template>

<script>
import axios from "axios";

export default {
    name: "LibraryListComponent",
    data: () => ({
        items: [],
    }),
    mounted() {

        axios.get('/library').then((response)=>{
            this.items = response.data
            console.log(this.items)
        })
    }
}
</script>

<style scoped>

</style>
