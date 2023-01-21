<script setup>
import { computed } from 'vue';


const props = defineProps({info:Object})

const info = computed(() => props.info)

</script>

<template>
    <Head title="Information" />
    <div class="page-header">
        <h3 class="page-title"> Information </h3>
    </div>
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h4 class="card-title m-0">Information</h4>
                    <Link :href="route('admin.info.edit', info)" class="btn btn-primary" >Update</Link>
                </div>
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <tbody>
                            <tr>
                                <th>Name</th>
                                <td>{{ info.name }}</td>
                            </tr>
                            <tr>
                                <th>Email</th>
                                <td>{{ info.email }}</td>
                            </tr>
                            <tr>
                                <th>Tel</th>
                                <td>{{ info.tel }}</td>
                            </tr>
                            <tr>
                                <th>Address</th>
                                <td>{{ info.address }}</td>
                            </tr>
                            <tr>
                                <th>Bp</th>
                                <td>{{ info.bp }}</td>
                            </tr>
                            <tr>
                                <th>Description</th>
                                <td>{{ info.description }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            </div>
        </div>
    </div>
</template>
