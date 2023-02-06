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
    name: "Settings",
    icon: 'pi pi-cog',
    is_active: false,
    path: "/settings",
    sublinks: [{

        title: "Testing",
        icon: 'pi pi-sitemap',
        path: "/settings/testing",
    },
    ]
}
];

const links = main.concat(pms, others);


export default links;