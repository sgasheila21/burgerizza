@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Metode Pembayaran</h1>
        <form action="{{ route('payment.process') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="payment_amount">Jumlah Pembayaran:</label>
                <input type="number" class="form-control" id="payment_amount" name="payment_amount" required>
            </div>
            <div class="form-group">
                <label for="payment_method">Pilih Metode Pembayaran:</label>
                <select class="form-control" id="payment_method" name="payment_method">
                    @foreach ($paymentMethods as $paymentMethod)
                        <option value="{{ $paymentMethod->id }}">{{ $paymentMethod->name }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Pay</button>
        </form>
    </div>
@endsection
