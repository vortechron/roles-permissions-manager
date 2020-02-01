@declareNull('routeCreate', 'routeEdit')

<a name="" id="" class="btn btn-primary mb-2" href="{{ $routeCreate ?? route('roles.create') }}" role="button">New Role</a>

<table class="table table-bordered table-striped">
    <thead>
        <tr>
            <th style="text-align: center; vertical-align: middle">#</th>
            <th style="text-align: center; vertical-align: middle">Name</th>
            <th style="text-align: center; vertical-align: middle">Users</th>
            <th style="text-align: center; vertical-align: middle"></th>
        </tr>
    </thead>
    <tbody>
        @forelse ($roles as $role)
        <tr>
            <td scope="row">{{ $loop->iteration }}</td>
            <td>{{ $role->name }}</td>
            <td>{{ $role->users->count() }}</td>
            <td>
                <a href="{{ $routeEdit($role) ?? route('roles.edit', $role) }}">
                    Edit
                </a>
            </td>
        </tr>
        @empty
        <tr>
            <td colspan="4">
                No Roles
            </td>
        </tr>
        @endforelse
    </tbody>
</table>