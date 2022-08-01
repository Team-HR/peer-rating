<template>
  <button
    data-mdb-ripple="true"
    data-mdb-ripple-color="light"
    class="
      inline-block
      px-6
      py-3
      bg-grey-500
      text-grey-900
      font-medium
      text-md
      leading-tight
      uppercase
      rounded
      shadow-md
      transition
      duration-150
      ease-in-out
    "
    :class="disabled ? 'disabled' : ''"
    :disabled="disabled"
  >
    <slot />
  </button>
</template>

<script>
export default {
  props: {
    disabled: Boolean,
  },
};
</script>
