<?php
$list = OrderDAO::getInstance()->getAll();
?>
<style>
    .truncate {
        width: 250px;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
    }
</style>
<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body table-responsive">
            <table class="table table-bordered ">
                <thead>
                    <tr>
                        <th scope="col"> Mã đơn hàng </th>
                        <th> Email khách hàng </th>
                        <th> Tên khách hàng </th>
                        <th> Ngày mua </th>
                        <th> Tổng tiền </th>
                        <th> Tổng sản phẩm </th>
                        <th> Phương thức thanh toán </th>
                        <th> Trạng thái đơn hàng </th>
                        <th> Mã QR code </th>
                        <th> # </th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($list as $item) {
                        echo "<tr>";
                        echo "<td scope='row'>" . $item->getOrderId() . "</td>";
                        echo "<td class='text-truncate' style='max-width: 250px;' title='" . $item->getUser()->getEmail() . "'>" . $item->getUser()->getEmail() . "</td>";
                        echo "<td>" . $item->getUser()->getFullName() . "</td>";
                        echo "<td>" . $item->getOrderDate() . "</td>";
                        echo "<td>" . (number_format($item->getTotalPrice(), 0, '', ',')) . " đ</td>";
                        echo "<td>" . $item->getTotalQuantity() . "</td>";
                        echo "<td>" . $item->getPaymentMethod() . "</td>";
                        echo "<td>" . $item->getStatus() . "</td>";
                        echo "<td><img src='" . $item->getQrCode() . "' alt='PET_MART' class='mt-2' style='width: 100px; height: 100px;' /></td>";
                        echo "<td>
                                <a href='index.php?page=order&act=edit&id=" . $item->getProductId() . "' class='btn btn-warning'>Sửa</a>
                                <a href='index.php?page=order&act=delete&id=" . $item->getProductId() . "' class='btn btn-outline-danger'>Xóa</a>
                            </td>";
                        echo "</tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>