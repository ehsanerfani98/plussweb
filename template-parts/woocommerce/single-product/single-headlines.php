    <?php if (isset($PLSWB_COURSE_OPTION['opt-headlines']) && !empty($PLSWB_COURSE_OPTION['opt-headlines'])) : ?>
        <div class="accordion" id="accordionExample">
            <?php foreach ($PLSWB_COURSE_OPTION['opt-headlines'] as $index => $headline) : ?>
                <div class="card mb-2">
                    <div class="card-header" id="headingOne">
                        <h2 class="mb-0 d-flex align-items-center">
                            <div class="list-icon">
                                <i class="<?= $headline['opt-headline-icon'] ?>"></i>
                            </div>
                            <button class="btn btn-block text-left" type="button" data-toggle="collapse" data-target="#item<?= $index ?>" aria-expanded="true" aria-controls="collapseOne">
                                <?= $headline['opt-headline-title'] ?>
                            </button>
                        </h2>
                    </div>

                    <div id="item<?= $index ?>" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
                        <div class="card-body">
                            <?php if (isset($headline['opt-headline-item'])) : ?>
                                <?php foreach ($headline['opt-headline-item'] as $item) : ?>
                                    <div class="item-headline">
                                        <div class="item-headline-title">
                                            <?= $item['opt-headline-item-title'] ?>
                                            <?php if (!empty($item['opt-headline-item-time'])) : ?>
                                                <span class="headline-time"><?= $item['opt-headline-item-time'] ?></span>
                                            <?php endif; ?>
                                        </div>
                                        <?php if ($item['opt-headline-item-status']) : ?>
                                            <a download href="<?= $item['opt-headline-item-link'] ?>" class="item-headline-link-download">
                                                <div class="list-icon">
                                                    <i class="fa fa-download"></i>
                                                </div>
                                            </a>
                                        <?php else : ?>
                                            <?php if (!$status_order) : ?>
                                                <div class="item-headline-link-download">
                                                    <div class="list-icon red-icon">
                                                        <i class="fa fa-lock"></i>
                                                    </div>
                                                </div>
                                            <?php else : ?>
                                                <a download href="<?= $item['opt-headline-item-link'] ?>" class="item-headline-link-download">
                                                    <div class="list-icon">
                                                        <i class="fa fa-download"></i>
                                                    </div>
                                                </a>
                                            <?php endif; ?>
                                        <?php endif; ?>
                                    </div>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    <?php else : ?>
        <div class="card my-2">
            <div class="content-card">
                سرفصلی برای این محصول درج نشده است!
            </div>
        </div>
    <?php endif; ?>