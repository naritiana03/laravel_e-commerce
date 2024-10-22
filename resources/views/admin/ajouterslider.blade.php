
@extends('layouts.app_admin')

@section('title')
    Ajouter slider
@endsection

@section('admin')

        <div class="row grid-margin">
            <div class="col-lg-12">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Ajouter slider</h4>

                              @if (Session::has('status'))
                                    <div class="alert alert-success">

                                      {{Session::get('status')}}
                                    </div>
                                    
                              @endif

                              @if (count($errors)>0)
                                  <ul>
                                    <div class="alert alert-danger">
                                      @foreach ($errors->all() as $error)
                                        <li>{{$error}}</li>  
                                      @endforeach
                                    </div>
                                  </ul> 
                                @endif

                      <form class="cmxform" id="signupForm" method="post" action="{{URL::to('/sauveslider')}}" enctype="multipart/form-data">
                        @csrf
                          <fieldset>
                                <div class="form-group">
                                     <label for="cname">description one </label>
                                        <input id="cname" class="form-control" name="description1" minlength="2" type="text" >
                                        <div class="form-group">
                                            <label for="cname">description two</label>
                                            <input id="cname" class="form-control" type="text" name="description2" >
                                        </div>
                                        <div class="form-group">
                                            <label for="cname">Image du slider</label>
                                            <input id="cname" class="form-control" type="file" name="slider_image" >
                                        </div>
                                
                                </div>
                                <input class="btn btn-primary" type="submit" value="Ajouter">
                          </fieldset>
                        </form>
                </div>
              </div>
            </div>
          </div>


@endsection

@section('script')
  {{----}}
@endsection