<?php
    $this->title = 'Партнеры';
?>

<div class="autodor-container">
    <div class="page-title">
        <div class="line"></div><?=$this->title?><div class="line"></div>
    </div>
    <div class="container">
        <div class="row justify-content-center">
            <?php foreach($partners as $p):?>
                <div class="col-4 d-flex flex-column align-items-center mb-3">
                    <a href="<?=$p->url??''?>"><img class="m-3" height="80" src="/frontend/web/logo_partners/<?=$p->img?>" alt="<?=$p->title?>"></a>
                    <h4><?=$p->title?></h4>
                </div>
            <?php endforeach?>
        </div>
    </div>
</div>