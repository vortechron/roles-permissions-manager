@csrf
@if ($role->id)
    @method('put')
@endif

<div class="form-group">
    <label for="name">Name</label>
    <input type="text" class="form-control" name="name" id="name" aria-describedby="helpId" placeholder="e.g. Staff" required value="{{ $role->name }}">
</div>

<hr>

<table class="table">
    <thead>
        <tr>
            <th>Permission</th>
            <th>Status</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($permissions as $permission)
        <tr>
            <td class="capitalize">{{ $permission->name }}</td>
            <td>
                <div class="form-check">
                    <label class="form-check-label capitalize">
                        <input type="checkbox" class="form-check-input" name="permissions[{{ $permission->name }}]"
                            id="" value="true" {{ $role->hasPermissionTo($permission) ? 'checked' : '' }}
                            {{ $role->id == 1 ? 'disabled' : '' }}
                            >
                        Allow
                    </label>
                </div>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>