
@extends('frontend.app')
@section('content')


   
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

    <div class="content mt-5" >
        <div class="container-fluid">
          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-header">
                  <h3 class="card-title">Check your mail and confirm verification </h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body p-5">
                    <div class="mb-4 text-sm text-gray-600">
                        {{ __('Before continuing, could you verify your email address by clicking on the link we just emailed to you? If you didn\'t receive the email, we will gladly send you another.') }}
                    </div>

                    @if (session('status') == 'verification-link-sent')
                        <div class="mb-4 font-medium text-sm text-green-600">
                            {{ __('A new verification link has been sent to the email address you provided in your profile settings.') }}
                        </div>
                    @endif

                    <div class="mt-4 flex items-center justify-between">
                        <form method="POST" action="{{ route('verification.send') }}">
                            @csrf

                            <div class="mb-3">
                                <button class="btn bg-info" type="submit">
                                    {{ __('Resend Verification Email') }}
                                </button>
                            </div>
                        </form>

                        <div>
                            {{-- <a
                                href="{{ route('profile.show') }}"
                                class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                            >
                                {{ __('Edit Profile') }}</a> --}}

                            <form method="POST" action="{{ route('logout') }}" class="inline">
                                @csrf

                                <button type="submit" class="p-2 bg-primary underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 ml-2">
                                    {{ __('Log Out') }}
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
  
</div>
   
@endsection
