$(function () {
    $(document).on('click', '#btnDeleteSlider', showAlert)

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
            title: 'Xóa slider!',
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
            // else if (
            //     /* Read more about handling dismissals below */
            //     result.dismiss === Swal.DismissReason.cancel
            // ) {
            //     swalWithBootstrapButtons.fire(
            //         'Hủy bỏ',
            //         'Hủy bỏ xóa sản phẩm!',
            //         'error'
            //     )
            // }
        })
    }

})
