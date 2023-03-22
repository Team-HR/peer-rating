import Inertia from '@inertiajs/inertia-vue3'

let links = [{
    title: "PMS",
    icon: 'bi bi-graph-up-arrow',
    path: "/pms",
    sublinks: [
        {
            title: "Performance Commitment Report",
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
            title: "Review Personnel PCRs",
            path: "/pms/rpc",
            description: "Direct supervisors review/evaluate their subordinate's accomplishment reports",
            icon: "bi bi-list-check",
            roles: ["sys_admin_", "supervisor"],
            tag: {
                name: "Supervisor",
                color: "bg-green-500",
            }
        },

        {
            title: "Department Rating Scale Matrix",
            path: "/pms/rsm",
            description: "Edit your department's rating scale matrix.",
            icon: "bi bi-book",
            roles: ["sys_admin_", "rsm"],
            tag: {
                name: "RSM Editor",
                color: "bg-yellow-500",
            }
        },
        
        {
            title: "PMT",
            path: "/pms/pmt",
            description: "Review RSM, accomplishment reports of assigned department/s.",
            icon: "bi bi-braces-asterisk",
            roles: ["sys_admin_", "pmt"]
        },
        {
            title: "Settings",
            path: "/pms/settings",
            description: "Settings for Performance Management Systems..",
            icon: "bi bi-gear",
            roles: ["sys_admin", "hr"],
            tag: {
                name: "System Admin",
                color: "bg-red-500",
            }
        }
    ]
}];

export default links;
