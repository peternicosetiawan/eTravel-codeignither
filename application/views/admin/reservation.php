<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/css/bootstrap-datepicker.css" rel="stylesheet">

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/js/bootstrap-datepicker.js"></script>
<!-- Container Fluid-->
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


        <div class="col-lg-12">
            <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <form method="post" action="<?= base_url('admin_524535/getChart'); ?>">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="form-group pl-2">
                                    <label>Add Year :</label>
                                    <input type="text" class="date-own form-control" id="year" name="year" value="">
                                </div>
                                <div class="form-group pl-2">
                                    <label>Add Month :</label>
                                    <input type="text" class="date-owns form-control" id="month" name="month" value="">
                                </div>
                                <div class="form-group pl-2" style="padding-top: 35px;">
                                    <label></label>
                                    <button type="submit" data-toggle="modal" data-target="#addreserv" id="#modalCenter" class="btn btn-primary"> Search Chart</button>
                                </div>
                                <div class="form-group pl-2" style="padding-top: 35px;">
                                    <label></label>
                                    <a href="<?= base_url('admin_524535/getExcel'); ?>" class="btn btn-primary"> <i class="fas fa-file-excel"></i> Expor</a>
                                </div>

                            </div>
                        </div>
                    </form>
                </div>


                <div class="table-responsive p-3">
                    <?= $this->session->flashdata('message'); ?>
                    <table class="table align-items-center table-flush table-hover" id="dataTableHover">

                        <thead class="thead-light">
                            <tr>
                                <th>#</th>
                                <th>Reservation Id</th>
                                <th>Name</th>
                                <th>Tlp</th>
                                <th>Reservation Date</th>
                                <th>Destination</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            foreach ($destination as $r) :
                            ?>
                                <tr>
                                    <td width="20"><?= $no++; ?></td>
                                    <td><?= $r['id_reservation']; ?></td>
                                    <td><?= $r['name']; ?></td>
                                    <td><?= $r['no_tlp']; ?></td>
                                    <td><?= date('d/m/Y', strtotime($r['birth_date'])); ?></td>
                                    <td><?= $r['destination']; ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>

                        <tfoot>
                            <tr>
                                <th>#</th>
                                <th>Reservation Id</th>
                                <th>Name</th>
                                <th>Tlp</th>
                                <th>Reservation Date</th>
                                <th>Destination</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>

    </div>

</div>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">
    google.charts.load('current', {
        packages: ['corechart', 'bar']
    });
    google.charts.setOnLoadCallback();

    $('.date-own').datepicker({

        minViewMode: 2,

        format: 'yyyy'

    });
    $('.date-owns').datepicker({

        minViewMode: 1,

        format: 'mm'

    });
</script>