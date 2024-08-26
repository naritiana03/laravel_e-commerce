
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
                      <form class="cmxform" id="signupForm" method="post" action="App\Http\Controllers\SliderController@sauveslider">
                          <fieldset>
                                <div class="form-group">
                                     <label for="cname">description one (required, at least 2 characters)</label>
                                        <input id="cname" class="form-control" name="description1" minlength="2" type="text" required>
                                        <div class="form-group">
                                            <label for="cname">description two (required)</label>
                                            <input id="cname" class="form-control" type="text" name="description2" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="cname">Image du produit (required)</label>
                                            <input id="cname" class="form-control" type="file" name="slider_image" required>
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