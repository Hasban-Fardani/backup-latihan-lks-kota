<script setup>
defineProps(['message', 'show'])
</script>
<template>
    <div class="alert alert-danger" role="alert" v-if="show">
        {{ message }}
    </div>
</template>