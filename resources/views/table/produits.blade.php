@extends('layouts.master')
@section('title', 'Tableau produits')
@section('content')
    <!-- table -->
    <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-lg-12 stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Table with contextual classes</h4>
                  <p class="card-description">
                    Add class <code>.table-{color}</code>
                  </p>
                  <div class="table-responsive pt-3">
                    <table class="table table-bordered">
                      <thead>
                        <tr>
                          <th class="text-center">
                            #
                          </th>
                          <th class="text-center">
                            nom de produit
                          </th>
                          <th class="text-center">
                            description de produit
                          </th>
                          <th class="text-center">
                            prix
                          </th>
                          <th class="text-center">
                            Date d'enregistrement
                          </th>
                          <th class="text-center">
                            Action
                          </th>
                        </tr>
                      </thead>
                      @foreach ($produits as $index => $produit)
                      <tbody>
                        <tr class="{{ $index % 2 == 0 ? 'table-info' : 'table-success'}}">
                          <td class="text-center">
                            {{$produit->id}}
                          </td>
                          <td class="text-center">
                            {{$produit->name}}
                          </td>
                          <td class="text-center">
                            {{$produit->description}}
                          </td>
                          <td class="text-center">
                            {{$produit->price}}
                          </td>
                          <td class="text-center">
                            {{$produit->created_at->format('d-m-Y')}}
                          </td>
                          <td>
                            <div class="template-demo d-flex justify-content-center">
                              <a href="{{ route('admin.produit.edit',$produit)}}" class="btn btn-dark p-1">Editer</a>
                              <form class="btn p-0" action="{{ route('admin.produit.destroy',$produit->id)}}" method="POST">
                                @csrf
                                @method('delete')
                                <button type="submit"  class="btn btn-danger p-1">Delete</button>
                              </form>
                              <!-- <button type="button" class="btn btn-primary">Primary</button>
                              <button type="button" class="btn btn-secondary">Secondary</button>
                              <button type="button" class="btn btn-success">Success</button>
                              <button type="button" class="btn btn-warning">Warning</button>
                              <button type="button" class="btn btn-info">Info</button>
                              <button type="button" class="btn btn-light">Light</button>
                              <button type="button" class="btn btn-link">Link</button> -->
                            </div>
                          </td>
                        </tr>
                        
                      </tbody>
                      @endforeach
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
@endsection