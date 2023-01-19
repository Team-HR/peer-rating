<template>
    <Card class="w-full">
        <template #title> <i :class="icon"></i> <span class="uppercase"> {{ title }}</span></template>
        <template #subtitle>{{ description }}</template>
        <template v-if="$page.props.auth.user.sys_employee_id" #content>
            <form @submit.prevent="$inertia.get(path + period_id)" class="">
                <label class="mr-2">Selected Period:</label>
                <Dropdown autofocus class="mr-2" v-model="period_id" :options="periods" optionLabel="text"
                          optionValue="id" placeholder="Please select a period" />
                <Button :disabled="!period_id" type="submit"
                        :class="!period_id ? 'p-button p-button-primary p-button-text disabled' : 'p-button p-button-primary'"
                        :icon="!period_id ? 'bi bi-arrow-left' : 'bi bi-folder'"
                        :label="!period_id ? 'Select a period first' : 'Open'" />
            </form>
        </template>
        <template v-else #content>
            <p class="text-red-700">*Only available for users with an associated employee ID.</p>
        </template>
    </Card>
</template>
<script>

export default {
    props: {
        icon: {
            type: String,
            default: "pi pi-question-circle"
        },
        title: {
            type: String,
            default: "{{ Title here }}"
        },
        description: {
            type: String,
            default: "{{ Description here }}"
        },
        path: ""
    },
    data() {
        return {
            period_id: null,
            periods: []
        };
    },
    mounted() {
        axios('/api/pms/periods').then(({ data }) => {
            this.periods = data
        });
    }
};
</script>
