<header class="fixed w-full left-0 z-50 bg-white/95 backdrop-blur-sm shadow-sm">
    <div class="max-w-[1400px] mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-center justify-between h-16">
            <!-- Logo -->
            <a href="/">
                <div class="flex items-center space-x-2.5">
                    <div class="bg-gradient-to-r from-primary to-secondary p-2 rounded-md">
                        <i class="fas fa-sparkles text-lg text-white"></i>
                    </div>
                    <span class="font-bold text-xl bg-gradient-to-r from-primary to-secondary bg-clip-text text-transparent">
                        Youcommunity
                    </span>
                </div>
            </a>


            <!-- Navigation -->
            <nav class="hidden md:flex items-center space-x-8">
                <a href="#" class="text-[15px] text-gray-700 hover:text-primary transition-all duration-300">Discover</a>
                <a href="#" class="text-[15px] text-gray-700 hover:text-primary transition-all duration-300">Create Event</a>
                <a href="#" class="text-[15px] text-gray-700 hover:text-primary transition-all duration-300">Communities</a>
                <a href="#" class="text-[15px] text-gray-700 hover:text-primary transition-all duration-300">About</a>
            </nav>

            <!-- User Menu -->
            <div class="flex items-center space-x-4">
                <button class="text-gray-600 hover:text-primary">
                    <i class="fas fa-bell text-xl"></i>
                </button>
                <div class="relative group">
                    <button id="menuu" class="flex items-center space-x-3 group" onclick="swile7()">
                        <img src="{{ Auth::user()->profile_photo_url ?? 'https://ui-avatars.com/api/?name='.urlencode(Auth::user()->name).'&color=7C3AED&background=EDE9FE' }}" 
                         alt="{{ Auth::user()->name }} "
                             class="w-8 h-8 rounded-full border-2 border-primary" 
                             >
                        <span class="text-gray-700 group-hover:text-primary">{{ Auth::user()->name }}</span>
                        <i class="fas fa-chevron-down text-sm text-gray-400 group-hover:text-primary"></i>
                    </button>
                    <!-- Dropdown Menu -->
                    <div id="menu" class="absolute right-0 mt-2 w-48 bg-white rounded-md shadow-lg py-1 hidden " >

                        <x-dropdown-link :href="route('profile.edit')">
                            {{ __('Profile') }}
                        </x-dropdown-link>

                        <hr class="my-1">
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <x-dropdown-link :href="route('logout')"
                                    onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                {{ __('Log Out') }}
                            </x-dropdown-link>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>

<!-- Main Content -->
<div class="flex h-screen pt-16">
    <!-- Sidebar -->
    <aside class="w-64 bg-white border-r border-gray-200 fixed h-full">
        <nav class="mt-8 px-4">
            <div class="space-y-2">
                <a href="overview" class="flex items-center space-x-3 px-4 py-3 text-gray-600 hover:text-primary hover:bg-primary/5 rounded-lg transition-all duration-300">
                    <i class="fas fa-home"></i>
                    <span>Overview</span>
                </a>
                <a href="events" class="flex items-center space-x-3 px-4 py-3 text-gray-600 hover:text-primary hover:bg-primary/5 rounded-lg transition-all duration-300">
                    <i class="fas fa-calendar-alt"></i>
                    <span>My Events</span>
                </a>
                <a href="participants" class="flex items-center space-x-3 px-4 py-3 text-gray-600 hover:text-primary hover:bg-primary/5 rounded-lg transition-all duration-300">
                    <i class="fas fa-users"></i>
                    <span>Participants</span>
                </a>
                <a href="profile" class="flex items-center space-x-3 px-4 py-3 text-gray-600 hover:text-primary hover:bg-primary/5 rounded-lg transition-all duration-300">
                    <i class="fas fa-cog"></i>
                    <span>Settings</span>
                </a>
            </div>


        </nav>
    </aside>
    <script>

        function swile7(){
           let menu = document.getElementById('menu')

           menu.classList.toggle("hidden")

        
        }

    </script>