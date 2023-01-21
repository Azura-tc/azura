<script setup>
    const unique = Math.floor(Math.random() * 10)
    defineProps({
        modelValue: Boolean,
        inputClass: String,
        labelClass: String,
        inputId: String,
        required: {
            type: Boolean,
            default: false
        },
        type : {
            type: String,
            required: true
        },
        label: {
            type: String,
            required: true
        },
        error: {
            type: String,
            default: null
        },
    })

    defineEmits(['update:modelValue'])

</script>
<template>

    <div class="form-check">
        <label
          :class="labelClass"
          class="form-check-label"
          :for="inputId"
        >{{ label }}
            <input
            :class="{ 'is-invalid' : error, inputClass }"
            :type="type"
            class="form-check-input"
            @input="$emit('update:modelValue', !modelValue)"
            :id="inputId ?? `input${unique}`"
            :required="required"
            />
            <i class="input-helper"></i>
        </label>

        <div v-if="error" class="invalid-feedback" v-text="error"></div>
    </div>
</template>
