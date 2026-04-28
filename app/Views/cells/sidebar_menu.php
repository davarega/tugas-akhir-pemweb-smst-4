<ul class="menu text-base-content w-full lg:menu-horizontal lg:gap-4">
    <?php foreach ($menu as $a) : ?>
        <li><a href="<?= base_url($a['url']) ?>" class="<?= ($active == $a['title']) ? 'bg-primary text-primary-content' : '' ?> lg:text-lg">
                <!-- <i class="fas <?= $a['icon']; ?>"></i> -->
                <i class="bi <?= $a['icon']; ?>"></i>
                <?= $a['title'] ?>
            </a></li>
    <?php endforeach ?>
</ul>
