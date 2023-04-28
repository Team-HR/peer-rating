<template>
    <div class="attendance mt-5">
      <div class="attendance-box mx-auto">
        <div class="mt-2 my-account my-account-custom-card">
          <div class="card-header p-0 tab-menu pb-1">
            <div class="attendance-nav d-flex gap-4">
              <div :class="{ 'active-tab-menu': tab == 'Users & Rates' }" href="#" @click="selectMenu('Users & Rates')">
                My Attendance
              </div>
              <div :class="{ 'active-tab-menu': tab == 'Invoices' }" href="#" @click="selectMenu('Invoices')">
                My Paid Leaves
              </div>
            </div>
          </div>
          <div class="card-body">
            <UserAndRates v-if="tab == 'Users & Rates'"></UserAndRates>
            <Invoices v-if="tab == 'Invoices'"></Invoices>
          </div>
        </div>
        <div class="pt-3">
          <h1 class="font-title-grey">My Attendance</h1>
        </div>
        <div class="pt-3">
          <div class="p-3 attendance-table">
            <div class="d-flex flex-row-reverse">
              <button class="dropdown time-dropdown d-flex">
                Eastern Time (US & Canada)
                <div class="svg-dropdown">
                  <svg width="8" height="5" viewBox="0 0 8 5" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path
                      d="M6.6775 0.0107422L4 2.68241L1.3225 0.0107422L0.5 0.833242L4 4.33324L7.5 0.833242L6.6775 0.0107422Z"
                      fill="#27304C" />
                  </svg>
                </div>
              </button>
            </div>
            <table class="table table-attendance mt-4 ">
              <thead class="table-light">
                <tr>
                  <th scope="col" class="th-1">
                    Date
                    <svg width="11" height="14" viewBox="0 0 11 14" fill="none" xmlns="http://www.w3.org/2000/svg"
                      style="float: right">
                      <path
                        d="M9.44189 4.46387L5.71022 0.0938161C5.6034 -0.031272 5.39773 -0.031272 5.28978 0.0938161L1.55812 4.46387C1.41948 4.62683 1.54448 4.86553 1.76833 4.86553H9.23167C9.45552 4.86553 9.58052 4.62683 9.44189 4.46387Z"
                        fill="#DCDCDC" />
                      <path
                        d="M9.23167 7.91797H1.76833C1.54448 7.91797 1.41948 8.15667 1.55812 8.31963L5.28978 12.6897C5.39659 12.8148 5.60227 12.8148 5.71022 12.6897L9.44188 8.31963C9.58052 8.15667 9.45552 7.91797 9.23167 7.91797Z"
                        fill="#2C91FF" />
                    </svg>
                  </th>
                  <th class="th-2"></th>
                  <th scope="col" class="th-3">
                    Status
                    <svg style="float: right" width="10" height="14" viewBox="0 0 10 14" fill="none"
                      xmlns="http://www.w3.org/2000/svg">
                      <path
                        d="M8.94189 4.46387L5.21022 0.0938161C5.1034 -0.031272 4.89773 -0.031272 4.78978 0.0938161L1.05812 4.46387C0.919484 4.62683 1.04448 4.86553 1.26833 4.86553H8.73167C8.95552 4.86553 9.08052 4.62683 8.94189 4.46387Z"
                        fill="#DCDCDC" />
                      <path
                        d="M8.73167 7.91797H1.26833C1.04448 7.91797 0.919484 8.15667 1.05812 8.31963L4.78978 12.6897C4.89659 12.8148 5.10227 12.8148 5.21022 12.6897L8.94188 8.31963C9.08052 8.15667 8.95552 7.91797 8.73167 7.91797Z"
                        fill="#DCDCDC" />
                    </svg>
                  </th>
                  <th scope="col" class="th-4">Check-In</th>
                  <th scope="col">Check - Out</th>
                </tr>
              </thead>
              <tbody>
                <tr v-for="attendance in MyAttendance">
                  <!-- date -->
                  <td class="attendance-data-table">{{ attendance.date }}</td>
                  <!-- status greenDot -->
                  <td class="">
                    <svg width="17" height="16" viewBox="0 0 17 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                      <circle cx="8.5" cy="8" r="7.875" fill="#00B600" />
                    </svg>
                  </td>
                  <!-- status -->
                  <td class="attendance-status-table ">{{ attendance.status }} </td>
                  <!-- checkIn  -->
                  <td class="attendance-checkIn-table ">                  
                    <div class="d-flex flex-row  justify-content-between">
                      <div>
                        {{ attendance.checkIn }}
                        <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg"
                          style="margin-left: 10px;">
                          <path
                            d="M3.89185 13.82C3.93203 13.82 3.97221 13.816 4.01239 13.81L7.39141 13.2174C7.43159 13.2093 7.46976 13.1912 7.49788 13.1611L16.0137 4.64526C16.0324 4.62667 16.0471 4.6046 16.0572 4.58029C16.0673 4.55599 16.0725 4.52994 16.0725 4.50363C16.0725 4.47732 16.0673 4.45126 16.0572 4.42696C16.0471 4.40266 16.0324 4.38058 16.0137 4.362L12.6749 1.02115C12.6367 0.98298 12.5865 0.962891 12.5323 0.962891C12.478 0.962891 12.4278 0.98298 12.3896 1.02115L3.87377 9.537C3.84364 9.56713 3.82556 9.60329 3.81752 9.64347L3.22489 13.0225C3.20535 13.1301 3.21233 13.2409 3.24523 13.3452C3.27814 13.4495 3.33597 13.5442 3.41373 13.6212C3.54632 13.7497 3.71306 13.82 3.89185 13.82V13.82ZM5.24587 10.3165L12.5323 3.03209L14.0048 4.50463L6.71842 11.789L4.93248 12.1044L5.24587 10.3165V10.3165ZM16.3934 15.5075H1.6077C1.25212 15.5075 0.964844 15.7948 0.964844 16.1504V16.8736C0.964844 16.962 1.03717 17.0343 1.12556 17.0343H16.8756C16.964 17.0343 17.0363 16.962 17.0363 16.8736V16.1504C17.0363 15.7948 16.749 15.5075 16.3934 15.5075Z"
                            fill="#8C8C8C" />
                        </svg>
                      </div>
                      <!-- exclamation Red svg  -->
                      <div>
                        <svg width="19" height="18" viewBox="0 0 19 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <circle cx="9.5" cy="9" r="9" fill="#F15E5E" />
                        <path
                          d="M9.5 3.09375C6.23838 3.09375 3.59375 5.73838 3.59375 9C3.59375 12.2616 6.23838 14.9062 9.5 14.9062C12.7616 14.9062 15.4062 12.2616 15.4062 9C15.4062 5.73838 12.7616 3.09375 9.5 3.09375Z"
                          fill="white" />
                        <path
                          d="M8.86719 11.3203C8.86719 11.4881 8.93386 11.6491 9.05253 11.7678C9.17121 11.8865 9.33217 11.9531 9.5 11.9531C9.66783 11.9531 9.82879 11.8865 9.94747 11.7678C10.0661 11.6491 10.1328 11.4881 10.1328 11.3203C10.1328 11.1525 10.0661 10.9915 9.94747 10.8728C9.82879 10.7542 9.66783 10.6875 9.5 10.6875C9.33217 10.6875 9.17121 10.7542 9.05253 10.8728C8.93386 10.9915 8.86719 11.1525 8.86719 11.3203ZM9.18359 9.84375H9.81641C9.87441 9.84375 9.92188 9.79629 9.92188 9.73828V6.15234C9.92188 6.09434 9.87441 6.04688 9.81641 6.04688H9.18359C9.12559 6.04688 9.07812 6.09434 9.07812 6.15234V9.73828C9.07812 9.79629 9.12559 9.84375 9.18359 9.84375Z"
                          fill="#F15E5E" />
                      </svg>
                      </div>                  
                    </div>
                  </td>
                  <!-- checkOut -->
                  <td v-if="attendance.checkOut !== ''" class="attendance-checkOut-table">{{ attendance.checkOut }} 
                    <svg
                      width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg"
                      style="margin-left: 10px;">
                      <path
                        d="M3.89185 13.82C3.93203 13.82 3.97221 13.816 4.01239 13.81L7.39141 13.2174C7.43159 13.2093 7.46976 13.1912 7.49788 13.1611L16.0137 4.64526C16.0324 4.62667 16.0471 4.6046 16.0572 4.58029C16.0673 4.55599 16.0725 4.52994 16.0725 4.50363C16.0725 4.47732 16.0673 4.45126 16.0572 4.42696C16.0471 4.40266 16.0324 4.38058 16.0137 4.362L12.6749 1.02115C12.6367 0.98298 12.5865 0.962891 12.5323 0.962891C12.478 0.962891 12.4278 0.98298 12.3896 1.02115L3.87377 9.537C3.84364 9.56713 3.82556 9.60329 3.81752 9.64347L3.22489 13.0225C3.20535 13.1301 3.21233 13.2409 3.24523 13.3452C3.27814 13.4495 3.33597 13.5442 3.41373 13.6212C3.54632 13.7497 3.71306 13.82 3.89185 13.82V13.82ZM5.24587 10.3165L12.5323 3.03209L14.0048 4.50463L6.71842 11.789L4.93248 12.1044L5.24587 10.3165V10.3165ZM16.3934 15.5075H1.6077C1.25212 15.5075 0.964844 15.7948 0.964844 16.1504V16.8736C0.964844 16.962 1.03717 17.0343 1.12556 17.0343H16.8756C16.964 17.0343 17.0363 16.962 17.0363 16.8736V16.1504C17.0363 15.7948 16.749 15.5075 16.3934 15.5075Z"
                        fill="#8C8C8C" />
                    </svg>
                  </td>
                  <td v-else>
                    <button type="button" class="btn button-checkOut">
                      <svg width="13" height="12" viewBox="0 0 13 12"
                        fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path
                          d="M6.49789 0.212891C3.30323 0.212891 0.712891 2.80323 0.712891 5.99789C0.712891 9.19255 3.30323 11.7829 6.49789 11.7829C9.69255 11.7829 12.2829 9.19255 12.2829 5.99789C12.2829 2.80323 9.69255 0.212891 6.49789 0.212891ZM6.49789 10.8015C3.84557 10.8015 1.69427 8.65021 1.69427 5.99789C1.69427 3.34557 3.84557 1.19427 6.49789 1.19427C9.15021 1.19427 11.3015 3.34557 11.3015 5.99789C11.3015 8.65021 9.15021 10.8015 6.49789 10.8015Z"
                          fill="white" />
                        <path
                          d="M8.75388 7.63146L6.9125 6.30013V3.10418C6.9125 3.04736 6.86601 3.00088 6.80919 3.00088H6.18808C6.13126 3.00088 6.08478 3.04736 6.08478 3.10418V6.66041C6.08478 6.69398 6.10027 6.72497 6.12739 6.74434L8.26319 8.30164C8.30968 8.33521 8.37424 8.32488 8.40782 8.27969L8.77713 7.77608C8.8107 7.72831 8.80037 7.66374 8.75388 7.63146Z"
                          fill="white" />
                      </svg>
                      Check - Out</button>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </template>
  
  <script lang="ts">
  import talentData from '';
  export default {
    name: "MyAttendance",
    data() {
      return {
        MyAttendance: []
      }
    },
    mounted() {
      this.MyAttendance = talentData.getAttendance();
    }
  };
  </script>
  
  <style scoped>
  .attendance-box {
    width: 1643px;
  }
  
  .attendance {
    padding: 40px 100px;
    background: #f1f3ff;
  }
  
  .attendance-nav {
    cursor: pointer;
    font-family: "LexendDecaRegular";
    font-style: normal;
    font-weight: 500;
    font-size: 18px;
    color: #414042;
  }
  
  .active-tab {
    color: #27304c;
    font-family: "RubikMedium";
    font-style: normal;
    font-weight: 500;
    font-size: 14px;
  }
  
  .tab-menu {
    border-bottom: 1px solid #dbdbdb;
  }
  
  .attendance-table {
    background: #ffffff;
    border-radius: 8px;
  }
  
  .time-dropdown {
    border: 1px solid #d9d9d9;
    border-radius: 2px;
    background: #ffffff;
    padding: 5px 12px;
    align-items: center;
    font-family: "LexendDecaLight";
    font-style: normal;
    font-weight: 400;
    font-size: 14px;
  }
  
  .svg-dropdown {
    margin-left: 20px;
  }
  
  .table {
    border: 1px solid #ededed;
  }
  
  .table-attendance thead {
    font-family: "LexendDecaRegular";
    font-size: 12px;
    color: #30373c;
  }
  
  .th-1 {
    width: 408.5px;
  }
  
  .th-2 {
    width: 38px;
  }
  
  .th-3 {
    width: 408.5px;
  }
  
  .th-4 {
    width: 408.5px;
  }
  
  .th-5 {
    width: 408.5px;
  }
  
  .attendance-data-table {
    font-family: 'LexendDecaMedium';
    font-size: 12px;
    color: #5A5959;
  }
  
  .attendance-status-table {
    font-family: 'LexendDecaMedium';
    font-size: 12px;
    color: #008000;
  }
  
  .attendance-checkIn-table {
    font-family: 'LexendDecaMedium';
    font-size: 12px;
    color: #008000;
  }
  
  .button-checkOut {
    background: #48B16B;
    border-radius: 42px;
    font-family: 'LexendDecaLight';
    font-size: 12px;
    color: #FFFFFF;
  }
  
  .table-attendance  tr:nth-child(even) {
    background: #F8F9FA
  }
  
  .attendance-checkOut-table {
    font-family: 'LexendDecaMedium';
    font-size: 12px;
    color: #008000;
  }
  </style>
  