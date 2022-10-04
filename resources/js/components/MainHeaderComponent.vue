<template>
    <v-app>
        <div>
            <v-card>
                <v-toolbar flat>

                    <v-toolbar-title>Bookshelf</v-toolbar-title>


                    <template id="bar" v-slot:extension>
                        <v-tabs
                            v-model="tabs"
                            fixed-tabs
                        >
                            <v-tabs-slider></v-tabs-slider>
                            <v-tab
                                class="primary--text"
                                href="#mobile-tabs-5-1"
                            >
                                <v-icon>mdi-format-list-bulleted-square</v-icon>
                            </v-tab>

                            <v-tab
                                class="primary--text"
                                href="#mobile-tabs-5-2"
                            >
                                <v-icon>mdi-magnify</v-icon>
                            </v-tab>

                            <v-tab
                                class="primary--text"
                                href="#mobile-tabs-5-3"
                            >
                                <v-icon>mdi-login</v-icon>
                            </v-tab>
                        </v-tabs>
                    </template>
                </v-toolbar>

                <v-tabs-items v-model="tabs">
                    <v-tab-item
                        v-for="i in 3"
                        :key="i"
                        :value="'mobile-tabs-5-' + i"
                    >
                        <v-card flat>
                            <component :is="component+'Component'" :data="data" @page="changePage"></component>
                        </v-card>
                    </v-tab-item>
                </v-tabs-items>
            </v-card>
        </div>
    </v-app>
</template>

<script>
import LibraryListComponent from "./LibraryListComponent";
import AllBooksComponent from "./AllBooksComponent"

export default {
    name: "MainHeaderComponent",
    components: {AllBooksComponent, LibraryListComponent},
    data () {
        return {
            tabs: null,
            component:'LibraryList',
            data:null

        }
    },
    methods:{
        changePage(data){
            this.component=data.component;
            this.data=data.data
        }
    }
}
</script>

<style >
.v-tabs-bar__content{
    justify-content: center !important;
}

</style>
