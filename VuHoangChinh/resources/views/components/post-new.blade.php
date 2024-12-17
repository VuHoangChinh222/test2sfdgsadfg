    {{-- Post new --}}


    <section class="post-new">
        <h2>Post new</h2>
        <div class="row">
            @foreach ($postList as $item)
                <div class="col-md-3">
                    <x-post-cart :$item />
                </div>
            @endforeach
        </div>
    </section>
