

<div class="list-locker">
    <div class="border-list-locker">
        <div class="container-list-locker">
            @for ($i = 0; $i <= 6; $i++)
                <a style="text-decoration: none;" class="locker-link" href="">
                    <div class="locker">
                        <div class="text-content">
                            <h1 class="locker-number">L00{{$i+1}}</h1>
                            <h1 class="locker-place">Universitas Bina Nusantara, Lt1</h1>
                        </div>
                        <div class="locker-size">
                            <div class="circle">
                                @if ($i % 2 == 0)
                                    <h1>XL</h1>
                                @else
                                    <h1>L</h1>
                                @endif

                            </div>
                        </div>
                    </div>
                </a>
            @endfor

            <div class="button-order">
                <a href="">
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
