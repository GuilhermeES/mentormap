@extends('layout')

@section('content')
    @include('includes/header')

    <section class="banner" id="banner">
        <img src="{{ asset('images/bg_banner_1.svg') }}" alt="" class="banner__img--decorative-one">
        <img src="{{ asset('images/bg_banner_2.svg') }}" alt="" class="banner__img--decorative">
        <div class="container">
            <div class="banner__items row align-items-center">
                <div class="col-lg-7 order-2 order-lg-1"  data-aos="fade-right" data-aos-duration="800" data-aos-once="true">
                    <div class="banner__texts col-12 col-lg-6 text-center text-lg-start">
                        <h1> 
                            {!! $site[0]->text !!}
                            
                        </h1>
                        <p>
                            {{$site[0]->subtitle}}
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
                    <img src="{{ asset('images/'. $site[0]->image) }}" alt="Mulher segurando celular na mão" class="banner__img--principal">
                </div>
            </div>
        </div>
    </section>

    <section class="about" id="plataforma">
        <img src="{{ asset('images/bg_sobre.svg') }}" alt="" class="about__bg"> 
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6"  data-aos="fade-up" data-aos-duration="600" data-aos-once="true">
                    <img src="{{ asset('images/'. $site[1]->image) }}" alt="Mulher sorridente" class="img-fluid"> 
                </div>
                <div class="col-lg-6 pt-5 pt-lg-0"  data-aos="fade-up" data-aos-duration="800" data-aos-once="true">
                    <div class="name-section">Sobre</div>
                    <h2 class="title"> {{$site[1]->text}} </h2>
                    <div class="subtitle">
                        {!! $site[1]->subtitle !!}
                    </div>
                    <a href="#contato" class="button d-flex d-lg-block  pb-3 pb-lg-0" >
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
        </div>
    </section>

    <section class="cta" id="cta">
        <img src="{{ asset('images/bg_cta_2.svg') }}" alt="" class="d-none d-lg-block cta__decorative--one">
        <img src="{{ asset('images/bg_cta.svg') }}" alt="" class=" cta__decorative">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-5 text-center text-lg-start cta__texts"  data-aos="fade-right" data-aos-duration="600" data-aos-once="true">
                    <h2 class="title title--white">
                        {{$site[2]->text}}
                    </h2>
                    <div class="subtitle subtitle--white">
                        {!! $site[2]->subtitle !!}
                    </div>
                    <a href="#contato" class="button d-flex d-lg-block justify-content-center pb-3 pb-lg-0">
                        <div class="circle">
                            <div class="circle__text">
                                <svg xmlns="http://www.w3.org/2000/svg" width="55" height="9" viewBox="0 0 55 9" fill="none">
                                    <path d="M54.3536 4.81706C54.5488 4.6218 54.5488 4.30521 54.3536 4.10995L51.1716 0.927972C50.9763 0.732709 50.6597 0.732709 50.4645 0.927971C50.2692 1.12323 50.2692 1.43982 50.4645 1.63508L53.2929 4.46351L50.4645 7.29193C50.2692 7.48719 50.2692 7.80378 50.4645 7.99904C50.6597 8.1943 50.9763 8.1943 51.1716 7.99904L54.3536 4.81706ZM-4.37114e-08 4.9635L54 4.96351L54 3.96351L4.37114e-08 3.9635L-4.37114e-08 4.9635Z" fill="white"/>
                                </svg>
                                <div class="circle__more">
                                    Saiba <strong>mais</strong>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-7 text-end"  data-aos="fade-up" data-aos-duration="800" data-aos-once="true">
                    <img src="{{ asset('images/'. $site[2]->image) }}" alt="" class="img-fluid">
                </div>
            </div>
            <img src="{{ asset('images/proposito.png') }}" alt="Proposito" class="cta__proposito">
        </div>
    </section>

    <section class="contact" id="contato">
        <img src="{{ asset('images/bg_contato.svg') }}" alt="" class="d-none d-lg-block contact__decorative">
        <div class="container">
           <div class="row">
                <div class="col-md-5"  data-aos="fade-up" data-aos-duration="600" data-aos-once="true">
                    <div class="name-section">Contato</div>
                    <h2 class="title">{{$site[3]->text}}</h2>
                    <div class="subtitle">
                        {!! $site[3]->subtitle !!}
                    </div>
                    <img class="pt-4" src="{{ asset('images/star.png') }}" alt="Star">
                </div>
                <div class="col-md-1 mx-auto">
                    <div class="contact__line mx-auto"></div>
                </div>
                <div class="col-md-5 mx-auto"  data-aos="fade-up" data-aos-duration="800" data-aos-once="true">
                    <form action="" method="POST">
                        @csrf
                        <div class="mb-3">
                            <input class="form-control" type="text" name="nome" placeholder="Nome" required>
                        </div>
                        <div class="mb-3">
                            <input class="form-control" type="email" name="email" placeholder="E-mail" required>
                        </div>
                        <div class="mb-3">
                            <input class="form-control" type="text" name="telefone" placeholder="Telefone" required>
                        </div>
                        <div class="mb-3">
                            <textarea class="form-control" name="mensagem" placeholder="Mensagem" required></textarea>
                        </div>
                        <div class="text-end">
                            <button type="submit" class="submit-form me-4">
                                <div class="button d-flex d-lg-block justify-content-end pb-3 pb-lg-0">
                                    <div class="circle circle--purple">
                                        <div class="circle__text circle__text--purple">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="55" height="9" viewBox="0 0 55 9" fill="none">
                                                <path d="M54.3536 4.81706C54.5488 4.6218 54.5488 4.30521 54.3536 4.10995L51.1716 0.927972C50.9763 0.732709 50.6597 0.732709 50.4645 0.927971C50.2692 1.12323 50.2692 1.43982 50.4645 1.63508L53.2929 4.46351L50.4645 7.29193C50.2692 7.48719 50.2692 7.80378 50.4645 7.99904C50.6597 8.1943 50.9763 8.1943 51.1716 7.99904L54.3536 4.81706ZM-4.37114e-08 4.9635L54 4.96351L54 3.96351L4.37114e-08 3.9635L-4.37114e-08 4.9635Z" fill="#342B77"/>
                                              </svg>
                                            <div class="circle__more">
                                                <strong>Enivar</strong>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </button>
                        </div>
                    </form>
                </div>
           </div>
        </div>
    </section>

    @include('includes/footer')
@endsection