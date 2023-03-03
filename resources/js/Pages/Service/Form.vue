<script setup>
import ImageInputFile from '@/Components/ImageInputFile.vue';
import InputField from '@/Components/InputField.vue';
import { useForm } from '@inertiajs/vue3';
import { computed } from 'vue';


const props = defineProps({
    service:{
        type: Object,
        default : null
    }
})

const service = computed(() => props?.service)

const form = useForm({
    name: service.value?.name || '',
    title: service.value?.title || '',
    image : null,
    description : service.value?.description || '',
})

const submit = () => {
    console.log({form})
    if(service.value === null)
        form.post(route('admin.service.store'))
    else
        form.put(route('admin.service.update', service.value))
}

</script>

<template>
    <Head title="Service" />
    <div class="page-header">
        <h3 class="page-title"> Services </h3>
    </div>
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <h4 class="card-title m-0">{{ service?.title || 'Service form' }}</h4>
                    </div>
                    <form @submit.prevent="submit" novalidate>
                        <div class="row">
                            <InputField
                              v-model="form.title"
                              label="Title"
                              placeholder="Service Title"
                              :error="form.errors?.title"
                              input-id="title"
                              :required="true"
                            />
                            <ImageInputFile
                              v-model="form.image"
                              :default-image="service?.image"
                              :error="form.errors?.image"
                              label="Image"
                              required
                            />
                            <InputField
                              v-model="form.description"
                              label="Description"
                              placeholder="Service Description"
                              :error="form.errors?.description"
                              input-id="description"
                              :is-textarea="true"
                            />
                        </div>
                        <button :disabled="form.processing" type="submit" class="btn btn-primary me-2">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</template>
