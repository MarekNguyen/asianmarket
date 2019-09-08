<template>
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-lg-8 col-sm-12">
                <div class="card">
                    <h4 class="card-header text-center text-light bg-primary">Menu</h4>
                    <div class="card-body">
                        <div class="row">
                            <button class="retail-box" v-for="(product, index) in products" :key="index" @click="addProductToOrder(index)">
                                <center>
                                    <img :src="product.link" alt="" class="productImg">
                                    <div>{{ product.id }} {{ product.name }}</div>
                                </center>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-lg-4 col-sm-12">
                <div class="card">
                    <h4 class="card-header text-center text-light bg-success">Zamowienie</h4>
                    <div class="card-body">
                        <div class="order-product" v-for="(product, index) in order" :key="index">{{ product.quantity }} x {{ product.name }} <span class="float-right"> {{ product.quantity * product.retail }} zł</span></div>
                        
                    </div>
                    <div class="card-footer">
                        <button class="btn btn-success" @click="addNewOrder()">Finish</button>
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
                root:'http://localhost/pitaya/public',
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
                            console.log(product.quantity);
                            
                            break;
                        } else if ( i === this.order.length - 1){
                            this.order.push(product);
                            console.log(product.quantity);
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
                            link: this.root + element.link,
                            quantity: 1
                        };
                        this.products.push(data);
                    });
                });
            },
            addNewOrder(){
                console.log(this.products);
                this.order = [];
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
        font-size: 10px;
    }
    .order-product {

    }
    .productImg{
        height: 100px;
        width: 100px;
    }
</style>