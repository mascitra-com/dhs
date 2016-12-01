<?php for ($i = 0, $iMax = count($kategori); $i < $iMax; $i++) {?>
    <button class="list-group-item" data-toggle="collapse" data-target="#sx<?=$i?>">
        <?=$hotlist[$i]->kode_kategori?>. <?=ucwords(strtolower($hotlist[$i]->nama))?><span class="caret"></span><span class="badge"><?=$jml_hotlist[$i];?></span></button>
    <div id="sx<?=$i?>" class="sublinks collapse">
        <?=$kategori[$i]?>
        <br>
    </div>
<?php }?>