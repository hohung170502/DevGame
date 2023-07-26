// const btnCancelModal = $('.btn-cancel-modal');

// btnCancelModal.on('click', function () {
//     $(this).closest('.modal-game').css('display', 'none');
// });

// const btnOpenModal = $('.btn-open-modal-add-game');

// btnOpenModal.on('click', function () {
//     $('.modal-add-game').css('display', 'flex');
// });

// const btnAddGame = $('.btn-add-game');

// btnAddGame.on('click', function () {
//     const name = $('#name').val();
//     const price = $('#price').val();
//     const discount = $('#discount').val();
//     const description = $('#description').val();
//     const status = $('#status').val();
//     const type = $('#type').val();
//     const image = $('#image').prop('files')[0];

//     if (name == '' || price == '') {
//         alert('Không được để trống tên hoặc giá tiền');
//         return;
//     }

//     var formData = new FormData();
//     formData.append('name', name);
//     formData.append('price', price);
//     formData.append('discount', discount);
//     formData.append('description', description);
//     formData.append('status', status);
//     formData.append('type', type);
//     formData.append('image', image);
    
//     $.ajax({
//        url: './backend.php?action=addGame',
//        type: 'POST',
//        data: formData,
//        contentType: false,
//        processData: false,
//        success: function(data) {
//             data = JSON.parse(data);
//             if (data.status) {
//                 alert(data.message);
//                 location.reload();
//                 return;
//             }
//             alert(data.message);
//        },
//        error: function(data) {
//            // do something
//        }
//     });

// });

// $(document).on('click', '.delete', function () {
//     const id = $(this).attr('data-id');

//     $.ajax({
//         url: './backend.php?action=deleteGame',
//         type: 'POST',
//         data: {
//             id: id
//         },
//     success: function(data) {
//         data = JSON.parse(data);
//         if (data.status) {
//             alert(data.message);
//             location.reload();
//             return;
//         }
//         alert(data.message);
//     },
//     error: function(data) {
//         // do something
//     }
//     });
// });

// $(document).on('click', '.edit', function () {
//     const id = $(this).attr('data-id');

//     $.ajax({
//         url: './backend.php?action=getDetail',
//         type: 'POST',
//         data: {
//             id: id
//         },
//     success: function(data) {
//         data = JSON.parse(data);
//         if (data.status) {
//             $('.modal-edit-game').css('display', 'flex');

//             data = data.data;
//             $('#name-edit').val(data.name);
//             $('#price-edit').val(data.price);
//             $('#discount-edit').val(data.discount);
//             $('#description-edit').val(data.desc);
//             $('#status-edit').val(data.status);
//             $('#id-edit').val(data.id);
//             $('#type-edit').val(data.type);
//             return;
//         }
//         alert(data.message);
//     },
//     error: function(data) {
//         // do something
//     }
//     });
// });

// $(document).on('click', '.btn-update-game', function () {
//     const id = $('#id-edit').val();
//     const name = $('#name-edit').val();
//     const price = $('#price-edit').val();
//     const discount = $('#discount-edit').val();
//     const description = $('#description-edit').val();
//     const status = $('#status-edit').val();
//     const type = $('#type-edit').val();
//     const image = $('#image-edit').prop('files')[0];

//     if (name == '' || price == '') {
//         alert('Không được để trống tên hoặc giá tiền');
//         return;
//     }

//     var formData = new FormData();
//     formData.append('name', name);
//     formData.append('price', price);
//     formData.append('discount', discount);
//     formData.append('description', description);
//     formData.append('status', status);
//     formData.append('type', type);
//     formData.append('image', image);
//     formData.append('id', id);
    
//     $.ajax({
//        url: './backend.php?action=updateGame',
//        type: 'POST',
//        data: formData,
//        contentType: false,
//        processData: false,
//        success: function(data) {
//             data = JSON.parse(data);
//             if (data.status) {
//                 alert(data.message);
//                 location.reload();
//                 return;
//             }
//             alert(data.message);
//        },
//        error: function(data) {
//            // do something
//        }
//     });
// });