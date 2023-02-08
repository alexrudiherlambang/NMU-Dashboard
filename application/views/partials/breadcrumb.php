<ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
    <!--begin::Item-->
    <?php foreach ($this->uri->segments as $segment ):?>
        <?php
            $url = substr($this->uri->uri_string,0, strpos($this->uri->uri_string, $segment)) . $segment;
            $is_active = $url == $this->uri->uri_string;
        ?>
        <?php if ($is_active):?>
            <li class="breadcrumb-item text-muted">
                <a href="<?php echo site_url($url) ?>"
                    class="text-muted text-hover-primary"><?php echo ucfirst($segment); ?></a>
            </li>
        <?php else: ?>
            <li class="breadcrumb-item text-muted"><?php echo ucfirst($segment); ?></li>
            <li class="breadcrumb-item">
                <span class="bullet bg-gray-400 w-5px h-2px"></span>
            </li>
        <?php endif; ?>
        

    <?php endforeach; ?>
    <!--end::Item-->
</ul>
<!--end::Breadcrumb-->