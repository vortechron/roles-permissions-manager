@declareNull('route')
@declareNull('class')

<a name="" id="" class="btn btn-primary {{ $class }}" href="{{ $route ?? route('roles.index') }}" role="button">Manage Roles</a>