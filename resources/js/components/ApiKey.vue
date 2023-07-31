<template>
    <div>
        <form @submit.prevent="storeApiKey">
            <div class="flex items-center space-x-4 w-full">
                <div class="mt-2 flex items-center space-x-6 flex-1">
                    <input type="text"  name="apikey" id="search" v-model="apikey"
                           class="w-full  block w-full rounded-md border-0 py-1.5 bg-gray-800 text-gray-200 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-pink-600 sm:text-sm sm:leading-6"
                           placeholder="Add your API Key!">
                    <button type="submit"
                            class="rounded-md bg-pink-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-pink-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-pink-600">
                        Store!
                    </button>
                </div>
            </div>
        </form>
        <div class="mt-20 text-center">
            <router-link to="/"
                         class="rounded-md bg-sky-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-pink-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-pink-600">
                Go back to search!
            </router-link>
        </div>
    </div>
</template>

<script>
import RecipeService from "../recipeService.js";

export default {
    data() {
        return {
            apikey: null,
        }
    },
    methods: {
        storeApiKey() {
            RecipeService.storeApiKey(this.apikey).then(data => this.apiKey = data.data)
            alert('Api Token Saved!');
            this.$router.push('/')
        },
    },

    mounted() {
        RecipeService.getApiKey().then(data => this.apikey = data.data)
    }
}
</script>
