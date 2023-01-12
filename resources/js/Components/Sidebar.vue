<script>
export default {
  props: {
    links: Array
  },
  data() {
    return {
      isActive: true,
      isHidden: false,
      currentUrl: this.$inertia.page.url,
      activeLinkIndex: 0,
      activeSubLinkIndex: 0,
    };
  },
  methods: {
    // sets tab positions
    setCurrentTab() {
      const currentPath = this.currentUrl.split("/")[1];
      if (currentPath) {
        const index = this.links.map(function (e) { return e.path ? e.path.split("/")[1] : false }).indexOf(currentPath)
        this.activeLinkIndex = index;
      }
    },

    setCurrentSubTab() {
      const currentSubPath = this.currentUrl.split("/")[2];
      if (currentSubPath) {
        const index = this.links[this.activeLinkIndex].sublinks.map(function (e) { return e.path.split("/")[2]; }).indexOf(currentSubPath);
        this.activeSubLinkIndex = index;
      }

    },

    authCheck(roles) {
      if (roles) {
        const authRoles = this.$page.props.auth.user.roles;
        return roles.some(v => authRoles.includes(v))
      } else return true;
    }

  },
  mounted() {
    this.setCurrentTab()
    this.setCurrentSubTab()
  }
};
</script>
<template>
  <!-- appbar main sidebar start -->
  <div id="app-sidebar-10" v-if="!isHidden"
       class="fadeinleft animation-duration-200 h-full lg:h-auto lg:block flex-shrink-0 absolute lg:static left-0 top-0 z-1 border-right-1 surface-border w-full md:w-auto">
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
          <hr class="mb-3 mx-2 border-top-1 border-none border-indigo-300"><a @click="appbarStore.logOut"
             class="m-3 flex align-items-center cursor-pointer p-2 justify-content-center hover:bg-indigo-600 border-round text-300 hover:text-0 transition-duration-150 transition-colors p-ripple"><img
                 src="images/blocks/avatars/circle/avatar-f-1.png" style="width: 24px; height: 24px;"><span
                  class="p-ink" role="presentation"></span></a>
        </div>

      </div>
      <div class="flex flex-column bg-indigo-500 p-4 overflow-y-auto flex-shrink-0 flex-grow-1 md:flex-grow-0"
           style="width: 300px;">
        <div class="justify-content-end mb-3 flex lg:hidden"><button icon="pi pi-times"
                  class="cursor-pointer text-white appearance-none bg-transparent border-none inline-flex justify-content-center align-items-center border-circle hover:bg-indigo-600 transition-duration-150 transition-colors"
                  style="width: 2rem; height: 2rem;"
                  @click="isHidden = !isHidden"
                  ><i class="pi pi-times text-xl text-indigo-100"></i></button></div>
        <div class="border-round flex-auto">

          <div class="p-3 font-medium text-2xl text-white mb-5">{{
            links[activeLinkIndex].title
          }}</div>

          <ul class="list-none p-0 m-0 text-white">
            <!-- .some(v => sublink.roles.includes(v)) -->
            <template v-for="sublink, s in links[activeLinkIndex].sublinks" :key="s">
              <li v-if="authCheck(sublink.roles)"
                  class="mb-3 flex align-items-start p-3 hover:bg-indigo-600 transition-duration-150 transition-colors"
                  style="cursor: pointer; border-radius: 12px;"
                  :class="activeSubLinkIndex == s ? 'bg-indigo-700' : 'bg-indigo-500'"
                  @click="$inertia.get(sublink.path)">
                <i class="text-xl mr-3" :class="sublink.icon"></i>
                <div class="flex flex-column"><span>{{ sublink.title }}</span>
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
</template>