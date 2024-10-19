@extends('layouts.master')
@section('title', 'my profil')

@section('content')
<div class="container">
    <h2 class="mb-4">Edit Profile</h2>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('profil.update') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('Put')

        <div class="form-group mb-3">
            <label for="profile_picture">Profile Picture</label>
            <input type="file" class="form-control-file @error('image') is-invalid @enderror" id="image" name="image">
            @error('image')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group mb-3">
            
                <p>Current Profile Picture:</p>
                @auth
                <img src="/storage/{{\Illuminate\Support\Facades\Auth::user()->image}}" alt="Profile Picture" width="150" class="img-thumbnail mb-3">
                @endauth
            
        </div>

        <button type="submit" class="btn btn-primary">Save Changes</button>
    </form>
</div>
@endsection