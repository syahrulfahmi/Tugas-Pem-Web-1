$(function () {

    $('#btn_modal').on('click', function () {
        $('#judulModal').html('Tambah Data Program Studi');
        $('.modal-footer button[type="submit"]').html('Tambah Data');
        $('.modal-body form').attr('action', 'http://localhost/pemweb/public/prodi/tambah');
        $('#prod_name').val('');
    })

    $('.tampilModalUbah').on('click', function () {
        $('#judulModal').html('Ubah Data Program Studi');
        $('.modal-footer button[type="submit"]').html('Ubah Data');
        $('.modal-body form').attr('action', 'http://localhost/pemweb/public/prodi/ubah');

        const prodId = $(this).data('id');
        console.log(prodId);
        $.ajax({
            url: 'http://localhost/pemweb/public/prodi/getprodi',
            data: { prod_id: prodId },
            method: 'post',
            dataType: 'json',
            success: function (data) {
                $('#prod_name').val(data.prod_name);
                $('#prod_id').val(data.prod_id);
            }
        });
    })
})