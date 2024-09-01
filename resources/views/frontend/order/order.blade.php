
@extends('frontend.app')
@section('content')


        

<main>

<div class="container custom-container mt-5 p-5">
    <div class="col-12">
        <div class="card">
            <div class="card-body">

                <h4 class="card-title">All Order Product : {{Auth::user()->name}}</h4>

                <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                    <thead>
                        <tr>
                            <th>Sl</th>
                            <th>Image</th>
                            <th>Product Name</th>
                            <th>Quantity</th>
                            <th>Price</th>
                            <th>Payment Status</th>
                            <th>Delivery Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php $total_price=0; ?>
                        @foreach ($order as $key=>$row)
                       
                        <tr>
                           
                           <td>{{ ++$key }}</td>
                           <td><img src="{{ asset($row->image) }}" style="width: 40px; height:40px"></td>
                           <td>{{ $row->product_name }}</td>
                           <td>{{ $row->product_quantity }}</td>
                           <td>{{ $row->product_price }}</td>
                           <td>{{ $row->payment_status }}</td>
                           <td>
                            @if ($row->delivery_status== '0')
                                <span class="text-primary">Processing</span>
                            @elseif($row->delivery_status== '1')
                                <span class="text-success">Delivery</span>
                            @elseif($row->delivery_status== '2')
                                <span class="text-danger">Cancel Order</span>
                            @endif
                           </td>

                           <td>
                                <a href="#" class="btn btn-success sm" title="View Data">View</a>
                                {{-- <a href="{{ route('view.order',$row->id) }}" class="btn btn-success sm" title="View Data">View</a> --}}
                                <a href="{{ route('orders.destroy',$row->id) }}" id="delete" class="btn btn-danger sm" title="Cancel Order">Cancel Order</i></a>
                            </td>
                        </tr>
                       <?php $total_price=$total_price + $row->total ?>
                        @endforeach
                    </tbody>
                </table>
            </div>
            
        </div><br>
    </div> <!-- end col -->
</div><br><br>




</main>
@endsection