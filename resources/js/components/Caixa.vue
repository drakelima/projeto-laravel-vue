
<template>
    <div :class="defineCor">
        <div class="inner">
            <h3>{{quantidade}}</h3>

            <p> {{titulo}} </p>
        </div>
        <div class="icon">
            <i :class="defineIcone"></i>
        </div>
        <a :href="url" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
    </div>
</template>

<script>
    export default {
        props: ['quantidade','url','titulo','cor', 'icone'],
        computed: {
            defineCor: function(){
                return "small-box "+ this.cor;
            },
            defineIcone: function(){
                return "ion "+ this.icone;
            }
        }
    }
</script>

<style media="screen">
    .bg-aqua {
        background-color: #00c0ef !important;
    }

    .bg-red {
        background-color: #ce7088 !important;
    }

    .bg-orange {
        background-color: #d6a284 !important;
    }

    .small-box{
        border-radius: 2px;
        position: relative;
        display: block;
        margin-bottom: 20px;
        box-shadow: 0 1px 1px rgba(0,0,0,0.1);
    }

    .small-box > .inner {
        padding: 10px;
    }

    .small-box h3, .small-box p {
        z-index: 5;
    }

    .small-box h3 {
        font-size: 38px;
        font-weight: bold;
        margin: 0 0 10px 0;
        white-space: nowrap;
        padding: 0;
    }

    .small-box p {
        font-size: 15px;
    }

    p {
        color: #ffffff;
        margin: 0 0 10px;
    }

    h3{
        color: #ffffff;
    }

    .small-box a{
        color: #ffffff;
    }

    .small-box .icon {
        -webkit-transition: all .3s linear;
        -o-transition: all .3s linear;
        transition: all .3s linear;
        position: absolute;
        top: -10px;
        right: 10px;
        z-index: 0;
        font-size: 90px;
        color: rgba(0,0,0,0.15);
    }

    .ion .ion-bag{
        display: inline-block;
        font-family: "Ionicons";
        font-style: normal;
        font-weight: normal;
        font-variant: normal;
        text-transform: none;
        text-rendering: auto;
        line-height: 1;
        -webkit-font-smoothing: antialiased;
        -moz-osx-font-smoothing: grayscale;
    }



</style>