@extends('frontend.app')
@section('content')

<div class="container custom-container mt-5">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Add to cart</h4>
                <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                    <thead>
                        <tr>
                            <th>Sl</th>
                            <th>Image</th>
                            <th>Product Name</th>
                            <th>Model</th>
                            <th>Quantity</th>
                            <th>Unit Price</th>
                            <th>Total</th>
                            <th>Action</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php $total_price=0; ?>
                        @foreach ($cart_view as $key=>$row)
                       
                        <tr> 
                           <td>{{ ++$key }}</td>
                           <td><img src="{{ asset($row->image) }}" style="width: 40px; height:40px"></td>
                           <td>{{ $row->product_title }}</td>
                           <td>{{ $row->product_id }}</td>
                           <td>{{ $row->quantity }}</td>
                           <td>{{ $row->price }}</td>
                           <td>{{ $row->price }}</td>
                           <td>
                            <a href="{{ route('cart_product_remove',$row->id) }}" id="delete" class="btn btn-danger sm" title="Delete Data">Remove</a>
                            </td>
                        </tr>
                       <?php $total_price=$total_price + $row->price ?>
                        @endforeach
                        <tr>      
                            <td colspan="8" style="text-align: right;">Sub-Total : {{$total_price}}৳</td>
                        </tr>
                        <tr>
                            <td colspan="8" style="text-align: right;">Total : {{$total_price}}৳</td>   
                        </tr>
                    </tbody>
                </table>
            </div>
            
        </div><br>
      
            <a href="#" class="btn btn-info" >Cash On Delivery</a>
            <a href="#" class="btn btn-info" >Pay Using Card</a>
           
    </div> <!-- end col -->
</div><br><br>

@endsection