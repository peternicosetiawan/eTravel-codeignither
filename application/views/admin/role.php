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
                    <button data-toggle="modal" data-target="#addMenu" id="#modalCenter" class="btn btn-primary"> Add New Role</button>
                </div>


                <div class="table-responsive p-3">
                    <?= $this->session->flashdata('message'); ?>
                    <table class="table align-items-center table-flush table-hover" id="dataTableHover">

                        <thead class="thead-light">
                            <tr>
                                <th>#</th>
                                <th>Role</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            foreach ($role as $r) :
                            ?>
                                <tr>
                                    <td width="20"><?= $no++; ?></td>
                                    <td><?= $r['role']; ?></td>
                                    <td width="150">
                                        <a style="cursor:pointer;" href="<?= base_url('admin_524535/roleaccess/') . $r['id']; ?>" class="btn btn-success btn-sm"><i class="fas fa-fw fa-check-circle"></i></a>
                                        <div style="cursor:pointer;" data-toggle="modal" data-target="#editRole<?php echo $r['id'] ?>" class="btn btn-info btn-sm"><i class="fa fa-fw fa-edit"></i></div>
                                        <div style="cursor:pointer;" onclick="deletedata(<?= $r['id'] ?>)" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i></div>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>

                        <tfoot>
                            <tr>
                                <th>#</th>
                                <th>Position</th>
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
<div class="modal fade" id="addMenu" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">Add New Role</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="post" action="<?= base_url('menu_524535/Addmenu'); ?>">
                <div class="modal-body">

                    <div class="form-group">
                        <label>New Menu :</label>
                        <input type="text" class="form-control" id="menu" name="menu">
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
foreach ($role as $r) : $no++; ?>
    <div class="modal fade" id="editRole<?php echo $r['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalCenterTitle">Form Edit Menu</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="post" action="<?= base_url('admin_524535/edit'); ?>">
                    <div class="modal-body">

                        <div class="form-group">
                            <input type="hidden" class="form-control" id="id" name="id" value="<?= $r['id']; ?>">
                            <label>Edit Menu :</label>
                            <input type="text" class="form-control" id="role" name="role" value="<?= $r['role']; ?>">
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
                    url: "<?= base_url('admin_524535/delete/') ?>",
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
</script>