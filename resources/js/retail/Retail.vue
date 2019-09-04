<template>
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-lg-8 col-sm-12">
                <div class="card">
                    <h4 class="card-header text-center text-light bg-primary">Menu</h4>
                    <div class="card-body">
                        
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-lg-4 col-sm-12">
                <div class="card">
                    <h4 class="card-header text-center text-light bg-success">Zamowienie</h4>
                    <div class="card-body">

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
                menu: {

                },
                Order: {

                }
            }
        },
        created() {
            this.fetchData();
        },
        methods: {
            fetchData(){
                fetch('').then('');
            }
        },
    }
</script>