@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center mb-5">

        @foreach($apps as $app)
            <?php $sum = 0 ?>

            <div class="card mr-2 mb-3 text-center shadow" style="width: 18rem;">
                <img src="" style="max-width: 300px;" alt="">
                <div class="card-body">
                    <h5 class="card-title">{{ $app->name }}</h5>

                    @foreach ($app->prices as $price)
                        @if($price->application_id == $app->id)
                            <p class="card-text text-muted">Price: ${{ $price->price }}</p>
                            @continue;
                        @endif
                    @endforeach

                    @foreach ($app->califications as $calification)
                        @if($calification->application_id == $app->id)
                            <?php $sum += $calification->calification; ?>
                        @endif
                    @endforeach
                    <?php $prom = $sum / count($app->califications); ?>

                    <p class="card-text text-muted">Calification:{{ $prom }}</p><hr>

                    <a href="#" class="btn btn-success">Comprar</a>
                </div>
            </div>
        @endforeach
    </div>

    <div class="row justify-content-center">
        <p>{{ $apps->links() }}</p>
    </div>
</div>
@endsection
