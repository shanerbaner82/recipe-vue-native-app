const baseUrl = 'https://api.spoonacular.com';

export default class RecipeService {
    static searchRecipes(search) {
        return this.getApiKey().then(key => {
            let url = baseUrl + '/recipes/complexSearch?query=' + search + '&apiKey=' + key.data;
            return axios.get(url);
        })
    }

    static getApiKey(){
        return axios.get('/api/apikey');
    }

    static storeApiKey(key){
        return axios.post('/api/apikey?apikey=' + key);
    }
}
