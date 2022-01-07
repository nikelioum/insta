
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>INFLU - Διαχείριση Πελατών</title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="assets/images/logo/favicon.png">

    <!-- page css -->

    <!-- Core css -->
    <link href="assets/css/app.min.css" rel="stylesheet">

</head>

<body>
    <div class="app">
        <div class="layout">
            <!-- Header START -->
            <div class="header">
                <div class="logo logo-dark">
                    <a href="/home">
                        <img src="assets/images/logo/logo.png" alt="Logo">
                        <img class="logo-fold" src="assets/images/logo/logo-fold.png" alt="Logo">
                    </a>
                </div>
                <div class="logo logo-white">
                    <a href="/home">
                        <img src="assets/images/logo/logo-white.png" alt="Logo">
                        <img class="logo-fold" src="assets/images/logo/logo-fold-white.png" alt="Logo">
                    </a>
                </div>
                <div class="nav-wrap">
                    <ul class="nav-left">
                        
                    </ul>
                    <ul class="nav-right">
                    
                    </ul>
                </div>
            </div>    
            <!-- Header END -->

            <!-- Side Nav START -->
            <div class="side-nav">
                <div class="side-nav-inner">
                    <ul class="side-nav-menu scrollable">
                        <li class="nav-item dropdown">
                            <a class="dropdown-toggle" href="javascript:void(0);">
                                <span class="icon-holder">
                                    <i class="anticon anticon-dashboard"></i>
                                </span>
                                <span class="title">ΔΙΑΧΕΙΡΙΣΗ</span>
                                <span class="arrow">
                                    <i class="arrow-icon"></i>
                                </span>
                            </a>
                            <ul class="dropdown-menu">
                                <li>
                                    <a href="/home">ΑΡΧΙΚΗ</a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item dropdown open">
                            <a class="dropdown-toggle" href="javascript:void(0);">
                                <span class="icon-holder">
                                    <i class="anticon anticon-appstore"></i>
                                </span>
                                <span class="title">ΠΕΛΑΤΕΣ</span>
                                <span class="arrow">
                                    <i class="arrow-icon"></i>
                                </span>
                            </a>
                            <ul class="dropdown-menu">
                                <li class="active">
                                    <a href="/companies">ΔΕΣ ΠΕΛΑΤΕΣ</a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="dropdown-toggle" href="javascript:void(0);">
                                <span class="icon-holder">
                                    <i class="anticon anticon-appstore"></i>
                                </span>
                                <span class="title">ΡΥΘΜΙΣΕΙΣ</span>
                                <span class="arrow">
                                    <i class="arrow-icon"></i>
                                </span>
                            </a>
                            <ul class="dropdown-menu">
                                <li>
                                    <a href="{{ route('logout') }}"
                                      onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();"
                                    >ΑΠΟΣΥΝΔΕΣΗ</a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
            <!-- Side Nav END -->

            <!-- Page Container START -->
            <div class="page-container">
                

                <!-- Content Wrapper START -->
                <div class="main-content">

                <div class="page-header no-gutters">
                        <div class="row align-items-md-center">
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-md-5">
                                        <div class="input-affix m-v-10">
                                            <i class="prefix-icon anticon anticon-search opacity-04"></i>
                                            <input type="text" class="form-control" placeholder="Αναζήτηση Πελάτη">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="text-md-right m-v-10">
                                    <button class="btn btn-primary" data-toggle="modal" data-target="#create-new-company">
                                        <i class="anticon anticon-plus"></i>
                                        <span class="m-l-5">ΠΡΟΣΘΗΚΗ ΠΕΛΑΤΗ</span>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="container-fluid">
                        <div id="card-view">
                            <div class="row">
                                
                                @foreach ($companies as $company)
                                <div class="col-md-3">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="d-flex justify-content-between">
                                                <div class="media">
                                                    <div class="avatar avatar-image rounded">
                                                        <img src="assets/images/others/thumb-1.jpg" alt="">
                                                    </div>
                                                    <div class="m-l-10">
                                                        <h5 class="m-b-0">{{$company->name}}</h5>
                                                        <span class="text-muted font-size-13">{{$company->created_at->format('d/m/Y')}}</span>
                                                    </div>
                                                </div>
                                                <div class="dropdown dropdown-animated scale-left">
                                                    <a class="text-gray font-size-18" href="javascript:void(0);" data-toggle="dropdown">
                                                        <i class="anticon anticon-ellipsis"></i>
                                                    </a>
                                                    <div class="dropdown-menu">
                                                        <a class="dropdown-item" href="/company/{{$company->id}}">
                                                            <i class="anticon anticon-eye"></i>
                                                            <span class="m-l-10">Προβολή</span>
                                                        </a>
                                                        <a class="dropdown-item" href="/delete-company/{{$company->id}}">
                                                            <i class="anticon anticon-delete"></i>
                                                            <span class="m-l-10">Διαγραφή</span>
                                                        </a>
                                                    </div>
                                    
                                            
                                        </div>
                                        </div>  
                                        </div>
                                    </div>
                                </div>
                                @endforeach

                    </div>
                    </div>
                    </div>

                    <div class="modal fade" id="create-new-company">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">ΠΡΟΣΘΗΚΗ ΝΕΟΥ ΠΕΛΑΤΗ</h5>
                                    <button type="button" class="close" data-dismiss="modal">
                                        <i class="anticon anticon-close"></i>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form method="POST" action="/add-company">
                                        @csrf
                                        <div class="form-group">
                                            <label for="new-project-name">ΕΠΩΝΥΜΙΑ</label>
                                            <input type="text" class="form-control" id="company_name" name="company_name">
                                        </div>
                                        <div class="form-group">
                                            <label for="new-project-name">INSTAGRAM USERNAME</label>
                                            <input type="text" class="form-control" id="insta_username" name="insta_username">
                                        </div>
                                        <div class="form-group">
                                            <label for="new-project-name">INSTAGRAM EMAIL</label>
                                            <input type="text" class="form-control" id="insta_email" name="insta_email">
                                        </div>
                                        <div class="form-group">
                                            <label for="new-project-name">INSTAGRAM ΚΩΔΙΚΟΣ</label>
                                            <input type="text" class="form-control" id="insta_password" name="insta_password">
                                        </div>
                                    
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-primary">ΠΡΟΣΘΗΚΗ</button>
                                </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    
                </div>
                <!-- Content Wrapper END -->

                <!-- Footer START -->
                <footer class="footer">
                    <div class="footer-content">
                    <p class="m-b-0">Copyright © 2021 INFLU. All rights reserved. | Η εφαρμογή σχεδιάστηκε και αναπτύχθηκε από τον Λιαρόπουλο Δημήτρη.</p>
                    </div>
                </footer>
                <!-- Footer END -->

            </div>
            <!-- Page Container END -->

        </div>
    </div>

    
    <!-- Core Vendors JS -->
    <script src="assets/js/vendors.min.js"></script>

    <!-- page js -->
    <script src="assets/vendors/chartjs/Chart.min.js"></script>
    <script src="assets/js/pages/dashboard-default.js"></script>

    <!-- Core JS -->
    <script src="assets/js/app.min.js"></script>

</body>

</html>
