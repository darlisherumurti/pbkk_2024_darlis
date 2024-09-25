<template>
    <div class="card">
        <div class="card-header">Hello from vue</div>
    </div>
    <div class="card">
        <div class="card-header">Per-component state</div>
        <div class="card-body">
            <div class="row">
                <div class="col">
                    <Counter title="Counter 1" />
                </div>
                <div class="col">
                    <Counter title="Counter 2" />
                </div>
                <div class="col">
                    <Counter />
                </div>
            </div>
        </div>
    </div>
    <Shared />
</template>
<script lang="ts">
import { defineComponent, ref } from "vue";
import Counter from "../component/Counter.vue";
import Shared from "../component/Shared.vue";
export default defineComponent({
    components: { Counter, Shared },
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
<style lang="css"></style>
