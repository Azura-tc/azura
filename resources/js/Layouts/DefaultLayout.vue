<script setup>
import { computed } from 'vue';
import NavBar from '@/Components/NavBar.vue';
import SideBar from '@/Components/SideBar.vue';
import { usePage } from '@inertiajs/vue3';

const auth = computed(() => usePage().props.auth)
</script>

<template>
    <SideBar :name="auth?.user.name" />
    <div class="container-fluid page-body-wrapper">
        <NavBar :name="auth?.user.name" />
        <div class="main-panel">
            <div class="content-wrapper">
                <slot />
            </div>
        </div>
    </div>
</template>
