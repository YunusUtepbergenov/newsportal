<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>News Admin</title>
    @include('admin.partials._styles')
  </head>
  <body>
    <div class="container-scroller">
        @include('admin.partials._sidebar')
        @include('admin.partials._header')
        <!-- partial -->
    <div class="main-panel">
        @yield('container')
        <!-- content-wrapper ends -->
        <!-- partial:partials/_footer.html -->
        @include('admin.partials._footer')
        <!-- partial -->
      </div>
      <!-- main-panel ends -->
    </div>
      <!-- page-body-wrapper ends -->
    </div>
    @include('admin.partials._scripts')
  </body>
</html>