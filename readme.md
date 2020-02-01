## Usage

All code shown here is just an example. 

### Role Manager Markup/Form
```php
<form action="{{ $routeAction }}" method="post">
    <!-- Include roles manager markup -->
    @include('rpmanager::roles.template')

    <button type="submit" class="btn btn-primary">Save</button>

    @if ($role->id != 1)
    <button type="submit" formaction="@route('admin.roles.delete', $role)" class="btn btn-danger">Delete</button>
    @endif
</form>
```

### Role Manager Index List
```php
<a name="" id="" class="btn btn-secondary -mt-2" href="@route('admin.users.index')" role="button"> <i class="fa fa-arrow-left"></i> Back To List</a>
@include('rpmanager::roles.index', [
    'routeCreate' => route('admin.roles.create'),
    'routeEdit' => function ($role) {
        return route('admin.roles.edit', $role);
    }
])
```

### Role Manager Controller Action
```php
use Vortechron\RPManager\Models\Role;

class RoleManager extends Controller
{
    public function index()
    {
        Role::indexAction();

        return view('admin.role.index');
    }

    public function create()
    {
        Role::createAction();

        return view('admin.role.template', ['routeAction' => route('admin.roles.store')]);
    }

    public function store(Request $request)
    {
        Role::storeAction($request);
        
        return redirect()->route('admin.roles.index');
    }

    public function edit(Role $role)
    {
        Role::editAction($role);

        return view('admin.role.template', ['routeAction' => route('admin.roles.update', $role)]);
    }

    public function update(Request $request, Role $role)
    {
        Role::updateAction($role, $request);
        
        return redirect()->route('admin.roles.index');
    }

    public function destroy(Role $role)
    {
        Role::destroyAction($role);

        return redirect()->route('admin.roles.index');
    }
}

```

### Roles Dropdown
```php
<form action="@route('admin.users.update', $user)" method="post" class="mt-4">
    @csrf
    @include('rpmanager::components.roles_dropdown')

    <button type="submit" class="btn btn-primary">Save</button>
</form>
```

### Roles Button Link
```php
@can('manage roles')
@include('rpmanager::components.roles_button', [
    'route' => route('admin.roles.index'), 
    'class' => '-mt-2']
)
@endcan
```

