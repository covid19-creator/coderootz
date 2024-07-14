@extends('layout')

@include('header')

@include('sidebar')

<style>
    .add-button {
        position: absolute;
        right: 0;
        top: 10%;
        padding-right: 1rem;
    }
    .add-button button {
        padding: 0.25rem 1rem;
    }
</style>

<div class="add-button">
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addRoleModal" onclick="openAddModal()">Add User Role</button>
</div>

<table class="table">
    <thead>
        <tr>
            <th>Role Name</th>
            <th>Menus</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach ($roles as $role)
        <tr>
            <td>{{ $role['name'] }}</td>
            <td>{{ $role['menus'] }}</td>
            <td>
                <button type="button" class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#addRoleModal" onclick="openEditModal({{ json_encode($role) }})">Edit</button>
                <form action="{{ route('delete_role', $role['id']) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this role?')">Delete</button>
                </form>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>

@include('footer')

<!-- Add/Edit Role Modal -->
<div class="modal fade" id="addRoleModal" tabindex="-1" aria-labelledby="addRoleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addRoleModalLabel">Add New Role</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="roleForm" action="{{ route('add_role') }}" method="POST">
                @csrf
                <input type="hidden" name="role_id" id="roleId">
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="roleName" class="form-label">Role Name</label>
                        <input type="text" class="form-control" id="roleName" name="role_name" required>
                    </div>
                    <div class="mb-3">
                        <label for="menus" class="form-label">Select Menus <i>(Hold the ctrl to select multiple options)</i></label>
                        <select multiple class="form-select" id="menus" name="menus[]" required>
                            @foreach ($menus as $menu)
                            <option value="{{ $menu->id }}">{{ $menu->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" id="saveRoleButton">Save Role</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js"></script>
<script>
    function openAddModal() {
        document.getElementById('roleForm').action = '{{ route('add_role') }}';
        document.getElementById('roleId').value = '';
        document.getElementById('roleName').value = '';
        const menusSelect = document.getElementById('menus');
        Array.from(menusSelect.options).forEach(option => option.selected = false);
        document.getElementById('addRoleModalLabel').textContent = 'Add New Role';
        document.getElementById('saveRoleButton').textContent = 'Save Role';
    }

    function openEditModal(role) {
        document.getElementById('roleForm').action = '{{ route('update_role') }}';
        document.getElementById('roleId').value = role.id;
        document.getElementById('roleName').value = role.name;
        const menusSelect = document.getElementById('menus');
        Array.from(menusSelect.options).forEach(option => {
            option.selected = role.menus.includes(option.value);
        });
        document.getElementById('addRoleModalLabel').textContent = 'Edit Role';
        document.getElementById('saveRoleButton').textContent = 'Update Role';
    }
</script>
