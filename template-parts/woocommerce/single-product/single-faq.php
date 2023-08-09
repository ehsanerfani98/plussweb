    <?php if (isset($PLSWB_COURSE_OPTION['opt-faq']) && !empty($PLSWB_COURSE_OPTION['opt-faq'])) : ?>
        <div class="accordion" id="accordionExample">
            <?php foreach ($PLSWB_COURSE_OPTION['opt-faq'] as $index => $faq) : ?>
                <div class="card mb-2">
                    <div class="card-header" id="headingOne">
                        <h2 class="mb-0 d-flex align-items-center">
                            <div class="list-icon">
                                <i class="fa fa-user"></i>
                            </div>
                            <button class="btn btn-block text-left" type="button" data-toggle="collapse" data-target="#item<?= $index ?>" aria-expanded="true" aria-controls="collapseOne">
                                <?= $faq['opt-faq-question'] ?>
                            </button>
                        </h2>
                    </div>

                    <div id="item<?= $index ?>" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
                        <div class="card-body faq">
                            <?php if (isset($faq['opt-faq-answer'])) : ?>
                                <p>
                                    <?= $faq['opt-faq-answer'] ?>
                                </p>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    <?php else : ?>
        <div class="card my-2">
            <div class="content-card">
                سوالات متداولی برای این محصول درج نشده است!
            </div>
        </div>
    <?php endif; ?>