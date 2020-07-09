<!-- Container Fluid-->
<div class="container-fluid" id="container-wrapper">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?= $title; ?></h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="./">Home</a></li>
            <li class="breadcrumb-item">Pages</li>
            <li class="breadcrumb-item active" aria-current="page"><?= $title; ?></li>
        </ol>
    </div>

    <div class="row">
        <!-- Alerts Basic -->
        <div class="col-lg-6">
            <div class="cardd shadow-sm mb-4">
                <div class="card-body firstinfo">

                    <img width="100" src="<?= base_url(); ?>assets/img/user.png" />
                    <h1><?= $user['name']; ?></h1>
                    <h4><?= $user['email']; ?></h4>
                    <p class="bio">Member since <?= date('d F Y', $user['date_created']); ?></p>

                </div>
            </div>
        </div>
    </div>

</div>
<!---Container Fluid-->