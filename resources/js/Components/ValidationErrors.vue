<template>
    <br>
    <br>
    <Message severity="warn" :life="5000" v-if="hasErrors" class="alert alert-danger">
        <p>Whoops! Something went wrong.</p>
        <ul class="mb-0">
            <li v-for="(error, key) in errors" :key="key">{{ error }}</li>
        </ul>        
    </Message>
</template>

<script>
    export default {
        computed: {
            errors() {
                return this.$page.props.errors
            },

            hasErrors() {
                return Object.keys(this.errors).length > 0;
            },
        }
    }
</script>
