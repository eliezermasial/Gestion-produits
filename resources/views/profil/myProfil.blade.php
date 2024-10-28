@extends('layouts.master')
@section('title', 'my profil')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-6">
            <h2 class="mb-4">Edit Profile</h2>

            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            <form action="{{ route('profil.update') }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('Put')

                <div class="d-block form-group mb-3">
                    <label for="profile_picture">Profile Picture</label>
                    <div>
                        <input type="file" class="form-control-file @error('image') is-invalid @enderror" id="image" name="image">
                    </div>
                    @error('image')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary">Save</button>

            </form>

            <div class="form-group mt-3">
            
                <p>Current Profile Picture:</p>
                @auth
                <img src="/storage/{{\Illuminate\Support\Facades\Auth::user()->image}}" alt="Profile Picture" width="150" class="img-thumbnail mb-3">
                @if (\Illuminate\Support\Facades\auth::user()->image)
                <form action="{{ route('profil.delete')}}" method="post">
                    @csrf
                    @method('delete')

                    <input type="hidden" name="image" value="{{ Auth::user()->image }}">
                    
                    <button type="submit" onclick="return confirm('Voulez-vous vraiment supprimer cette image ?')" class="btn btn-danger">Supprimer</button>
                    
                </form>
                @endif
                @endauth
    
            </div>
        </div>
        <div class="col-6">

            <h2 class="mb-4">My Album</h2>
            <div class="d-flex justify-content-around flex-wrap">
                @foreach ($images as $image)
                <div class="mt-1">
                    <img src="/storage/{{$image}}" alt="Profile Picture" width="150" class="img-thumbnail h-50">
                    <div class="card-body text-center">
                        <p class="card-text"></p>
                        @if ($image)
                        <form action="{{ route('profil.delete')}}" method="post">
                        @csrf
                        @method('delete')

                        <input type="hidden" name="image" value="{{$image}}">
                    
                        <button type="submit" onclick="return confirm('Voulez-vous vraiment supprimer cette image ?')" class="btn btn-danger">Supprimer</button>
                    </form>
                    @endif
                    </div>
                    
                </div>
                @endforeach
                
            </div>
            
        </div>
    </div>
</div>
@endsection