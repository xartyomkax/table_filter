<template>
  <p>page {{ currentPage }} of {{ pageCount }}</p>
  <nav>
    <ul class="pagination">
      <li class="page-item" :class="currentPage == 1 ? 'disabled' : ''">
        <a class="page-link" href="#" @click.prevent="$emit('change-page', 'prev')">Previous</a>
      </li>

      <li class="page-item"
          v-for="(item) of paginationList" :key="item"
          :class="currentPage == item ? 'active' : ''">
        <a class="page-link" href="#" @click.prevent="$emit('change-page', item)">{{item}}</a>
      </li>

      <li class="page-item" :class="currentPage == pageCount ? 'disabled' : ''">
        <a class="page-link" href="#" @click.prevent="$emit('change-page', 'next')">Next</a></li>
    </ul>
  </nav>
</template>

<script>
export default {
  name: 'pagination',
  data: () => ({
    buttonCount: 5,
  }),
  props: {
    pageSize: {
      required: true,
      type: Number,
    },
    currentPage: {
      required: true,
      type: Number,
    },
    pageCount: {
      required: true,
      type: Number,
    },
  },
  computed: {
    paginationList() {
      const range = new Array(this.$props.pageCount).fill(1).map((_, i) => i + 1);
      if (this.$props.pageCount <= this.buttonCount) {
        return range;
      }

      const offset = Math.floor(this.buttonCount / 2);
      if (this.$props.currentPage - offset <= 1) {
        return range.slice(0, this.buttonCount);
      }

      if (this.$props.currentPage + offset >= this.$props.pageCount) {
        return range.slice(this.$props.pageCount - this.buttonCount, this.$props.pageCount);
      }

      return range.slice(this.$props.currentPage - offset - 1, this.$props.currentPage + offset);
    },
  },
};
</script>
