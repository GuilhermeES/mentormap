@include('includes/header')

<main>
    <section class="banner" id="banner">
        <img src="{{ asset('images/bg_banner_1.svg') }}" alt="" class="banner__img--decorative-one">
        <img src="{{ asset('images/bg_banner_2.svg') }}" alt="" class="banner__img--decorative">
        <div class="container">
            <div class="banner__items row align-items-center">
                <div class="col-lg-7 order-2 order-lg-1"  data-aos="fade-right" data-aos-duration="800" data-aos-once="true">
                    <div class="banner__texts col-12 col-lg-6 text-center text-lg-start">
                        <h1> 
                            Sua carreira guiada,
                            <mark> seu potencial desbloqueado  </mark>
                        </h1>
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus vel rutrum nulla, 
                        </p>
                        <a href="#contato" class="button d-flex d-lg-block justify-content-center pb-3 pb-lg-0">
                            <div class="circle circle--purple">
                                <div class="circle__text circle__text--purple">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="55" height="9" viewBox="0 0 55 9" fill="none">
                                        <path d="M54.3536 4.81706C54.5488 4.6218 54.5488 4.30521 54.3536 4.10995L51.1716 0.927972C50.9763 0.732709 50.6597 0.732709 50.4645 0.927971C50.2692 1.12323 50.2692 1.43982 50.4645 1.63508L53.2929 4.46351L50.4645 7.29193C50.2692 7.48719 50.2692 7.80378 50.4645 7.99904C50.6597 8.1943 50.9763 8.1943 51.1716 7.99904L54.3536 4.81706ZM-4.37114e-08 4.9635L54 4.96351L54 3.96351L4.37114e-08 3.9635L-4.37114e-08 4.9635Z" fill="#342B77"/>
                                      </svg>
                                    <div class="circle__more">
                                        Saiba <strong>mais</strong>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-4 order-1 order-lg-2 pb-5 pb-lg-0"  data-aos="fade-left" data-aos-duration="800" data-aos-once="true">
                    <img src="{{ asset('images/banner.png') }}" alt="Mulher segurando celular na mão" class="banner__img--principal">
                </div>
            </div>
        </div>
    </section>
   
    @include('includes/home/sobre')
    @include('includes/home/cta')
    @include('includes/home/contact')
    
</main>

@include('includes/footer')