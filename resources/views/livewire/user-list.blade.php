<div wire:pull.1s class="p-5 mx-auto max-w-md">

    <div wire:offline>
        <div class="flex items-center p-4 mb-4 text-sm text-yellow-800 rounded-lg bg-yellow-50 dark:bg-gray-800 dark:text-yellow-300"
            role="alert">
            <svg class="flex-shrink-0 inline w-4 h-4 mr-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                fill="currentColor" viewBox="0 0 20 20">
                <path
                    d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
            </svg>
            <span class="sr-only">Info</span>
            <div>
                <span class="font-medium">Warning alert!</span> You are offline. Make sure you have internet please.
            </div>
        </div>
    </div>

    <h2 class="text-2xl mb-3">Users List</h2>
    <input wire:offline.remove swire:model.live='search' type="text" placeholder="Search..."
        class="ring-1 ring-inset ring-gray-300 bg-gray-100 text-gray-900 text-sm rounded block w-full p-2.5 mx-auto">

    <div role="status"
        class="my-3 p-4 border border-gray-200 divide-y divide-gray-200 rounded shadow dark:divide-gray-700 md:p-6 dark:border-gray-700">
        @foreach ($users as $user)
            <div wire:key="{{ $user->id }}" class="flex items-center justify-between py-3">
                <div class="">
                    <div class="text-gray-900 rounded-full dark:bg-gray-600 w-24 mb-23 truncate">{{ $user->name }}
                    </div>
                    <div class="text-xs text-gray-600 w-32  rounded-full dark:bg-gray-700">{{ $user->email }}</div>
                </div>
                <button wire:click="viewUser({{ $user }})"
                    class="text-white bg-teal-500 px-3 py-1 rounded-full">View</button>
            </div>
        @endforeach
        <div>
            {{ $users->links()}}

        </div>
    </div>
</div>
