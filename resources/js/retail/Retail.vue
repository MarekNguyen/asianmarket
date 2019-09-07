<template>
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-lg-8 col-sm-12">
                <div class="card">
                    <h4 class="card-header text-center text-light bg-primary">Menu</h4>
                    <div class="card-body">
                        <div class="row">
                            <button class="retail-box" v-for="(product, index) in products" :key="index" @click="addProductToOrder(index)">{{ product.id }} {{ product.name }}</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-lg-4 col-sm-12">
                <div class="card">
                    <h4 class="card-header text-center text-light bg-success">Zamowienie</h4>
                    <div class="card-body">
                        <div class="order-product" v-for="(product, index) in order" :key="index">{{ product.name }} x {{ product.quantity }} = {{ product.quantity * product.retail }} zł</div>
                        
                    </div>
                    <div class="card-footer">
                        <div class="float-right">Tổng Cộng: {{ orderCost }} zł</div>
                    </div>
                </div>
            </div>
            
            
        </div>
    </div>
</template>
<script>
    
    export default {
        data() {
            return {
                products:[],
                menu: {

                },
                order: [],
            }
        },
        created() {
            this.fetchData();
        },
        computed: {
            orderCost(){
                let sum = 0;
                this.order.forEach(element => {
                    sum += element.retail * element.quantity;
                });
                return sum;
            },
        },
        methods: {
            addProductToOrder(index){
                let product = this.products[index]; 
                if (this.order.length === 0) {
                    this.order.push(product);
                } else {
                    for (let i = 0; i < this.order.length; i++) {
                        if (this.order[i].id == product.id) {
                            this.order[i].quantity++;
                            break;
                        } else if ( i === this.order.length - 1){
                            this.order.push(product);
                            break;
                        }
                        
                    }
                }

            },
            fetchData(){
                fetch('/pitaya/public/api/retail')
                .then(res=> {
                    return  res.json();
                })
                .then(res=>{
                    res.data.forEach(element => {
                        let data = {
                            id: element.id,
                            name: element.name,
                            retail: element.retail_price,
                            link: element.link,
                            quantity: 1
                        };
                        this.products.push(data);
                    });
                });
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
        margin: 2px 2px;
        color: white;
        cursor: pointer;
        text-align: center;
        display: flex;
        justify-content: center;
        align-content: center;
        flex-direction: column;
        font-size: 25px;
    }
    .order-product {

    }
</style>