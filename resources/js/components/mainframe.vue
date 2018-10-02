<template>
  <div class="mainframe">
    <slot></slot>
  </div>
</template>

<script>
export default {
}
</script>

<style>
.mainframe {
  margin: 0;
  padding: 20px;
  border: 2px;
  background-color: rgba(1, 30, 111, 0.6);
}

p {
  color: white;
}
</style>
