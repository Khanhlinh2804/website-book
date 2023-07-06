@extends('fontend.app')
@section('titles','Shop')
@section('content')
<div class="linh-ne">
    <div class="black">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 pt-4 pb-4 text-align-center">
                    <h1 class="white-text selector text-align-center ">Contact</h1>
                </div>
            </div>
        </div>
    </div>
    <div class="">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3725.981447410505!
        2d107.042199575127!3d20.95326018067721!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x314a58ead17169c1%3A0x9984df2e118d9ddf
        !2zSOG6oSBMb25nLCBCw6NpIENow6F5LCBUcC4gSOG6oSBMb25nLCBRdeG6o25nIE5pbmgsIFZp4buHdCBOYW0!5e0!3m2!1svi!2s!4v1688288233200!5m2!1svi
        !2s" width="100%" height="600px" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    </div>
    <div class="container pt-5 ">
        <div class="row">
            <div class="col-lg-4">
                <p class="text-contact pb-5">Contact Us</p>
                <div class="dividers"></div>
                <div class="pt-5">
                    <p class="contact-address">Ha Long City, Quang Ninh</p>
                    <p class="contact-national">VN</p>
                    <p class="contact-phone">0986 797 018</p>
                    <p class="contact-email">khanhlinh6863@gmail.com</p>
                </div>
                <div class="pt-4 d-flex">
                    <div class="contact-group-icon">
                        <i class="fa-brands fa-instagram contact-icon" style="color: black"></i>
                    </div>
                    <div class="contact-group-icon">
                        <i class="fa-brands fa-facebook-f contact-icon" style="color: black"></i>
                    </div>
                    <div class="contact-group-icon">
                        <i class="fa-brands fa-github contact-icon" style="color: black"></i>
                    </div>
                </div>


            </div>
            <div class="col-lg-8 pt-4">
                <div class="row">
                    <div class="col-lg-6">
                        <div>
                            <input type="text" class="contact-custom-input" placeholder="Name">
                        </div>
                        <div class="pt-4">
                            <input type="text" class="contact-custom-input" placeholder="Address">
                        </div>
                       
                    </div>
                    <div class="col-lg-6">
                        <div>
                            <input type="text" class="contact-custom-input" placeholder="Phone">
                        </div>
                        <div class="pt-4">
                            <input type="text" class="contact-custom-input" placeholder="Subject">
                        </div>
                    </div>
                </div>
                <div class="contact-message">
                    <div>
                        <textarea class="message-box" placeholder="Type your message here"></textarea>
                    </div>
                </div>

                <div class="pb-2 pt-3">
                    <a href="">
                        <button class="mb-5 mt-3 p-3 pl-5  pr-5 bold-text pl-50 white-text black-backgroundS borderless-button">
                            SEND MESSAGE
                        </div>
                    </a>
                </div>

            </div>
        </div>
    </div>
    <div class="">
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
    
</div>



@endsection
