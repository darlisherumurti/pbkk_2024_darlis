<template>
    <div class="card">
        <div class="card-header">
            Shared state : <strong>{{ count }}</strong> ( Props Down & Event Up)
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col">
                    <SharedCounter
                        title="Counter 1"
                        :count="count"
                        @increment="increment"
                        @decrement="decrement"
                    />
                </div>
                <div class="col">
                    <SharedCounter
                        title="Counter 2"
                        :count="count"
                        @increment="increment"
                        @decrement="decrement"
                    />
                </div>
                <div class="col">
                    <SharedCounter
                        :count="count"
                        @increment="increment"
                        @decrement="decrement"
                    />
                </div>
            </div>
        </div>
    </div>
</template>
<script lang="ts">
import { defineComponent, ref } from "vue";
import SharedCounter from "./SharedCounter.vue";
export default defineComponent({
    components: { SharedCounter },
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
