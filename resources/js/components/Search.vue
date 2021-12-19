<template>
    <div class="relative w-2/5">
        <input type="search" name="search" id="search" placeholder="Search" v-model="keywords" class="w-full border focus:border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">

        <div v-if="products.length > 0 && keywords.length > 0" class="absolute w-full bg-gray-50 mt-2 px-4 py-2 z-10">
            <ul>
                <li @click="goToLink(product.id)" v-for="product in products" :key="product.id" v-text="product.name" class="rounded hover:bg-gray-200 px-4 py-2 cursor-pointer"></li>
            </ul>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            keywords: null,
            products: []
        };
    },
    watch: {
        keywords(after, before) {
            this.fetch();
        }
    },
    methods: {
        fetch() {
            axios.get('/search', { params: { keywords: this.keywords } })
                .then(response => this.products = response.data)
                .catch(error => {});
        },
        goToLink(id) {
            window.location.href = `/products/${id}`;
        }
    }
}
</script>