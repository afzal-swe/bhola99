@extends('frontend.app')
@section('content')


<section class="inner_page_head">
    <div class="container_fuild">
       <div class="row">
          <div class="col-md-12">
             <div class="full">
                <h3>Product Grid</h3>
             </div>
          </div>
       </div>
    </div>
 </section>
 <!-- end inner page section -->
 <!-- product section -->
 <section class="product_section layout_padding">
    <div class="container">
       <div class="heading_container heading_center">
          <h2>
             Our <span>products</span>
          </h2>
       </div>
       <div class="row">
         @foreach ($product as $row)
            
         
         <div class="col-sm-6 col-md-4 col-lg-4 mb-2">
            <div class="box">
               <div class="option_container">
                  <div class="options">
                     <a href="{{ route('product.details',$row->slug) }}" class="option1">
                     Product Details
                     </a>
                     <form action="{{ route('add_cart',$row->slug) }}" method="POST" enctype="multipart/form-data">
                       @csrf
                       <input type="submit" class="option2" value="Add to Cart">
                    </form>
                  </div>
               </div>
               <div class="img-box">
                  <img src="{{ asset($row->image) }}" alt="">
               </div>
               <div class="detail-box">
                  <h5>
                     {{ $row->title }}
                  </h5>
                  
                  @if ($row->discount_price!=null)
                    <h6>
                       Discount
                       <br>
                       ${{ $row->discount_price }}
                    </h6>

                    <h6 style="text-decoration: line-through; color:blue">
                       Price
                       <br>
                       ${{ $row->price }}
                    </h6>

                 @else
                 <h6 style="color:blue">
                    Price
                    <br>
                    ${{ $row->price }}
                 </h6>
                  @endif
                  
               </div>
            </div>
         </div>
         @endforeach
        
         {!! $product->withQueryString()->links('pagination::bootstrap-5') !!}
          
       </div>
       <div class="btn-box">
          <a href="">
          View All products
          </a>
       </div>
    </div>
 </section>
 <!-- end product section -->


@endsection