@extends('fontend.app')
@section('titles','About US')
@section('content')
<div class="linh-ne">
    <div class="black">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 pt-4 pb-4 text-align-center">
                    <h1 class="white-text selector text-align-center ">About Us</h1>
                </div>
            </div>
        </div>
    </div>
    <div class="about-us-pt-5">
        <div class="container">
            <div class="anout-us-our">
                <p class="about-our-mission"> Our Mission</p>
            </div>
            <div class="row">
                <div class="col-lg-5"></div>
                <div class="col-lg-2">
                    <div class="dividers"></div>
                </div>
                <div class="col-lg-5"></div>
            </div>
            <div>
                <p class="about-text-our-p">Our mission is to bring the passion and love for reading books back. whether it's a regular paper book, or an online edition, we want our readers to know that we appreciate quality and artful storytelling. Join our community and enjoy multiple genres, modern and classic authors, reviews, critics and more!</p>
            </div>
            <div class="pt-5 pb-5">
                <iframe width="100%" height="500" src="https://www.youtube.com/embed/cHpcTaELU68" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
            </div>
            <div class="row">
                <h1 style="text-align: center">Blogs</h1>
            </div>
            <div class="row ">
                    @foreach ($blogs as $item)
                    <div class="col-lg-4 pt-5"  style="display: flex">
                        <a class=" about-center" href="{{route('blog.show', ['id' => $item->id])}}">
                            <img src="{{url('uploads')}}/{{$item->image}}" class="about-image" alt="">
                        </a>
                        <div class="pl-1">
                            <h3>{{$item->name}}</h3>
                            <p>{{$item->title}}</p>
                        </div>
    
                    </div>
                    @endforeach
                    
            </div>
            

        </div>
    </div>
</div>
<div class="pt-5">
    <div class="red">
        <script>
            const spans = document.querySelectorAll('.text-effect span');
            function animateText() {
            spans.forEach((span, index) => {
                setTimeout(() => {
                span.style.animation = 'fade-out 1s forwards';
                }, index * 100);
            });
            }
            setTimeout(animateText, 5000);
    
        </script>
        <div class="background container pt-5 pb-5">
            <div class="row">
    
                <div class="col-lg-10 d-flex">
                    <p class="text-get text-decoration">
                        Get -30% purchase
                    </p>
                    <div class="d-flex pt-2 selector white-text text-effect">
                        <h1>
                             <span class="selector">on</span>
                             <span class="selector">order </span>
                             <span class="selector">over</span>
                             <span class="selector">$299.00</span>
                        </h1>
                    </div>    
                </div>
                <div class="col-lg-2">
                    <button
                        class=" p-3 pl-4 pr-4 bold-text white-text black-backgroundS borderless-button">
                        MOVE INFO
                    </button>
                </div>
            </div>
    
            
        </div>
    </div>
</div>
@endsection
