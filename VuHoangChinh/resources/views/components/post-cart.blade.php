<style>
    /* Post new style */
    .post-new {
        margin-bottom: 20px;
    }

    .post {
        position: relative;
        width: 100%;
        height: 200px;
        background-color: #f2f2f2;
        border-radius: 10px;
        display: flex;
        align-items: center;
        justify-content: center;
        overflow: hidden;
        perspective: 1000px;
        box-shadow: 0 0 0 5px #ffffff80;
        transition: all 0.6s cubic-bezier(0.175, 0.885, 0.32, 1.275);
        margin-right: 20px;
    }

    .post img {
        width: 90%;
        fill: #333;
        transition: all 0.6s cubic-bezier(0.175, 0.885, 0.32, 1.275);
    }

    .post:hover {
        transform: scale(1.05);
        box-shadow: 0 8px 16px rgba(255, 255, 255, 0.2);
    }

    .post__content {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        padding: 20px;
        box-sizing: border-box;
        background-color: #f2f2f2;
        transform: rotateX(-90deg);
        transform-origin: bottom;
        transition: all 0.6s cubic-bezier(0.175, 0.885, 0.32, 1.275);
    }

    .post:hover .post__content {
        transform: rotateX(0deg);
    }

    .post__title {
        margin: 0;
        font-size: 24px;
        color: #333;
        font-weight: 700;
    }

    .post:hover img {
        scale: 0;
    }

    .post__description {
        margin: 10px 0 0;
        font-size: 14px;
        color: #777;
        line-height: 1.4;
    }
</style>

<div class="post">
    <a href="{{ route('site.post.detail', ['slug' => $item->slug]) }}">
        <img src="{{ asset('images/posts/' . $item->image) }}" alt="{{ $item->image }}">
        <div class="post__content">
            <p class="post__title">{{ $item->title }}</p>
            <p class="post__description">-{{ $item->description }}
            </p>
        </div>
    </a>
</div>
