<div class="locker-container">
    <a style="text-decoration: none;" class="locker-link"
        href="{{ route('locker.page', ['location' => $location, 'lockerid' => $datalocker->locker_id]) }}">
        <div class="locker">
            <div class="text-content">
                <h1 class="locker-number">{{ $datalocker->locker_number }}</h1>
                <h1 class="locker-place">{{ $datalocker->location->location_name }}</h1>
            </div>
            <div class="locker-size">
                <div class="circle">
                    <h1>{{ $datalocker->locker_size }}</h1>
                </div>
            </div>
        </div>
    </a>
</div>
