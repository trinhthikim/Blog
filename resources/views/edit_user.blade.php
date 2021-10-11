@extends("layouts.layout")
@section("menu")
    @include("layouts.menu")
@endsection
@section("content")
    <div class="app-wrapper">
        <div class="app-content pt-3 p-md-3 p-lg-4">
            <div class="container-xl">
                <div class="row g-4 settings-section">
                    <div class="col-auto">
                        <h1 class="app-page-title mb-0">Chỉnh sửa tài khoản</h1>
                    </div>
                    <div class="app-card app-card-settings shadow-sm p-4">

                        <div class="app-card-body">
                            <form method="POST" action="{{ route('user.update', $user->id) }}">
                                @csrf
                                @method('PUT')
                                <div class="mb-3">
                                    <label for="name" class="form-label">
                                        Full Name
                                    </label>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name"  value="{{ $user->name }}">
                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" class="form-control" name="email" id="email" disabled value="{{ $user->email }}">
                                </div>
                                <div class="mb-3">
                                    <label for="role" class="form-label">Loại tài khoản</label>
                                    <div class="col-sm-10">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="role" id="role1" value="user" {{ $user->role == 'user' ? 'checked' : ''}}>
                                            <label class="form-check-label" for="inlineRadio1">User</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="role" id="role2" value="admin" {{ $user->role == 'admin' ? 'checked' : ''}}>
                                            <label class="form-check-label" for="inlineRadio2">Admin</label>
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label for="password" class="form-label">Password</label>
                                        <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password">
                                        @error('password')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label for="password-confirm" class="form-label">Confirm Password</label>
                                        <input type="password" class="form-control" id="password-confirm" name="password_confirmation">
                                    </div>
                                    <button type="submit" class="btn app-btn-primary">Save</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
