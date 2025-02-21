<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Youcommunity - Where Communities Come Together</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" />
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: '#7C3AED', // Purple
                        secondary: '#EC4899', // Pink
                        accent: '#F472B6' // Light Pink
                    },
                    animation: {
                        'float': 'float 6s ease-in-out infinite',
                    },
                    keyframes: {
                        float: {
                            '0%, 100%': {
                                transform: 'translateY(0)'
                            },
                            '50%': {
                                transform: 'translateY(-20px)'
                            },
                        }
                    }
                }
            }
        }
    </script>
</head>

<body class="bg-white">
    <!-- Header -->
    <header class="fixed w-full left-0 z-50 bg-white/95 backdrop-blur-sm shadow-sm">
        <div class="max-w-[1400px] mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-16">
                <!-- Logo -->
                <div class="flex items-center space-x-2.5">
                    <div class="bg-gradient-to-r from-primary to-secondary p-2 rounded-md">
                        <i class="fas fa-sparkles text-lg text-white"></i>
                    </div>
                    <span class="font-bold text-xl bg-gradient-to-r from-primary to-secondary bg-clip-text text-transparent">
                        Youcommunity
                    </span>
                </div>

                <!-- Navigation -->
                <nav class="hidden md:flex items-center space-x-8">
                    <a href="#" class="text-[15px] text-gray-700 hover:text-primary transition-all duration-300">Discover</a>
                    <a href="#" class="text-[15px] text-gray-700 hover:text-primary transition-all duration-300">Create Event</a>
                    <a href="#" class="text-[15px] text-gray-700 hover:text-primary transition-all duration-300">Communities</a>
                    <a href="#" class="text-[15px] text-gray-700 hover:text-primary transition-all duration-300">About</a>
                </nav>

                <!-- Auth Buttons -->
                @if (Route::has('login'))
                <nav class="flex items-center space-x-4">
                    @auth
                    <a href="{{ url('/dashboard') }}">
                        <button class="px-4 py-2 text-[15px] text-primary hover:text-secondary transition-all duration-300">
                            Dashboard
                        </button>
                    </a>
                    @else
                    <a href="{{ route('login') }}">
                        <button class="px-4 py-2 text-[15px] text-primary hover:text-secondary transition-all duration-300">
                            Sign In
                        </button>
                    </a>

                    @if (Route::has('register'))
                    <a href="{{ route('register') }}">
                        <button class="px-4 py-2 text-[15px] bg-gradient-to-r from-primary to-secondary text-white rounded-md hover:shadow-md hover:scale-105 transition-all duration-300">
                            Join Free
                        </button>
                    </a>
                    @endif
                    @endauth
                </nav>
                @endif

                {{-- <div class="flex items-center space-x-4">
                    <a href="sign_in ">
                    <button class="px-4 py-2 text-[15px] text-primary hover:text-secondary transition-all duration-300">
                    Sign In
                    </a>
                    </button>
                    <button class="px-4 py-2 text-[15px] bg-gradient-to-r from-primary to-secondary text-white rounded-md hover:shadow-md hover:scale-105 transition-all duration-300">
                        Join Free
                    </button>
                </div> --}}
            </div>
        </div>
    </header>


    <!-- Hero Section -->
    <section class="w-full h-screen relative overflow-hidden" style="padding-top: 64px;">
        <!-- Background Image with Overlay -->
        <div class="absolute inset-0">
            <img src="https://images.unsplash.com/photo-1540039155733-5bb30b53aa14"
                alt="Concert Background"
                class="w-full h-full object-cover">
            <div class="absolute inset-0 bg-gradient-to-r from-primary/80 to-secondary/80 mix-blend-multiply"></div>
        </div>

        <div class="max-w-[1400px] h-full mx-auto px-4 sm:px-6 lg:px-8 flex flex-col justify-between relative z-10">
            <!-- Main Hero Content - Centered -->
            <div class="flex items-center flex-1">
                <div class="w-full max-w-3xl mx-auto text-center">
                    <div class="space-y-6">
                        <h1 class="text-4xl md:text-6xl font-bold leading-tight text-white">
                            Create Moments,
                            <span class="bg-clip-text bg-gradient-to-r from-white to-white/80">
                                Share Joy
                            </span>
                        </h1>
                        <p class="text-lg text-white/90 leading-relaxed max-w-2xl mx-auto">
                            Join the most vibrant community platform where every event becomes an unforgettable experience.
                        </p>

                        <!-- CTA Section -->
                        <div class="flex flex-col sm:flex-row gap-3 pt-2 justify-center">
                            <button class="px-6 py-3 bg-white text-primary rounded-md text-[15px] hover:shadow-lg hover:scale-105 transition-all duration-300 group">
                                Get Started Free
                                <i class="fas fa-arrow-right ml-2 group-hover:translate-x-1 transition-transform"></i>
                            </button>
                            <button class="px-6 py-3 bg-transparent text-white border-2 border-white rounded-md text-[15px] hover:bg-white/10 transition-all duration-300">
                                Watch Demo
                            </button>
                        </div>

                        <!-- Trust Indicators -->
                        <div class="pt-8 border-t border-white/20">
                            <div class="flex flex-wrap gap-8 items-center justify-center">
                                <div class="flex items-center gap-3">
                                    <div class="flex -space-x-2">
                                        <img src="https://randomuser.me/api/portraits/women/1.jpg" class="w-8 h-8 rounded-full border-2 border-white" alt="User">
                                        <img src="https://randomuser.me/api/portraits/men/1.jpg" class="w-8 h-8 rounded-full border-2 border-white" alt="User">
                                        <img src="https://randomuser.me/api/portraits/women/2.jpg" class="w-8 h-8 rounded-full border-2 border-white" alt="User">
                                    </div>
                                    <p class="text-sm text-white"><span class="font-medium">2,000+</span> events this month</p>
                                </div>
                                <div class="flex items-center gap-2">
                                    <div class="text-yellow-400 text-sm">★★★★★</div>
                                    <p class="text-sm text-white">4.9/5 from 10K+ users</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Enhanced Stats Section -->
            <div class="w-full py-8">
                <div class="relative">
                    <!-- Background Blur Effect -->
                    <div class="absolute inset-0 bg-black/20 backdrop-blur-md rounded-2xl"></div>

                    <!-- Stats Grid -->
                    <div class="relative grid grid-cols-2 md:grid-cols-4 divide-x divide-white/10">
                        <!-- Active Communities -->
                        <div class="p-8 text-center group hover:bg-white/5 transition-all duration-300 first:rounded-l-2xl last:rounded-r-2xl">
                            <div class="inline-flex items-center justify-center w-14 h-14 rounded-xl bg-white/10 mb-4 group-hover:scale-110 transition-transform">
                                <i class="fas fa-users text-2xl text-white"></i>
                            </div>
                            <div class="relative">
                                <h3 class="text-4xl font-bold text-white mb-2">500+</h3>
                                <p class="text-sm font-medium text-white/80">Active Communities</p>
                            </div>
                        </div>

                        <!-- Monthly Events -->
                        <div class="p-8 text-center group hover:bg-white/5 transition-all duration-300">
                            <div class="inline-flex items-center justify-center w-14 h-14 rounded-xl bg-white/10 mb-4 group-hover:scale-110 transition-transform">
                                <i class="fas fa-calendar-alt text-2xl text-white"></i>
                            </div>
                            <div class="relative">
                                <h3 class="text-4xl font-bold text-white mb-2">2.5K+</h3>
                                <p class="text-sm font-medium text-white/80">Monthly Events</p>
                            </div>
                        </div>

                        <!-- Happy Members -->
                        <div class="p-8 text-center group hover:bg-white/5 transition-all duration-300">
                            <div class="inline-flex items-center justify-center w-14 h-14 rounded-xl bg-white/10 mb-4 group-hover:scale-110 transition-transform">
                                <i class="fas fa-heart text-2xl text-white"></i>
                            </div>
                            <div class="relative">
                                <h3 class="text-4xl font-bold text-white mb-2">50K+</h3>
                                <p class="text-sm font-medium text-white/80">Happy Members</p>
                            </div>
                        </div>

                        <!-- Cities Covered -->
                        <div class="p-8 text-center group hover:bg-white/5 transition-all duration-300">
                            <div class="inline-flex items-center justify-center w-14 h-14 rounded-xl bg-white/10 mb-4 group-hover:scale-110 transition-transform">
                                <i class="fas fa-map-marker-alt text-2xl text-white"></i>
                            </div>
                            <div class="relative">
                                <h3 class="text-4xl font-bold text-white mb-2">100+</h3>
                                <p class="text-sm font-medium text-white/80">Cities Covered</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Events Section -->
    <section class="py-20 bg-white">
        <div class="max-w-[1400px] mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Section Header -->
            <div class="text-center mb-12">
                <h2 class="text-3xl md:text-4xl font-bold mb-4">
                    Upcoming
                    <span class="text-transparent bg-clip-text bg-gradient-to-r from-primary to-secondary">
                        Events
                    </span>
                </h2>
                <p class="text-gray-600 max-w-2xl mx-auto">
                    Discover amazing events happening in your community. Connect, learn, and grow together.
                </p>
            </div>

            <!-- Events Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach($allevents as $event)

                <!-- Event Card 3 -->
                <div class="bg-white rounded-xl shadow-sm hover:shadow-md transition-all duration-300 border border-gray-100">
                    <img src="{{ $event->imageUrl }}"
                        alt="Art Workshop"
                        class="w-full h-48 object-cover rounded-t-xl">
                    <div class="p-6">
                        <div class="flex items-center gap-2 mb-4">
                            <span class="px-3 py-1 text-xs font-medium bg-purple-100 text-primary rounded-full">{{$event->category}}</span>
                            <span class="px-3 py-1 text-xs font-medium bg-pink-100 text-secondary rounded-full">Workshop</span>
                        </div>
                        <h3 class="text-xl font-semibold mb-2">{{$event->title}}</h3>
                        <p class="text-gray-600 mb-4">{{$event->description}}</p>
                        <div class="flex items-center justify-between mb-4">
                            <div class="flex items-center gap-2">
                                <i class="fas fa-calendar-alt text-primary"></i>
                                <span class="text-sm text-gray-600">{{$event->time}}</span>
                            </div>
                            <div class="flex items-center gap-2">
                                <i class="fas fa-map-marker-alt text-primary"></i>
                                <span class="text-sm text-gray-600">{{$event->location}}</span>
                            </div>
                        </div>

                        <!-- Participate Button - Full Width -->
                        <div class="pt-4 border-t border-gray-100">
                            <form  method="POST">
                                @csrf
                                <input type="hidden" name="event_id" value="{{ $event->id }}">
                                <button type="submit"
                                    class="w-full px-4 py-2.5 bg-gradient-to-r from-primary to-secondary text-white rounded-lg text-sm hover:shadow-md transition-all duration-300 flex items-center justify-center gap-2">
                                    <i class="fas fa-plus"></i>
                                    Participate
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>

            <!-- View More Button -->
            <div class="text-center mt-12">
                <button class="px-6 py-3 bg-white text-primary border-2 border-primary rounded-md text-[15px] hover:bg-primary/5 transition-all duration-300">
                    View More Events
                    <i class="fas fa-arrow-right ml-2"></i>
                </button>
            </div>
        </div>
    </section>
</body>

</html>