import Inertia from '@inertiajs/inertia-vue3'

let links = [{
    title: "PMS",
    icon: 'bi bi-graph-up-arrow',
    path: "/pms",
    sublinks: [
        {
            title: "PCR",
            path: "/pms/pcr",
            description: "Accomplish your performance commitment review",
            icon: "bi bi-input-cursor-text",
        },
        {
            title: "Individual Rating Scale Matrix",
            path: "/pms/irsm",
            description: "View your individual rating scale matrix",
            icon: "bi bi-person-lines-fill",
        },
        {
            title: "Rating Scale Matrix",
            path: "/pms/rsm",
            description: "Edit your department's rating scale matrix.",
            icon: "bi bi-book",
            roles: ["sys_admin_", "rsm"]
        },
        {
            title: "Review Personnel PCRs",
            path: "/pms/rpc",
            description: "Direct supervisors review/evaluate their subordinate's accomplishment reports",
            icon: "bi bi-list-check",
            roles: ["sys_admin_", "sup"]
        },
        {
            title: "PMT",
            path: "/pms/pmt",
            description: "Review RSM, accomplishment reports of assigned department/s. ",
            icon: "bi bi-braces-asterisk",
            roles: ["sys_admin_", "pmt"]
        }
    ]
}];

export default links;