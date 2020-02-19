@extends('layout')

@section('body')

    <div class="card">
        <img src="{{ $product->image  }}" alt="John" style="margin: auto;text-align: center;width:50%">
        <h1> {{ $product->title }}</h1>
        <p class="title"> {{ date('M d, Y', strtotime($product->created_at)) }} </p>

        <p class="title">Attributes:
            <br>
            @foreach($product->attributes as $attr)
                Price: {{ $attr->price }} <br>
                Color: {{ $attr->color }} <br>
                Size:  {{ $attr->size }}
            @endforeach
        </p>

        <p>{{ $product->description }}</p>
    </div>

@endsection