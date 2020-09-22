<template>

  <form id="search-form" @submit.prevent="$emit('update-table', filter, pageSize, sort)">

    <div class="form-group">
      <label class="control-label" for="name">Product name</label>
      <input type="text" id="name" class="form-control" name="filter[productName]"
             v-model="filter.productName">
    </div>

    <div class="form-group">
      <label class="control-label" for="category">Category</label>
      <input type="text" id="category" class="form-control" name="filter[category]"
             v-model="filter.category">
    </div>

    <div class="form-group">
      <label class="control-label" for="size">Size</label>
      <input type="text" id="size" class="form-control" name="filter[size]"
             v-model="filter.size">
    </div>

    <div class="row">

      <div class="form-group w-50 p-3">
        <label class="control-label" for="pageSize">Rows per page</label>
        <input type="text" id="pageSize" class="form-control" name="pageSize"
               v-model="pageSize">
      </div>

      <div class="form-group w-50 p-3">
        <label class="control-label" for="sort">Sort</label>
        <select id="sort" class="form-control" name="sort" v-model="sort">
          <option value="" selected disabled>Select order</option>
          <optgroup v-for="(label, attribute) of attributes" :key="attribute" :label="label">
            <option :value="attribute">{{label}} - DESC</option>
            <option :value="`-${attribute}`">{{label}} - ASC</option>
          </optgroup>
        </select>
      </div>

    </div>

    <div class="form-group">
      <button type="submit" class="btn btn-success">Search</button>
    </div>

  </form>

</template>

<script>
export default {
  name: 'SearchForm',
  props: {
    attributes: {
      required: true,
      type: Object,
    },
  },
  data: () => ({
    sort: '',
    pageSize: 5,
    filter: {
      productName: '',
      category: '',
      size: '',
    },
  }),
};
</script>
