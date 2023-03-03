<script setup>
import { computed } from 'vue';


const props = defineProps({services:Object})

const services = computed(() => props.services)

</script>

<template>
    <Head title="Section" />
    <div class="page-header">
        <h3 class="page-title"> Services </h3>
    </div>
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <h4 class="card-title m-0">Services List</h4>
                        <Link :href="route('admin.service.create')" class="btn btn-primary" >Create</Link>
                    </div>
                    <div class="table-responsive">
                        <table class="table">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Title</th>
                                        <th>image</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr v-for="(service, index) in services">
                                        <td>{{ index + 1 }}</td>
                                        <td>{{ service.title }}</td>
                                        <td>
                                            <img v-if="service.image" :src="service.image" :alt="service.name" style="width: 100px; height: 100px; object-fit: contain; border-radius: 0;">
                                            <div class="text-center" v-else>-</div>
                                        </td>
                                        <td style="white-space: nowrap;">
                                            <Link class="p-0 m-2 btn btn-link" :href="route('admin.service.show', service)"><i class="mdi mdi-eye text-success"></i></Link>
                                            <Link class="p-0 m-2 btn btn-link" :href="route('admin.service.edit', service)"><i class="mdi mdi-pen text-primary"></i></Link>
                                            <Link class="p-0 m-2 btn btn-link" method="delete" as="button" :href="route('admin.service.destroy', service)"><i class="mdi mdi-delete text-danger"></i></Link>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
