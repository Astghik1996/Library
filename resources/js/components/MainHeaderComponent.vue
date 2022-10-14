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
                                <router-link to="/">
                                    <v-btn icon>
                                        <v-icon>mdi-format-list-bulleted-square</v-icon>
                                    </v-btn>
                                </router-link>
                            </v-tab>



                            <v-tab
                                class="primary--text"
                                href="#mobile-tabs-5-2"
                            >
                                <router-link to="/search">
                                <v-btn icon>
                                    <v-icon>mdi-magnify</v-icon>
                                </v-btn>
                                </router-link>

                            </v-tab>



                            <v-tab
                                class="primary--text"
                                href="#mobile-tabs-5-3"
                            >
                                <router-link to="/login">
                                    <v-btn icon>
                                        <v-icon>mdi-login</v-icon>
                                    </v-btn>
                                </router-link>
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
                            <router-view></router-view>
                        </v-card>
                    </v-tab-item>
                </v-tabs-items>
            </v-card>
        </div>
    </v-app>
</template>

<script>

export default {
    name: "MainHeaderComponent",
    data () {
        return {
            tabs: null,

        }
    },
    methods:{
    },
    mounted() {
    }
}
</script>

<style >
.v-tabs-bar__content{
    justify-content: center !important;
}
.v-application {
    color:#f4ab54 !important;
    caret-color: #f4ab54 !important;
}

</style>
