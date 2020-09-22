<template>
  <table class="table table-striped table-bordered">
    <thead>
    <tr>
      <th>id</th>
      <th>gtin</th>
      <th>product_name</th>
      <th>product_desc</th>
      <th>price</th>
      <th>currency</th>
      <th>category</th>
      <th>gender</th>
      <th>quantity</th>
      <th>size</th>
      <th>style</th>
      <th>color</th>
      <th>url</th>
      <th class="r-img">image</th>
      <th class="r-img">image_additional</th>
      <th>additional</th>
      <th>source_video</th>
    </tr>
    </thead>

    <tbody>
    <tr v-for="(record) of records" :key="record.id">
      <td>{{ record.id }}</td>
      <td>{{ record.gtin }}</td>
      <td>{{ record.product_name }}</td>
      <td class="r-description">{{ record.product_desc }}</td>
      <td>{{ record.price }}</td>
      <td>{{ record.currency }}</td>
      <td>{{ record.category }}</td>
      <td>{{ record.gender }}</td>
      <td>{{ record.quantity }}</td>
      <td>{{ record.size }}</td>
      <td>{{ record.style }}</td>
      <td>{{ record.color }}</td>
      <td><a :href="record.url" >link</a></td>
      <td class="r-img"><img :src="record.image" /></td>
      <td class="r-img"><img :src="record.image_additional" /></td>
      <td>{{ record.additional }}</td>
      <td>
        <video width="320" height="240" controls>
          <source :src="record.source_video" type="video/webm">
        </video>
      </td>
    </tr>
    </tbody>
  </table>
</template>

<script>
export default {
  name: 'Table',
  props: {
    records: {
      required: true,
      type: Array,
    },
  },
};
</script>

<style scoped>
  td{
    padding: 5px;
    text-align: left;
  }
  .r-description{
    width: 300px;
  }
  .r-img {
    width: 100px;
  }
  .r-img img {
    max-width: 90px;
  }
</style>
