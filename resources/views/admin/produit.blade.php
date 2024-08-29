@extends('layouts.app_admin')

@section('title')
    produit
@endsection
<input type="hidden" name="id" value="{{ $increment=1 }}">
@section('admin')

      <div class="card">
        <div class="card-body">
          <h4 class="card-title">Produit</h4>
                @if (Session::has('status'))
                    <div class="alert alert-success">

                      {{Session::get('status')}}
                    </div>
          
                  @endif
          <div class="row">
            <div class="col-12">
              <div class="table-responsive">
                <table id="order-listing" class="table">
                  <thead>
                    <tr>
                        <th>Order #</th>
                        <th>Image</th>
                        <th>Nom du produit</th>
                        <th>Categorie du produit</th>
                        <th>Prix</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                  </thead>
                     
                  <tbody>
                      @foreach ($produit as $prod)
                        <tr>
                            <td>{{$increment}}</td>
                            <td><img src="/storage/image_produit/{{$prod->produit_image}}" alt="">{{$prod->image_produit}}</td>
                            <td>{{$prod->nom_produit}}</td>
                            <td>{{$prod->produit_categorie}}</td>
                            <td>{{$prod->prix_produit}}</td>
                            <td>

                              @if ($prod->status ==1)
                                  <label class="badge badge-success">Activé</label>
                              @else
                                    <label class="badge badge-info">Desactivé</label>
                              @endif
                                
                            </td>
                            <td>
                              <button class="btn btn-outline-primary" onclick="window.location.href ='{{url('/editproduit/'.$prod->id)}}'">Edit</button>
                              <button class="btn btn-outline-danger">Delete</button>
                            </td>
                        </tr>
                        <input type="hidden" name="id" value="{{ $increment=$increment +1 }}">
                      @endforeach
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>

      
  
@endsection

@section('script') 
     <script src="js/data-table.js"></script>
@endsection