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

    {{-- @if(isset($events))
    <pre>{{ print_r($events->toArray(), true) }}</pre>
    @endif --}}
    @include('dashboard/header_side')


    <!-- Main Content Area -->
    <main class="flex-1 ml-64 p-8">
        <!-- Page Header -->
        <div class="flex justify-between items-center mb-8">
            <div>
                <h1 class="text-2xl font-bold text-gray-800">My Events</h1>
                <p class="text-gray-600">Manage and track all your created events</p>
            </div>
            <button onclick="toggleModal()"
                class="px-4 py-2 bg-gradient-to-r from-primary to-secondary text-white rounded-lg hover:shadow-lg transition-all duration-300">
                <i class="fas fa-plus mr-2"></i>
                Create New Event
            </button>
        </div>

        <!-- Filters and Search -->
        <div class="bg-white rounded-xl shadow-sm p-4 mb-6">
            <div class="flex items-center justify-between flex-wrap gap-4">
                <!-- Search -->
                <div class="relative flex-1 min-w-[200px]">
                    <input type="text"
                        placeholder="Search events..."
                        class="w-full pl-10 pr-4 py-2 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary/20">
                    <i class="fas fa-search absolute left-3 top-1/2 -translate-y-1/2 text-gray-400"></i>
                </div>
                <!-- Filters -->
                <div class="flex gap-4">
                    <select class="px-4 py-2 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary/20">
                        <option value="">All Categories</option>
                        <option value="music">Music & Entertainment</option>
                        <option value="Technology">Technology</option>
                        <option value="business">Business & Professional</option>
                        <option value="sports">Sports & Fitness</option>
                        <option value="art">Art & Culture</option>
                        <option value="food">Food & Drink</option>
                        <option value="education">Education & Learning</option>
                    </select>
                    <select class="px-4 py-2 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary/20">
                        <option value="">Status</option>
                        <option value="active">Active</option>
                        <option value="draft">Draft</option>
                        <option value="past">Past</option>
                    </select>
                </div>
            </div>
        </div>

        <!-- Create Event Modal -->
        <div id="createEventModal" class="fixed inset-0 bg-gray-900/50 backdrop-blur-sm hidden items-center justify-center z-50">
            <div class="bg-white rounded-2xl shadow-xl w-full max-w-2xl max-h-[90vh] overflow-y-auto">
                <!-- Modal Header -->
                <div class="p-6 border-b border-gray-100">
                    <div class="flex items-center justify-between">
                        <h2 class="text-xl font-bold text-gray-800">Create New Event</h2>
                        <button onclick="toggleModal()" class="text-gray-400 hover:text-gray-600">
                            <i class="fas fa-times text-xl"></i>
                        </button>
                    </div>
                </div>

                <!-- Modal Body -->
                <div class="p-6">
                    <form id="events" action="/events" class="space-y-6" method="POST">
                        <!-- Title -->

                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Event Title</label>
                            <input type="text"
                                name="title"
                                required
                                placeholder="Enter event title"
                                class="w-full px-4 py-2 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary/20">
                        </div>

                        <!-- Description -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Description</label>
                            <textarea name="description"
                                required
                                rows="4"
                                placeholder="Describe your event"
                                class="w-full px-4 py-2 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary/20"></textarea>
                        </div>

                        <!-- Location -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Location</label>
                            <input type="text"
                                name="location"
                                required
                                placeholder="Event location"
                                class="w-full px-4 py-2 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary/20">
                        </div>

                        <!-- Date and Time -->
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Date</label>
                                <input type="date"
                                    name="date"
                                    required
                                    class="w-full px-4 py-2 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary/20">
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Time</label>
                                <input type="time"
                                    name="time"
                                    required
                                    class="w-full px-4 py-2 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary/20">
                            </div>
                        </div>

                        <!-- Category -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Category</label>
                            <select name="category"
                                required
                                class="w-full px-4 py-2 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary/20">
                                <option value="">Select a category</option>
                                <option value="Music & Entertainment">Music & Entertainment</option>
                                <option value="Technology">Technology</option>
                                <option value="business">Business & Professional</option>
                                <option value="Sports & Fitness">Sports & Fitness</option>
                                <option value="Art & Culture">Art & Culture</option>
                                <option value="Food & Drink">Food & Drink</option>
                                <option value="Education & Learning">Education & Learning</option>
                            </select>
                        </div>

                        <!-- Max Participants -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Maximum Participants</label>
                            <input type="number"
                                name="maxParticipants"
                                required
                                min="1"
                                placeholder="Enter maximum number of participants"
                                class="w-full px-4 py-2 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary/20">
                        </div>

                        <!-- Event Image -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Event Image URL</label>
                            <input type="url"
                                id="imageUrl"
                                name="imageUrl"
                                required
                                placeholder="Enter image URL"
                                class="w-full px-4 py-2 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary/20"
                                onchange="updateImagePreview()">

                            <!-- Image Preview -->
                            <div id="imagePreviewContainer" class="mt-4 hidden">
                                <p class="text-sm text-gray-600 mb-2">Preview:</p>
                                <div class="relative w-full h-48 bg-gray-50 rounded-lg border-2 border-gray-200 overflow-hidden">
                                    <img id="imagePreview"
                                        src=""
                                        alt="Event image preview"
                                        class="w-full h-full object-cover">
                                    <!-- Loading Spinner -->
                                    <div id="imageLoading" class="absolute inset-0 flex items-center justify-center bg-white">
                                        <div class="animate-spin rounded-full h-8 w-8 border-4 border-primary border-t-transparent"></div>
                                    </div>
                                    <!-- Error Message -->
                                    <div id="imageError" class="hidden absolute inset-0 flex items-center justify-center bg-red-50">
                                        <p class="text-red-500 text-sm">
                                            <i class="fas fa-exclamation-circle mr-2"></i>
                                            Failed to load image
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Modal Footer -->
                        <div class="flex justify-end gap-4 pt-4 border-t border-gray-100">
                            <button type="button"
                                onclick="toggleModal()"
                                class="px-6 py-2.5 text-gray-600 hover:text-gray-800 border border-gray-200 rounded-lg hover:border-gray-300 transition-colors">
                                Cancel
                            </button>
                            <button type="submit"
                                class="px-6 py-2.5 bg-gradient-to-r from-primary to-secondary text-white rounded-lg hover:shadow-lg transition-all duration-300">
                                <i class="fas fa-plus mr-2"></i>
                                Create Event
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Events Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            <!-- Event Card 1 -->
            @foreach($events as $event)
            @if($event->status == 'Active')

