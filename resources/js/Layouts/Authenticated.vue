
<script>
import Sidebar from "@/Components/Sidebar.vue";
import sideBarLinks from "@/Links";
import axios from "axios";

export default {
  mounted() {

  },
  components: {
    Sidebar
  },
  data() {
    return {
      links: sideBarLinks,
      isActive: true,
      isHidden: false,
      currentUrl: this.$inertia.page.url,
      activeLinkIndex: 0,
      activeSubLinkIndex: null,
    }
  },

  methods: {
    // sets tab positions
    setCurrentTab() {
      const currentPath = this.currentUrl.split("/")[1];
      if (currentPath) {
        const index = this.links.map(function (e) { return e.path ? e.path.split("/")[1] : false }).indexOf(currentPath)
        // console.log(index);
        if (index > -1) {
          this.activeLinkIndex = index;
        }
      }
    },

    setCurrentSubTab() {
      const currentSubPath = this.currentUrl.split("/")[2];
      if (currentSubPath) {
        const index = this.links[this.activeLinkIndex].sublinks.map(function (e) { return e.path.split("/")[2]; }).indexOf(currentSubPath);
        if (index > -1) {
          this.activeSubLinkIndex = index;
        }
      }

    },

    authCheck(roles) {
      if (roles) {
        const authRoles = this.$page.props.auth.user.is_supervisor ? this.$page.props.auth.user.roles.concat("supervisor") : this.$page.props.auth.user.roles;
        // const authRoles = authRoles?
        return roles.some(v => authRoles.includes(v))
      } else return true;
    },

    authCheckIfSupervisor() {
      // return true
      axios.get("/api/pms/authCheckIfSupervisor").then(res => {
        return res
      })
    },


  },
  mounted() {
    this.setCurrentTab()
    this.setCurrentSubTab()
    // console.log(this.authCheckIfSupervisor());
  }
};
</script>

