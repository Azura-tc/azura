<script setup>
import { computed } from 'vue';


const props = defineProps({service:Object})

const service = computed(() => props.service)

</script>

<template>
    <Head :title="`Service - ${service.title}`" />
    <div class="page-header">
        <h3 class="page-title"> Service </h3>
    </div>
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h4 class="card-title m-0">Service informations</h4>
                    <Link :href="route('admin.service.edit', service)" class="btn btn-primary" >Update</Link>
                </div>
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <tbody>
                            <tr>
                                <th>Name</th>
                                <td>{{ service.name }}</td>
                            </tr>
                            <tr>
                                <th>Title</th>
                                <td>{{ service.title }}</td>
                            </tr>
                            <tr>
                                <th>Image</th>
                                <td>
                                    <img v-if="service.image" :src="service.image" :alt="service.name" style="width: 100px; height: 100px; object-fit: contain; border-radius: 0;">
                                    <div class="text-center" v-else>-</div>
                                </td>
                            </tr>
                            <tr>
                                <th>Description</th>
                                <td>{{ service.description }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            </div>
        </div>
    </div>
</template>
