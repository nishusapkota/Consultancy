<link rel="stylesheet" href="{{ asset('css/style.css') }}">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/bbbootstrap/libraries@main/choices.min.css">


<!-- Google Font: Source Sans Pro -->
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
<!-- Font Awesome -->
<link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}">
<!-- Ionicons -->
<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
<!-- Tempusdominus Bootstrap 4 -->
<link rel="stylesheet" href="{{ asset('plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">
<!-- iCheck -->
<link rel="stylesheet" href="{{ asset('plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
<!-- JQVMap -->
<link rel="stylesheet" href="{{ asset('plugins/jqvmap/jqvmap.min.css') }}">
<!-- Theme style -->
<link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css') }}">
<!-- overlayScrollbars -->
<link rel="stylesheet" href="{{ asset('plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
<!-- Daterange picker -->
<link rel="stylesheet" href="{{ asset('plugins/daterangepicker/daterangepicker.css') }}">
<!-- summernote -->
<link rel="stylesheet" href="{{ asset('plugins/summernote/summernote-bs4.min.css') }}">
<style>
        

    .btn-toggle {
        margin: 0 4rem;
        padding: 0;
        position: relative;
        border: none;
        height: 1.5rem;
        width: 3rem;
        border-radius: 1.5rem;
        color: #6b7381;
        background: #bdc1c8;
    }

    .btn-toggle:focus,
    .btn-toggle.focus,
    .btn-toggle:focus.statuson,
    .btn-toggle.focus.statuson {
        outline: none;
    }

    .btn-toggle:before,
    .btn-toggle:after {
        line-height: 1.5rem;
        width: 4rem;
        text-align: center;
        font-weight: 600;
        font-size: 0.75rem;
        text-transform: uppercase;
        letter-spacing: 2px;
        position: absolute;
        bottom: 0;
        transition: opacity 0.25s;
    }

    /* .btn-toggle:before {
        content: 'Off';
        left: -4rem;
    }

    .btn-toggle:after {
        content: 'On';
        right: -4rem;
        opacity: 0.5;
    } */

    .btn-toggle>.handle {
        position: absolute;
        top: 0.1875rem;
        left: 0.1875rem;
        width: 1.125rem;
        height: 1.125rem;
        border-radius: 1.125rem;
        background: #fff;
        transition: left 0.25s;
    }

    .btn-toggle.statuson {
        transition: background-color 0.25s;
    }

    .btn-toggle.statuson>.handle {
        left: 1.6875rem;
        transition: left 0.25s;
    }

    .btn-toggle.statuson:before {
        opacity: 0.5;
    }

    .btn-toggle.statuson:after {
        opacity: 1;
    }

    .btn-toggle.btn-sm:before,
    .btn-toggle.btn-sm:after {
        line-height: -0.5rem;
        color: #fff;
        letter-spacing: 0.75px;
        left: 0.4125rem;
        width: 2.325rem;
    }

    .btn-toggle.btn-sm:before {
        text-align: right;
    }

    .btn-toggle.btn-sm:after {
        text-align: left;
        opacity: 0;
    }

    .btn-toggle.btn-sm.statuson:before {
        opacity: 0;
    }

    .btn-toggle.btn-sm.statuson:after {
        opacity: 1;
    }

    .btn-toggle.btn-xs:before,
    .btn-toggle.btn-xs:after {
        display: none;
    }

    .btn-toggle:before,
    .btn-toggle:after {
        color: #6b7381;
    }

    .btn-toggle.statuson {
        background-color: #29b5a8;
    }

   

    .btn-toggle.btn-sm {
        margin: 0 0.5rem;
        padding: 0;
        position: relative;
        border: none;
        height: 1.5rem;
        width: 3rem;
        border-radius: 1.5rem;
    }

    .btn-toggle.btn-sm:focus,
    .btn-toggle.btn-sm.focus,
    .btn-toggle.btn-sm:focus.statuson,
    .btn-toggle.btn-sm.focus.statuson {
        outline: none;
    }

    .btn-toggle.btn-sm:before,
    .btn-toggle.btn-sm:after {
        line-height: 1.5rem;
        width: 0.5rem;
        text-align: center;
        font-weight: 600;
        font-size: 0.55rem;
        text-transform: uppercase;
        letter-spacing: 2px;
        position: absolute;
        bottom: 0;
        transition: opacity 0.25s;
    }

    /* .btn-toggle.btn-sm:before {
        content: 'Off';
        left: -0.5rem;
    }

    .btn-toggle.btn-sm:after {
        content: 'On';
        right: -0.5rem;
        opacity: 0.5;
    } */

    .btn-toggle.btn-sm>.handle {
        position: absolute;
        top: 0.1875rem;
        left: 0.1875rem;
        width: 1.125rem;
        height: 1.125rem;
        border-radius: 1.125rem;
        background: #fff;
        transition: left 0.25s;
    }

    .btn-toggle.btn-sm.statuson {
        transition: background-color 0.25s;
    }

    .btn-toggle.btn-sm.statuson>.handle {
        left: 1.6875rem;
        transition: left 0.25s;
    }

    .btn-toggle.btn-sm.statuson:before {
        opacity: 0.5;
    }

    .btn-toggle.btn-sm.statuson:after {
        opacity: 1;
    }

    .btn-toggle.btn-sm.btn-sm:before,
    .btn-toggle.btn-sm.btn-sm:after {
        line-height: -0.5rem;
        color: #fff;
        letter-spacing: 0.75px;
        left: 0.4125rem;
        width: 2.325rem;
    }

    .btn-toggle.btn-sm.btn-sm:before {
        text-align: right;
    }

    .btn-toggle.btn-sm.btn-sm:after {
        text-align: left;
        opacity: 0;
    }

    .btn-toggle.btn-sm.btn-sm.statuson:before {
        opacity: 0;
    }

    .btn-toggle.btn-sm.btn-sm.statuson:after {
        opacity: 1;
    }

    .btn-toggle.btn-sm.btn-xs:before,
    .btn-toggle.btn-sm.btn-xs:after {
        display: none;
    }

    .btn-toggle.btn-xs {
        margin: 0 0;
        padding: 0;
        position: relative;
        border: none;
        height: 1rem;
        width: 2rem;
        border-radius: 1rem;
    }

    .btn-toggle.btn-xs:focus,
    .btn-toggle.btn-xs.focus,
    .btn-toggle.btn-xs:focus.statuson,
    .btn-toggle.btn-xs.focus.statuson {
        outline: none;
    }

    .btn-toggle.btn-xs:before,
    .btn-toggle.btn-xs:after {
        line-height: 1rem;
        width: 0;
        text-align: center;
        font-weight: 600;
        font-size: 0.75rem;
        text-transform: uppercase;
        letter-spacing: 2px;
        position: absolute;
        bottom: 0;
        transition: opacity 0.25s;
    }

    .btn-toggle.btn-xs:before {
        content: 'Off';
        left: 0;
    }

    .btn-toggle.btn-xs:after {
        content: 'On';
        right: 0;
        opacity: 0.5;
    }

    .btn-toggle.btn-xs>.handle {
        position: absolute;
        top: 0.125rem;
        left: 0.125rem;
        width: 0.75rem;
        height: 0.75rem;
        border-radius: 0.75rem;
        background: #fff;
        transition: left 0.25s;
    }

    .btn-toggle.btn-xs.statuson {
        transition: background-color 0.25s;
    }

    .btn-toggle.btn-xs.statuson>.handle {
        left: 1.125rem;
        transition: left 0.25s;
    }

    .btn-toggle.btn-xs.statuson:before {
        opacity: 0.5;
    }

    .btn-toggle.btn-xs.statuson:after {
        opacity: 1;
    }

    .btn-toggle.btn-xs.btn-sm:before,
    .btn-toggle.btn-xs.btn-sm:after {
        line-height: -1rem;
        color: #fff;
        letter-spacing: 0.75px;
        left: 0.275rem;
        width: 1.55rem;
    }

    .btn-toggle.btn-xs.btn-sm:before {
        text-align: right;
    }

    .btn-toggle.btn-xs.btn-sm:after {
        text-align: left;
        opacity: 0;
    }

    .btn-toggle.btn-xs.btn-sm.statuson:before {
        opacity: 0;
    }

    .btn-toggle.btn-xs.btn-sm.statuson:after {
        opacity: 1;
    }

    .btn-toggle.btn-xs.btn-xs:before,
    .btn-toggle.btn-xs.btn-xs:after {
        display: none;
    }

    .btn-toggle.btn-secondary {
        color: #6b7381;
        background: #bdc1c8;
    }

    .btn-toggle.btn-secondary:before,
    .btn-toggle.btn-secondary:after {
        color: #6b7381;
    }

    .btn-toggle.btn-secondary.statuson {
        background-color: #ff8300;
    }
</style>
@stack('style')
