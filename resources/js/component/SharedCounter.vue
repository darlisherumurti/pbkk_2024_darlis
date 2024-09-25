<template>
    <div class="card">
        <div class="card-header">Hello from shared : {{ title }}</div>
        <div class="card-body">
            <p>Count value : {{ count }}</p>
            <div class="row">
                <button
                    class="btn mr-2 btn-primary"
                    @click="$emit('increment', 1)"
                >
                    Increment 1
                </button>

                <button
                    class="btn mr-2 btn-secondary"
                    @click="$emit('decrement', 1)"
                >
                    Decrement 1
                </button>
            </div>
        </div>
    </div>
</template>
<script lang="ts">
import { defineComponent, ref } from "vue";

export default defineComponent({
    props: {
        title: {
            type: String,
            default: "Default Title",
        },
        count: {
            type: Number,
            default: 0,
        },
    },
});
</script>
<style lang=""></style>
