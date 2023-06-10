@extends('template/layout-two')
@section('title', 'Manage Transaction')

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
                <th scope="col">Transaction Status</th>
                <th scope="col">Payment Date</th>
                <th scope="col">Payment Status</th>
                <th scope="col">Total Price</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($transactionHeader as $key=>$tr)
                <tr>
                    <th scope="row">{{ ++$key }}</th>
                    <td>{{ $tr->username }}</td>
                    <td>{{ $tr->location_city }}</td>
                    <td>
                        {{ Carbon\Carbon::parse($tr->transaction_date)->format('d-M-Y') }}
                    </td>
                    <td>{{ $tr->transaction_status }}</td>
                    <td> 
                        {{ $tr->payment_date ? 
                            Carbon\Carbon::parse($tr->payment_date)->format('d-M-Y') 
                            : "-" 
                        }}
                    </td>
                    <td>{{ $tr->payment_status }}</td>
                    <td>Rp. {{ $tr->total_price }}</td>
                    <td>
                        <a href="/manage-transactions/{{ $tr->transaction_id }}" class="text-decoration-none"> 
                            View 
                        </a> 
                        @if ( $tr->payment_date == null )
                            <br/> 
                            <form method="post" action="/pick-up" class="m-0 p-0">
                                @csrf
                                <input type="hidden" name="transaction_id" value="{{ $tr->transaction_id }}">
                                <button class="btn btn-link m-0 p-0 text-decoration-none" type="submit">
                                    Pay
                                </button>
                            </form>
                        @endif 
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection {{-- end of sub-content section--}}