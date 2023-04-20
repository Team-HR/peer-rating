import pms from "./pms";

const main = [{
        title: "Dashboard",
        icon: 'pi pi-home',
        path: "/dashboard"
    },
    {
        title: "Employees",
        icon: 'pi pi-users',
        path: "/employees",
    },
];

const others = [{
        name: "Calendar",
        icon: 'pi pi-calendar',
        is_active: false,
    },
    {
        title: "Admin Panel",
        name: "Settings",
        icon: 'pi pi-cog',
        path: "/settings",
        sublinks: [{

                title: "RSM Status",
                icon: 'pi pi-sitemap',
                path: "/settings/departments",
            },
            {
                title: "Manage Accounts",
                icon: "pi pi-user",
                path: "/settings/users",
            },
            {
                title: "Support Function",
                icon: "pi pi-user",
                path: "/settings/SupportFunction",
            },
        ]
    }
];
const links = main.concat(pms, others);
export default links;