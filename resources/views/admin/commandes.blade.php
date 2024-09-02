@extends('layouts.app_admin')

@section('title')
    Commande
@endsection
<input type="hidden" name="id" value="{{ $increment=1 }}">
@section('admin')




      <div class="card">
        <div class="card-body">
          <h4 class="card-title">Commandes</h4>
          <div class="row">
            <div class="col-12">
              <div class="table-responsive">
                <table id="order-listing" class="table">
                  <thead>
                    <tr>
                        <th>Order #</th>
                        <th>Nom du Clients</th>
                        <th>Adresse</th>
                        <th>Panier</th>
                        <th>Paiement id</th>
                        <th>Actions</th>
                    </tr>
                  </thead>
                  <tbody>

                      @foreach ($commande as $command)
                      <tr>
                        <td>{{$increment}}</td>
                        <td>{{$command->nom}}</td>
                        <td>{{$command->adresse}}</td>
                        <td>{{$command->Panier}}</td>
                        <td>{{$command->paiement}}</td>
                        <td>
                          <button class="btn btn-outline-primary">Edit</button>
                          <button class="btn btn-outline-danger">Delete</button>
                        </td>
                    </tr> 
                    <input type="hidden" name="id" value="{{ $increment=  $increment +1 }}">
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