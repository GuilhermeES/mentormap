<section class="contact" id="contato">
    <img src="{{ asset('images/bg_contato.svg') }}" alt="" class="d-none d-lg-block contact__decorative">
    <div class="container">
       <div class="row">
            <div class="col-md-5"  data-aos="fade-up" data-aos-duration="600" data-aos-once="true">
                <div class="name-section">Contato</div>
                <h2 class="title">Vamos conversar</h2>
                <div class="subtitle">
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                    Phasellus vel rutrum nulla, at laoreet tortor. Maecenas id
                    fringilla dolor. Sed finibus et odio id mattis. Fusce nec vestibulum dolor.
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