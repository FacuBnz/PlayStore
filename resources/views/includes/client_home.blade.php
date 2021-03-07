<div class="card-columns text-center">
    @foreach($apps as $app)
        <?php $sum = 0 ?>

        <div class="card text-center shadow-sm flex-nowrap" style="width: 18rem;">
            @if($app->image != null)
                <img src="{{ route('app.image',['filename' => $app->image]) }}" style="max-width: 300px;" alt="image of {{ $app->name }}" class="card-img-top">
            @endif
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

                <?php $cant = count($app->califications); ?>
                <?php $prom = ($sum/$cant) ; ?>

                <p class="card-text text-muted">Calification:{{ $prom }}</p><hr>

                <a href="#" class="btn btn-success">Comprar</a>
            </div>
        </div>
    @endforeach
</div>
