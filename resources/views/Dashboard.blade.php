@extends('template.app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="row">
                    <div class="col-md-6 col-lg-3">
                        <div class="iq-card iq-card-block iq-card-stretch iq-card-height">
                            <div class="iq-card-body iq-bg-primary rounded">
                                <div class="d-flex align-items-center justify-content-between">
                                    <div class="rounded-circle iq-card-icon bg-primary"><i class="ri-user-fill"></i></div>
                                    <div class="text-right">
                                        <h2 class="mb-0"><span class="counter">5600</span></h2>
                                        <h5 class="">Doctors</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-3">
                        <div class="iq-card iq-card-block iq-card-stretch iq-card-height">
                            <div class="iq-card-body iq-bg-warning rounded">
                                <div class="d-flex align-items-center justify-content-between">
                                    <div class="rounded-circle iq-card-icon bg-warning"><i class="ri-women-fill"></i></div>
                                    <div class="text-right">
                                        <h2 class="mb-0"><span class="counter">3450</span></h2>
                                        <h5 class="">Nurses</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-3">
                        <div class="iq-card iq-card-block iq-card-stretch iq-card-height">
                            <div class="iq-card-body iq-bg-danger rounded">
                                <div class="d-flex align-items-center justify-content-between">
                                    <div class="rounded-circle iq-card-icon bg-danger"><i class="ri-group-fill"></i></div>
                                    <div class="text-right">
                                        <h2 class="mb-0"><span class="counter">3500</span></h2>
                                        <h5 class="">Patients</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-3">
                        <div class="iq-card iq-card-block iq-card-stretch iq-card-height">
                            <div class="iq-card-body iq-bg-info rounded">
                                <div class="d-flex align-items-center justify-content-between">
                                    <div class="rounded-circle iq-card-icon bg-info"><i class="ri-hospital-line"></i></div>
                                    <div class="text-right">
                                        <h2 class="mb-0"><span class="counter">4500</span></h2>
                                        <h5 class="">Pharmacists</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-12">
                <div class="iq-card iq-card-block iq-card-stretch iq-card-height">
                    <div class="iq-card-header d-flex justify-content-between">
                        <div class="iq-header-title">
                            <h4 class="card-title">Hospital Survey</h4>
                        </div>
                    </div>
                    <div class="iq-card-body pb-0 mt-3">
                        <div class="row text-center">
                            <div class="col-sm-3 col-6">
                                <h4 class="margin-0">$ 305 </h4>
                                <p class="text-muted"> Today's Income</p>
                            </div>
                            <div class="col-sm-3 col-6">
                                <h4 class="margin-0">$ 999 </h4>
                                <p class="text-muted">This Week's Income</p>
                            </div>
                            <div class="col-sm-3 col-6">
                                <h4 class="margin-0">$ 4999 </h4>
                                <p class="text-muted">This Month's Income</p>
                            </div>
                            <div class="col-sm-3 col-6">
                                <h4 class="margin-0">$ 90,000 </h4>
                                <p class="text-muted">This Year's Income</p>
                            </div>
                        </div>
                    </div>
                    <div id="home-servey-chart"></div>
                </div>
            </div>
            <div class="col-sm-12">
                <div class="iq-card iq-card-block iq-card-stretch iq-card-height">
                    <div class="iq-card-header d-flex justify-content-between">
                        <div class="iq-header-title">
                            <h4 class="card-title">Hospital Staff</h4>
                        </div>
                    </div>
                    <div class="iq-card-body">
                        <ul id="doster-list-slide" class="d-flex flex-wrap align-items-center p-0">
                            <li class="doctor-list-item col-md-3 text-center p-2">
                                <div class="doctor-list-item-inner rounded">
                                    <div class="donter-profile">
                                        <img src="{{ url('admin') }}/images/user/05.jpg" class="img-fluid rounded-circle" alt="user-img">
                                    </div>
                                    <div class="doctor-detail mt-3">
                                        <h5>Dr. Paul Molive</h5>
                                        <h6>Doctor</h6>
                                    </div>
                                    <hr>
                                    <div class="doctor-description">
                                        <p class="mb-0 text-center pl-2 pr-2">California Hospital Medical Center</p>
                                    </div>
                                </div>
                            </li>
                            <li class="doctor-list-item col-md-3 text-center p-2">
                                <div class="doctor-list-item-inner rounded">
                                    <div class="donter-profile">
                                        <img src="{{ url('admin') }}/images/user/06.jpg" class="img-fluid rounded-circle" alt="user-img">
                                    </div>
                                    <div class="doctor-detail mt-3">
                                        <h5>Dr. Paul Molive</h5>
                                        <h6>Nurse</h6>
                                    </div>
                                    <hr>
                                    <div class="doctor-description">
                                        <p class="mb-0 text-center pl-2 pr-2">California Hospital Medical Center</p>
                                    </div>
                                </div>
                            </li>
                            <li class="doctor-list-item col-md-3 text-center p-2">
                                <div class="doctor-list-item-inner rounded">
                                    <div class="donter-profile">
                                        <img src="{{ url('admin') }}/images/user/07.jpg" class="img-fluid rounded-circle" alt="user-img">
                                    </div>
                                    <div class="doctor-detail mt-3">
                                        <h5>Dr. Paul Molive</h5>
                                        <h6>Surgeon</h6>
                                    </div>
                                    <hr>
                                    <div class="doctor-description">
                                        <p class="mb-0 text-center pl-2 pr-2">California Hospital Medical Center</p>
                                    </div>
                                </div>
                            </li>
                            <li class="doctor-list-item col-md-3 text-center p-2">
                                <div class="doctor-list-item-inner rounded">
                                    <div class="donter-profile">
                                        <img src="{{ url('admin') }}/images/user/08.jpg" class="img-fluid rounded-circle" alt="user-img">
                                    </div>
                                    <div class="doctor-detail mt-3">
                                        <h5>Dr. Paul Molive</h5>
                                        <h6>Doctor</h6>
                                    </div>
                                    <hr>
                                    <div class="doctor-description">
                                        <p class="mb-0 text-center pl-2 pr-2">California Hospital Medical Center</p>
                                    </div>
                                </div>
                            </li>
                            <li class="doctor-list-item col-md-3 text-center p-2">
                                <div class="doctor-list-item-inner rounded">
                                    <div class="donter-profile">
                                        <img src="{{ url('admin') }}/images/user/09.jpg" class="img-fluid rounded-circle" alt="user-img">
                                    </div>
                                    <div class="doctor-detail mt-3">
                                        <h5>Dr. Paul Molive</h5>
                                        <h6>Surgeon</h6>
                                    </div>
                                    <hr>
                                    <div class="doctor-description">
                                        <p class="mb-0 text-center pl-2 pr-2">California Hospital Medical Center</p>
                                    </div>
                                </div>
                            </li>
                            <li class="doctor-list-item col-md-3 text-center p-2">
                                <div class="doctor-list-item-inner rounded">
                                    <div class="donter-profile">
                                        <img src="{{ url('admin') }}/images/user/10.jpg" class="img-fluid rounded-circle" alt="user-img">
                                    </div>
                                    <div class="doctor-detail mt-3">
                                        <h5>Dr. Paul Molive</h5>
                                        <h6>OT Assistent</h6>
                                    </div>
                                    <hr>
                                    <div class="doctor-description">
                                        <p class="mb-0 text-center pl-2 pr-2">California Hospital Medical Center</p>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
