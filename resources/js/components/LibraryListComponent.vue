<template>
    <div class="l-flex l-margin-sm">
        <v-col
            class="l-width l-height "
            v-for="(item, i) in items"
            :key="i"
            cols="4"
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
                            <div v-for="(book,j) in item.books" class="l-flex flex-no-wrap">
                                <v-card-subtitle :key="j" v-text="book.title"></v-card-subtitle>
                            </div>
                        </div>
                        <v-card-actions >
                            <v-btn
                                class="ml-2 mt-5"
                                outlined
                                rounded
                                small
                                @click="viewAll(item.id)"
                            >
                                VIEW ALL
                            </v-btn>
                        </v-card-actions>
                    </div>

                </div>
            </v-card>
        </v-col>
    </div>
</template>

<script>
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
    },
    methods:{
        viewAll(id){
            this.$emit('page', {data: id,component:'AllBooks'})
        }
}
}
</script>

<style scoped>
.l-flex{
    display: flex;
    flex-wrap: wrap;
}
.l-height{
    height: 250px !important;
}
.v-sheet {
    height: 100%;
}
.l-margin-sm{
    margin: 20px;
}
</style>
