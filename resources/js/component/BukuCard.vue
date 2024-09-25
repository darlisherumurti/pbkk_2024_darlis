<template>
    <div class="card overflow-auto position-relative">
        <img
            loading="lazy"
            :src="buku.image_url"
            class="card-img-top"
            :alt="buku.judul"
        />
        <div class="card-body">
            <h5 class="card-title">
                <b>{{ buku.judul }}</b>
            </h5>
            <br />
        </div>
    </div>
</template>
<script>
import { defineComponent } from "vue";
export default defineComponent({
    props: {
        buku: {
            typeof: Object,
            required: true,
        },
    },
});
</script>
<style lang=""></style>
