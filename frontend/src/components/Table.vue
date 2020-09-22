<template>
  <table>
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
      <th>image</th>
      <th>image_additional</th>
      <th>additional</th>
      <th>source_video</th>
    </tr>
    </thead>

    <tbody>
    <tr v-for="(record) of records" :key="record.id">
      <td>{{ record.id }}</td>
      <td>{{ record.gtin }}</td>
      <td>{{ record.product_name }}</td>
      <td>{{ record.product_desc }}</td>
      <td>{{ record.price }}</td>
      <td>{{ record.currency }}</td>
      <td>{{ record.category }}</td>
      <td>{{ record.gender }}</td>
      <td>{{ record.quantity }}</td>
      <td>{{ record.size }}</td>
      <td>{{ record.style }}</td>
      <td>{{ record.color }}</td>
      <td><a :href="record.url" >link</a></td>
      <td><img :src="record.image" /></td>
      <td><img :src="record.image_additional" /></td>
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
  td {
    max-width: 150px;
    word-break: break-all;
  }
</style>
