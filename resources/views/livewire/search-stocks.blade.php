<div>
    {{-- To attain knowledge, add things every day; To attain wisdom, subtract things every day. --}}

    <input wire:model="search" type="text" placeholder="Search users..." />

    <ul>
        @foreach($users as $user)
        <li>{{ $user->name }}</li>
        @endforeach
    </ul>
</div>
