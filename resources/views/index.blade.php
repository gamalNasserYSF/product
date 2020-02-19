@extends('layout')


@section('body')

    <input type="hidden" id="url" value="{{ url('/') }}">

    <!-- products section -->
    <section class="products-section">
        <div class="container">
            <div class="row justify-content-center">

                @foreach($products as $product)
                    <!-- product -->
                    <div class="col-11 col-md-6 col-xl-4">
                        <div class="product">
                            <div class="d-flex flex-wrap">
                                <div id="{{ $product->id }}" onclick="getProductInfo(this.id)"  class="product-image col-sm-5 p-0"
                                    style="background-image: url('{{ $product->image }}')">
                                    <a href="#"></a>
                                </div>
                                <div class="content col-sm-7">
                                    <h2 class="product-name" id="{{ $product->id }}" onclick="getProductInfo(this.id)" >{{ $product->title }}</h2>
                                    <span class="date" id="{{ $product->id }}" onclick="getProductInfo(this.id)" > {{ date('M d, Y', strtotime($product->created_at)) }}</span>
                                    <p class="text" id="{{ $product->id }}" onclick="getProductInfo(this.id)" >{{ $product->description }}</p>
                                    <div class="more-info">
                                        <a href="{{ url('/product/'.$product->id) }}">More Info</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end product -->
                @endforeach

            </div>
        </div>

        @include('product-info')

    </section>
    <!-- end products section -->

@endsection