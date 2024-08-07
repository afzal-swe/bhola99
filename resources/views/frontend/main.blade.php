@extends('frontend.app')
@section('content')

  <!-- slider section -->
  @include('frontend.partial.slider')
  <!-- end slider section -->
</div>
<!-- why section -->
@include('frontend.partial.why_section')
<!-- end why section -->

<!-- arrival section -->
@include('frontend.partial.arrival')
<!-- end arrival section -->

<!-- product section -->
@include('frontend.partial.product_section')
<!-- end product section -->
@include('frontend.partial.subscribe')
<!-- subscribe section -->

<!-- end subscribe section -->
<!-- client section -->
@include('frontend.partial.client_section')
<!-- end client section -->

@endsection