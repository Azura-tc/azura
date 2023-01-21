<script setup>
// import route from 'vendor/tightenco/ziggy/src/js';
import { usePage } from '@inertiajs/vue3';
import { computed, watch } from 'vue';

const props = defineProps({navItem : Object})
const navItem = computed(() => props.navItem)
const currentComponent = computed(() => usePage().component)
</script>

<template>
    <li v-if="navItem?.items" class="nav-item menu-items" :class="{'active' : route().current(navItem?.active)}">
        <Link class="nav-link" data-bs-toggle="collapse" href="{{ '#'.str($label)->slug }}" aria-expanded="false" aria-controls="{{ str($label)->slug }}">
            <span class="menu-icon">
                <i :class="navItem?.label"></i>
            </span>
            <span class="menu-title">{{ navItem?.label }}</span>
            <i class="menu-arrow"></i>
        </Link>
        <div class="collapse" id="{{ str($label)->slug }}">
            <ul class="nav flex-column sub-menu">
                <SideBarItem v-for="item in navItem?.items" :nav-item="item" :key="item?.label" />
            </ul>
        </div>
    </li>
    <li v-else-if="navItem?.href" class="nav-item menu-items" :class="{'active' : currentComponent === navItem?.active}">
        <Link class="nav-link" :href="navItem?.href">
            <span class="menu-icon">
                <i :class="navItem?.icon"></i>
            </span>
            <span class="menu-title">{{ navItem?.label }}</span>
        </Link>
    </li>
    <li v-else class="nav-item nav-category">
        <span class="nav-link">{{ navItem?.label }}</span>
    </li>
</template>
