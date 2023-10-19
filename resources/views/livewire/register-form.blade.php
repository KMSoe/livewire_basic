<div class="mt-10 p-5 mx-auto sm:w-full sm:max-w-sm shadow border-teal-500 border-t-2">
    <div class="flex ">
        <h2 class="text-center font-semibold text-2x text-gray-800 mb-5">Create New Account</h2>
    </div>
    @if (session('success'))
        <span class="text-green-500">{{ session('success') }}</span>
    @endif
    <form wire:submit="create" action="" class="">
        <label class="mt-3 block text-sm font-medium leading-6 text-gray-900">Name</label>
        <input wire:model='name' type="text" id="name" placeholder="name.."
            class="ring-1 ring-inset ring-gray-300 bg-gray-100 text-gray-900 text-sm rounded block w-full p-2.5 mx-auto">
        @error('name')
            <span class="text-red-500 text-xs">{{ $message }} </span>
        @enderror

        <label class="mt-3 block text-sm font-medium leading-6 text-gray-900">Email</label>
        <input wire:model='email' type="email" id="email" placeholder="email.."
            class="ring-1 ring-inset ring-gray-300 bg-gray-100 text-gray-900 text-sm rounded block w-full p-2.5 mx-auto">
        @error('email')
            <span class="text-red-500 text-xs">{{ $message }} </span>
        @enderror

        <label class="mt-3 block text-sm font-medium leading-6 text-gray-900">Password</label>
        <input wire:model='password' type="password" id="password" placeholder=""
            class="ring-1 ring-inset ring-gray-300 bg-gray-100 text-gray-900 text-sm rounded block w-full p-2.5 mx-auto">
        @error('password')
            <span class="text-red-500 text-xs">{{ $message }} </span>
        @enderror


        <label class="mt-3 block text-sm font-medium leading-6 text-gray-900">Profile picture</label>
        <input wire:model='image' accept="image/png, image/jpeg" type="file" id="image"
            class="ring-1 ring-inset ring-gray-300 bg-gray-100 text-gray-900 text-sm rounded block w-full p-2.5 mx-auto">

        @error('image')
            <span class="text-red-500 text-xs">{{ $message }} </span>
        @enderror

        @if ($image)
            <img class="rounded w-10 h-10 mt-5 block" src="{{ $image->temporaryUrl() }}" alt="">
        @endif

        <div wire:loading wire:target="image">
            <span class="text-green-500"> Uploading Image ... </span>
        </div>

        <div class="mt-3" wire:loading.delay>
            <span class="text-green-500"> <svg aria-hidden="true"
                    class="w-8 h-8 mr-2 text-gray-200 animate-spin dark:text-gray-600 fill-blue-600"
                    viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z"
                        fill="currentColor" />
                    <path
                        d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z"
                        fill="currentFill" />
                </svg> </span>
        </div>

        <button type="button" @click="$dispatch('user-created')"
            class="block mt-3 px-4 py-2 bg-teal-500 text-white font-semibold rounded hover:bg-teal-600">
            Reload List
        </button>

        <button wire:loading.class.remove="bg-blue-500" wire:loading.attr="disabled" type="submit"
            class="block mt-3 px-4 py-2 bg-teal-500 text-white font-semibold rounded hover:bg-teal-600">Create
            + </button>
    </form>
</div>
