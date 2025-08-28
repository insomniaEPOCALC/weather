<div class="weather-ticker-container">
    <div class="weather-ticker">
        <div class="ticker-content">
            @foreach($weathers as $weather)
                <div class="weather-item">
                    <a href="weather/{{ $weather->id }}" class='city'>{{ $weather->city}} </a>
                    <a href="weather/{{ $weather->id }}">{{ $weather->temperature}}度</a>
                </div>
                @if(!$loop->last)
                    <span class="separator">｜</span>
                @endif
            @endforeach
        </div>
    </div>
</div>
