<template>
    <auth-layout>
        <Card class="mx-auto">
            <template #title><i class="bi bi-gear"></i> Settings : Support Functions</template>
            <template #subtitle>Setup Support Functions for Performance Commitment Reports</template>
            <template #content>


                <PeriodSelector icon="" title="" description="" path="/pms/settings/support_functions/" />

            </template>
        </Card>
    </auth-layout>
</template>
<script>
import AuthLayout from "@/Layouts/Authenticated";
import PeriodSelector from "@/Components/Pms/PeriodSelector.vue"
export default {
    components: {
        AuthLayout,
        PeriodSelector
    },
    props: {
        // years: Array
    },
    data() {
        return {
            current_url: document.location.pathname,
            form: this.$inertia.form({
                year: null
            })
        };
    },
    methods: {
        addYear() {
            console.log(this.current_url);
            // return false;
            // console.log(this.year);
            this.form.post(this.current_url + "/create", {
                preserveScroll: true,
                onSuccess: () => {
                    this.$toast.add({
                        severity: "success",
                        summary: "Success!",
                        detail: "New periods added!",
                        life: 3000,
                    });
                    this.form.year = null
                },
            });
        },
    },
    mounted() {
        // console.log(this.years);
    },
};
</script>

