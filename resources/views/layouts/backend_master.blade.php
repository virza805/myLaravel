@extends('layouts.backend_app')

<!-- Preloader -->
{{-- <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="{{ asset('backend') }}/dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
  </div> --}}

  <!-- Navbar -->
  @includeIf('backend.inc.navbar')
  <!-- navbar -->

  <!-- Main Sidebar Container -->
  @includeIf('backend.inc.sidebar')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
@yield('breadcumb')
    {{-- @includeIf('backend.inc.breadcumb') --}}

    <!-- content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        @yield('master_content')
      </div><!-- container-fluid -->
    </section>
    <!-- end content -->
  </div>
  <!-- content-wrapper -->
  <footer class="main-footer">
    <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 3.1.0
    </div>
  </footer>

  <!-- Control Sidebar -->
  @includeIf('backend.inc.right')
  <!-- control-sidebar -->
</div>
<!-- wrapper -->
