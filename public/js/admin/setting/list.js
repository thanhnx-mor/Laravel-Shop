$(function () {
    $(document).on('click', '#btnDeleteSetting', showAlert)

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
            title: 'Xóa setting!',
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
                    'Slider đã được xóa thành công!.',
                    'success'
                )
            }
        })
    }

})
