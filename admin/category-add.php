
<?php 
    include('admin.php');
    
    

    
    
?>

<section class="home  ">
    <div class="container-fluid px-4">
         <div class="row mt-4">
            <div class="col-md-12">
                <div class="card-header">
                    <h4 class="text">Thêm sản phẩm</h4>
                    <a href="category-view.php" class="btn btn-danger float-end">Quay lại</a>

                       
                        <div class="col-md-12">
                            <div class="modal-body">
                                <div class="row modal-right">
                                    <div class="form-group">
                                        <label for="name">Tên sản phẩm</label>
                                        <input type="text" class="form-control" id="name" name="name" placeholder="Nhập tên sản phẩm">
                                    </div>
                                    <div class="form-group">
                                        <label for="price">Giá sản phẩm</label>
                                        <input type="number" class="form-control" id="price" name="price" placeholder="Nhập giá sản phẩm">
                                    </div>
                                    <div class="form-group">
                                        <label for="discount">Giảm giá</label>
                                        <input type="number" class="form-control" id="discount" name="discount" placeholder="Nhập giá sản phẩm">
                                    </div>
                                    <div class="form-group">
                                        <label for="description">Mô tả</label>
                                        <textarea class="form-control" id="description" name="description" rows="3"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="type">Thể loại</label>
                                        <select class="form-control" id="type" name="type">
                                            <option value="0">Steam</option>
                                            <option value="1">Epic</option>
                                            <option value="2">Code Wallet</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="status">Trạng thái</label>
                                        <select class="form-control" id="status" name="status">
                                            <option value="1">Còn hàng</option>
                                            <option value="0">Hết hàng</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="image">Ảnh sản phẩm</label>
                                        <input type="file" class="form-control-file" id="image" name="image">
                                    </div>
                                    <div class="btn-group">
                                        <button class="btn-add-game">Thêm sản phẩm</button>
                                        <button class="btn-cancel-modal">Hủy</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    

                    
                </div>
            </div>
         </div>
    </div>



    
</section>


