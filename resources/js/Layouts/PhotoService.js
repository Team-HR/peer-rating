export default class PhotoService {
    getImages() {
        return fetch('../../Photos.json')
            .then((res) => res.json())
            .then((d) => d.data);
    }
}