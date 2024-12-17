@extends('layouts.site')

@section('header')
    <style>
        .contact {
            margin-top: 20px;
        }

        .row .col-md-5 ul {
            list-style: none;
        }

        .row .col-md-5 ul li i {
            color: #af1713;
            font-size: 50px;
        }

        .row .col-md-6 form input {
            width: 80%;
            border: '1px solid #af1713';
            border-radius: 10px;
            height: 40px
        }

        .row .col-md-6 form textarea {
            width: 80%;
            border: '1px solid #af1713';
            border-radius: 10px;
            height: 70px
        }
    </style>
@endsection

@section('content')
    <div class="contact">
        <h1 class="text-center">Contact with us</h1>
        <div class="row">
            <div class="text-center">
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3918.746776096384!2d106.772424074698!3d10.830680489321459!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31752701a34a5d5f%3A0x30056b2fdf668565!2zQ2FvIMSQ4bqzbmcgQ8O0bmcgVGjGsMahbmcgVFAuSENN!5e0!3m2!1svi!2s!4v1715223691637!5m2!1svi!2s"
                    width="1000" height="550" style="border:0" allowfullscreen="" loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
        </div>
        <div class="row mt-4 mb-3">
            <div class="col-md-1"></div>
            <div class="col-md-5">
                <h3 class="ms-4">Contact</h3>
                <ul>
                    <li>
                        <div class="row">
                            <i class="fa-solid fa-location-dot col-md-1 me-1"></i>
                            <div class="col-md-8">
                                <h5>Address:</h5>
                                <p>20 Tăng Nhơn Phú, Phước Long B, Thủ Đức, Thành phố Hồ Chí Minh</p>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="row">
                            <i class="fa-solid fa-phone-volume col-md-1 me-1"></i>
                            <div class="col-md-8">
                                <h5>Phone number:</h5>
                                <p>0123456789</p>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="row">
                            <i class="fa-regular fa-envelope col-md-1 me-1"></i>
                            <div class="col-md-8">
                                <h5>Email:</h5>
                                <p>vuhoangchinh222@gmail.com</p>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
            <div class="col-md-6">
                <h3>Message with us</h3>
                <form action="{{ route('site.contact.create') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input required class="mb-2" name="title" type="text" placeholder="Title" />
                    <br />
                    @if (Auth::user())
                        <input class="mb-2" name="name" type="text" placeholder="Name"
                            value="{{ old('name', $user->name) }}" />
                        <br />
                        <input class="mb-2" name="email" type="email" placeholder="Email"
                            value="{{ old('email', $user->email) }}" />
                        <br />
                        <input class="mb-2" name="phone" type="text" placeholder="Phone number"
                            value="{{ old('phone', $user->phone) }}" />
                        <br />
                    @else
                        <input required class="mb-2" name="name" type="text" placeholder="Name" />
                        <br />
                        <input required class="mb-2" name="email" type="email" placeholder="Email" />
                        <br />
                        <input required class="mb-2" name="phone" type="text" placeholder="Phone number" />
                        <br />
                    @endif
                    <textarea class="mb-2" name="content" placeholder="Message"> </textarea>
                    <br>
                    @error('content')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                    <br />
                    <button class="btn btn-success text-white"type="submit">Submit</button>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('title', 'Contact')



@section('footer')
@endsection
