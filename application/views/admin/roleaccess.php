<!-- Container Fluid-->
<div class="container-fluid" id="container-wrapper">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?= $title; ?> <?= $role['role']; ?></h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="./">Home</a></li>
            <li class="breadcrumb-item">Pages</li>
            <li class="breadcrumb-item active" aria-current="page"><?= $title; ?></li>
        </ol>
    </div>

    <div class="row">

        <div class="col-lg-12">
            <div class="card mb-4">


                <div class="table-responsive p-3">

                    <?= $this->session->flashdata('message'); ?>

                    <table class="table align-items-center table-flush table-hover" id="dataTableHover">

                        <thead class="thead-light">
                            <tr>
                                <th>#</th>
                                <th>Menu</th>
                                <th>Access</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            foreach ($menu as $m) :
                            ?>
                                <tr>
                                    <td width="20"><?= $no++; ?></td>
                                    <td><?= $m['menu']; ?></td>
                                    <td width="50" style="text-align:center;">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" <?= check_access($role['id'], $m['id']); ?> data-role="<?= $role['id']; ?>" data-menu="<?= $m['id']; ?>">
                                        </div>
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
<script>
    $('.form-check-input').on('click', function() {
        const menuId = $($this).data('menu');
        const roleId = $($this).data('role');

        $.ajax({
            url: "<?= base_url('admin_524535/changeaccess'); ?>",
            type: 'post',
            data: {
                menuId: menuId,
                roleId: roleId
            },
            success: function() {
                document.location.href = "<?= base_url('admin/roleaccess/'); ?>" + roleId;
            }
        });
    });
</script>