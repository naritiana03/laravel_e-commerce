
@extends('layouts.app_admin')

@section('title')
    Ajouter produit
@endsection

@section('admin')

        <div class="row grid-margin">
            <div class="col-lg-12">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Ajouter produit</h4>
                      <form class="cmxform" id="signupForm" method="post" action="App\Http\Controllers\ProduitController@sauvecategorie">
                          <fieldset>
                                <div class="form-group">
                                     <label for="cname">Nom du produit (required, at least 2 characters)</label>
                                        <input id="cname" class="form-control" name="produite_name" minlength="2" type="text" required>
                                        <div class="form-group">
                                            <label for="cname">Prix du produit (required)</label>
                                            <input id="cname" class="form-control" type="number" name="produit_price" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="cname">Categorie du produit (required)</label>
                                            <input id="cname" class="form-control" type="select" name="produit_categorie" placeholder="Select categorie" $categories,null>
                                        </div>
                                        <div class="form-group">
                                            <label for="cname">Image du produit (required)</label>
                                            <input id="cname" class="form-control" type="file" name="produit_image" required>
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
    <script src="back/js/form-validation.js"></script>
    <script src="back/js/bt-maxLength.js"></script>
@endsection