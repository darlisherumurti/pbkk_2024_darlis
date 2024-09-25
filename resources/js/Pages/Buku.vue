<template>
    <div class="card">
        <div class="card-header">
            <Paginator :paginator="bukus" />
        </div>
        <div class="card-body">
            <div class="row row-cols-lg-4 row-cols-md-2 row-cols-1">
                <div v-for="buku in bukus?.data" :key="buku.id" class="col">
                    <BukuCard :buku="buku" />
                </div>
            </div>
        </div>
        <div class="card-footer">
            <Paginator :paginator="bukus" />
        </div>
    </div>
</template>
<script lang="ts">
import { defineComponent } from "vue";
import Paginator from "../component/Paginator.vue";
import BukuCard from "../component/BukuCard.vue";
export default defineComponent({
    setup() {},
    props: {
        bukus: {
            type: Object,
        },
        kategoris: {
            type: Array,
        },
    },
    components: {
        Paginator,
        BukuCard,
    },
});
</script>
<style lang=""></style>
