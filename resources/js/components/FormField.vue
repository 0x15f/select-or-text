<template>
    <default-field :field="field" :errors="errors">
        <template slot="field">
            <select 
                v-show="!customOption"
                v-model="value"
                class="w-full form-control form-select"
                :class="errorClasses"
                @change="
                    if($event.target.value === 'CUSTOM' && $event.target.value !== '') { 
                        customOption = true;
                        handleChange(''); 
                    } 
                    else { 
                        handleChange($event.target.value); 
                    }
                "
            >
                <option value="" selected disabled>{{ __('Choose an option') }}</option>

                <option
                    v-for="option in field.options"
                    :value="option.value"
                    :selected="option.value == value"
                >
                    {{ option.label }}
                </option>

                <option value="CUSTOM">{{ __('Custom (Free Text)') }}</option>
            </select>

            <input v-show="customOption" type="text"
                class="w-full form-control form-input form-input-bordered"
                :class="errorClasses"
                :placeholder="field.name"
                v-model="value"
                @change="handleChange($event.target.value)"
            />
        </template>
    </default-field>
</template>

<script>
import { FormField, HandlesValidationErrors } from 'laravel-nova'

export default {
    mixins: [FormField, HandlesValidationErrors],

    props: ['resourceName', 'resourceId', 'field'],

    data() {
        return {
            customOption: false
        };
    },

    methods: {
        /*
         * Set the initial, internal value for the field.
         */
        setInitialValue() {
            this.value = this.field.value || ''
        },

        /**
         * Fill the given FormData object with the field's internal value.
         */
        fill(formData) {
            formData.append(this.field.attribute, this.value || '')
        },

        /**
         * Update the field's internal value.
         */
        handleChange(value) {
            this.value = value
        },
    },
}
</script>
