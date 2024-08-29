
@extends('layouts.app_admin')

@section('title')
    Editer produit
@endsection

@section('admin')

        <div class="row grid-margin">
            <div class="col-lg-12">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Editer produit</h4>

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

                      <form class="cmxform" id="signupForm" method="POST" action="{{URL::to('/modifierproduit')}}" enctype="multipart/form-data">

                        {{ csrf_field() }}

                          <fieldset>
                                <div class="form-group">
                                    <input type="hidden" name="id" value="{{ $produit->id }}">
                                     <label for="cname">Nom du produit </label>
                                        <input id="cname" class="form-control" name="nom_produit" minlength="2" type="text" value="{{$produit->nom_produit}}" >
                                        <div class="form-group">
                                            <label for="cname">Prix du produit</label>
                                            <input id="cname" class="form-control" type="number" name="prix_produit" value="{{$produit->prix_produit}}">
                                        </div>
                                        <div class="form-group">
                                            <label for="cname">Categorie du produit </label>

                                            <select name="produit_categorie" class="form-control" >


                                                    <option value="">Select categorie</option>

                                                         @foreach($categorie as  $category)

                                                            <option value="{{$category}}" {{$category == $produit->produit_categorie ? 'selected' : ''}} > {{ $category }}</option>
                                                  
                                                         @endforeach
                                            </select>

                                            {{--<input id="cname" class="form-control" type="select" name="produit_categorie" placeholder="Select categorie" value="{{$categorie, null}}">--}}
                                        </div>
                                        <div class="form-group">
                                            <label for="cname">Image du produit</label>
                                            <input id="cname" class="form-control" type="file" name="image_produit" >
                                        </div>
                                
                                </div>
                                <input class="btn btn-primary" type="submit" value="Modifier">
                          </fieldset>
                        </form>
                </div>
              </div>
            </div>
          </div>


@endsection

@section('script')
    {{--<script src="back/js/form-validation.js"></script>
    <script src="back/js/bt-maxLength.js"></script>--}}
@endsection