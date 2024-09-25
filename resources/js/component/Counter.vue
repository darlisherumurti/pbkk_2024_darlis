<template>
    <div class="card">
        <div class="card-header">Hello from {{ title }}</div>
        <div class="card-body">
            <p>Count value : {{ count }}</p>
            <div class="row">
                <button
                    class="btn mr-2 btn-primary"
                    @click="() => increment(1)"
                >
                    Increment 1
                </button>

                <button
                    class="btn mr-2 btn-secondary"
                    @click="() => decrement(1)"
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
    },
    setup() {
        const count = ref(0);

        const increment = (num: number) => {
            count.value += num;
        };
        const decrement = (num: number) => {
            count.value -= num;
        };

        return {
            count,
            increment,
            decrement,
        };
    },
});
</script>
<style lang=""></style>
