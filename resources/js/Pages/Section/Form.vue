<script setup>
import ImageInputFile from '@/Components/ImageInputFile.vue';
import InputField from '@/Components/InputField.vue';
import { useForm } from '@inertiajs/vue3';
import { computed } from 'vue';


const props = defineProps({
    section:{
        type: Object,
        default : null
    }
})

const section = computed(() => props?.section)

const form = useForm({
    name: section.value?.name || '',
    title: section.value?.title || '',
    image : null,
    description : section.value?.description || '',
})

const submit = () => {
    console.log({form})
    if(section.value === null)
        form.post(route('admin.section.store'))
    else
        form.put(route('admin.section.update', section.value))
}

</script>

<template>
    <Head title="Section" />
    <div class="page-header">
        <h3 class="page-title"> Sections </h3>
    </div>
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <h4 class="card-title m-0">{{ section?.title || 'Section form' }}</h4>
                    </div>
                    <form @submit.prevent="submit" novalidate>
                        <div class="row">
                            <InputField
                              v-model="form.name"
                              label="Name"
                              placeholder="Section Name"
                              :error="form.errors?.name"
                              :autofocus="true"
                              input-id="name"
                              :required="true"
                            />
                            <InputField
                              v-model="form.title"
                              label="Title"
                              placeholder="Section Title"
                              :error="form.errors?.title"
                              input-id="title"
                              :required="true"
                            />
                            <ImageInputFile
                            v-model="form.image"
                            :default-image="section?.image"
                            :error="form.errors?.image"
                            label="Image"
                            />
                            <InputField
                              v-model="form.description"
                              label="Description"
                              placeholder="Section Description"
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