<template>
  <div class="block-section">
    <div class="block-content">
      <div class="h-screen">
        <div class="min-h-screen flex relative lg:static surface-ground">

          <!-- appbar main sidebar start -->
          <div id="app-sidebar-10" v-if="!isHidden"
               class="h-full lg:h-auto lg:block flex-shrink-0 left-0 top-0 z-1 border-right-1 surface-border w-full md:w-auto">
            <!-- class="hidden h-full lg:h-auto lg:block flex-shrink-0 absolute lg:static left-0 top-0 z-1 border-right-1 surface-border w-full md:w-auto" -->
            <div class="flex lg:inline-flex h-full">
              <div class="flex flex-column h-full bg-indigo-900 flex-shrink-0 select-none">
                <div class="flex align-items-center justify-content-center flex-shrink-0" style="height: 60px;">
                  <!-- <img src="images/blocks/logos/hyper-light.svg" alt="Image" height="30"> -->
                  <img src="/favicon.ico" alt="ihris" class="" width="40" />
                </div>
                <div class="overflow-y-auto mt-3">
                  <!-- left icon list start -->

                  <ul class="list-none py-3 pl-2 pr-0 m-0">
                    <li class="mb-2" v-for="link, i in links" :key="i">
                      <Button class="flex align-items-center cursor-pointer py-3 pl-0 pr-2 justify-content-center hover:bg-indigo-600 text-indigo-100 hover:text-indigo-50 transition-duration-150 transition-colors pa-2"
                              :class="activeLinkIndex == i ? 'bg-indigo-500' : 'bg-indigo-900'"
                              style="border-top-left-radius: 30px; border-bottom-left-radius: 30px; border-top-right-radius: 0px;border-bottom-right-radius: 0px;"
                              @click="activeLinkIndex = i">
                        <i class="pi text-xl" :class="link.icon"></i>
                        <span class="p-ink" role="presentation"
                              style="height: 64px; width: 64px; top: -18px; left: 4px;"></span>
                      </Button>
                    </li>
                  </ul>
                  <!-- left icon list end -->
                </div>
                <div class="mt-auto">
                  <hr class="mb-3 mx-2 border-top-1 border-none border-indigo-300"><a @click="$inertia.post('logout')"
                     class="m-3 flex align-items-center cursor-pointer p-2 justify-content-center hover:bg-indigo-600 border-round text-300 hover:text-0 transition-duration-150 transition-colors p-ripple">
                    <!-- <img
                           src="images/blocks/avatars/circle/avatar-f-1.png" style="width: 24px; height: 24px;"> -->
                    <span class="p-ink" role="presentation"></span></a>
                </div>

            </div>
              <div class="flex flex-column bg-indigo-500 p-4 overflow-y-auto flex-shrink-0 flex-grow-1 md:flex-grow-0"
                   style="width: 300px;">
                <div class="justify-content-end mb-3 flex  fadeinleft animation-duration-500"><button icon="pi pi-times"
                          class="cursor-pointer text-white appearance-none bg-transparent border-none inline-flex justify-content-center align-items-center border-circle hover:bg-indigo-600 transition-duration-150 transition-colors"
                          style="width: 2rem; height: 2rem;" @click="isHidden = !isHidden"><i
                       class="pi pi-times text-xl text-indigo-100"></i></button></div>
                <div class="border-round flex-auto">
                  <div class="p-3 font-medium text-2xl text-white mb-5">{{
                    links[activeLinkIndex].title
                  }}</div>

                  <ul class="list-none p-0 m-0 text-white">
                    <!-- .some(v => sublink.roles.includes(v)) -->
                    <template v-for="sublink, s in links[activeLinkIndex].sublinks" :key="s">
                      <li v-if="authCheck(sublink.roles)"
                          class="mb-3 flex align-items-start p-3 hover:bg-indigo-900 transition-duration-150 transition-colors"
                          style="cursor: pointer; border-radius: 12px;"
                          :class="activeSubLinkIndex == s ? 'bg-indigo-800' : 'bg-indigo-600'"
                          @click="$inertia.get(sublink.path)">
                        <i class="text-xl mr-3" :class="sublink.icon"></i>
                        <div class="flex flex-column" style="position: relative;"><span>{{ sublink.title }}</span>
                          <div v-if="sublink.tag" :class="sublink.tag.color" class="border-round text-white p-1"
                               style="position: absolute; top: -30px; right: -30px;">{{ sublink.tag.name }}</div>
                          <p class="mt-2 mb-0 line-height-3 text-indigo-200">{{ sublink.description }}</p>
                        </div>
                      </li>
                    </template>
                  </ul>

                </div>
              </div>
            </div>
          </div>
          <!-- appbar main sidebar end -->

          <!-- main screen start -->
          <div class="min-h-screen flex flex-column relative flex-auto">
            <div class="flex justify-content-between lg:justify-content-start align-items-center px-5 surface-section border-bottom-1 surface-border relative lg:static"
                 style="height: 60px;">
              <div id="main" class="flex"><a class="cursor-pointer block text-700 mr-3 mt-1 p-ripple"><i
                     class="pi pi-bars text-4xl" @click="isHidden = !isHidden"></i><span class="p-ink" role="presentation"
                        style="height: 34px; width: 34px; top: 1.5px; left: 10px;"></span></a></div>
              <!-- <img src="images/blocks/logos/hyper.svg" alt="Image" height="30" class="block lg:hidden"> -->
              <a class="cursor-pointer block lg:hidden text-700 p-ripple"><i class="pi pi-ellipsis-v text-2xl"></i><span
                      class="p-ink" role="presentation"
                      style="height: 26px; width: 26px; top: -1.5px; left: 5.01562px;"></span></a>
              <ul
                  class="list-none p-0 m-0 lg:flex lg:align-items-center select-none lg:flex-row lg:w-full surface-section border-1 lg:border-none surface-border right-0 top-100 z-1 shadow-2 lg:shadow-none absolute lg:static hidden">
                <li><a
                     class="flex p-3 lg:px-3 lg:py-2 align-items-center text-600 hover:text-900 hover:surface-100 font-medium border-round cursor-pointer transition-duration-150 transition-colors p-ripple"><i
                       class="pi pi-inbox text-base lg:text-2xl mr-2 lg:mr-0"></i><span
                          class="block lg:hidden font-medium">Inbox</span><span class="p-ink"
                          role="presentation"></span></a></li>
                <li><a
                     class="flex p-3 lg:px-3 lg:py-2 align-items-center text-600 hover:text-900 hover:surface-100 font-medium border-round cursor-pointer transition-duration-150 transition-colors p-ripple"><i
                       class="pi pi-star text-base lg:text-2xl mr-2 lg:mr-0"></i><span
                          class="block lg:hidden font-medium">Favorites</span><span class="p-ink"
                          role="presentation"></span></a></li>
                <li><a
                     class="flex p-3 lg:px-3 lg:py-2 align-items-center text-600 hover:text-900 hover:surface-100 font-medium border-round cursor-pointer transition-duration-150 transition-colors p-ripple"><i
                       class="pi pi-user text-base lg:text-2xl mr-2 lg:mr-0"></i><span
                          class="block lg:hidden font-medium">Account</span><span class="p-ink"
                          role="presentation"></span></a></li>
                <li><a
                     class="flex p-3 lg:px-3 lg:py-2 align-items-center text-600 hover:text-900 hover:surface-100 font-medium border-round cursor-pointer transition-duration-150 transition-colors p-ripple"><i
                       class="pi pi-bell text-base lg:text-2xl mr-2 lg:mr-0 p-overlay-badge"><span id="pv_id_4_badge"
                            class="p-badge p-component p-badge-danger p-badge-dot"></span></i><span
                          class="block lg:hidden font-medium">Notifications</span><span class="p-ink"
                          role="presentation"></span></a></li>
                <li class="border-top-1 surface-border lg:border-top-none lg:ml-auto"><a
                     class="flex p-3 lg:px-3 lg:py-2 align-items-center hover:surface-100 font-medium border-round cursor-pointer transition-duration-150 transition-colors p-ripple">
                    <!-- <img src="images/blocks/avatars/circle/avatar-f-1.png" class="mr-3 lg:mr-0"
                           style="width: 32px; height: 32px;"> -->
                    <div class="block lg:hidden">
                      <div class="text-900 font-medium">Josephine Lillard</div><span
                            class="text-600 font-medium text-sm">Marketing Specialist</span>
                    </div><span class="p-ink" role="presentation"></span>
                  </a></li>
              </ul>
              <span class="mr-4">{{ $inertia.page.props.auth.user.username }}</span>
              <Button class="p-button p-button-danger" label="Logout" @click="$inertia.get('/logout')" />
            </div>
            <div class="p-5 flex flex-column flex-auto">
              <div class="_border-2 _border-dashed _border-round _surface-border _surface-section flex-auto">
                <div class="">
                  <slot />
                </div>
              </div>
            </div>
          </div>
          <!-- main screen end -->

        </div>
      </div>
    </div>
  </div>
</template>
