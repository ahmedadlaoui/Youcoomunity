<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Settings - Youcommunity</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" />
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: '#7C3AED',
                        secondary: '#EC4899',
                        accent: '#F472B6'
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
            <h1 class="text-2xl font-bold text-gray-800">Account Settings</h1>
            <p class="text-gray-600">Manage your profile and security preferences</p>
        </div>

        <!-- Settings Content -->
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
            <!-- Left Column: Profile & Password -->
            <div class="lg:col-span-2 space-y-6">
                <!-- Profile Card -->
                <div class="bg-white rounded-xl shadow-sm overflow-hidden">
                    <div class="p-6 border-b border-gray-100">
                        <h2 class="text-xl font-bold text-gray-800">Profile Information</h2>
                        <p class="text-sm text-gray-500 mt-1">Update your personal information and profile picture</p>
                    </div>
                    
                    <div class="p-6">
                        <form class="space-y-6">
                            <!-- Profile Picture -->
                            <div class="flex flex-col items-center p-6 bg-gray-50 rounded-xl">
                                <div class="relative mb-4">
                                    <img id="profilePreview"
                                         src="https://ui-avatars.com/api/?name=John+Doe&background=7C3AED&color=fff" 
                                         alt="Profile picture" 
                                         class="w-24 h-24 rounded-full object-cover border-4 border-white shadow-lg">
                                    <button type="button"
                                            onclick="document.getElementById('profilePicture').click()"
                                            class="absolute bottom-0 right-0 p-2 bg-primary text-white rounded-full hover:bg-primary/90 transition-colors shadow-md">
                                        <i class="fas fa-camera"></i>
                                    </button>
                                </div>
                                <input type="file" 
                                       id="profilePicture" 
                                       accept="image/*"
                                       class="hidden"
                                       onchange="previewImage(event)">
                                <p class="text-sm text-gray-500">
                                    Click the camera icon to change your profile picture
                                </p>
                            </div>

                            <!-- Name -->
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">
                                    <i class="fas fa-user text-primary mr-2"></i>
                                    Full Name
                                </label>
                                <input type="text" 
                                       value="John Doe"
                                       class="w-full px-4 py-2.5 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary/20 focus:border-primary">
                            </div>

                            <!-- Email -->
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">
                                    <i class="fas fa-envelope text-primary mr-2"></i>
                                    Email Address
                                </label>
                                <input type="email" 
                                       value="john@example.com"
                                       class="w-full px-4 py-2.5 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary/20 focus:border-primary">
                            </div>

                            <button type="submit" 
                                    class="w-full sm:w-auto px-6 py-2.5 bg-primary text-white rounded-lg hover:bg-primary/90 transition-all duration-300 flex items-center justify-center gap-2">
                                <i class="fas fa-save"></i>
                                Save Changes
                            </button>
                        </form>
                    </div>
                </div>

                <!-- Password Card -->
                <div class="bg-white rounded-xl shadow-sm overflow-hidden">
                    <div class="p-6 border-b border-gray-100">
                        <h2 class="text-xl font-bold text-gray-800">Security</h2>
                        <p class="text-sm text-gray-500 mt-1">Ensure your account stays secure with a strong password</p>
                    </div>
                    
                    <div class="p-6">
                        <form class="space-y-6">
                            <!-- Current Password -->
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">
                                    <i class="fas fa-lock text-primary mr-2"></i>
                                    Current Password
                                </label>
                                <input type="password" 
                                       class="w-full px-4 py-2.5 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary/20 focus:border-primary">
                            </div>

                            <!-- New Password -->
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">
                                    <i class="fas fa-key text-primary mr-2"></i>
                                    New Password
                                </label>
                                <input type="password" 
                                       class="w-full px-4 py-2.5 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary/20 focus:border-primary">
                                <p class="mt-2 text-sm text-gray-500">
                                    Password must be at least 8 characters long
                                </p>
                            </div>

                            <!-- Confirm Password -->
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">
                                    <i class="fas fa-check-circle text-primary mr-2"></i>
                                    Confirm New Password
                                </label>
                                <input type="password" 
                                       class="w-full px-4 py-2.5 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary/20 focus:border-primary">
                            </div>

                            <button type="submit" 
                                    class="w-full sm:w-auto px-6 py-2.5 bg-primary text-white rounded-lg hover:bg-primary/90 transition-all duration-300 flex items-center justify-center gap-2">
                                <i class="fas fa-shield-alt"></i>
                                Update Password
                            </button>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Right Column: Preferences -->
            <div class="lg:col-span-1">
                <div class="bg-white rounded-xl shadow-sm overflow-hidden">
                    <div class="p-6 border-b border-gray-100">
                        <h2 class="text-xl font-bold text-gray-800">Preferences</h2>
                        <p class="text-sm text-gray-500 mt-1">Customize your notification settings</p>
                    </div>
                    
                    <div class="p-6">
                        <div class="space-y-6">
                            <!-- Email Notifications -->
                            <div class="flex items-center justify-between p-4 bg-gray-50 rounded-lg">
                                <div>
                                    <p class="font-medium text-gray-700 flex items-center gap-2">
                                        <i class="fas fa-envelope text-primary"></i>
                                        Email Notifications
                                    </p>
                                    <p class="text-sm text-gray-500 mt-1">Get updates about your events</p>
                                </div>
                                <label class="relative inline-flex items-center cursor-pointer">
                                    <input type="checkbox" class="sr-only peer" checked>
                                    <div class="w-11 h-6 bg-gray-200 rounded-full peer peer-checked:bg-primary peer-focus:ring-4 peer-focus:ring-primary/20 after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:after:translate-x-full"></div>
                                </label>
                            </div>

                            <!-- SMS Updates -->
                            <div class="flex items-center justify-between p-4 bg-gray-50 rounded-lg">
                                <div>
                                    <p class="font-medium text-gray-700 flex items-center gap-2">
                                        <i class="fas fa-mobile-alt text-primary"></i>
                                        SMS Updates
                                    </p>
                                    <p class="text-sm text-gray-500 mt-1">Receive text message alerts</p>
                                </div>
                                <label class="relative inline-flex items-center cursor-pointer">
                                    <input type="checkbox" class="sr-only peer">
                                    <div class="w-11 h-6 bg-gray-200 rounded-full peer peer-checked:bg-primary peer-focus:ring-4 peer-focus:ring-primary/20 after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:after:translate-x-full"></div>
                                </label>
                            </div>

                            <!-- Marketing -->
                            <div class="flex items-center justify-between p-4 bg-gray-50 rounded-lg">
                                <div>
                                    <p class="font-medium text-gray-700 flex items-center gap-2">
                                        <i class="fas fa-bullhorn text-primary"></i>
                                        Marketing
                                    </p>
                                    <p class="text-sm text-gray-500 mt-1">Receive promotional emails</p>
                                </div>
                                <label class="relative inline-flex items-center cursor-pointer">
                                    <input type="checkbox" class="sr-only peer">
                                    <div class="w-11 h-6 bg-gray-200 rounded-full peer peer-checked:bg-primary peer-focus:ring-4 peer-focus:ring-primary/20 after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:after:translate-x-full"></div>
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <script>
        function previewImage(event) {
            const file = event.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    document.getElementById('profilePreview').src = e.target.result;
                }
                reader.readAsDataURL(file);
            }
        }
    </script>
</body>
</html> 