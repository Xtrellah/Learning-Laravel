<div>
    <!-- I begin to speak only when I am certain what I will say is not better left unsaid. - Cato the Younger -->
    <h1>{{ $title }}</h1>


    <ul>
        @foreach($products as $product)
            <li>
                <h3>{{$product->name}}</h3>
                <p>{{$product->description}}</p>
                <span>{{$product->price}}</span>
            </li>
        @endforeach
    </ul>

</div>
