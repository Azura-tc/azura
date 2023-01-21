<script setup>
import { ref } from 'vue';
import route from '../../../vendor/tightenco/ziggy';
import SideBarItem from './SideBarItem.vue';

defineProps({name : String})

const navItems = [
    {
        label : 'Navigation'
    },
    {
        label : 'Dashboard',
        href : route('admin.dashboard'),
        icon : 'mdi mdi-speedometer',
        active : 'Home/Dashboard'
    },
    {
        label : 'Security'
    },
    {
        label : 'Profile',
        href : route('admin.profile'),
        icon : 'mdi mdi-cog',
        active : 'Home/Profile'
    }
]

</script>

<template>
<nav class="sidebar sidebar-offcanvas" id="sidebar" ref="sidebar">
    <div class="sidebar-brand-wrapper d-none d-lg-flex align-items-center justify-content-center fixed-top">
        <Link class="sidebar-brand brand-logo" :href="route('admin.dashboard')"><img src="" alt="logo" /></Link>
        <Link class="sidebar-brand brand-logo-mini" :href="route('admin.dashboard')"><img src="
        " alt="logo" /></Link>
    </div>
    <ul class="nav">
        <li class="nav-item profile">
            <div class="profile-desc">
                <div class="profile-pic">
                    <div class="count-indicator">
                        <div class="img-xs rounded-circle d-flex justify-content-center align-items-center bg-primary">{{ name[0] }}</div>
                        <span class="count bg-success"></span>
                    </div>
                    <div class="profile-name">
                        <h5 class="mb-0 font-weight-normal">{{ name }}</h5>
                        <!-- <span>Gold Member</span> -->
                    </div>
                </div>
                <a href="#" id="profile-dropdown" data-bs-toggle="dropdown"><i class="mdi mdi-dots-vertical"></i></a>
                <div class="dropdown-menu dropdown-menu-right sidebar-dropdown preview-list" aria-labelledby="profile-dropdown">
                    <Link href="#" class="dropdown-item preview-item">
                        <div class="preview-thumbnail">
                            <div class="preview-icon bg-dark rounded-circle">
                                <i class="mdi mdi-cog text-primary"></i>
                            </div>
                        </div>
                        <div class="preview-item-content">
                            <p class="preview-subject ellipsis mb-1 text-small">Account Settings</p>
                        </div>
                    </Link>
                    <div class="dropdown-divider"></div>
                    <Link href="#" class="dropdown-item preview-item">
                        <div class="preview-thumbnail">
                            <div class="preview-icon bg-dark rounded-circle">
                                <i class="mdi mdi-onepassword  text-info"></i>
                            </div>
                        </div>
                        <div class="preview-item-content">
                            <p class="preview-subject ellipsis mb-1 text-small">Change Password</p>
                        </div>
                    </Link>
                </div>
            </div>
        </li>
        <SideBarItem v-for="navItem in navItems" :nav-item="navItem" :key="navItem.label" />
    </ul>
</nav>

</template>
