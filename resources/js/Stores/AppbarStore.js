import { defineStore } from "pinia";
import { Inertia } from '@inertiajs/inertia'


export const useAppbarStore = defineStore("appbar", {
    // state
    state: () => {
        return {
        }
    },
    // actions
    actions: {
        logOut() {
            Inertia.post(route('logout'))
        },
        goTo(s, href) {
            this.activeSubLinkIndex = s;
            Inertia.get(href);
        }
    },
    // getters
    getters: {

    },
    persist: true, // default to localStorage, does not expire on tab/browser close
    // persist: {
    //     storage: sessionStorage, // data in sessionStorage is cleared when the page session ends/tab/browser closed. 
    // },
})