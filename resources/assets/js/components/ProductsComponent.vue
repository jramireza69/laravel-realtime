<template>
    <div class="row pt-5 pb-5">

        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
            <div class="card">
                <div class="card-header">
                    <h3><i class="fa fa-image"></i> Productos </h3>
                </div>
            </div>
        </div>
        <div class="card-body" v-if="products.length || processing">
            <div class="row">
                <div
                    v-for="(product, index) in products"
                    :key="index"
                    class="col-sm-3"
                    style="margin-bottom: 10px"
                >
                    <a
                        v-if="!logged"
                        :href="`/products/${product.image}`"
                        style="margin-top: 15px"
                        target="_blank"
                    >
                        <img :alt="product.name" :src="`/product/${product.image}`" class="img-fluid" />
                    </a>

                    <a
                        v-else
                        @click.prevent="addProductInCart(product.productId)"
                        style="margin-top: 15px; cursor: pointer"

                    >
                        <img :alt="product.name" :src="`/products/${product.image}`" class="img-fluid" />
                    </a>
                    <div class="text-center">
                        <span class="badge badge-danger text-white text-center">
                            Precio: {{ product.price}}
                        </span>
                    </div>
                </div>
            </div>

        </div>

        <div v-else class="card-body">

                <div class="alert alert-warning" role="alert">
                <h4 class="alert-heading">No hay productos disponibles</h4>
                <p>Aun no hay promociones pero pueden estar en cualquier momento</p>
        </div>

        </div>
    </div>
    
</template>

<script>

    import Cartmixin from '../mixins/cart';
    import Productsmixin from '../mixins/products';

    export default {
        name: "products-component",

        mixins: [Cartmixin, Productsmixin],

        data () {
            return {
                products: [],
                processing: false,
                url: '/products'
            }
        },

        methods: {
            prepareData(productsData){
                let products = productsData.data;
                products.forEach(product => {
                    this.products.push({
                        id: product.id,
                        productId: product.product.id,
                        name: product.product.name,
                        price: product.price,
                        image: product.product.image
                    });
                });
            }
        }

    }
</script>

<style>

</style>