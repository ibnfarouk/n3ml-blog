$(document).ready(function () {
    $('.delete-item').click(function () {
        let el = $(this);
        Swal.fire({
            title: "Are you sure?",
            text: "You won't be able to revert this!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Yes, delete it!"
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: el.data('route'),
                    type: 'post',
                    data: {
                        _token: window.csrfToken,
                        _method: 'delete'
                    },
                    success: function (response) {
                        if(response.status === 'success') {
                            el.parent().parent().remove();
                            Swal.fire({
                                title: "Deleted!",
                                text: response.message,
                                icon: "success"
                            });
                        }else{
                            Swal.fire({
                                title: "Error!",
                                text: response.message,
                                icon: "error"
                            });
                        }
                    }
                });

            }
        });
    });
});
