


@php
   $setting = DB::table('website_settings')->first();
   $socials = DB::table('socials')->first();
@endphp

<footer>
    <div class="container">
       <div class="row">
          <div class="col-md-4">
              <div class="full">
                 <div class="logo_footer">
                   {{-- <a href="{{ route('frontend_home_page') }}"><img width="210" src="{{ asset('frontend/images/logo.png') }}" alt="#" /></a> --}}
                   <h1 class="bg-primary p-2"><a href="{{ route('frontend_home_page') }}" class="p-5 text-white">{{ $setting->website_name ?? '' }}</a></h1>
                 </div>
                 <div class="information_f">
                   <p><strong>ADDRESS:</strong> {{ $setting->address ?? "address" }}</p>
                   <p><strong>PHONE:</strong> {{ $setting->phone_one ?? "address" }}</p>
                   <p><strong>EMAIL:</strong> {{ $setting->main_email ?? "address" }}</p>
                 </div>
              </div>
          </div>
          <div class="col-md-8">
             <div class="row">
             <div class="col-md-7">
                <div class="row">
                   <div class="col-md-6">
                <div class="widget_menu">
                   <h3>Menu</h3>
                   <ul>
                      <li><a href="{{ route('frontend_home_page') }}">Home</a></li>
                      
                     
                      <li><a href="{{ route('blog.view') }}">Blog</a></li>
                      <li><a href="{{ route('contact.view') }}">Contact</a></li>
                   </ul>
                </div>
             </div>
             <div class="col-md-6">
                <div class="widget_menu">
                   <h3>Account</h3>
                   <ul>
                      <li><a href="#">Account</a></li>
                      <li><a href="#">Checkout</a></li>
                      <li><a href="{{ route('login') }}">Login</a></li>
                      <li><a href="{{ route('register') }}">Register</a></li>
                      
                   </ul>
                </div>
             </div>
                </div>
             </div>     
             {{-- <div class="col-md-5">
                <div class="widget_menu">
                   <h3>Newsletter</h3>
                   <div class="information_f">
                     <p>Subscribe by our newsletter and get update protidin.</p>
                   </div>
                   <div class="form_sub">
                      <form>
                         <fieldset>
                            <div class="field">
                               <input type="email" placeholder="Enter Your Mail" name="email" />
                               <input type="submit" value="Subscribe" />
                            </div>
                         </fieldset>
                      </form>
                   </div>
                </div>
             </div> --}}
             <div class="col-md-5 footer-col">
               <div class="footer_detail">
                  <a href="#" class="footer-logo">
                 Socials Ling
                  </a>
                  <p>
                     Necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with
                  </p>
                  <div class="footer_social p-2">
                     <a href="{{ $socials->facebook ?? '#' }}">
                     <i class="fa fa-facebook p-2" aria-hidden="true"></i>
                     </a>
                     <a href="{{ $socials->twitter ?? '#' }}">
                     <i class="fa fa-twitter p-2" aria-hidden="true"></i>
                     </a>
                     <a href="{{ $socials->linkedin ?? '#' }}">
                     <i class="fa fa-linkedin p-2" aria-hidden="true"></i>
                     </a>
                     <a href="{{ $socials->instagram ?? '#' }}">
                     <i class="fa fa-instagram p-2" aria-hidden="true"></i>
                     </a>
                     
                  </div>
               </div>
            </div>
             </div>
          </div>
       </div>
    </div>
 </footer>
 <!-- footer end -->
 <div class="cpy_">
    <p class="mx-auto">© 2021 All Rights Reserved By <a href="https://www.facebook.com/codeartist.IT">CodeArtist.IT</a><br>

    
    </p>
 </div>