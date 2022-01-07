
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>INFLU - Καλώς ήρθατε στο διαχειριστικό</title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="assets/images/logo/favicon.png">

    <!-- page css -->

    <!-- Core css -->
    <link href="../assets/css/app.min.css" rel="stylesheet">

</head>

<body>
    <div class="app">
        <div class="layout">
            <!-- Header START -->
            <div class="header">
                <div class="logo logo-dark">
                    <a href="/home">
                        <img src="../assets/images/logo/logo.png" alt="Logo">
                        <img class="logo-fold" src="assets/images/logo/logo-fold.png" alt="Logo">
                    </a>
                </div>
                <div class="logo logo-white">
                    <a href="/home">
                        <img src="../assets/images/logo/logo-white.png" alt="Logo">
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
                                <li  class="active">
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

                    <div class="page-header">
                        <h2 class="header-title">{{$company->name}}</h2>
                        <div class="header-sub-title">
                            <nav class="breadcrumb breadcrumb-dash">
                                <a href="/home" class="breadcrumb-item"><i class="anticon anticon-home m-r-5"></i>Αρχική</a>
                                <a class="breadcrumb-item" href="/companies">Πελάτες</a>
                                <span class="breadcrumb-item active">{{$company->name}}</span>
                            </nav>
                        </div>
                    </div>


                    <div class="container">
                        <div class="card">
                            <div class="card-body">
                                <div class="row align-items-center">
                                    <div class="col-md-7">
                                        <div class="d-md-flex align-items-center">
                                            <div class="text-center text-sm-left ">
                                                <div class="avatar avatar-image" style="width: 150px; height:150px">
                                                    <img src="../assets/images/others/thumb-1.jpg" alt="">
                                                </div>
                                            </div>
                                            <div class="text-center text-sm-left m-v-15 p-l-30">
                                                <h2 class="m-b-5">{{$company->name}}</h2>
                                                <a class="btn btn-primary" href="https://instagram.com/{{$company->insta_username}}" target="_blank">ΜΕΤΑΒΑΣΗ ΣΤΟ INSTAGRAM</a>

                                                <!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#new_competitor">
    ΠΡΟΣΘΗΚΗ 
</button>

<!-- Modal -->
<div class="modal fade" id="new_competitor">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">ΠΡΟΣΘΗΚΗ ΝΕΟΥ ΑΝΤΑΓΩΝΙΣΤΗ</h5>
                <button type="button" class="close" data-dismiss="modal">
                    <i class="anticon anticon-close"></i>
                </button>
            </div>
            <div class="modal-body">
               
                   <form method="POST" action="/add-competitor">
                    @csrf
                        <div class="form-group">
                            <label for="formGroupExampleInput">ΕΠΩΝΥΜΙΑ</label>
                            <input type="text" class="form-control" name="name" id="name">
                        </div>
                        <div class="form-group">
                            <label for="formGroupExampleInput2">INSTAGRAM USERNAME</label>
                            <input type="text" class="form-control" name="insta_username" id="insta_username">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" name="company_id" id="company_id" value="{{$company->id}}" hidden="">
                        </div>
                        <button type="submit" class="btn btn-default">ΠΡΟΣΘΗΚΗ</button>
                    </form>


            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">ΑΝΑΙΡΕΣΗ</button>
            </div>
        </div>
    </div>
</div>


                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-5">
                                        <div class="row">
                                            <div class="d-md-block d-none border-left col-1"></div>
                                            <div class="col">
                                                <ul class="list-unstyled m-t-10">
                                                    <li class="row">
                                                        <p class="col-sm-4 col-4 font-weight-semibold text-dark m-b-5">
                                                            <i class="m-r-10 text-primary anticon anticon-mail"></i>
                                                            <span>Email: </span> 
                                                        </p>
                                                        <p class="col font-weight-semibold"> {{$company->insta_email}}</p>
                                                    </li>
                                                    <li class="row">
                                                        <p class="col-sm-4 col-4 font-weight-semibold text-dark m-b-5">
                                                            <i class="m-r-10 text-primary anticon anticon-book"></i>
                                                            <span>Username: </span> 
                                                        </p>
                                                        <p class="col font-weight-semibold"> {{$company->insta_username}}</p>
                                                    </li>
                                                    <!-- <li class="row">
                                                        <p class="col-sm-4 col-5 font-weight-semibold text-dark m-b-5">
                                                            <i class="m-r-10 text-primary anticon anticon-crown"></i>
                                                            <span>Κωδικός: </span> 
                                                        </p>
                                                        <p class="col font-weight-semibold"> {{$company->insta_password}}</p>
                                                    </li> -->
                                                </ul>
                                                <a class="btn btn-dark" href="/snapshot/{{$company->id}}">Πάρε Στατιστικά</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                       </div>
                   </div>
               </div>


<div class="container">
<div class="row">
<div class="col-md-12 bg-white">

<div class="table-responsive mt-3">
    <table class="table table-bordered">
        <thead>
            <tr>
                <th scope="col">Ανταγωνιστές</th>
                <th scope="col">Username</th>
                <th scope="col">ΠΑΡΕ FOLLOWERS</th>
                <th scope="col">ΚΑΝΕ UNFOLLOW</th>
                <th scope="col">ΕΙΣΑΓΩΓΗ FOLLOWERS</th>
                <th scope="col">ΕΞΑΓΩΓΗ FOLLOWERS</th>
                <th scope="col">Ενέργειες</th>
                <th scope="col">Ημερομηνία</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($competitors as $competitor)
            <tr>
                <td>{{$competitor->name}}</td>
                <td>{{$competitor->insta_username}}</td>
                <td><a class="btn btn-warning follow-up-{{$competitor->insta_username}}" href="/start-followers/{{$competitor->id}}" data-loading-text="<i class='anticon anticon-loading'></i> Ανέβασμα Followers">Ξεκίνα</a></td>
                <td><a class="btn btn-warning follow-down-{{$competitor->insta_username}}" href="/start-unfollowers/{{$competitor->id}}" data-loading-text="<i class='anticon anticon-loading'></i> Κατέβασμα Followers">Ξεκίνα</a></td>
                <td><a class="btn btn-light" href="/run-followers/{{$competitor->id}}">Ανά 50</a></td>
                <td><a class="btn btn-light" href="/run-unfollowers/{{$competitor->id}}">Ανά 50</a></td>
                <td><a class="btn btn-danger" href="/delete-competitor/{{$competitor->id}}">Διαγραφή</a></td>
                <td>{{$competitor->created_at->format('d/m/Y')}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

</div>
</div>
</div>



<div class="container mt-4">
<div class="row">
<div class="col-md-12 bg-white">

<div class="table-responsive mt-3">
    <table class="table table-bordered">
        <thead>
            <tr>
                <th scope="col">FOLLOWERS</th>
                <th scope="col">FOLLOWS</th>
                <th scope="col">ΑΡΙΘΜΟΣ POSTS</th>
                <th scope="col">Ημερομηνία</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($statistics as $statistic)
            <tr>
                <td>{{$statistic->followers}}</td>
                <td>{{$statistic->follows}}</td>
                <td>{{$statistic->posts_number}}</td>
                <td>{{$statistic->created_at}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

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
    <script src="../assets/js/vendors.min.js"></script>

    <!-- page js -->
    <script src="../assets/vendors/chartjs/Chart.min.js"></script>
    <script src="../assets/js/pages/dashboard-default.js"></script>

    <!-- Core JS -->
    <script src="../assets/js/app.min.js"></script>

</body>

</html>