<div class="bg-white rounded-xl shadow-sm hover:shadow-md transition-all duration-300 border border-gray-100 group relative">
    <!-- Original Card Design -->
    <div class="relative">
        <img src="{{$event->imageUrl}}" alt="Event Image" class="w-full h-48 object-cover rounded-t-xl">
        <!-- Status Badge -->
        <span class="absolute top-4 left-4 px-3 py-1 text-xs font-medium bg-green-100 text-green-600 rounded-full">
            {{$event->status}}
        </span>
        <!-- Quick Actions -->
        <form action="{{ route('events.removeevent') }}" method="POST" class="absolute top-4 right-4 flex gap-2 opacity-0 group-hover:opacity-100 transition-opacity">
            @csrf
            @method('DELETE')
            <input type="hidden" value="{{ $event->id }}" name="idtodelete">
            <button type="submit" class="p-2 bg-white/90 rounded-full hover:bg-white text-gray-600 hover:text-red-500 transition-colors">
                <i class="fas fa-trash"></i>
            </button>
        </form>

        <button type="button" 
                onclick="showModifyForm('modifyForm_{{ $event->id }}')" 
                class="absolute top-4 right-14 p-2 bg-white/90 rounded-full hover:bg-white text-gray-600 hover:text-primary transition-colors opacity-0 group-hover:opacity-100">
            <i class="fas fa-edit"></i>
        </button>
    </div>

    <div class="p-5">
        <div class="flex items-center gap-2 mb-3">
            <span class="px-2.5 py-0.5 text-xs font-medium bg-purple-100 text-primary rounded-full">{{$event->category}}</span>
            <span class="px-2.5 py-0.5 text-xs font-medium bg-blue-100 text-blue-600 rounded-full">Festival</span>
        </div>
        <h3 class="text-lg font-semibold mb-2">{{$event->title}}</h3>
        <p class="text-sm text-gray-600 mb-4 line-clamp-2">{{$event->description}}</p>

        <!-- Event Details -->
        <div class="space-y-2 mb-4">
            <div class="flex items-center gap-2 text-sm text-gray-600">
                <i class="fas fa-calendar-alt text-primary w-4"></i>
                <span>{{$event->time}}</span>
            </div>
            <div class="flex items-center gap-2 text-sm text-gray-600">
                <i class="fas fa-map-marker-alt text-primary w-4"></i>
                <span>{{$event->location}}</span>
            </div>
            <div class="flex items-center gap-2 text-sm text-gray-600">
                <i class="fas fa-users text-primary w-4"></i>
                <span>{{$event->maxparticipants}} Participants</span>
            </div>
        </div>

        <!-- View Details Button -->
        <button class="w-full px-4 py-2 text-gray-600 border border-gray-300 rounded-lg hover:bg-gray-50 transition-all duration-300">
            View Details
        </button>
    </div>

    <!-- Hidden Modify Form -->
    <div id="modifyForm_{{ $event->id }}" class="hidden fixed inset-0 bg-gray-900/50 backdrop-blur-sm z-50 flex items-center justify-center">
        <div class="bg-white rounded-2xl shadow-xl w-full max-w-2xl max-h-[90vh] overflow-y-auto m-4">
            <div class="p-6 border-b border-gray-100">
                <div class="flex items-center justify-between">
                    <h2 class="text-xl font-bold text-gray-800">Modify Event</h2>
                    <button onclick="hideModifyForm('modifyForm_{{ $event->id }}')" class="text-gray-400 hover:text-gray-600">
                        <i class="fas fa-times text-xl"></i>
                    </button>
                </div>
            </div>

            <div class="p-6">
                <form action="{{ route('events.modifyevent') }}" method="POST" class="space-y-6">
                    @csrf
                    @method('PUT')
                    <input type="hidden" name="idtomodify" value="{{ $event->id }}">

                    <!-- Title -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Event Title</label>
                        <input type="text" name="newtitle" value="{{ $event->title }}" required
                            class="w-full px-4 py-2 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary/20">
                    </div>

                    <!-- Description -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Description</label>
                        <textarea name="newdescription" required rows="4"
                            class="w-full px-4 py-2 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary/20">{{ $event->description }}</textarea>
                    </div>

                    <!-- Location -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Location</label>
                        <input type="text" name="newlocation" value="{{ $event->location }}" required
                            class="w-full px-4 py-2 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary/20">
                    </div>

                    <!-- Date and Time -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Date</label>
                            <input type="date" name="newdate" value="{{ $event->date }}" required
                                class="w-full px-4 py-2 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary/20">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Time</label>
                            <input type="time" name="newtime" value="{{ $event->time }}" required
                                class="w-full px-4 py-2 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary/20">
                        </div>
                    </div>

                    <!-- Category -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Category</label>
                        <select name="newcategory" required
                            class="w-full px-4 py-2 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary/20">
                            <option value="Music & Entertainment" {{ $event->category == 'Music & Entertainment' ? 'selected' : '' }}>Music & Entertainment</option>
                            <option value="Technology" {{ $event->category == 'Technology' ? 'selected' : '' }}>Technology</option>
                            <option value="business" {{ $event->category == 'business' ? 'selected' : '' }}>Business & Professional</option>
                            <option value="Sports & Fitness" {{ $event->category == 'Sports & Fitness' ? 'selected' : '' }}>Sports & Fitness</option>
                            <option value="Art & Culture" {{ $event->category == 'Art & Culture' ? 'selected' : '' }}>Art & Culture</option>
                            <option value="Food & Drink" {{ $event->category == 'Food & Drink' ? 'selected' : '' }}>Food & Drink</option>
                            <option value="Education & Learning" {{ $event->category == 'Education & Learning' ? 'selected' : '' }}>Education & Learning</option>
                        </select>
                    </div>

                    <!-- Max Participants -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Maximum Participants</label>
                        <input type="number" name="newmaxParticipants" value="{{ $event->maxparticipants }}" required min="1"
                            class="w-full px-4 py-2 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary/20">
                    </div>

                    <!-- Event Image -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Event Image URL</label>
                        <input type="url" name="imageUrl" value="{{ $event->imageUrl }}" required
                            class="w-full px-4 py-2 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary/20">
                    </div>

                    <!-- Buttons -->
                    <div class="flex justify-end gap-4 pt-4">
                        <button type="button" onclick="hideModifyForm('modifyForm_{{ $event->id }}')"
                            class="px-6 py-2.5 text-gray-600 hover:text-gray-800 border border-gray-200 rounded-lg hover:border-gray-300 transition-colors">
                            Cancel
                        </button>
                        <button type="submit"
                            class="px-6 py-2.5 bg-gradient-to-r from-primary to-secondary text-white rounded-lg hover:shadow-lg transition-all duration-300">
                            Save Changes
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    function showModifyForm(formId) {
        document.getElementById(formId).classList.remove('hidden');
        document.getElementById(formId).classList.add('flex');
        document.body.style.overflow = 'hidden';
    }

    function hideModifyForm(formId) {
        document.getElementById(formId).classList.remove('flex');
        document.getElementById(formId).classList.add('hidden');
        document.body.style.overflow = 'auto';
    }
