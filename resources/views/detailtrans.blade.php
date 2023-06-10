@extends('template/layout-two')
@section('title', 'Transaction Detail')

<style>
    body { 
      background: url("/assets/bg.jpg") no-repeat fixed center; 
      background-size: 100%;
    }
</style>

@section('sub-content')

<div class="form-03-main overflow-auto">
    <table class="table">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Reciever Name</th>
            <th scope="col">Transaction Date</th>
            <th scope="col">Product Name</th>
            <th scope="col">Price</th>
            <th scope="col">Quantity</th>
            <th scope="col">Sub Total</th>
        </tr>
        </thead>
        <tbody>
            <?php $totalPrice = 0 ?>
            @foreach ($transactionDetail as $key=>$tr)
                <tr>
                    <th scope="row">{{ ++$key }}</th>
                    <td>{{ $tr->username }}</td>
                    <td>{{ $tr->name }}</td>
                    <td>
                        {{ Carbon\Carbon::parse($tr->transaction_date)->format('d-M-Y') }}
                    </td>
                    <td>{{ $tr->product_name }}</td>
                    <td>Rp. {{ $tr->product_price }}</td>
                    <td>{{ $tr->sub_total_quantity }}</td>
                    <td>Rp. {{ $tr->sub_total }}</td>
                </tr>
                <?php $totalPrice += $tr->sub_total ?>
            @endforeach

            <tr>
                <th scope="row"></th>
                <td colspan="3">
                    Total Price : Rp. {{ $totalPrice }}
                </td>
                <td colspan="2">
                    Pickup Status : 
                    @if ($tr->pick_up_date == null)
                        Not 
                    @endif
                    Picked Up
                </td>
                <td colspan="2" class="me-0 pe-0">
                    <form method="post" action="/pay" class="m-0 p-0">
                        @csrf

                        <strong>Set Pickup Status</strong>
                        @if ($tr->pick_up_date == null)
                            <input type="hidden" name="transaction_id" value="{{ $tr->transaction_id }}">
                            <button class="btn btn-primary btn-sm ms-4 me-0" type="submit" >
                                Pick Up
                            </button>
                        @else
                            <button class="btn btn-primary btn-sm ms-4 me-0" type="submit" disabled>
                                Picked Up
                            </button>
                        @endif
                    </form>
                </td>
            </tr>
        </tbody>
    </table>
    <a href="{{ url('manage-transactions') }}" class="float-right"> 
        < Back To Manage Transactions
    </a>
</div>



@endsection {{-- end of sub-content section--}}