<template>
  <div class="container">
    <h3>Search</h3>
    <SearchForm :attributes="attributes" @update-table="updateTable" />
  </div>
  <div class="scrolled-table">
    <Pagination
      :pageSize="pageSize"
      :currentPage="currentPage"
      :pageCount="pageCount"
      @change-page="changePage" />

    <Table :records="visibleRecords" />

    <Pagination
      :pageSize="pageSize"
      :currentPage="currentPage"
      :pageCount="pageCount"
      @change-page="changePage" />

  </div>
</template>

<script>
import SearchForm from '@/components/SearchForm.vue';
import Table from '@/components/Table.vue';
import Pagination from '@/components/Pagination.vue';

export default {
  name: 'history',
  data: () => ({
    loading: true,
    pageSize: 5,
    currentPage: 1,
    pageCount: 1,
    allRecords: [],
    visibleRecords: [],
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
      this.currentPage = 1;
      if (size) {
        this.pageSize = parseInt(size, 10);
      }

      let query = Object.entries(filters).map(([key, val]) => `filters[${key}]=${val}`).join('&');
      if (sort) {
        query += `&sort=${sort}`;
      }

      const res = await fetch(`${this.url}?${query}`);
      this.allRecords = await res.json();

      this.pageCount = Math.ceil(this.allRecords.length / this.pageSize);

      this.changePage(this.currentPage);
    },
    changePage(pageNumer) {
      switch (pageNumer) {
        case 'next':
          if (this.currentPage < this.pageCount) {
            this.currentPage += 1;
          }
          break;
        case 'prev':
          if (this.currentPage > 1) {
            this.currentPage -= 1;
          }
          break;
        default:
          this.currentPage = pageNumer;
      }

      const end = this.currentPage * this.pageSize;
      this.visibleRecords = this.allRecords.slice(end - this.pageSize, end);
    },
  },
  components: {
    SearchForm, Table, Pagination,
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
