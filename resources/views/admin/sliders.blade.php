@extends('layouts.app_admin')

@section('title')
    sliders
@endsection

<input type="hidden" name="id" value="{{ $increment=1 }}">

@section('admin')
    





    <div class="card">
        <div class="card-body">
          <h4 class="card-title">Sliders</h4>

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
                        <th>Descrption one</th>
                        <th>Description two</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($slider as $slide)
                          <tr>
                              <td>{{$increment}}</td>
                              <td><img src="/storage/slider_image/{{$slide->image_slider}}" alt=""></td>
                              <td>{{$slide->description1}}</td>
                              <td>{{$slide->description}}</td>

                              <td>
                                @if ($slide ->status ==1)
                                    <label class="badge badge-success">Activé</label>
                                @else
                                      <label class="badge badge-info">Desactivé</label>
                                @endif
                                  
                              </td>
                              <td>
                                <button class="btn btn-outline-primary" onclick="window.location.href ='{{url('/editslider/'.$slide->id)}}'">Edit</button>
                                    <a href="{{url('/deleteslider/'.$slide->id)}}" id="delete" class="btn btn-outline-danger">Delete</a>
  
                                    @if ($slide->status == 1)
                                        <button class="btn btn-outline-warning" onclick="window.location.href ='{{url('/desactiverslider/'.$slide->id)}}'">Desactiver</button>
                                    @else
                                        <button class="btn btn-outline-success" onclick="window.location.href ='{{url('/activerslider/'.$slide->id)}}'">Activer</button>
                                    @endif
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

      
    </div>

@endsection

@section('script') 
     <script src="js/data-table.js"></script>
@endsection