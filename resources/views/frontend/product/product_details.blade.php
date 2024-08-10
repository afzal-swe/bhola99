@extends('frontend.app')
@section('content')

<!DOCTYPE html>
<html>
   <head>
      <!-- Basic -->
      <base href="/public">
      <meta charset="utf-8" />
      <meta http-equiv="X-UA-Compatible" content="IE=edge" />
      <!-- Mobile Metas -->
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
      <!-- Site Metas -->
      <meta name="keywords" content="" />
      <meta name="description" content="" />
      <meta name="author" content="" />
      <link rel="shortcut icon" href="{{ asset('frontend/asset/images/favicon.png') }}" type="">
      <title>Famms - Fashion HTML Template</title>
      <!-- bootstrap core css -->
      <link rel="stylesheet" type="text/css" href="{{ asset('frontend/asset/css/bootstrap.css') }}" />
      <!-- font awesome style -->
      <link href="{{ asset('frontend/asset/css/font-awesome.min.css') }}" rel="stylesheet" />
      <!-- Custom styles for this template -->
      <link href="{{ asset('frontend/asset/css/style.css') }}" rel="stylesheet" />
      <!-- responsive style -->
      <link href="{{ asset('frontend/asset/css/responsive.css') }}" rel="stylesheet" />
      <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" />
    
      
   </head>
   <body>
      <div class="hero_area">
         <!-- header section strats -->
        
         <!-- end header section -->
        

<main>

<!-- breadcrumb-area -->
<section class="breadcrumb__wrap bg-light">
    <div class="container custom-container">
        <div class="row ">
            <div class="col-xl-6 col-lg-8 col-md-10 mt-8">
                <div class="breadcrumb__wrap__content">
                    <h2 class="title mt-3">Product Details</h2>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                            
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- breadcrumb-area-end -->

<!-- portfolio-details-area -->
<section class="services__details bg-light pd-3">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="services__details__thumb">
                    <img src="{{ asset($details->image) }}" alt="">
                </div>
                <div class="services__details__content">
                    
                    {{-- <p>Discription : {!! $product_details->description !!}</p> --}}
                </div>
            </div>
            <div class="col-lg-6">
                <aside class="services__sidebar">
                    <h2 class="title" style="color: rgb(55, 73, 187);">{{ $details->title }}</h2><br>
                    <button type="button" class="btn btn-outline-secondary mt-2 fs-6">Price : {{$details->discount_price}}৳</button>
                    <button type="button" class="btn btn-outline-secondary mt-2 fs-6">Regular Price : {{$details->price}}৳</button>
                    <button type="button" class="btn btn-outline-secondary mt-2 fs-6">Status : <samp class="text-success">In Stock</samp></button>
                    <button type="button" class="btn btn-outline-secondary mt-2 fs-6">Product Code : </button>
                    <button type="button" class="btn btn-outline-secondary mt-2 fs-6">Brand : TP-Link</button><br><br>
                    <h6>Key Features</h6>
                    <p> {!! $details->description !!}</p><br>
                    <a href="" class="" style="color: red">View More Info</a><br>

                    <h2>Payment Options</h2><br>
                    <div class="product-price-options">
                        <label class="p-wrap cash-payment btn btn-outline-secondary">
                            <input type="radio" name="enable_emi" checked="" value="0">
                                <span class="price">3,550৳</span>
                                <div class="p-tag">Cash Discount Price</div>                               
                                <div class="p-tag fade">Online / Cash Payment</div>
                        </label>
                            <label class="p-wrap btn btn-outline-secondary">
                            <input type="radio" name="enable_emi" value="1">
                            <span class="price">325৳/month</span>
                            <div class="p-tag">Regular Price: 3,900৳</div>
                            <div class="p-tag fade">0% EMI for up to 12 Months***</div>
                        </label>
                    </div>
                    <br>
                    <div class="cart-option">
                        <label class="quantity ">
                            <span class="ctl"><i class="material-icons">remove</i></span>
                            <span class="qty"><input type="text" name="quantity" id="input-quantity" value="1" size="2"></span>
                            <span class="ctl increment"><i class="material-icons">add</i></span>
                            <input type="hidden" name="product_id" value="23910">
                        </label>
                        <form action="#" method="POST" enctype="multipart/form-data">
                            @csrf
                            <input type="submit" class="option2" value="Add to Cart">
                         </form><br>
                    </div>
                    
                    

                </aside>
            </div>
            
        </div>
    </div>
