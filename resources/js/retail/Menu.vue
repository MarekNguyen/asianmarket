<template>
    <div class="container">
        <div class="row">
            <div class="retail-box" v-for="(item, index) in menu" :key="index" @click="comp(index)">
                {{ item }}
            </div>
            
            
        </div>
    </div>
</template>

<script>
    export default {
        mounted() {
            console.log('Component mounted.')
        },
        data() {
            return {
                selectedComponent:'',

                menu: { 
                    retail: 'Retail',
                    wholesale: 'WholeSale'
                }
            }
        },
        props: ['comp'],
        methods: {
            clickIndex(index){
                console.log(index);
            }
        },
    }
</script>
<style scoped>
    .retail-box {
        /* display: inline-block; */
        height: 150px;
        width: 150px;
        background-color: #3490dc;
        margin: 0 2px;
        color: white;
        cursor: pointer;
        text-align: center;
        display: flex;
        justify-content: center;
        align-content: center;
        flex-direction: column;
        font-size: 25px;
    }
   
</style>
