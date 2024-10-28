@extends('layouts.master')
@section('title', 'search by category')

@section('content')
<div class="main-panel pt-4">
    <div class="content-wrapper" style="background: white">
        <div class="row">
            <div class="col-12 col-lg-12" >
                <div class="col-12 pb-5">
                    <form class=" d-flex justify-content-center" action="" method="Get"> 
                        <input type="search" class="form-control w-50" name="category" id="category" value="{{isset($validated) ? $validated :''}}">
                        <button type="submit" class="btn text-center p-2" style="border: none">
                            <i class="menu-icon mdi mdi-magnify"></i>
                        </button>
                    </form>
                </div>
                <div class="col-12 d-flex justify-content-around pt-5">
                @foreach ($produits as $produit)
                
                    <div class="card" style="width: 18rem;">
                        <div class="card-body">
                          <h5 class="card-title"> {{$produit->name}} </h5>
                          <p class="card-text"> {{$produit->description}} </p>
                        </div>
                    </div>
                
                @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection