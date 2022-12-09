$(function () {

    $('#btn_modal').on('click', function () {
        $('#judulModal').html('Tambah Data Mahasiswa');
        $('.modal-footer button[type="submit"]').html('Tambah Data');
        $('.modal-body form').attr('action', 'http://localhost/pemweb/public/mahasiswa/tambah');
        $('#nama').val('');
        $('#nim').val('');
        $('#jurusan').val('');
    })

    $('.tampilModalUbah').on('click', function () {
        $('#judulModal').html('Ubah Data Mahasiswa');
        $('.modal-footer button[type="submit"]').html('Ubah Data');
        $('.modal-body form').attr('action', 'http://localhost/pemweb/public/mahasiswa/ubah');

        const userNim = $(this).data('id');
        $.ajax({
            url: 'http://localhost/pemweb/public/mahasiswa/getubah',
            data: { user_nim: userNim },
            method: 'post',
            dataType: 'json',
            success: function (data) {
                console.log(data);
                $('#nama').val(data.user_name);
                $('#nim').val(data.user_nim);
                $('#jurusan').val(data.user_prod);
                $('#id').val(data.user_id);
            }
        });
    })
})