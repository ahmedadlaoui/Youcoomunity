<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Participants - Youcommunity</title>
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
        <!-- Page Header -->
        <div class="mb-8">
            <h1 class="text-2xl font-bold text-gray-800">Event Participants</h1>
            <p class="text-gray-600">Manage participants for all your events</p>
        </div>

        <!-- Stats Overview -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
            <!-- Total Events -->
            <div class="bg-white rounded-xl shadow-sm p-6">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm text-gray-500">Total Events</p>
                        <h3 class="text-2xl font-bold text-gray-800">12</h3>
                    </div>
                    <div class="p-3 bg-purple-100 rounded-lg">
                        <i class="fas fa-calendar text-primary text-xl"></i>
                    </div>
                </div>
            </div>

            <!-- Total Participants -->
            <div class="bg-white rounded-xl shadow-sm p-6">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm text-gray-500">Total Participants</p>
                        <h3 class="text-2xl font-bold text-gray-800">48</h3>
                    </div>
                    <div class="p-3 bg-purple-100 rounded-lg">
                        <i class="fas fa-users text-primary text-xl"></i>
                    </div>
                </div>
            </div>

            <!-- Average Participants -->
            <div class="bg-white rounded-xl shadow-sm p-6">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm text-gray-500">Average per Event</p>
                        <h3 class="text-2xl font-bold text-gray-800">4</h3>
                    </div>
                    <div class="p-3 bg-purple-100 rounded-lg">
                        <i class="fas fa-chart-line text-primary text-xl"></i>
                    </div>
                </div>
            </div>
        </div>

        <!-- Events List -->
        <div class="bg-white rounded-xl shadow-sm overflow-hidden">
            <div class="p-6 border-b border-gray-100">
                <h2 class="text-xl font-bold text-gray-800">Your Events</h2>
                <p class="text-sm text-gray-500 mt-1">Manage participants for each event</p>
            </div>

            <!-- Events Table -->
            <div class="overflow-x-auto">
                <table class="w-full">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Event</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Date</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Participants</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                            <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        <!-- Event 1 -->
                        <tr>
                            <td class="px-6 py-4">
                                <div class="flex items-center">
                                    <div class="h-10 w-10 rounded-lg bg-purple-100 flex items-center justify-center">
                                        <i class="fas fa-music text-primary"></i>
                                    </div>
                                    <div class="ml-4">
                                        <div class="text-sm font-medium text-gray-900">Summer Concert</div>
                                        <div class="text-sm text-gray-500">Music Festival</div>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                Aug 15, 2024
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="flex items-center">
                                    <div class="flex -space-x-2 mr-2">
                                        <img class="h-6 w-6 rounded-full border-2 border-white" src="https://ui-avatars.com/api/?name=John+Doe" alt="">
                                        <img class="h-6 w-6 rounded-full border-2 border-white" src="https://ui-avatars.com/api/?name=Jane+Smith" alt="">
                                        <div class="h-6 w-6 rounded-full border-2 border-white bg-gray-200 flex items-center justify-center text-xs text-gray-500">+3</div>
                                    </div>
                                    <span class="text-sm text-gray-500">5 participants</span>
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <span class="px-2 py-1 text-xs font-medium rounded-full bg-green-100 text-green-800">
                                    Active
                                </span>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                <button onclick="showParticipants(1)" class="text-primary hover:text-primary/80 mr-3">View Details</button>
                            </td>
                        </tr>

                        <!-- Event 2 -->
                        <tr>
                            <td class="px-6 py-4">
                                <div class="flex items-center">
                                    <div class="h-10 w-10 rounded-lg bg-purple-100 flex items-center justify-center">
                                        <i class="fas fa-utensils text-primary"></i>
                                    </div>
                                    <div class="ml-4">
                                        <div class="text-sm font-medium text-gray-900">Food Festival</div>
                                        <div class="text-sm text-gray-500">Culinary Event</div>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                Sep 20, 2024
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="flex items-center">
                                    <div class="flex -space-x-2 mr-2">
                                        <img class="h-6 w-6 rounded-full border-2 border-white" src="https://ui-avatars.com/api/?name=Alice+Johnson" alt="">
                                        <img class="h-6 w-6 rounded-full border-2 border-white" src="https://ui-avatars.com/api/?name=Bob+Wilson" alt="">
                                    </div>
                                    <span class="text-sm text-gray-500">2 participants</span>
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <span class="px-2 py-1 text-xs font-medium rounded-full bg-yellow-100 text-yellow-800">
                                    Upcoming
                                </span>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                <button onclick="showParticipants(2)" class="text-primary hover:text-primary/80 mr-3">View Details</button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Participants Modal -->
        <div id="participantsModal" class="hidden fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full">
            <div class="relative top-20 mx-auto p-5 border w-11/12 max-w-2xl shadow-lg rounded-md bg-white">
                <div class="flex items-center justify-between mb-4">
                    <h3 class="text-lg font-medium text-gray-900">Event Participants</h3>
                    <button onclick="hideParticipants()" class="text-gray-400 hover:text-gray-500">
                        <i class="fas fa-times"></i>
                    </button>
                </div>

                <!-- Participants List -->
                <div class="space-y-4">
                    <!-- Participant 1 -->
                    <div class="flex items-center justify-between p-4 bg-gray-50 rounded-lg">
                        <div class="flex items-center">
                            <img class="h-10 w-10 rounded-full" src="https://ui-avatars.com/api/?name=John+Doe" alt="">
                            <div class="ml-4">
                                <div class="text-sm font-medium text-gray-900">John Doe</div>
                                <div class="text-sm text-gray-500">john@example.com</div>
                            </div>
                        </div>
                        <button onclick="removeParticipant(1)" class="p-2 text-red-500 hover:text-red-700 transition-colors">
                            <i class="fas fa-trash-alt"></i>
                        </button>
                    </div>

                    <!-- Participant 2 -->
                    <div class="flex items-center justify-between p-4 bg-gray-50 rounded-lg">
                        <div class="flex items-center">
                            <img class="h-10 w-10 rounded-full" src="https://ui-avatars.com/api/?name=Jane+Smith" alt="">
                            <div class="ml-4">
                                <div class="text-sm font-medium text-gray-900">Jane Smith</div>
                                <div class="text-sm text-gray-500">jane@example.com</div>
                            </div>
                        </div>
                        <button onclick="removeParticipant(2)" class="p-2 text-red-500 hover:text-red-700 transition-colors">
                            <i class="fas fa-trash-alt"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <script>
        function showParticipants(eventId) {
            document.getElementById('participantsModal').classList.remove('hidden');
        }

        function hideParticipants() {
            document.getElementById('participantsModal').classList.add('hidden');
        }

        function removeParticipant(participantId) {
            if (confirm('Are you sure you want to remove this participant?')) {
                // Add your remove participant logic here
                console.log('Removing participant:', participantId);
            }
        }
    </script>
</body>

</html>