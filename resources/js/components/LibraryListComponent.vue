<template>
    <div class="l-flex l-margin-sm">
        <template>
            <v-container v-for="(item, i) in items" :key="i">
                <v-row justify="space-around">
                    <v-card width="400" height="500">
                        <v-img
                            height="200px"
                            :src="`/libimg/${item.image}.jpg`"
                        >
                            <v-app-bar
                                color="rgba(0, 0, 0, 0)"
                                flat
                            >
                                <v-btn color="white" icon @click="viewAll(item.id)">
                                    <v-icon>mdi-check-all</v-icon>
                                </v-btn>


                                <v-toolbar-title class="text-h6 white--text pl-0" @click="viewAll(item.id)">
                                    View All
                                </v-toolbar-title>

                                <v-spacer></v-spacer>

                                <v-btn
                                    color="white"
                                    icon
                                >
                                    <v-icon>mdi-dots-vertical</v-icon>
                                </v-btn>
                            </v-app-bar>

                            <v-card-title class="white--text mt-8">
                                <p class="ml-3">
                                    {{item.name }}
                                </p>
                            </v-card-title>
                        </v-img>

                        <v-card-text>
                            <div class="font-weight-bold ml-8 mb-2">
                                Available Books
                            </div>

                            <v-timeline
                                align-top
                                dense
                            >
                                <v-timeline-item
                                    v-for="(book,i) in item.books"
                                    :key="i"
                                    color="#f4ab54"
                                    small
                                >
                                    <div>
                                        <div class="font-weight-normal">
                                            <strong>{{book.author}}</strong>
                                        </div>
                                        <div>{{ book.title }}</div>
                                    </div>
                                </v-timeline-item>
                            </v-timeline>
                        </v-card-text>
                    </v-card>
                </v-row>
            </v-container>
        </template>
    </div>
</template>

<script>
export default {
    name: "LibraryListComponent",
    data: () => ({
        items: [],
    }),
    mounted() {

        axios.get('/library').then((response) => {
            this.items = response.data.data.library
        })
    },
    methods: {
        viewAll(id) {
            console.log(id)
           this.$router.push({path:`/library/${id}`})
        }
    }
}
</script>

<style scoped>
.l-flex {
    display: flex;
    justify-content: space-between;
}

.l-height {
    height: 250px !important;
}

.v-sheet {
    height: 100%;
}

.l-margin-sm {
    margin: 20px;
}
</style>
