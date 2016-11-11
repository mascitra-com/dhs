<?php $i = 1 ?>
<?php foreach ($list as $data): ?>
    <?php $j = count($data); ?>
    <!-- list & sublist -->
    <?php if ($j > 3) { ?>
        <button class="list-group-item" data-toggle="collapse" data-target="#sm<?= $i ?>">
            <span class="badge"><?= $data[2] ?></span> <?= $data[0] ?>. <?= $data[1] ?>
            <span class="caret"></span>
        </button>

        <div id="sm<?= $i ?>" class="sublinks collapse">
            <?php if (isset($data[3])): ?>
                <?php for ($k = 3; $k < $j; $k++): ?>
                    <a class="list-group-item small"
                       href="<?= site_url('katalog?kategori=') . $data[$k] ?>"><?= $data[$k++] ?>. <?= $data[$k++] ?>
                        <span class="badge"><?= $data[$k] ?></span></a>
                <?php endfor; ?>
            <?php endif; ?>
        </div>
        <!-- batas list & sublist -->
    <?php } else { ?>
        <a class="list-group-item" href="<?= site_url('katalog?kategori=') . $data[0] ?>">
            <span class="badge"><?= $data[2] ?></span> <?= $data[0] ?>. <?= $data[1] ?>
        </a>
    <?php } ?>
    <?php $i++; ?>
<?php endforeach; ?>