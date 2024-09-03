
@extends('frontend.app')
@section('content')

<section class="inner_page_head">
    <div class="container_fuild">
       <div class="row">
          <div class="col-md-12">
             <div class="full">
                <h3>Contact us</h3>
             </div>
          </div>
       </div>
    </div>
 </section>
 <!-- end inner page section -->
 <!-- why section -->
 <section class="why_section layout_padding">
    <div class="container">
    
       <div class="row">
          <div class="col-lg-8 offset-lg-2">
             <div class="full">
                <form action="{{ route('send.message') }}" method="POST">
                  @csrf
                   <fieldset>
                      <input type="text" placeholder="Enter your full name" name="name"/>
                      @error('name')
                         <span class="text-danger">{{ $message }}</span>
                      @enderror
                      <input type="email" placeholder="Enter your email address" name="email"/>
                      @error('email')
                        <span class="text-danger">{{ $message }}</span>
                     @enderror
                      <input type="text" placeholder="Enter subject" name="subject" />
                      @error('subject')
                        <span class="text-danger">{{ $message }}</span>
                     @enderror
                      <textarea placeholder="Enter your message" name="message"></textarea>
                      @error('message')
                        <span class="text-danger">{{ $message }}</span>
                     @enderror
                      <input type="submit" value="Submit" />
                   </fieldset>
                </form>
             </div>
          </div>
       </div>
    </div>
 </section>

 @endsection