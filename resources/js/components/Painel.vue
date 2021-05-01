<template>
<div class="card">
    <div :class="defineCor"> {{titulo}} </div>
    <div class="card-body">
        <slot></slot>
    </div>
</div>
</template>

<script>
    export default {
        props: ['titulo','cor'],
        computed: {
            defineCor: function(){
                return "card-header "+ this.cor;
            }
        }
    }
</script>

<style media="screen">
    .bg-escuro{
        background-color: rgba(0, 0, 0, 0.1);
    }
</style>
