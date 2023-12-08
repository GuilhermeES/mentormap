<footer class="footer">
    <div class="container">
        <div class="d-flex align-items-center justify-content-between">
            <img src="{{ asset('images/logo_footer.png') }}" alt="Logo" class="d-none d-lg-block">
            <nav class="d-block d-lg-flex footer__nav">
                <ul class="d-block d-lg-flex ">
                    <li>
                        <a class="nav-link" href="{{ Route::currentRouteName() === 'home' ? '#banner' : route('home') . '#banner' }}"> Início </a>
                    </li>
                    <li>
                        <a class="nav-link" href="{{ Route::currentRouteName() === 'home' ? '#plataforma' : route('home') . '#plataforma' }}"> Nossa plataforma </a>
                    </li>
                    <li>
                        <a class="nav-link" href="{{ Route::currentRouteName() === 'home' ? '#contato' : route('home') . '#contato' }}"> Contato </a>
                    </li>
                </ul>
            </nav>
            <svg class="d-none d-lg-block" xmlns="http://www.w3.org/2000/svg" width="65" height="66" viewBox="0 0 65 66" fill="none">
                <path d="M42.7768 11.4105C47.7858 13.7462 51.8544 17.7119 54.3178 22.6594C56.7811 27.6069 57.4935 33.2436 56.3385 38.6484C55.1835 44.0532 52.2294 48.9064 47.959 52.4149C43.6886 55.9234 38.3545 57.8797 32.8283 57.9641C27.3021 58.0484 21.9107 56.2559 17.5352 52.8794C13.1597 49.5029 10.0588 44.7422 8.73933 39.3752C7.41987 34.0081 7.95984 28.3523 10.271 23.3319C12.5822 18.3115 16.5278 14.2235 21.4632 11.7359" stroke="white" stroke-width="0.514154"/>
                <path d="M33.236 0.823814C33.1055 0.693386 32.8941 0.693386 32.7636 0.823814L30.6381 2.94931C30.5077 3.07974 30.5077 3.29121 30.6381 3.42165C30.7686 3.55208 30.98 3.55208 31.1105 3.42165L32.9998 1.53231L34.8891 3.42165C35.0196 3.55208 35.231 3.55208 35.3615 3.42165C35.4919 3.29121 35.4919 3.07974 35.3615 2.94931L33.236 0.823814ZM33.3338 37.1309L33.3338 1.05998L32.6658 1.05998L32.6658 37.1309L33.3338 37.1309Z" fill="white"/>
            </svg>
            <svg class="d-block d-lg-none" xmlns="http://www.w3.org/2000/svg" width="65" height="66" viewBox="0 0 65 66" fill="none">
                <path d="M42.7768 11.3507C47.7858 13.6864 51.8544 17.6521 54.3178 22.5996C56.7811 27.547 57.4935 33.1838 56.3385 38.5886C55.1835 43.9934 52.2294 48.8466 47.959 52.3551C43.6886 55.8636 38.3545 57.8199 32.8283 57.9043C27.3021 57.9886 21.9107 56.1961 17.5352 52.8196C13.1597 49.4431 10.0588 44.6823 8.73933 39.3153C7.41987 33.9483 7.95984 28.2925 10.271 23.2721C12.5822 18.2517 16.5278 14.1636 21.4632 11.6761" stroke="#FFE7C2" stroke-width="0.514154"/>
                <path d="M33.236 0.764C33.1055 0.633572 32.8941 0.633572 32.7636 0.764L30.6381 2.8895C30.5077 3.01993 30.5077 3.2314 30.6381 3.36183C30.7686 3.49226 30.98 3.49226 31.1105 3.36183L32.9998 1.4725L34.8891 3.36183C35.0196 3.49226 35.231 3.49226 35.3615 3.36183C35.4919 3.2314 35.4919 3.01993 35.3615 2.8895L33.236 0.764ZM33.3338 37.071L33.3338 1.00017L32.6658 1.00017L32.6658 37.071L33.3338 37.071Z" fill="#FFE7C2"/>
            </svg>
        </div>
        <div class="footer__bot align-items-center d-block d-lg-flex justify-content-center">
            <div class="d-flex align-items-center justify-content-between">
                <img src="{{ asset('images/logo_footer_2.png') }}" alt="Logo" class="d-block d-lg-none">
                <div class="footer__social">
                    <a href="" target="_blank">
                        <img src="{{ asset('images/whatsapp.png') }}" alt="Whatsapp">
                    </a>
                </div>
            </div>
            <div class="footer__copy">
                {{ now()->year }}, Todos os direitos reservados
            </div>
        </div>
    </div>
</footer>

