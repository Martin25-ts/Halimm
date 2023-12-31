<div class="text-center" >
    <img src="https://ucarecdn.com/36f1e9fd-0dbd-4a1c-be32-019e2171b0da/-/preview/500x500/-/quality/smart/-/format/auto/" class="rounded"  height="100%" alt="...">
</div>

<div class="account-navbar" >
    <div class="bar-profile">
        <div class="container-bar-profile">
            <div class="user-profile-name">
                <span class="greating">Hi,</span>
                <span class="user-name">{{Auth::user()->front_name}}</span>
            </div>
            <div class="user-bar-button">
                <div class="home-button">

                    @if ($location == NULL)
                        <a href="{{ route('dashboard') }}">
                    @else
                        <a href="{{ route('dashboard_location', ['location' => $location]) }}">
                    @endif

                        <img src="https://ucarecdn.com/239279f8-7577-4fcc-97a3-c8e22b74728e/" alt="">
                    </a>
                </div>
                <div class="profile-button">
                    <a href="">
                        <img src="https://ucarecdn.com/0f7fc80f-11a1-4958-9089-8b76b406a81f/" alt="">
                    </a>

                </div>
                <div class="logout-button">
                    <a href="{{ route('logout') }}">
                        <img src="https://ucarecdn.com/0805448b-8346-4b6c-8750-6b0e9ebd616e/" alt="">
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>