</script>

            @else
            <!-- Event Card 2 (Past Event) -->
            <div class="bg-white rounded-xl shadow-sm hover:shadow-md transition-all duration-300 border border-gray-100 group">
                <div class="relative">
                    <img src="{{$event->imageUrl}}"
                        alt="Music Festival"
                        class="w-full h-48 object-cover rounded-t-xl filter grayscale">
                    <!-- Status Badge -->
                    <span class="absolute top-4 left-4 px-3 py-1 text-xs font-medium bg-gray-100 text-gray-600 rounded-full">
                        Past
                    </span>
                    <!-- Quick Actions -->
                    <form action="" class="absolute top-4 right-4 flex gap-2 opacity-0 group-hover:opacity-100 transition-opacity">
                        <button class="p-2 bg-white/90 rounded-full hover:bg-white text-gray-600 hover:text-primary transition-colors">
                            <i class="fas fa-copy"></i>
                        </button>
                        <button class="p-2 bg-white/90 rounded-full hover:bg-white text-gray-600 hover:text-red-500 transition-colors">
                            <i class="fas fa-trash"></i>
                        </button>
                    </form>
                </div>
                <div class="p-5 opacity-75">
                    <div class="flex items-center gap-2 mb-3">
                        <span class="px-2.5 py-0.5 text-xs font-medium bg-purple-100 text-primary rounded-full">{{$event->category}}</span>
                        <span class="px-2.5 py-0.5 text-xs font-medium bg-pink-100 text-secondary rounded-full">Festival</span>
                    </div>
                    <h3 class="text-lg font-semibold mb-2">{{$event->title}}</h3>
                    <p class="text-sm text-gray-600 mb-4 line-clamp-2">{{$event->description}}</p>

                    <!-- Event Details -->
                    <div class="space-y-2 mb-4">
                        <div class="flex items-center gap-2 text-sm text-gray-600">
                            <i class="fas fa-calendar-alt text-primary w-4"></i>
                            <span>{{$event->time}}</span>
                        </div>
                        <div class="flex items-center gap-2 text-sm text-gray-600">
                            <i class="fas fa-map-marker-alt text-primary w-4"></i>
                            <span>{{$event->location}}</span>
                        </div>
                        <div class="flex items-center gap-2 text-sm text-gray-600">
                            <i class="fas fa-users text-primary w-4"></i>
                            <span>{{$event->maxparticipants}} Participants</span>
                        </div>
                    </div>

                    <!-- View Details Button -->
                    <button class="w-full px-4 py-2 text-gray-600 border border-gray-300 rounded-lg hover:bg-gray-50 transition-all duration-300">
                        View Details
                    </button>
                </div>
            </div>
        </div>
        @endif
        @endforeach
    </main>


  
    <script>

