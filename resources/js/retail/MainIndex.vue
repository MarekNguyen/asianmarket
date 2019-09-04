<template>
    <div>
        <keep-alive>
            <component :is="selectedComponent" :comp="changeComponent"></component>
        </keep-alive>
    </div>
</template>
<script>
    import Menu from './Menu.vue';
    import Retail from './Retail.vue';
    export default {
        components: {
            'app-menu': Menu,
            'app-retail': Retail
        },
        data() {
            return {
                selectedComponent: 'app-menu',
            }
        },
        methods: {
            changeComponent(component){
                let select = '';
                switch (component) {
                    case 'retail':
                        select = 'app-retail';
                        break;
                
                    default:
                        break;
                }
                this.selectedComponent = select;
            }
        },
    }
</script>
