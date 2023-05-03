@role('Admin')
    @include('layouts.partials.admin')
@else
    @include('layouts.partials.user')
@endrole
