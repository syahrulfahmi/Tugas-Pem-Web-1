<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" type="text/css" href="https://pixinvent.com/stack-responsive-bootstrap-4-admin-template/app-assets/fonts/simple-line-icons/style.min.css">
    <link rel="stylesheet" type="text/css" href="https://pixinvent.com/stack-responsive-bootstrap-4-admin-template/app-assets/css/colors.min.css">
</head>

<body>
    <div class="container-fluid">
        <section id="minimal-statistics">
            <div class="row">
                <div class="col-12 mt-5 mb-1">
                    <h4 class="text-uppercase">Selamat datang di dashboard</h4>
                </div>
                <div class="row">
                    <div class="col-xl-3 col-sm-6 col-12">
                        <div class="card">
                            <div class="card-content">
                                <div class="card-body cleartfix">
                                    <div class="media align-items-stretch">
                                        <div class="media-body text-left">
                                            <h3 class="success">20</h3>
                                            <span>Transaksi</span>
                                        </div>
                                        <div class="align-self-center">
                                            <i class="icon-wallet success font-large-2"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-3 col-sm-6 col-12">
                        <div class="card">
                            <div class="card-content">
                                <div class="card-body">
                                    <div class="media d-flex">
                                        <div class="media-body text-left">
                                            <h3 class="success"><? echo sizeof($data['jml_mhs']) ?></h3>
                                            <span>Siswa</span>
                                        </div>
                                        <div class="align-self-center">
                                            <i class="icon-user success font-large-2 float-right"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-sm-6 col-12">
                        <div class="card">
                            <div class="card-content">
                                <div class="card-body">
                                    <div class="media d-flex">
                                        <div class="media-body text-left">
                                            <h3 class="primary">24</h3>
                                            <span>Kelas</span>
                                        </div>
                                        <div class="align-self-center">
                                            <i class="icon-book-open primary font-large-2 float-right"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        </section>

    </div>
</body>

</html>