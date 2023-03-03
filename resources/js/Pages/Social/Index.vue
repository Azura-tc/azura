<script setup>
import { computed } from 'vue';


const props = defineProps({socials:Object})

const socials = computed(() => props.socials)

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
                        <Link :href="route('admin.social.create')" class="btn btn-primary" >Create</Link>
                    </div>
                    <p class="card-description"> You can find svg brand on <a href="https://ionic.io/ionicons" target="_blank">ionic.io</a>
                    </p>
                    <div class="table-responsive">
                        <table class="table">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Title</th>
                                        <th>Url</th>
                                        <th>icon</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr v-for="(social, index) in socials">
                                        <td>{{ index + 1 }}</td>
                                        <td>{{ social.title }}</td>
                                        <td><a :href="social.url" target="_blank">{{ social.url }}</a></td>
                                        <td>
                                            <img v-if="social.image" :src="social.image" :alt="social.name" style="width: 10px;">
                                            <div class="text-center" v-else>-</div>
                                        </td>
                                        <td style="white-space: nowrap;">
                                            <Link class="p-0 m-2 btn btn-link" :href="route('admin.social.show', social)"><i class="mdi mdi-eye text-success"></i></Link>
                                            <Link class="p-0 m-2 btn btn-link" :href="route('admin.social.edit', social)"><i class="mdi mdi-pen text-primary"></i></Link>
                                            <Link class="p-0 m-2 btn btn-link" method="delete" as="button" :href="route('admin.social.destroy', social)"><i class="mdi mdi-delete text-danger"></i></Link>
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
