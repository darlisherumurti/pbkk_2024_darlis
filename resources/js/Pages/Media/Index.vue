<template>
    <div class="card">
        <div class="card-header">
            <Paginator :paginator="data.media" />
        </div>
        <div class="card-body">
            <Table :data="data.media.data"></Table>
        </div>
        <div class="card-footer">
            <Paginator :paginator="data.media" />
        </div>
    </div>
</template>
<script lang="ts">
import { defineComponent } from "vue";
import Paginator from "../../component/Paginator.vue";
import Table from "../../component/Media/Table.vue";
export default {
    props: {
        data: {
            type: Object,
            required: true,
        },
    },
    components: {
        Table,
        Paginator,
    },
};
</script>
<style lang=""></style>
