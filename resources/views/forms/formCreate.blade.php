@extends('layouts.master')
@section('title', 'enregistrer produit')
@section('content')
<div class="col-md-8 grid-margin stretch-card ms-3 mt-3">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title"> @yield('title') </h4>
        <p class="card-description">
          @yield('title')
        </p>
        <form class="forms-sample" action="" method="">
          @csrf

          @include('shar.inputs', ['name' => 'nom'])
          @include('shar.inputs', ['type' => 'number', 'name'=>'prix'])
          @include('shar.inputs', ['class'=>'form-control','type'=>'textarea', 'name'=>'description'])

          <button type="submit" class="btn btn-primary me-2">Submit</button>

        </form>
      </div>
    </div>
  </div>
@endsection