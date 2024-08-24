<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 shadow-lg sm:rounded-lg">
                <div class="p-8 text-center">
                    <h3 class="text-2xl font-semibold text-gray-900 dark:text-gray-100">
                        {{ __("Welcome to Your Dashboard") }}
                    </h3>
                    <p class="mt-4 text-gray-600 dark:text-gray-400">
                        {{ __("You're successfully logged in. Navigate to manage your products or users below.") }}
                    </p>
                </div>
                <div class="flex justify-center space-x-4 p-6">
                    <a href="{{ route('products.index') }}" class="btn btn-primary px-6 py-3 text-white font-semibold rounded-md shadow-md hover:bg-blue-700">
                        Go to Products Page
                    </a>
                    <a href="{{ route('users.index') }}" class="btn btn-secondary px-6 py-3 text-white font-semibold rounded-md shadow-md hover:bg-gray-700">
                        Manage Users & Assign Roles
                    </a>
                </div>
                <!-- Logout Button -->
                <div class="flex justify-center mt-6">
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="btn btn-danger px-6 py-3 text-white font-semibold rounded-md shadow-md hover:bg-red-700">
                            Logout
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
