<template>
<div>
    <v-card>
        <v-toolbar flat>

            <v-toolbar-title>Library</v-toolbar-title>


            <template v-slot:extension id="bar">
                <v-tabs
                    v-model="tabs"
                    fixed-tabs
                >
                    <v-tabs-slider></v-tabs-slider>
                    <v-tab
                        href="#mobile-tabs-5-1"
                        class="primary--text"
                    >
                        <v-icon>mdi-format-list-bulleted-square</v-icon>
                    </v-tab>

                    <v-tab
                        href="#mobile-tabs-5-2"
                        class="primary--text"
                    >
                        <v-icon>mdi-magnify</v-icon>
                    </v-tab>

                    <v-tab
                        href="#mobile-tabs-5-3"
                        class="primary--text"
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
<!--                    <v-card-text v-text="text"></v-card-text>-->
                    <component :is="component+'Component'" @page="changePage" :data="data"></component>
<!--                    <LibraryListComponent></LibraryListComponent>-->

                </v-card>
            </v-tab-item>
        </v-tabs-items>
    </v-card>
    </div>
</template>

<script>
import LibraryListComponent from "./LibraryListComponent";
import AllBooksComponent from  "./AllBooksComponent"
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
