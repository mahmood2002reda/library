@extends('layouts.admin')

@section('content')
    <div class="container">
        <form method="POST" action="{{ route('admin.password.update') }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="old_password">Old Password</label>
                <input type="password" class="form-control" name="old_password" placeholder="Old Password">
                @error('old_password')
                    <small class="form-text text-danger">{{ $message }}</small>
                @enderror
            </div>

            <div class="form-group">
                <label for="new_password">New Password</label>
                <input type="password" class="form-control" name="new_password" placeholder="New Password">
                @error('new_password')
                    <small class="form-text text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="form-group">
                <label for="new_password">New Password</label>
                <input type="password" class="form-control" name="confirm_password" placeholder="confirm_password">
                @error('confirm_password')
                    <small class="form-text text-danger">{{ $message }}</small>
                @enderror
            </div>

            

            <button type="submit" class="btn btn-primary">Reset Password</button>
        </form>
    </div>
@endsection