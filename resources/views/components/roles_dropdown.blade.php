<div class="form-group">
  <label for="role">Role</label>
  <select class="form-control" name="role" id="role">
      @foreach (Vortechron\RPManager\Models\Role::all() as $role)
      <option value="{{ $role->name }}">{{ $role->name }}</option>
      @endforeach
  </select>
</div>