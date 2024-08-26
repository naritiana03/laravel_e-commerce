@extends('layouts.app_admin')

@section('title')
    categorie
@endsection

@section('admin')
    





      <div class="card">
        <div class="card-body">
          <h4 class="card-title">Catégories</h4>
          <div class="row">
            <div class="col-12">
              <div class="table-responsive">
                <table id="order-listing" class="table">
                  <thead>
                    <tr>
                        <th>Order #</th>
                        <th>Nom de la catégorie</th>
                        <th>Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                        <td>1</td>
                        <td>2020/03/03</td>
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