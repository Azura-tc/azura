<script setup>
import { computed } from 'vue';


const props = defineProps({section:Object})

const section = computed(() => props.section)

</script>

<template>
    <Head :title="`Section - ${section.name}`" />
    <div class="page-header">
        <h3 class="page-title"> Section </h3>
    </div>
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h4 class="card-title m-0">Section informations</h4>
                    <Link :href="route('admin.section.edit', section)" class="btn btn-primary" >Update</Link>
                </div>
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <tbody>
                            <tr>
                                <th>Name</th>
                                <td>{{ section.name }}</td>
                            </tr>
                            <tr>
                                <th>Title</th>
                                <td>{{ section.title }}</td>
                            </tr>
                            <tr>
                                <th>Image</th>
                                <td>
                                    <img v-if="section.image" :src="section.image" :alt="section.name" style="width: 100px; height: 100px; object-fit: contain; border-radius: 0;">
                                    <div class="text-center" v-else>-</div>
                                </td>
                            </tr>
                            <tr>
                                <th>Description</th>
                                <td>{{ section.description }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            </div>
        </div>
    </div>
</template>
