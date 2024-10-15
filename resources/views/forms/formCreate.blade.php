@extends('layouts.master')
@section('title',$produit->exists ? 'modifier produit'.' '.$produit->name:'enregistrer produit')
@section('content')
<div class="col-md-8 grid-margin stretch-card ms-3 mt-3">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title"> @yield('title') </h4>
        <p class="card-description">
          @yield('title')
        </p>
        <form class="forms-sample" action="{{ $produit->exists ? route('admin.produit.update',$produit->id) : route('admin.produit.store')}}" method="Post">
          @csrf
          @method($produit->exists ? 'PUT' : 'POST')

          @include('shared.inputs', ['class'=>'form-control form-control-lg', 'name'=>'name', 'value' => $produit->exists ? $produit->name : '', 'placeholder'=>'nom du produit'])
          @include('shared.inputs', ['type' => 'number', 'class'=>'form-control form-control-lg', 'name'=>'price', 'value' => $produit->exists ? $produit->price : '', 'placeholder'=>'prix du produit'])
          @include('shared.inputs', ['class'=>'form-control','type'=>'textarea', 'name'=>'description'])

          <button type="submit" class="btn btn-primary me-2">Submit</button>

        </form>
      </div>
    </div>
  </div>
@endsection