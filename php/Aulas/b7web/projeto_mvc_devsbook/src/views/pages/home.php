<?= $render('header'); ?>
    <section class="container main">
        <?= $render('sidebar'); ?>
        <section class="feed mt-10">
            <div class="row">
                <div class="column pr-5">
                    <?= $render('feed-new', ['user'  => $array]); ?>
                    <?php foreach($feed_item_array['posts'] as $array) { ?>
                        <?= $render('feed-item', [
                            'array' => $array
                        ]); ?>
                    <?php } ?>

                    <div class="feed-pagination">
                        <?php for($q=0; $q < $feed_item_array['pageCount']; $q++) { ?>
                            <a class="<?= $_GET['page'] == $q ? 'active' : ''; ?>" href="<?= $base?>/?page=<?= $q; ?>"><?= $q + 1; ?></a>
                        <?php } ?>
                    </div>
                </div>
                <div class="column side pl-5">
                    <div class="box banners">
                        <div class="box-header">
                            <div class="box-header-text">Patrocinios</div>
                            <div class="box-header-buttons">
                                
                            </div>
                        </div>
                        <div class="box-body">
                            <a href="<?= $base; ?>/"><img src="https://alunos.b7web.com.br/media/courses/php-nivel-1.jpg" /></a>
                            <a href="<?= $base; ?>/"><img src="https://alunos.b7web.com.br/media/courses/laravel-nivel-1.jpg" /></a>
                        </div>
                    </div>
                    <div class="box">
                        <div class="box-body m-10">
                            Criado com ❤️ por B7Web
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </section>
<?= $render('footer'); ?>