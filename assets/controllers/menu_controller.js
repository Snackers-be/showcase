import {Controller} from '@hotwired/stimulus';

/*
 *
 *
 *
 *
 */
export default class extends Controller {
    static targets = ["nav", "mobile", "desktop"]

    connect() {

        if (window.innerWidth > 1023) {
            let element = this.mobileTarget
            element.remove()
        } else {
            let element = this.desktopTarget
            element.remove()
        }
    }

    toggle() {
        if (this.mobileTarget !== undefined) {
            this.navTarget.classList.toggle("-mt-[70vh]")
        }
    }
}
