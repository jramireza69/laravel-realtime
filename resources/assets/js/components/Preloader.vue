<template>
    <div
            v-if="processing"
            :class="center ? 'mx-auto' : '' "
            >
               <a href="#">
                   <img :width="size ? size : ''" src="/images/preloader.gif" />
               </a>
    </div>


    
</template>

<script>
    export default {
        name: "Preloader",
        props: ['processing', 'size', 'center']
    }
</script>

<style>

</style>