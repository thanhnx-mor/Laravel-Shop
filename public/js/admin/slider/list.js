$(function () {
    $(document).on('click', '#btnDelete', showAlert)

    const swalWithBootstrapButtons = Swal.mixin({
        customClass: {
            confirmButton: 'btn btn-success ml-3',
            cancelButton: 'btn btn-danger'
        },
        buttonsStyling: false
    })

    function showAlert(evt) {
        evt.preventDefault();
        const current = $(this);
        let urlRequest =  $(this).data('url');
        swalWithBootstrapButtons.fire({
            title: 'Xóa!',
            text: "Bạn sẽ không thể khôi phục được nó!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Xóa',
            cancelButtonText: 'Hủy bỏ',
            reverseButtons: true
        }).then((result) => {
            if (result.value) {
                $.ajax({
                    type: 'GET',
                    url: urlRequest,
                    success: (res) => {
                        current.parent().parent().remove();
                    },
                    error: (err) => {
                    }
                })


                swalWithBootstrapButtons.fire(
                    'Xóa thành công!',
                    'Xóa thành công!.',
                    'success'
                )
            }
        })
    }

})
