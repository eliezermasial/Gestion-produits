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
        <form class="forms-sample" action="{{ route('admin.Dashbord.store')}}" method="Post">
          @csrf
          @include('shared.inputs', ['class'=>'form-control form-control-lg', 'name'=>'name','placeholder'=>'Username'])
          
          @include('shared.inputs', ['type' => 'number', 'name'=>'price'])
          @include('shared.inputs', ['class'=>'form-control','type'=>'textarea', 'name'=>'description'])

          <button type="submit" class="btn btn-primary me-2">Submit</button>

        </form>
      </div>
    </div>
  </div>
@endsection