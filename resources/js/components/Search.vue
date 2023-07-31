<template>
    <div>
            <div v-if="apiKey">
                <form @submit.prevent="searchRecipes">
                    <div>
                        <div class="mt-2 flex items-center space-x-6 w-full">
                            <input type="search" name="search" id="search" v-model="search"
                                   class="w-full block w-full rounded-md border-0 py-1.5 bg-gray-800 text-gray-200 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-pink-600 sm:text-sm sm:leading-6"
                                   placeholder="Search for a food: burger, lasagna etc.">
                            <button type="submit"
                                    class="rounded-md bg-pink-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-pink-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-pink-600">
                                Search
                            </button>
                        </div>
                    </div>
                </form>
            </div>
            <div v-else>
                <router-link :to="'/apikey'"
                             class="relative block w-full rounded-lg border-2 border-dashed border-gray-300 p-12 text-center hover:border-gray-400 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                         stroke="currentColor" class="mx-auto h-12 w-12 text-gray-400">
                        <path stroke-linecap="round" stroke-linejoin="round"
                              d="M15.75 5.25a3 3 0 013 3m3 0a6 6 0 01-7.029 5.912c-.563-.097-1.159.026-1.563.43L10.5 17.25H8.25v2.25H6v2.25H2.25v-2.818c0-.597.237-1.17.659-1.591l6.499-6.499c.404-.404.527-1 .43-1.563A6 6 0 1121.75 8.25z"/>
                    </svg>
                    <span class="mt-2 block text-sm font-semibold text-gray-200">Add Your ApiKey</span>
                </router-link>

            </div>

            <div
                class="mx-auto  grid max-w-2xl auto-rows-fr grid-cols-1 gap-8 sm:mt-20 lg:mx-0 lg:max-w-none lg:grid-cols-3"
                v-show="results">
                <article :key="result.id" v-for="result in results"
                         class="relative isolate flex flex-col justify-end overflow-hidden rounded-2xl bg-gray-900 px-8 pb-8 pt-80 sm:pt-48 lg:pt-80">
                    <img :src="result.image" alt="" class="absolute inset-0 -z-10 h-full w-full object-cover">
                    <div class="absolute inset-0 -z-10 bg-gradient-to-t from-gray-900 via-gray-900/40"></div>
                    <div class="absolute inset-0 -z-10 rounded-2xl ring-1 ring-inset ring-gray-900/10"></div>

                    <div class="flex flex-wrap items-center gap-y-1 overflow-hidden text-sm leading-6 text-gray-300">
                        <time datetime="2020-03-16" class="mr-8">Mar 16, 2020</time>
                        <div class="-ml-4 flex items-center gap-x-4">
                            <div class="flex gap-x-2.5">
                                {{ result.title }}
                            </div>
                        </div>
                    </div>
                    <h3 class="mt-3 text-lg font-semibold leading-6 text-white">
                        <a href="#" class="text-pink-600">
                            <span class="absolute inset-0"></span>
                            {{ result.title }}
                        </a>
                    </h3>
                </article>
            </div>
    </div>
</template>

<script>
import RecipeService from "../recipeService.js";

export default {
    data() {
        return {
            search: '',
            results: [],
            apiKey: '',
        }
    },
    methods: {
        searchRecipes() {
            RecipeService.searchRecipes(this.search).then(result => this.results = result.data.results);
        },
    },
    mounted() {
        RecipeService.getApiKey().then(data => this.apiKey = data.data)
    }
}
</script>
