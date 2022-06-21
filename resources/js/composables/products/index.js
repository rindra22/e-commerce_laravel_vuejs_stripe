import { ref } from "vue";

export default function useProduct(){
    const add = async(productId) =>{
        let response = await axios.post('/api/products',{
            productId: productId
        });
        return response.data.count;
    }

    const getCount = async() =>{
        let response = await axios.get('/api/products/count');
        return response.data.count;
    }

    const products = ref([]);
    const cartCount = ref(0);
    const getProducts = async() =>{
        let response = await axios.get('/api/products');
        products.value = response.data.cartContent;
        cartCount.value = response.data.cartCount;
    }

    const increaseQuantity = async(productId) =>{
        await axios.get('/api/products/increase/' + productId);
    }

    const decreaseQuantity = async(productId) =>{
        await axios.get('/api/products/decrease/' + productId);
    }

    const destroyProduct = async(productId) =>{
        await axios.delete('/api/products/' + productId);
    }



    return {
        add,
        getCount,
        products,
        getProducts,
        increaseQuantity,
        decreaseQuantity,
        destroyProduct,
        cartCount
    }
}
