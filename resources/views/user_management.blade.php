@extends('layout')

@include('header')

@include('sidebar')

<table class="table">
    <thead>
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Role</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach ($userData as $user)
        <tr data-user-id="{{ $user['id'] }}">
            <td>{{ $user['name'] }}</td>
            <td>{{ $user['email'] }}</td>
            <td>{{ $user['role'] }}</td>
            <td>
                <form action="{{ route('update_user_role', ['userId' => $user['id']]) }}" method="POST">
                    @csrf
                    <select class="form-select role-dropdown" name="role_id" aria-label="Select Role">
                        <option selected disabled>Select Role</option>
                        @foreach ($roles as $role)
                        <option value="{{ $role->id }}">{{ $role->name }}</option>
                        @endforeach
                    </select>
                    <button type="submit" class="btn btn-primary btn-sm update-role-btn">Update Role</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

@include('footer')
