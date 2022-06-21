<template>
    <div class="flex items-center justify-between py-4">
        <button class="bg-indigo-700 text-white p-2" @click.prevent="addToCart">Ajouter au panier</button>
    </div>
</template>

<script setup>

    import { inject } from '@vue/runtime-core';
import useProduct from '../composables/products'

    const { add } = useProduct();
    const productId = defineProps(['productId']);

    var emitter = require('tiny-emitter/instance');

    const toast = inject('toast');

    const addToCart = async() => {
        // console.log(productId);

        await axios.get('/sanctum/csrf-cookie');
        await axios.get('/api/user')
            .then(async(res) =>{
                let cartCount = await add(productId);
                emitter.emit('cartCountUpdated', cartCount);
                toast.success('Produit ajouté au panier', {
                    position: 'top-right',
                    duration: 3000
                });
            })
            .catch(() => {
                toast.error('Vous devez être connecté pour ajouter un produit au panier');
            });
    }
</script>

<style>

</style>
