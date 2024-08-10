<header class="header_section">
    <div class="container">
       <nav class="navbar navbar-expand-lg custom_nav-container ">
          <a class="navbar-brand" href="{{ route('frontend_home_page') }}"><img width="250" src="{{ asset('frontend/images/logo.png') }}" alt="#" /></a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class=""> </span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
             <ul class="navbar-nav">
                <li class="nav-item active">
                   <a class="nav-link" href="{{ route('frontend_home_page') }}">Home <span class="sr-only">(current)</span></a>
                </li>
               
                <li class="nav-item">
                   <a class="nav-link" href="#">About</a>
                </li>

                <li class="nav-item">
                   <a class="nav-link" href="{{ route('product.view') }}">Products</a>
                </li>
                <li class="nav-item">
                   <a class="nav-link" href="blog_list.html">Blog</a>
                </li>
                <li class="nav-item">
                   <a class="nav-link" href="{{ route('contact.view') }}">Contact</a>
                </li>

                @if (Route::has('login'))

                  @auth
                     <li class="nav-item">
                        
                           

                           <a  class="btn btn-primary" href="{{ route('logout') }}" onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
                           
                           <p style="height: 5px; test-bottom:6px;">Logout</p>
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                              @csrf
                        </form>
                        
                     </li>
                  @else
                     <li class="nav-item">
                        <a class="btn btn-primary"  id="logincss" href="{{ route('login') }}">Login</a>
                     </li>
                     <li class="nav-item">
                        <a class="btn btn-success"  id="register" href="{{ route('register') }}">Register</a>
                     </li>
                  @endauth
               @endif
                
             
               
             </ul>
          </div>
       </nav>
    </div>
 </header>