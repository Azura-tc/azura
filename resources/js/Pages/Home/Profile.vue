<script setup>
import ChangePassword from './ChangePassword.vue';
import EditProfile from './EditProfile.vue';


</script>

<template>
    <Head title="Profile" />
    <div class="page-header">
        <h3 class="page-title"> Profile </h3>
    </div>
    <div class="row">
        <EditProfile />
        <ChangePassword />
    </div>
</template>
