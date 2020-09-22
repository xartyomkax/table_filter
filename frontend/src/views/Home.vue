<template>
  <div>
    <div class="page-title">
      <h3>Table</h3>
    </div>

    <section>
      <SearchForm />
    </section>

    <section>
      <Table :records="records" />
    </section>
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
  }),
  async mounted() {
    const res = await fetch('http://localhost:8081/products');
    this.records = await res.json();
    this.loading = false;
  },
  components: {
    SearchForm, Table,
  },
};
</script>
