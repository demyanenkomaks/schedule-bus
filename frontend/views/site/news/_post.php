
<div class="col-4">
    <a href="<?= \yii\helpers\Url::to(['new', 'url' => $model->url])?>">
        <div class="post">
            <div class="post-body" style="background-image: url(/img-news/<?= $model->img ?>);">
                <div class="text">
                    <h4 class="title"><?= $model->title ?></h4>
                    <p class="discr"><?= $model->abbreviated ?></p>
                </div>
            </div>
        </div>
    </a>
</div>
