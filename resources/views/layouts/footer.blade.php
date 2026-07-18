<footer class="footer mt-auto mb-0 text-center py-3 w-100" style="background-color:#99CC99;">
    <div class="container-fluid">
        <div class="hstack gap-2 d-flex justify-content-center">
            <a class="links" target="_blank" href="{{route('legal', ['openPrivacy' => 'true'])}}">
                Privacy Policy
            </a>
            <!-- socials -->
            <a class="icons" href="https://www.facebook.com/scribblesandschemes.earlychildhoodcenter" target="_blank" style="margin-left:65px;"><!--facebook-->
                <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" class="bi bi-facebook" viewBox="0 0 16 16">
                    <path d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951" />
                </svg>
            </a>
            <a class="icons" href="mailto:scribblesandschemes2010@yahoo.com" target="_blank" style="margin-right:65px;"><!--yahoo-->
                <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 512 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                    <path d="M223.7 141.1 167 284.2 111 141.1H14.9L120.8 390.2 82.2 480h94.2L317.3 141.1zm105.4 135.8a58.2 58.2 0 1 0 58.2 58.2A58.2 58.2 0 0 0 329.1 276.9zM394.7 32l-93 223.5H406.4L499.1 32z" />
                </svg>
            </a>
            <a class="links" target="_blank" href="{{route('legal', ['openTerms' => 'true'])}}">
                Terms of Service
            </a>
        </div>
        <hr style="width:100%; color:black;">
        <p class="mb-0">&copy; 2024 ETugma. All rights reserved.</p>
    </div>
</footer>

<style>
    .icons svg {
        text-decoration: none;
        transition: fill 0.3s;
        transition: transform 0.3s ease;
    }

    .icons:hover svg {
        fill: white;
        transform: scale(1.1);
    }

    .links {
        text-decoration: none;
        color: black;
    }

    .links:hover {
        text-decoration: underline;
    }
</style>