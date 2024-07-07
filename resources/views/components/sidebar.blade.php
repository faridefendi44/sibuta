<style>
    .parent:hover .child {
        opacity: 1;
    }

    .parent .active {
        opacity: 1;
    }

    .child {
        opacity: 0;
        transition: opacity 0.3s ease;
    }
</style>
<div id="sidebar"
    class="relative    bg-[#BF3131] text-white   left-0 top-0  transition-all duration-300 ease-in-out">
    <div class="p-10   bg-[#BF3131]   flex items-center h-16 p-4">
        <div class="w-2/3 text-md  w-full flex my-auto space-x-3">
            <img src="{{ URL::to('img/logo.png') }}" class="justify-end" alt="">
            <h1 id="greetingText" class="">Selamat Datang, Guest</h1>
        </div>
    </div>
    <div class="p-4">
        <button id="toggleSidebar" class=" absolute h-10 w-10  -right-8 top-4 focus:outline-none">
            <svg class="h-6 w-6 text-black ml-1 " fill="none" stroke="currentColor" viewBox="0 0 24 24"
                xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"></path>
            </svg>
        </button>

        <ul class="mt-4 space-y-5 text-white   " id="sidebarMenu">

            <a href="{{ url('dashboard') }}"
                class="parent  {{ Request::path() == 'dashboard' ? 'bg-[#7D0A0A]' : '' }}  hover:bg-[#7D0A0A]  -ml-2 p-4 w-auto h-12 mt-2 flex items-center rounded-md duration-300 cursor-pointer   font-semibold shadow relative">
                <h1
                    class="{{ Request::path() == 'dashboard' ? 'active' : 'opacity-0' }}  bg-red-400

                bg-[#345C6D]    w-1 h-full  absolute left-0 child">
                </h1>
                <svg width="35" height="35" viewBox="0 0 35 35" fill="none"
                    xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M13.125 32.0834V17.5H21.875V32.0834M4.375 13.125L17.5 2.91669L30.625 13.125V29.1667C30.625 29.9402 30.3177 30.6821 29.7707 31.2291C29.2237 31.7761 28.4819 32.0834 27.7083 32.0834H7.29167C6.51812 32.0834 5.77625 31.7761 5.22927 31.2291C4.68229 30.6821 4.375 29.9402 4.375 29.1667V13.125Z"
                        stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                </svg>


                <span id="show" class="text-[12px] md:text-[18px] ml-4 ">Beranda</span>
            </a>

            <a href="{{ url('tamu/') }}"
                class="parent  {{ Request::path() == 'tamu' ? 'bg-[#7D0A0A]' : '' }}  hover:bg-[#7D0A0A]  -ml-2 p-4 w-auto h-12 mt-2 flex items-center rounded-md duration-300 cursor-pointer   font-semibold shadow relative">
                <h1
                    class="{{ Request::path() == 'tamu' ? 'active' : 'opacity-0' }}  bg-red-400

                bg-[#345C6D]    w-1 h-full  absolute left-0 child">
                </h1>
                <svg width="35" height="35" viewBox="0 0 35 35" fill="none"
                    xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M11.9146 8.75002H10.2083C9.82154 8.75002 9.45061 8.90367 9.17712 9.17716C8.90363 9.45065 8.74998 9.82158 8.74998 10.2084V27.7084C8.74998 28.0951 8.90363 28.4661 9.17712 28.7396C9.45061 29.013 9.82154 29.1667 10.2083 29.1667H24.7916C25.1784 29.1667 25.5494 29.013 25.8228 28.7396C26.0963 28.4661 26.25 28.0951 26.25 27.7084V10.2084C26.25 9.82158 26.0963 9.45065 25.8228 9.17716C25.5494 8.90367 25.1784 8.75002 24.7916 8.75002H23.0854C22.7837 9.60337 22.2247 10.3421 21.4856 10.8645C20.7464 11.3869 19.8634 11.6672 18.9583 11.6667H16.0416C15.1365 11.6672 14.2535 11.3869 13.5144 10.8645C12.7752 10.3421 12.2163 9.60337 11.9146 8.75002ZM23.0854 5.83335H24.7916C25.952 5.83335 27.0648 6.29429 27.8852 7.11476C28.7057 7.93523 29.1666 9.04803 29.1666 10.2084V27.7084C29.1666 28.8687 28.7057 29.9815 27.8852 30.8019C27.0648 31.6224 25.952 32.0834 24.7916 32.0834H10.2083C9.04799 32.0834 7.93519 31.6224 7.11472 30.8019C6.29425 29.9815 5.83331 28.8687 5.83331 27.7084V10.2084C5.83331 9.04803 6.29425 7.93523 7.11472 7.11476C7.93519 6.29429 9.04799 5.83335 10.2083 5.83335H11.9146C12.2163 4.98 12.7752 4.24123 13.5144 3.71885C14.2535 3.19648 15.1365 2.91621 16.0416 2.91669H18.9583C19.8634 2.91621 20.7464 3.19648 21.4856 3.71885C22.2247 4.24123 22.7837 4.98 23.0854 5.83335ZM14.5833 7.29169C14.5833 7.67846 14.737 8.04939 15.0104 8.32288C15.2839 8.59637 15.6549 8.75002 16.0416 8.75002H18.9583C19.3451 8.75002 19.716 8.59637 19.9895 8.32288C20.263 8.04939 20.4166 7.67846 20.4166 7.29169C20.4166 6.90491 20.263 6.53398 19.9895 6.26049C19.716 5.987 19.3451 5.83335 18.9583 5.83335H16.0416C15.6549 5.83335 15.2839 5.987 15.0104 6.26049C14.737 6.53398 14.5833 6.90491 14.5833 7.29169ZM20.4166 16.0417C20.4166 16.8152 20.1094 17.5571 19.5624 18.1041C19.0154 18.6511 18.2735 18.9584 17.5 18.9584C16.7264 18.9584 15.9846 18.6511 15.4376 18.1041C14.8906 17.5571 14.5833 16.8152 14.5833 16.0417C14.5833 15.2681 14.8906 14.5263 15.4376 13.9793C15.9846 13.4323 16.7264 13.125 17.5 13.125C18.2735 13.125 19.0154 13.4323 19.5624 13.9793C20.1094 14.5263 20.4166 15.2681 20.4166 16.0417ZM13.125 20.4167C12.7382 20.4167 12.3673 20.5703 12.0938 20.8438C11.8203 21.1173 11.6666 21.4882 11.6666 21.875V21.8838C11.6666 21.9752 11.6725 22.0656 11.6841 22.155C11.6958 22.295 11.7269 22.472 11.7775 22.6859C11.8825 23.1029 12.0896 23.6571 12.5066 24.2084C13.3816 25.3809 14.9566 26.25 17.5 26.25C20.0433 26.25 21.6154 25.3809 22.4962 24.2084C22.9454 23.608 23.2282 22.8997 23.3158 22.155C23.3259 22.0649 23.3317 21.9744 23.3333 21.8838V21.875C23.3333 21.4882 23.1797 21.1173 22.9062 20.8438C22.6327 20.5703 22.2618 20.4167 21.875 20.4167H13.125Z"
                        fill="white" />
                </svg>
                <span id="show" class="text-[12px] md:text-[18px] ml-4 ">Permohonan Bertamu</span>
            </a>

            <a href="{{ url('surat/') }}"
                class="parent  {{ Request::path() == 'surat' ? 'bg-[#7D0A0A]' : '' }}  hover:bg-[#7D0A0A]  -ml-2 p-4 w-auto h-12 mt-2 flex items-center rounded-md duration-300 cursor-pointer   font-semibold shadow relative">
                <h1
                    class="{{ Request::path() == 'surat' ? 'active' : 'opacity-0' }}  bg-red-400

                bg-[#345C6D]    w-1 h-full  absolute left-0 child">
                </h1>
                <svg width="35" height="35" viewBox="0 0 35 35" fill="none"
                    xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M2.91669 17.5C2.91669 12.0006 2.91669 9.25019 4.62585 7.54248C6.33356 5.83331 9.08398 5.83331 14.5834 5.83331H20.4167C25.9161 5.83331 28.6665 5.83331 30.3742 7.54248C32.0834 9.25019 32.0834 12.0006 32.0834 17.5C32.0834 22.9994 32.0834 25.7498 30.3742 27.4575C28.6665 29.1666 25.9161 29.1666 20.4167 29.1666H14.5834C9.08398 29.1666 6.33356 29.1666 4.62585 27.4575C2.91669 25.7498 2.91669 22.9994 2.91669 17.5Z"
                        stroke="white" stroke-width="1.5" />
                    <path
                        d="M8.75 11.6666L11.8985 14.2916C14.5775 16.5229 15.9163 17.6385 17.5 17.6385C19.0838 17.6385 20.424 16.5229 23.1015 14.2902L26.25 11.6666"
                        stroke="white" stroke-width="1.5" stroke-linecap="round" />
                </svg>
                <span id="show" class="text-[12px] md:text-[18px] ml-4 ">Pengiriman Surat</span>
            </a>

            <a href="{{ Auth::check() ? url('actionlogout') : url('login') }}"
                class="parent {{ Request::path() == 'logout' || Request::path() == 'login' ? 'bg-[#7D0A0A]' : '' }} hover:bg-[#7D0A0A] -ml-2 p-4 w-auto h-12 mt-2 flex items-center rounded-md duration-300 cursor-pointer top-10 font-semibold shadow relative">
                <h1
                    class="{{ Request::path() == 'logout' || Request::path() == 'login' ? 'active' : 'opacity-0' }} bg-red-400 bg-[#345C6D] w-1 h-full absolute left-0 child">
                </h1>
                <svg width="35" height="35" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"
                    stroke="#fff">
                    <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                    <g id="SVGRepo_iconCarrier">
                        <path d="M2.00098 11.999L16.001 11.999M16.001 11.999L12.501 8.99902M16.001 11.999L12.501 14.999"
                            stroke="white" stroke-width="1.5" />
                        <path
                            d="M9.00195 7C9.01406 4.82497 9.11051 3.64706 9.87889 2.87868C10.7576 2 12.1718 2 15.0002 2L16.0002 2C18.8286 2 20.2429 2 21.1215 2.87868C22.0002 3.75736 22.0002 5.17157 22.0002 8L22.0002 16C22.0002 18.8284 22.0002 20.2426 21.1215 21.1213C20.3531 21.8897 19.1752 21.9862 17 21.9983M9.00195 17C9.01406 19.175 9.11051 20.3529 9.87889 21.1213C10.5202 21.7626 11.4467 21.9359 13 21.9827"
                            stroke="white" stroke-width="1.5" stroke-linecap="round" />
                    </g>
                </svg>
                <span id="show"
                    class="text-[12px] md:text-[18px] ml-4 ">{{ Auth::check() ? 'Logout' : 'Login' }}</span>
            </a>

        </ul>
    </div>
</div>
<script>
    const sidebar = document.getElementById('sidebar');
    const toggleSidebar = document.getElementById('toggleSidebar');
    const sidebarMenu = document.getElementById('sidebarMenu');
    const sidebarText = document.querySelectorAll('#sidebarMenu > a > span, #greetingText');
    let isOpen = true;

    function updateSidebarWidth() {
        const screenWidth = window.innerWidth;
        if (!isOpen) {
            sidebar.style.width = screenWidth < 668 ? '50%' : '20%';
            sidebar.style.left = '-5px';
            sidebar.style.zIndex = '10';
            sidebarMenu.classList.add('show');
            sidebarText.forEach(text => text.classList.remove('hide'));
        } else {
            sidebar.style.width = '70px';
            sidebar.style.left = screenWidth < 668 ? '0px' : '-1px';
            sidebar.style.zIndex = '200';
            sidebarMenu.classList.remove('show');
            sidebarText.forEach(text => text.classList.add('hide'));
        }
    }


    toggleSidebar.addEventListener('click', function() {
        isOpen = !isOpen;
        updateSidebarWidth();
    });

    updateSidebarWidth();
    window.addEventListener('resize', updateSidebarWidth);
</script>
<style>
    #sidebarMenu.show #show {
        display: block;
    }

    #sidebarMenu #show.hide {
        display: none;
    }

    #sidebarMenu.show #show,
    #greetingText.show {
        display: block;
    }

    .text-black.hide,
    #greetingText.hide {
        display: none;
    }
</style>
