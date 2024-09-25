<template>
    <nav v-if="paginator !== undefined" role="navigation">
        <ul class="pagination">
            <li v-for="link in paginator.links" class="page-item">
                <a
                    v-html="link.label"
                    v-if="
                        !isFirstOrLastOrDots(
                            index,
                            paginator.links.length,
                            link.label
                        )
                    "
                    :class="{
                        active: link.active === true,
                    }"
                    :href="link.url"
                    class="page-link"
                >
                </a>
            </li>
        </ul>
    </nav>
</template>

<script>
export default {
    name: "Paginator",
    props: {
        paginator: {
            current_page: Number,
            data: Array,
            first_page_url: String,
            from: Number,
            last_page: Number,
            last_page_url: String,
            links: Array,
            next_page_url: String,
            path: String,
            per_page: Number,
            prev_page_url: String,
            to: Number,
            total: Number,
        },
    },

    methods: {
        isFirstOrLastOrDots(index, links_length, label) {
            return (
                index === 0 ||
                index === links_length - 1 ||
                label.includes("...")
            );
        },
    },

    computed: {
        onFirstPage() {
            return this.paginator.current_page === 1;
        },

        hasMorePages() {
            return this.paginator.current_page < this.paginator.last_page;
        },

        nextPageUrl() {
            return this.paginator.next_page_url;
        },

        previousPageUrl() {
            return this.paginator.prev_page_url;
        },

        firstItem() {
            return this.paginator.from;
        },

        lastItem() {
            return this.paginator.to;
        },

        total() {
            return this.paginator.total;
        },
    },
};
</script>
