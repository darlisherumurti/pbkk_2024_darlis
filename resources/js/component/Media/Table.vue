<template>
    <DataTable
        :data="data"
        :columns="columns"
        :options="tableOptions"
        class="display table table-bordered table-striped"
    >
        <!-- <thead>
            <tr>
                <th>ID</th>
                <th>Filename</th>
                <th>Filepath</th>
                <th>Filetype</th>
                <th>Filesize</th>
                <th>URL</th>
                <th>Created at</th>
            </tr>
        </thead> -->
    </DataTable>
</template>
<script lang="ts">
import { defineComponent, PropType, onMounted, render } from "vue";
import DataTable from "datatables.net-vue3";
import DataTablesCore from "datatables.net-dt";
const columns = [
    { data: "id", title: "ID" },
    { data: "file_name", title: "Filename" },
    { data: "file_path", title: "Filepath" },
    { data: "file_type", title: "Filetype" },
    {
        data: "file_size",
        title: "Filesize (KB)",
        render: (data: number) => (data / 1024).toFixed(2) + " KB",
    },
    {
        data: "url",
        title: "Image",
        render: (data: string) =>
            `<a href="${data}" data-lightbox="image-gallery">
                <img src="${data}" alt="Image" style="width: 100px; height: auto;" />
            </a>`,
    },
    {
        data: "created_at",
        title: "Created at",
        render: (data: string) => new Date(data).toLocaleString(),
    },
];

DataTable.use(DataTablesCore);
export default defineComponent({
    props: {
        data: {
            type: Array as PropType<any[]>,
            required: true,
            default: [],
        },
    },
    components: {
        DataTable,
    },
    setup() {
        const tableOptions = {
            paging: false, // Disable pagination
            searching: false, // Disable search
            ordering: true, // Enable column ordering
            info: false, // Disable table info
        };
        return {
            columns,
            tableOptions,
        };
    },
});
</script>
<style>
@import "datatables.net-dt";
</style>