function toggleModal() {
            const modal = document.getElementById('createEventModal');
            if (modal.classList.contains('hidden')) {
                modal.classList.remove('hidden');
                modal.classList.add('flex');
                document.body.style.overflow = 'hidden';
            } else {
                modal.classList.add('hidden');
                modal.classList.remove('flex');
                document.body.style.overflow = 'auto';
            }
        }
        document.getElementById('imageUrl').addEventListener('keyup', function(e) {

            clearTimeout(this.timer);
            this.timer = setTimeout(() => {
                updateImagePreview();
            }, 200);
        });


        function updateImagePreview() {
            const urlInput = document.getElementById('imageUrl');
            const previewContainer = document.getElementById('imagePreviewContainer');
            const previewImg = document.getElementById('imagePreview');
            const loadingElement = document.getElementById('imageLoading');
            const errorElement = document.getElementById('imageError');

            // Reset states
            errorElement.classList.add('hidden');

            // If URL is empty, hide preview
            if (!urlInput.value) {
                previewContainer.classList.add('hidden');
                return;
            }

            // Show container and loading state
            previewContainer.classList.remove('hidden');
            loadingElement.classList.remove('hidden');

            
            const img = new Image();
            img.onload = function() {
                previewImg.src = urlInput.value;
                loadingElement.classList.add('hidden');
                errorElement.classList.add('hidden');
            };
            img.onerror = function() {
                loadingElement.classList.add('hidden');
                errorElement.classList.remove('hidden');
            };
            img.src = urlInput.value;
        }

        // Form submission handler
        document.getElementById('createEventForm').addEventListener('submit', function(event) {
            event.preventDefault();

            const formData = new FormData(this);
            const data = Object.fromEntries(formData.entries());

            // Here you would typically send the data to your backend
            console.log('Form submitted with data:', data);

            
            toggleModal();

            // Optional: Show success message
            alert('Event created successfully!');

            // Optional: Refresh the page or update the events list
            // window.location.reload();
        });
    </script>
</body>

</html>