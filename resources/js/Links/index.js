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
        path: "/departments",
        sublinks: [{

                title: "RSM Status",
                icon: 'pi pi-sitemap',
                path: "/departments",
            }, {
                name: "Account",
                icon: "pi pi-user",
                desc: "Accumsan sit amet nulla facilisi morbi tempus iaculis."
            },
            {
                name: "Inbox",
                icon: "pi pi-inbox",
                desc: "Condimentum vitae sapien pellentesque habitant."
            },
            {
                name: "Sales",
                icon: "pi pi-credit-card",
                desc: "Egestas integer eget aliquet nibh praesent tristique."
            },
            {
                name: "Privacy",
                icon: "pi pi-lock",
                desc: "In ante metus dictum at tempor commodo ullamcorper a lacus."
            },
        ]
    }
];

const links = main.concat(pms, others);


export default links;