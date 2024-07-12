<!DOCTYPE html>
 <html lang="en">

 <head>
     <meta charset="utf-8">
     <title>
         London Centre
     </title>
     <meta content="width=device-width, initial-scale=1.0" name="viewport">
     <meta content="" name="keywords">
     <meta content="" name="description">
     @include('layouts_website.head')
 </head>
 <body  @if (App::getlocale() == 'ar') dir="rtl" @endif>
     <!-- Spinner Start -->
     <div id="spinner"
         class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
         <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
             <span class="sr-only">Loading...</span>
         </div>
     </div>
     <!-- Spinner End -->
     @include('layouts_website.main-header')
     @yield('content')
     <!-- End Page-content -->
     @include('layouts_website.footer')
     <!-- Back to Top -->
     <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
     @include('layouts_website.javascript')
 </body>

 </html>
