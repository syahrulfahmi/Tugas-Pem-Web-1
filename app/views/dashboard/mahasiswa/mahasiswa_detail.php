<body>
    <div class="container-fluid pt-4">
        <section id="minimal-statistics">
            <div class="card" style="width: 18rem;">
                <div class="card-body">

                    <div class="header_img">
                        <img src="<?php echo BASEURL; ?>/img/user.png" alt="">
                    </div>
                    <h5 class="card-title mt-2"><?php echo $data['mhs']['user_name'] ?></h5>
                    <h6 class="card-subtitle mb-2 text-muted"><?php echo $data['mhs']['user_nim'] ?></h6>
                    <p class="card-text"><?php echo $data['mhs']['user_status'] ?></p>
                </div>
            </div>
        </section>
    </div>
</body>