<?php 
    include('admin.php');
?>
<section class="home">
    <div class="grid">

        <!-- Button Add Game -->
        <div class="add-game">
            <h4 class="text">Xem sản phẩm</h4>
            <a href="./category-add.php" class="card-header">
                <button  class="btn-open-modal-add-game btn-danger">Thêm sản phẩm</button>
            </a>
        </div>
        <!-- List Games -->
        <div class="game-list">
            <table>
                <thead>
                    <tr>
                        <td>Tên sản phẩm</td>
                        <td>Giá</td>
                        <td>Trạng thái</td>
                        <td>Thao tác</td>
                    </tr>
                </thead>
                <tbody>
                    <?php if (count($games) == 0): ?>
                        <tr>
                            <td>Không tìm thấy sản phẩm</td>
                        </tr>
                    <?php else:
                                foreach ($games as $game): ?>
                            <tr>
                                <td><?= $game['name'] ?></td>
                                <td><?= $game['discount'] == 0 ? number_format($game['price']) : "<label>- ". ceil(($game['price'] - $game['discount']) * 100 / $game['price']) ."%</label>" . number_format($game['discount']) ?></td>
                                <td><?= $game['status'] == 0 ? 'Hết hàng' : 'Còn hàng' ?></td>
                                <td>
                                    <button class="edit" data-id="<?= $game['id'] ?>">Sửa</button>
                                    <button class="delete" data-id="<?= $game['id'] ?>">Xóa</button>
                                </td>
                            </tr>
                    <?php endforeach;
                        endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</section>
    

