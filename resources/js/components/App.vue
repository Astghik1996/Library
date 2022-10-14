<template>
    <v-app>
        <v-container>
            <router-view></router-view>
        </v-container>
    </v-app>
</template>

<script>
import LibraryListComponent from "./LibraryListComponent";
import AllBooksComponent from "./AllBooksComponent"
import SearchComponent from "./SearchComponent";
import LoginComponent from "./LoginComponent";

export default {
    name: "App",
    components: {LoginComponent, SearchComponent, AllBooksComponent, LibraryListComponent},
}
</script>

<style scoped>

</style>
