@extends('layouts.app_admin')

@section('title')
    categorie
@endsection

<input type="hidden" name="id" value="{{ $increment=1 }}">

@section('admin')
    





      <div class="card">
        <div class="card-body">
          <h4 class="card-title">Catégories</h4>
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
                        <th>Nom de la catégorie</th>
                        <th>Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($categorie as $category)
                        <tr>
                          <td>{{$increment}}</td>
                          <td>{{$category->nom_categorie}}</td>
                          <td>
                          
                              <button class="btn btn-outline-primary" onclick="window.location.href ='{{url('/editcategorie/'.$category->id)}}'">Editer</button>
                            
                            
                               <a href="{{url('/deletecategorie/'.$category->id)}}" id="delete" class="btn btn-outline-danger">Delete</a>
                          
                             
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