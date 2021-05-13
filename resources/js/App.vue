<template>
    <div id="app">
        <div class="utf-dashboard-container-aera">
            <side-bar v-if="!$route.meta.noSideBar"></side-bar>
            <router-view></router-view>
        </div>
    </div>
</template>
