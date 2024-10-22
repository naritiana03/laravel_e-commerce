
@extends('layouts.app_admin')

@section('title')
    Editer catégorie
@endsection

@section('admin')

        <div class="row grid-margin">
            <div class="col-lg-12">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Editer catégorie</h4>
                    @if (Session::has('status'))
                        <div class="alert alert-success">

                          {{Session::get('status')}}
                        </div>
                        
                    @endif

                    @if (count($errors)>0)
                      <ul>
                         <div class="alert alert-danger">
                          @foreach ($errors->all() as $item)
                            <li>{{$error}}</li>  
                          @endforeach
                         </div>
                      </ul>
                    @endif

                    
                      
                      <form class="cmxform" id="signupForm" method="post" action="{{URL::to('/modifiercategorie')}}">
                        {{csrf_field()}}
                          <fieldset>
                                <div class="form-group">
                                    <input type="hidden" name="id" value="{{ $categorie->id }}">
                                 <label for="cname">Nom</label>
                            
                                     <input id="cname" class="form-control" name="categorie" minlength="2" type="text"  value="{{$categorie->nom_categorie}}" required >
                                 
                                        
                                
                               
                                    {{--
                                        <div class="form-group">
                                            <label for="cemail">E-Mail (required)</label>
                                            <input id="cemail" class="form-control" type="email" name="email" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="curl">URL (optional)</label>
                                            <input id="curl" class="form-control" type="url" name="url">
                                        </div>
                                        <div class="form-group">
                                            <label for="ccomment">Your comment (required)</label>
                                            <textarea id="ccomment" class="form-control" name="comment" required></textarea>
                                        </div>
                                    --}}
                                </div>
                                <input class="btn btn-primary" type="submit" value="Modifier" >
                          </fieldset>
                        </form>
                </div>
              </div>
            </div>
          </div>
 

@endsection

@section('script')
  {{--  <script src="back/js/form-validation.js"></script>
    <script src="back/js/bt-maxLength.js"></script>--}}
@endsection