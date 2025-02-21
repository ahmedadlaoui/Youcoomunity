<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Member Dashboard - Youcommunity</title>
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
                    }
                }
            }
        }
    </script>
</head>

<body class="bg-gray-50">
   
        @include('dashboard/header_side')

        <!-- Main Content Area -->
        <main class="flex-1 ml-64 p-8">
            <!-- Welcome Section -->
            <div class="mb-8">
                <h1 class="text-2xl font-bold text-gray-800">Welcome back, {{ Auth::user()->name }}! 👋</h1>
                <p class="text-gray-600">Here's what's happening with your events today.</p>
            </div>


    
<!-- Upcoming Events Section -->
<div class="bg-white rounded-xl shadow-sm p-6">
    <div class="flex items-center justify-between mb-6">
        <h2 class="text-xl font-bold text-gray-800">Upcoming Events</h2>
        <button class="text-primary hover:text-secondary transition-all duration-300">
            View All
            <i class="fas fa-arrow-right ml-2"></i>
        </button>
    </div>
    
    <!-- Events Grid -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        <!-- Event Card 1 -->
        <div class="bg-white rounded-xl shadow-sm hover:shadow-md transition-all duration-300 border border-gray-100">
            <img src="https://images.unsplash.com/photo-1540575467063-178a50c2df87?ixlib=rb-4.0.3"
                alt="Tech Conference"
                class="w-full h-36 object-cover rounded-t-xl">
            <div class="p-4">
                <div class="flex items-center gap-2 mb-3">
                    <span class="px-2.5 py-0.5 text-xs font-medium bg-purple-100 text-primary rounded-full">Technology</span>
                    <span class="px-2.5 py-0.5 text-xs font-medium bg-pink-100 text-secondary rounded-full">Conference</span>
                </div>
                <h3 class="text-lg font-semibold mb-2">Web Development Summit 2024</h3>
                <p class="text-sm text-gray-600 mb-3 line-clamp-2">Join industry experts for a deep dive into modern web development practices.</p>
                <div class="flex items-center justify-between text-sm">
                    <div class="flex items-center gap-2">
                        <i class="fas fa-calendar-alt text-primary"></i>
                        <span class="text-gray-600">Mar 15, 2024</span>
                    </div>
                    <div class="flex items-center gap-2">
                        <i class="fas fa-map-marker-alt text-primary"></i>
                        <span class="text-gray-600">San Francisco</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="bg-white rounded-xl shadow-sm hover:shadow-md transition-all duration-300 border border-gray-100">
            <img src="https://images.unsplash.com/photo-1540575467063-178a50c2df87?ixlib=rb-4.0.3"
                alt="Tech Conference"
                class="w-full h-36 object-cover rounded-t-xl">
            <div class="p-4">
                <div class="flex items-center gap-2 mb-3">
                    <span class="px-2.5 py-0.5 text-xs font-medium bg-purple-100 text-primary rounded-full">Technology</span>
                    <span class="px-2.5 py-0.5 text-xs font-medium bg-pink-100 text-secondary rounded-full">Conference</span>
                </div>
                <h3 class="text-lg font-semibold mb-2">Web Development Summit 2024</h3>
                <p class="text-sm text-gray-600 mb-3 line-clamp-2">Join industry experts for a deep dive into modern web development practices.</p>
                <div class="flex items-center justify-between text-sm">
                    <div class="flex items-center gap-2">
                        <i class="fas fa-calendar-alt text-primary"></i>
                        <span class="text-gray-600">Mar 15, 2024</span>
                    </div>
                    <div class="flex items-center gap-2">
                        <i class="fas fa-map-marker-alt text-primary"></i>
                        <span class="text-gray-600">San Francisco</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="bg-white rounded-xl shadow-sm hover:shadow-md transition-all duration-300 border border-gray-100">
            <img src="https://images.unsplash.com/photo-1540575467063-178a50c2df87?ixlib=rb-4.0.3"
                alt="Tech Conference"
                class="w-full h-36 object-cover rounded-t-xl">
            <div class="p-4">
                <div class="flex items-center gap-2 mb-3">
                    <span class="px-2.5 py-0.5 text-xs font-medium bg-purple-100 text-primary rounded-full">Technology</span>
                    <span class="px-2.5 py-0.5 text-xs font-medium bg-pink-100 text-secondary rounded-full">Conference</span>
                </div>
                <h3 class="text-lg font-semibold mb-2">Web Development Summit 2024</h3>
                <p class="text-sm text-gray-600 mb-3 line-clamp-2">Join industry experts for a deep dive into modern web development practices.</p>
                <div class="flex items-center justify-between text-sm">
                    <div class="flex items-center gap-2">
                        <i class="fas fa-calendar-alt text-primary"></i>
                        <span class="text-gray-600">Mar 15, 2024</span>
                    </div>
                    <div class="flex items-center gap-2">
                        <i class="fas fa-map-marker-alt text-primary"></i>
                        <span class="text-gray-600">San Francisco</span>
                    </div>
                </div>
            </div>
        </div>  

        <!-- Event Card 2 -->
        <div class="bg-white rounded-xl shadow-sm hover:shadow-md transition-all duration-300 border border-gray-100">
            <img src="https://images.unsplash.com/photo-1511795409834-ef04bbd61622?ixlib=rb-4.0.3"
                alt="Music Festival"
                class="w-full h-36 object-cover rounded-t-xl">
            <div class="p-4">
                <div class="flex items-center gap-2 mb-3">
                    <span class="px-2.5 py-0.5 text-xs font-medium bg-purple-100 text-primary rounded-full">Music</span>
                    <span class="px-2.5 py-0.5 text-xs font-medium bg-pink-100 text-secondary rounded-full">Festival</span>
                </div>
                <h3 class="text-lg font-semibold mb-2">Summer Music Fest 2024</h3>
                <p class="text-sm text-gray-600 mb-3 line-clamp-2">Experience three days of amazing live performances under the stars.</p>
                <div class="flex items-center justify-between text-sm">
                    <div class="flex items-center gap-2">
                        <i class="fas fa-calendar-alt text-primary"></i>
                        <span class="text-gray-600">Jun 20-22, 2024</span>
                    </div>
                    <div class="flex items-center gap-2">
                        <i class="fas fa-map-marker-alt text-primary"></i>
                        <span class="text-gray-600">Austin, TX</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Event Card 3 -->
        <div class="bg-white rounded-xl shadow-sm hover:shadow-md transition-all duration-300 border border-gray-100">
            <img src="https://images.unsplash.com/photo-1514525253161-7a46d19cd819?ixlib=rb-4.0.3"
                alt="Art Workshop"
                class="w-full h-36 object-cover rounded-t-xl">
            <div class="p-4">
                <div class="flex items-center gap-2 mb-3">
                    <span class="px-2.5 py-0.5 text-xs font-medium bg-purple-100 text-primary rounded-full">Art</span>
                    <span class="px-2.5 py-0.5 text-xs font-medium bg-pink-100 text-secondary rounded-full">Workshop</span>
                </div>
                <h3 class="text-lg font-semibold mb-2">Creative Art Workshop</h3>
                <p class="text-sm text-gray-600 mb-3 line-clamp-2">Learn various painting techniques from professional artists.</p>
                <div class="flex items-center justify-between text-sm">
                    <div class="flex items-center gap-2">
                        <i class="fas fa-calendar-alt text-primary"></i>
                        <span class="text-gray-600">Apr 5, 2024</span>
                    </div>
                    <div class="flex items-center gap-2">
                        <i class="fas fa-map-marker-alt text-primary"></i>
                        <span class="text-gray-600">New York, NY</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</main>
</div>
</body>

</html>