</section>
<section class="services__details">
    <div class="container">
        <div class="row">
            
           
            <div class="col-lg-12">
                <aside class="services__sidebar">
                    
                    <div class="widget"><br><br>
                        <h5 class="title">Specification</h5>
                        <hr>
                        <ul class="sidebar__contact__info">
                            <li><span>Product Name : </span> {{$details->title}}</li>
                            <li><span>Product Category : </span> {{$details->title}}</li>
                            <li><span>Product Post Date : </span> {{$details->created_at}}</li>
                            <li><span>Product Price : </span> {{$details->price}}</li>
                            <li><span>Discount Price : </span>{{$details->discount_price}}</li>
                            <li><span>Product Quantity : </span> {{$details->quantity}}</li>
                            <li><span>Product Status : </span> {{$details->status}}</li>
                        </ul><br>
                        <h4>Discription</h4>
                        <p> {!! $details->description !!}</p><br><br>
                        <hr>
                    </div>
                    
                </aside>
            </div>
            
        </div>
    </div>
</section>
<!-- portfolio-details-area-end -->


<!-- contact-area -->
<section class="homeContact homeContact__style__two">
    <div class="container">
        <div class="homeContact__wrap">
            <div class="row">
                <div class="col-lg-6">
                    <div class="section__title">
                        <span class="sub-title"> Say hello</span>
                        <h2 class="title">Any questions? Feel free <br> to contact</h2>
                    </div>
                    <div class="homeContact__content">
                        <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form</p>
                        <h2 class="mail"><a href="mailto:afzal.swe@gmail.com">Bhola99@gmail.com</a></h2>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="homeContact__form">
                        <form method="POST" action="#">
                            @csrf
                            <input name="name" type="text" placeholder="Enter name*">
                            <input name="email" type="email" placeholder="Enter mail*">
                            <input name="phone" type="number" placeholder="Enter number*">
                            <textarea name="message" placeholder="Enter Massage*"></textarea>
                            <button type="submit">Send Message</button><br><br>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- contact-area-end -->

</main>




      <!-- end client section -->
      <!-- footer start -->
     
      <!-- footer end -->
      {{-- <div class="cpy_">
         <p class="mx-auto">© 2021 All Rights Reserved By <a href="https://html.design/">Bhola99</a><br>
         
            Distributed By <a href="https://themewagon.com/" target="_blank">Md.Afzal Hossen</a>
         
         </p>
      </div> --}}
      <!-- jQery -->
      <script src="{{ asset('frontend/asset/js/jquery-3.4.1.min.js') }}"></script>
      <!-- popper js -->
      <script src="{{ asset('frontend/asset/js/popper.min.js') }}"></script>
      <!-- bootstrap js -->
      <script src="{{ asset('frontend/asset/js/bootstrap.js') }}"></script>
      <!-- custom js -->
      <script src="{{ asset('frontend/asset/js/custom.js') }}"></script>
      <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

        <script>
            @if(Session::has('message'))
            var type = "{{ Session::get('alert-type','info') }}"
            switch(type){
               case 'info':
               toastr.info(" {{ Session::get('message') }} ");
               break;
           
               case 'success':
               toastr.success(" {{ Session::get('message') }} ");
               break;
           
               case 'warning':
               toastr.warning(" {{ Session::get('message') }} ");
               break;
           
               case 'error':
               toastr.error(" {{ Session::get('message') }} ");
               break; 
            }
            @endif 
           </script>
            
   </body>
</html>

@endsection