@extends('layouts.app1')

@section('title')
   checkout
@endsection


@section('home')
    
    {{--start content--}}

    <div class="hero-wrap hero-bread" style="background-image: url('images/bg_1.jpg');">
      <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
          <div class="col-md-9 ftco-animate text-center">
          	<p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home</a></span> <span>Checkout</span></p>
            <h1 class="mb-0 bread">Checkout</h1>
          </div>
        </div>
      </div>
    </div>

    <section class="ftco-section">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-xl-7 ftco-animate">
						<form action="{{url('/payer')}}" class="billing-form" method="POST" id="checkout-form">

							@csrf
							<h3 class="mb-4 billing-heading">Billing Details</h3>
							@if (Session::has('error'))
								<div class="alert alert-danger">
										{{Session::get('error')}}
										{{Session::put('error',null)}}
								</div>
							@endif
								<div class="row align-items-end">
									<div class="col-md-6">
									<div class="form-group">
										<label for="firstname">Full Name</label>
									<input type="text" class="form-control" name="name">
									</div>
								</div>
								
								
									
									
												<div class="col-md-6">
													<div class="form-group">
														<label for="lastname">Address</label>
												<input type="text" class="form-control"  name="address">
												</div>
												<div class="w-100"></div>
												<div class="col-md-6">
													<div class="form-group">
													<label for="towncity">Name on card</label>
												<input type="text" id="card-name" class="form-control" placeholder="">
												</div>
												</div>
												<div class="col-md-6">
													<div class="form-group">
											<label for="lastname">Number</label>
									<input type="text" id="card-number" class="form-control" placeholder="">
									</div>
									</div>
									<div class="w-100"></div>
									<div class="col-md-6">
									<div class="form-group">
										<label for="phone">Expiration Month</label>
									<input type="text" id="card-expiry-month" class="form-control" placeholder="">
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label for="emailaddress">Expiration Year</label>
									<input type="text" id="card-expiry-year"  class="form-control" placeholder="">
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label for="emailaddress">CVC</label>
									<input type="text" id="card-cvc"  class="form-control" placeholder="">
									</div>
								</div>
								<div class="w-100"></div>
								<div class="col-md-12">
									<div class="form-group mt-4">
													
														
									<input type="submit" class="btn btn-success" value="Payer" name="payer"> 
														
									</div>
								</div>
								</div>
	          </form><!-- END -->
					</div>
					<div class="col-xl-5">
	          <div class="row mt-5 pt-3">
	          	<div class="col-md-12 d-flex mb-5">
	          		<div class="cart-detail cart-total p-3 p-md-4">
	          			<h3 class="billing-heading mb-4">Cart Total</h3>
	          			<p class="d-flex">
		    						<span>Subtotal</span>
		    						<span>$20.60</span>
		    					</p>
		    					<p class="d-flex">
		    						<span>Delivery</span>
		    						<span>$0.00</span>
		    					</p>
		    					<p class="d-flex">
		    						<span>Discount</span>
		    						<span>$3.00</span>
		    					</p>
		    					<hr>
		    					<p class="d-flex total-price">
		    						<span>Total</span>
		    						<span>MGA  {{Session::get('cart')->totalPrice}}</span>
		    					</p>
								</div>
	          	</div>
	          </div>
          </div> <!-- .col-md-8 -->
        </div>
      </div>
    </section> <!-- .section -->

      {{--ens content--}}

@endsection

		
  @section('script')

	<script src="htpps://js.stripe.com/v15.8/"></script>
	<script src="src/js/checkout.js"></script>


  <script>
    $(document).ready(function(){

    var quantitiy=0;
       $('.quantity-right-plus').click(function(e){
            
            // Stop acting like a button
            e.preventDefault();
            // Get the field name
            var quantity = parseInt($('#quantity').val());
            
            // If is not undefined
                
                $('#quantity').val(quantity + 1);

              
                // Increment
            
        });

         $('.quantity-left-minus').click(function(e){
            // Stop acting like a button
            e.preventDefault();
            // Get the field name
            var quantity = parseInt($('#quantity').val());
            
            // If is not undefined
          
                // Increment
                if(quantity>0){
                $('#quantity').val(quantity - 1);
                }
        });
        
    });
</script>

</body>
</html>
  @endsection