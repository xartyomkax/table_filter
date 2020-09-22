<template>
  <div class="container">
    <h3>Search</h3>
    <SearchForm :attributes="attributes" @update-table="updateTable" />
  </div>
  <div class="scrolled-table">
    <Table :records="records" />
  </div>
</template>

<script>
import SearchForm from '@/components/SearchForm.vue';
import Table from '@/components/Table.vue';

export default {
  name: 'history',
  data: () => ({
    loading: true,
    records: [],
    url: 'http://localhost:8081/products',
    attributes: {
      id: 'ID',
      gtin: 'GTIN',
      product_name: 'Product name',
      product_desc: 'Product Description',
      price: 'Price',
      currency: 'Currency',
      category: 'Category',
      gender: 'Gender',
      quantity: 'Quantity',
      size: 'Size',
      style: 'Style',
      color: 'Color',
      url: 'Url',
      image: 'Image',
      image_additional: 'Additional image',
      additional: 'Additional',
      source_video: 'Video',
    },
  }),
  async mounted() {
    this.updateTable();
    this.loading = false;
  },
  methods: {
    async updateTable(filters = {}, size = '', sort = '') {
      console.log(filters, size, sort);
      let query = Object.entries(filters).map(([key, val]) => `filters[${key}]=${val}`).join('&');
      if (sort) {
        query += `&sort=${sort}`;
      }

      const res = await fetch(`${this.url}?${query}`);
      this.records = await res.json();
    },
  },
  components: {
    SearchForm, Table,
  },
};
</script>

<style scoped>
  .scrolled-table {
    overflow-x: auto;
    max-width: 90%;
    margin: 20px auto;
  }
</style>
