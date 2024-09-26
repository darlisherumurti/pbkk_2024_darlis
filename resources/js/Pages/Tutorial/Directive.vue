<style lang="css" scoped src="../../../css/bootstrap.min.css"></style>

<template>
    <div>
        <BCard class="bg-neutral" no-body>
            <BTabs card>
                <BTab title="v-if" active>
                    <div class="form-check form-switch">
                        <input
                            class="form-check-input"
                            type="checkbox"
                            role="switch"
                            id="flexSwitchCheckDefault"
                            v-model="vif_value"
                        />
                        <label
                            class="form-check-label"
                            for="flexSwitchCheckDefault"
                            >Toggle this switch element</label
                        >
                    </div>
                    <!-- <p>The switch is {{ vif_value ? "ON" : "OFF" }}</p> -->
                    <div class="card mt-4" v-if="vif_value">
                        <div class="card-body">
                            This card is conditionally rendered using v-if.
                        </div>
                    </div>
                </BTab>
                <BTab title="v-for">
                    <ul>
                        <li v-for="buku in bukus" :key="buku">
                            {{ buku }}
                        </li>
                    </ul>
                </BTab>
                <BTab title="v-model">
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label"
                            >myText value : {{ myText }}</label
                        >
                        <input
                            v-model="myText"
                            type="text"
                            class="form-control"
                            id="exampleFormControlInput1"
                            placeholder="This is two-way data binding"
                        />
                    </div>
                </BTab>
                <BTab title="v-on">
                    <div class="row">
                        <div class="col">
                            <div v-on:click="clicked" class="card card-body">
                                Click me
                            </div>
                        </div>
                        <div class="col">
                            <div class="card card-body">
                                <div class="mb-3">
                                    <label for="text" class="form-label"
                                        >Input change event</label
                                    >
                                    <input
                                        v-on:input="changed"
                                        type="text"
                                        class="form-control"
                                        id="text"
                                        placeholder="Type here"
                                    />
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div
                                v-on:mouseover="hovered"
                                class="card card-body"
                            >
                                Hover me
                            </div>
                        </div>
                    </div>
                </BTab>
            </BTabs>
        </BCard>
    </div>
</template>
<script lang="ts">
import { BTab, BCard, BTabs, BCardText } from "bootstrap-vue-next";
import { ref } from "vue";
import { useToast } from "vue-toastification";

export default {
    compatConfig: { MODE: 3 },
    components: { BTab, BTabs, BCard, BCardText },
    setup() {
        const vif_value = ref(false);
        const myText = ref("");
        const toast = useToast();
        const clicked = () => {
            toast.success("Button Clicked!");
        };

        const hovered = () => {
            toast.info("Hovered over the card!");
        };

        const changed = (e: Event) => {
            const target = e.target as HTMLInputElement;
            toast.warning(`Input changed! ${target.value}`);
        };
        return {
            vif_value,
            myText,
            clicked,
            hovered,
            changed,
        };
    },
    data() {
        const bukus = ["buku1", "buku2", "buku3", "buku4"];
        return {
            bukus,
        };
    },
};
</script>
