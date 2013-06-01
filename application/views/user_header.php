<div id="userplace clearfix">
    <div class="userinfo">
        <div class="ushead">
            <img src="http://tx1.douguo.net/upload/photo/d/b/d/1340163726.jpg" alt="<?php echo $user->realname ?>">
        </div>
        <div class="uscome">
            <div class="mb20 clearfix">
                <h1 class="mb3"><?php echo $user->realname ?></h1>
                <div class="clearfix">
                    <span class="fcc">北京 腾讯</span>
                </div>
            </div>
            <p id="uchome_desc_full" class="pingro mb25">这个勤劳的吃货还没有机会写介绍<span></span></p>
            <?php if ($logged_in && $userid == $user->objectId) {
                ?>
                <ul class="nav nav-pills">
                    <li <?php if ($title == 'ipost') {
                        echo 'class="active"';
                    } ?>>
                        <a href="/users/post/<?php echo $userid ?>">我带过的饭</a>
                    </li>
                    <li <?php if ($title == 'iorder') {
                        echo 'class="active"';
                    } ?>><a href="/users/order/<?php echo $userid ?>">我吃过的饭</a></li>
                </ul>
            <?php } else { ?>
                <ul class="nav nav-pills">
                    <li <?php if ($title == 'ipost') {
                        echo 'class="active"';
                    } ?>>
                        <a href="/users/post/<?php echo $user->objectId ?>">TA带过的饭</a>
                    </li>
                    <li <?php if ($title == 'iorder') {
                        echo 'class="active"';
                    } ?>><a href="/users/order/<?php echo $user->objectId ?>">TA吃过的饭</a></li>
                </ul>
            <?php } ?>
        </div>
        <div class="numifo">
            <ul class="unstyled">
                <li><a href="#"><?php echo $post_count ?></a><br />带过</li>
                <li><a href="#"><?php echo $order_count ?></a><br />吃过</li>
                <li><a href="#"><?php echo $post_order_count ?></a><br />帮助人数</li>
            </ul>
        </div>
    </div>
</div>