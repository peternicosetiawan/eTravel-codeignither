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
                    <button data-toggle="modal" data-target="#addreserv" id="#modalCenter" class="btn btn-primary"> New Reservation</button>
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
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            foreach ($reserv as $r) :
                            ?>
                                <tr>
                                    <td width="20"><?= $no++; ?></td>
                                    <td><?= $r['id_reservation']; ?></td>
                                    <td><?= $r['name']; ?></td>
                                    <td><?= $r['no_tlp']; ?></td>
                                    <td><?= date('d/m/Y', strtotime($r['birth_date'])); ?></td>
                                    <td width="150">
                                        <a style="cursor:pointer;" href="<?= base_url('user_524535/pdf/') . $r['id_reservation']; ?>" class="btn btn-warning btn-sm"><i class="fas fa-fw fa-file-pdf"></i></a>
                                        <div style="cursor:pointer;" data-toggle="modal" data-target="#editMenu<?php echo $r['id'] ?>" class="btn btn-info btn-sm"><i class="fa fa-fw fa-edit"></i></div>
                                        <div style="cursor:pointer;" onclick="deletedata(<?= $r['id'] ?>)" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i></div>
                                    </td>
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
                                <th>Action</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>

    </div>

</div>
<!---Container Fluid-->

<!-- Modal Center -->
<div class="modal fade" id="addreserv" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">Add New Reservation</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="post" action="<?= base_url('user_524535/inputReservation'); ?>">
                <div class="modal-body">

                    <div class="form-group">
                        <label>Reservation Id :</label>
                        <input type="text" class="form-control" id="id_reservation" name="id_reservation" value="<?= $kode ?>" readonly>
                    </div>
                    <div class="form-group">
                        <label>Name :</label>
                        <input type="text" class="form-control" id="name" name="name">
                    </div>
                    <div class="form-group">
                        <label>address :</label>
                        <input type="text" class="form-control" id="address" name="address">
                    </div>
                    <div class="form-group">
                        <label for="sex">Sex</label>
                        <select class="form-control" id="sex" name="sex">
                            <option>Male</option>
                            <option>Female</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Reservation For :</label>
                        <input type="date" class="form-control" id="birth_date" name="birth_date">
                    </div>
                    <div class="form-group">
                        <label>Tlp :</label>
                        <input onkeypress="return isNumberKey(event)" type="text" name="no_tlp" class="form-control" id="no_tlp">
                    </div>
                    <div class="form-group">
                        <label for="sex">Destination</label>
                        <select class="form-control" id="destination" name="destination" onchange="test()">
                            <option>--Select Destination--</option>
                            <?php foreach ($destination as $d) : ?>
                                <option value=<?= $d['price'] ?>><?= $d['destination'] ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <input type="hidden" class="form-control" id="dst" name="dst" readonly>
                    </div>

                    <div class="form-group">
                        <label>Price :</label>
                        <input type="text" class="form-control" id="price" name="price" readonly>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-primary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>

<?php
$no = 0;
foreach ($reserv as $r) : $no++; ?>
    <div class="modal fade" id="editMenu<?php echo $r['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalCenterTitle">Form Edit Reservation</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="post" action="<?= base_url('user_524535/edit'); ?>">
                    <div class="modal-body">

                        <div class="form-group">
                            <input type="hidden" class="form-control" id="id" name="id" value="<?= $r['id']; ?>">
                            <label>Reservation id :</label>
                            <input type="text" class="form-control" id="id_reservation" name="id_reservation" value="<?= $r['id_reservation']; ?>" readonly>
                        </div>
                        <div class="form-group">
                            <label>Name :</label>
                            <input type="text" class="form-control" id="name" name="name" value="<?= $r['name']; ?>">
                        </div>
                        <div class="form-group">
                            <label>address :</label>
                            <input type="text" class="form-control" id="address" name="address" value="<?= $r['address']; ?>">
                        </div>
                        <div class="form-group">
                            <label for="sex">Sex</label>
                            <select class="form-control" id="sex" name="sex" value="<?= $r['sex']; ?>">
                                <option>Male</option>
                                <option>Female</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Birth Date :</label>
                            <input type="date" class="form-control" id="birth_date" name="birth_date" value="<?= $r['birth_date']; ?>">
                        </div>
                        <div class="form-group">
                            <label>Tlp :</label>
                            <input onkeypress="return isNumberKey(event)" type="text" name="no_tlp" class="form-control" id="no_tlp" value="<?= $r['no_tlp']; ?>">
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-primary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php endforeach; ?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script>
    function deletedata(id) {
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.value) {
                $.ajax({
                    url: "<?= base_url('user_524535/deletersv/') ?>",
                    type: "get",
                    data: {
                        id: id
                    },
                    success: function() {
                        Swal.fire(
                                'Deleted!',
                                'Your file has been deleted.',
                                'success'
                            ),
                            setTimeout(function() {
                                window.location.reload(1);
                            }, 1000);
                    },
                    error: function() {
                        Swal.fire(
                            'Deleted!',
                            'Your file can not deleted.',
                            'error'
                        )
                    }
                });
            }
        })
    }

    function isNumberKey(evt) {
        var charCode = (evt.which) ? evt.which : evt.keyCode;
        if (charCode != 46 && charCode > 31 &&
            (charCode < 48 || charCode > 57))
            return false;
        return true;
    }
    // $(document).ready(function() {
    //     $('#destination').change(function() {
    //         var id = $(this).val();
    //         alert(id);
    //         // $.ajax({
    //         //     url: "<?php echo base_url(); ?>index.php/kategori/get_subkategori",
    //         //     method: "POST",
    //         //     data: {
    //         //         id: id
    //         //     },
    //         //     async: false,
    //         //     dataType: 'json',
    //         //     success: function(data) {
    //         //         var html = '';
    //         //         var i;
    //         //         for (i = 0; i < data.length; i++) {
    //         //             html += '<option>' + data[i].subkategori_nama + '</option>';
    //         //         }
    //         //         $('.subkategori').html(html);
    //         //     }
    //         // });
    //         //document.getElementById('price').innerHTML = id;
    //     });
    // });

    function test() {
        var e = document.getElementById("destination");
        var result = e.options[e.selectedIndex].value;
        //alert(result);
        var dest = e.options[e.selectedIndex].text;
        $("#dst").val(dest);
        $("#price").val(result);
    }
    $('#date').datepicker({
        dateFormat: 'dd-mm-yy'
    }).val();
</script>