import json from '../departments-small';

export default class ProductService {
    async getProductsSmall() {
        const res = await json.data;
        return res;
    }
}