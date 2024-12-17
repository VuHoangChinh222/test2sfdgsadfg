<div id="bannerCarousel" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-inner">
        @foreach ($list_slider as $index => $row_slider)
            <div class="carousel-item {{ $loop->first ? 'active' : '' }}">
                <img src="{{ asset('images/banners/' . $row_slider->image) }}" class="d-block h-100"
                    alt="{{ $row_slider->image }}" style="height: 580px;">
            </div>
        @endforeach
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#bannerCarousel" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#bannerCarousel" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
</div>
