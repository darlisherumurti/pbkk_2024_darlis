<template>
    <div>
        <div class="card">
            <div class="card-header">
                <ul
                    class="nav nav-tabs card-header-tabs"
                    id="myTab"
                    role="tablist"
                >
                    <li class="nav-item">
                        <a
                            class="nav-link active"
                            id="home-tab"
                            data-toggle="tab"
                            href="#home"
                            role="tab"
                            aria-controls="home"
                            aria-selected="true"
                            >Conditional Rendering (v-if)</a
                        >
                    </li>
                    <li class="nav-item">
                        <a
                            class="nav-link"
                            id="profile-tab"
                            data-toggle="tab"
                            href="#profile"
                            role="tab"
                            aria-controls="profile"
                            aria-selected="false"
                            >Looping (v-for)</a
                        >
                    </li>
                    <li class="nav-item">
                        <a
                            class="nav-link"
                            id="contact-tab"
                            data-toggle="tab"
                            href="#contact"
                            role="tab"
                            aria-controls="contact"
                            aria-selected="false"
                            >Data Binding (v-bind)</a
                        >
                    </li>
                    <li class="nav-item">
                        <a
                            class="nav-link"
                            id="v-on-tab"
                            data-toggle="tab"
                            href="#v-on"
                            role="tab"
                            aria-controls="v-on"
                            aria-selected="false"
                            >Event Handling (v-on)</a
                        >
                    </li>
                </ul>
            </div>
            <div class="card-body">
                <div class="tab-content" id="myTabContent">
                    <div
                        class="tab-pane fade show active"
                        id="home"
                        role="tabpanel"
                        aria-labelledby="home-tab"
                    >
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
                        <div class="card mt-4" v-if="vif_value">
                            <div class="card-body">
                                This card is conditionally rendered using v-if.
                            </div>
                        </div>
                    </div>
                    <div
                        class="tab-pane fade"
                        id="profile"
                        role="tabpanel"
                        aria-labelledby="profile-tab"
                    >
                        <ul>
                            <li v-for="buku in bukus" :key="buku">
                                {{ buku }}
                            </li>
                        </ul>
                    </div>
                    <div
                        class="tab-pane fade"
                        id="contact"
                        role="tabpanel"
                        aria-labelledby="contact-tab"
                    >
                        <div class="mb-3">
                            <label
                                for="exampleFormControlInput1"
                                class="form-label"
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
                    </div>
                    <div
                        class="tab-pane fade"
                        id="v-on"
                        role="tabpanel"
                        aria-labelledby="v-on-tab"
                    >
                        <div class="row">
                            <div class="col">
                                <div
                                    v-on:click="clicked"
                                    class="card card-body"
                                >
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
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script lang="ts">
import { ref } from "vue";
import { useToast } from "vue-toastification";
export default {
    compatConfig: { MODE: 3 },
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
