@extends('layouts.app_admin')

@section('title')
    Ajouter catégorie
@endsection

@section('admin')
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row grid-margin">
            <div class="col-lg-12">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Ajouter catégorie</h4>
                  
                    {!!Form::open(['action' => 'CategorieController@ajoutercategorie', 'method' =>'Post', 'class' => 'cmxform' , 'id' => 'commentForm'] ) !!}
                        {{Csrf_field()}}
                            <div class="form-group">
                                 {{--<label for="cname">Name (required, at least 2 characters)</label>--}}
                            {{Form::label('','Nom de la catégorie', ['for'=>'cname'])}}
                                        {{--<input id="cname" class="form-control" name="name" minlength="2" type="text" required>--}}
                                {{Form::text('categorie', '' ,['placeholder'=>'Entrer votre catégorie', 'class'=> 'form-control','id' ,'name' =>'categorie', 'minlength'=> '2', 'required'])}}
                               
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
                    
                                {{Form::submit('Ajouter', ['class'=>'btn btn-primary'])}}
                    {!!Form::close()!!}
                </div>
              </div>
            </div>
          </div>
    </div>
</div>

@endsection

@section('script')
    <script src="back/js/form-validation.js"></script>
    <script src="back/js/bt-maxLength.js"></script>
@endsection