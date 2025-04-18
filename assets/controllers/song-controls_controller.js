import { Controller } from '@hotwired/stimulus';
import axios from 'axios';
/*
* The following line makes this controller "lazy": it won't be downloaded until needed
* See https://github.com/symfony/stimulus-bridge#lazy-controllers
*/
/* stimulusFetch: 'lazy' */
export default class extends Controller {

    static values = {
        infoUrl: String
    }
    
    play(event) {
        event.preventDefault();
        axios.get(this.infoUrlValue)
            .then((response) => {
                const audio = new Audio(response.data.url);
                audio.play();
            })
    }
}
