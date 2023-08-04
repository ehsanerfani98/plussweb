<?php $headlines = $PLSWB_COURSE_OPTION['opt-headlines'];?>
<div class="accordion" id="accordionExample">
    <?php foreach ($headlines as $headline) : ?>
        <div class="card mb-2">
            <div class="card-header" id="headingOne">
                <h2 class="mb-0 d-flex align-items-center">
                    <div class="list-icon">
                        <i class="fa fa-user"></i>
                    </div>
                    <button class="btn btn-block text-left" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                        <?= $headline['opt-headline-title'] ?>
                    </button>
                </h2>
            </div>

            <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                <div class="card-body">
                    <?php foreach ($headline['opt-headline-item'] as $item) : ?>
                        <div class="item-headline">
                            <div class="item-headline-title">
                                <?= $item['opt-headline-item-title'] ?>
                            </div>
                            <a download href="<?= $item['opt-headline-item-link'] ?>" class="item-headline-link-download">
                                <div class="list-icon">
                                    <i class="fa fa-download"></i>
                                </div>
                            </a>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
</div>