@extends('layouts.app_admin')

@section('title')
    produit
@endsection

@section('admin')

      <div class="card">
        <div class="card-body">
          <h4 class="card-title">Produit</h4>
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
                    <tr>
                        <td>1</td>
                        <td>2020/03/03</td>
                        <td>2020/03/03</td>
                        <td>2020/03/03</td>
                        <td>2020/03/03</td>
                        <td>
                            <label class="badge badge-info"></label>
                        </td>
                        <td>
                          <button class="btn btn-outline-primary">Edit</button>
                          <button class="btn btn-outline-danger">Delete</button>
                        </td>
                    </tr>
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