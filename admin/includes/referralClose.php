<div class="subMenu">
    <span>
        <a href="./referral.php?page=2">Pending</a>
        <a href="./referral.php?page=0">Paid</a>
        <a class="active" href="./referral.php?page=1">Settled</a>
    </span>
</div>
<div class="subContent" id="referrals">
    <div class="overflowTable">
        <table>
            <thead>
                <tr>
                    <th>Sn</th>
                    <th>Plan</th>
                    <th>ReferredBy</th>
                    <th>New User</th>
                    <th>Amount</th>
                    <th>Bonus</th>
                    <th>Date Created</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>Classic</td>
                    <td>Code</td>
                    <td>Loveth</td>
                    <td>$46,300.00</td>
                    <td>$46.00</td>
                    <td><?php echo date("D d-m-Y") ?></td>
                    <td> <span class="closed">Settled</span> </td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>Premium</td>
                    <td>Code</td>
                    <td>Loveth</td>
                    <td>$46,300.00</td>
                    <td>$46.00</td>
                    <td><?php echo date("D d-m-Y") ?></td>
                    <td> <span class="closed">Settled</span> </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>