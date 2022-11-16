<div class="subMenu">
    <span>
        <a class="active" href="./withdrawal.php?page=1">Pending</a>
        <a href="./withdrawal.php?page=0">Paid</a>
    </span>
</div>
<div class="subContent" id="withdraw">
    <div class="overflowTable">
        <table>
            <thead>
                <tr>
                    <th>Sn</th>
                    <th>Username</th>
                    <th>Account Type</th>
                    <th>Account Wallet</th>
                    <th>Account Address</th>
                    <th>Amount</th>
                    <th>Date Created</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>Joseph</td>
                    <td>Bitcoin</td>
                    <td>$46,300.00</td>
                    <td>dmdkjdkd78idjpkknkdkdmkd</td>
                    <td>$16,300.00</td>
                    <td><?php echo date("D d-m-Y") ?></td>
                    <td> <span class="pending">Pending</span> </td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>Joseph</td>
                    <td>Ethereum</td>
                    <td>$46,300.00</td>
                    <td>dmdkjdkd78idjpkknkdkdmkd</td>
                    <td>$16,300.00</td>
                    <td><?php echo date("D d-m-Y") ?></td>
                    <td> <span class="pending">Pending</span> </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>