<div class="list-locker">
    <div class="border-list-locker">
        <div class="container-list-locker">
            @if ($usertransactions !== null)
                @foreach ($usertransactions['lockers'] as $datalocker)
                    @include('Layout.lockerborder')
                @endforeach
            @endif

            <div class="button-order">

                @if ($location !== null)
                    <a href="{{ route('order-location', ['location'=>$location]) }}">

                @else
                    <a href="{{ route('order') }}">
                @endif

                    <div class="plus-image">
                        <img src="https://ucarecdn.com/d92d3aa0-af95-4d2d-a0b5-aebbd0ebda6e/" alt="">
                    </div>
                    <div class="order-text">
                        <h1>Pesan</h1>
                    </div>
                </a>
            </div>
        </div>
    </div>
</div>
