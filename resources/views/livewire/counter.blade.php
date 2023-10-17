<div>
    @if(session('success'))
        <div class="bg-green-300">{{ session('success') }}</div>
    @endif
    <form action="" wire:submit="createNewUser">
        <input wire:model="name" type="text" placeholder="name">
        @error('name') {{ $message }} @endError
        <input wire:model="email" type="email" placeholder="email">
        <input wire:model="password" type="password" placeholder="password">

        <button>Create</button>
    </form>

    @foreach($users as $user)
        <p>{{ $user->name }}</p>
    @endforeach

    {{ $users->links()}}
</div>
