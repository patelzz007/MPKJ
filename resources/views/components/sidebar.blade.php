{{-- 
@if (auth()->user()->role->role_id =  '2')
<p>World</p>
@elseif (auth()->user()->role->role_id =  '3')
    <p>Bitches</p>
@endif --}}

@switch(auth()->user()->role->role_id)
    @case(1)
        @include('components.sidebar.admin-sidebar')
        @break

    @case(2)
        @include('components.sidebar.user-sidebar')
        @break

    @case(3)
        {{-- <p>Bitches</p> --}}
        @break
@endswitch