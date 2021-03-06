<div class="box feed-item">
    <div class="box-body">
        <div class="feed-item-head row mt-20 m-width-20">
            <div class="feed-item-head-photo">
                <a href="<?= $base; ?>/"><img src="<?= $base; ?>/media/avatars/<?= $array->user->foto; ?>" /></a>
            </div>
            <div class="feed-item-head-info">
                <a href="<?= $base; ?>/perfil/<?= $array->user->id; ?>"><span class="fidi-name"><?= $array->user->nome; ?></span></a>
                <span class="fidi-action">
                    <?php 
                        switch($array->tipo) { 
                            case 'text': 
                                echo 'fez um post';
                                break;
                            case 'photo':
                                echo 'publicou uma foto';
                                break;
                            default;
                        }
                    ?>
                </span>
                <br/>
                <span class="fidi-date"><?= date('d/m/Y - H:i:s', strtotime($array->criado_em)); ?></span>
            </div>
            <div class="feed-item-head-btn">
                <img src="<?= $base; ?>/assets/images/more.png" />
            </div>
        </div>
        <div class="feed-item-body mt-10 m-width-20">
            <?= nl2br($array->body); ?>
        </div>
        <div class="feed-item-buttons row mt-20 m-width-20">
            <div class="like-btn <?= ($array->liked == 0) ? '' : 'on'; ?>"><?= $array->countLike; ?></div>
            <div class="msg-btn"><?= count($array->comments); ?></div>
        </div>

        <div class="feed-item-comments">
            <!--<div class="fic-item row m-height-10 m-width-20">
                <div class="fic-item-photo">
                    <a href="<?= $base; ?>/"><img src="<?= $base; ?>/media/avatars/avatar.jpg" /></a>
                </div>
                <div class="fic-item-info">
                    <a href="">Bonieky Lacerda</a>
                    Comentando no meu próprio post
                </div>
            </div>

            <div class="fic-item row m-height-10 m-width-20">
                <div class="fic-item-photo">
                    <a href="<?= $base; ?>/"><img src="<?= $base; ?>/media/avatars/avatar.jpg" /></a>
                </div>
                <div class="fic-item-info">
                    <a href="<?= $base; ?>/">Bonieky Lacerda</a>
                    Muito legal, parabéns!
                </div>
            </div>-->

            <div class="fic-answer row m-height-10 m-width-20">
                <div class="fic-item-photo">
                    <a href="<?= $base; ?>/"><img src="<?= $base; ?>/media/avatars/<?= $array->user->foto; ?>" /></a>
                </div>
                <input type="text" class="fic-item-field" placeholder="Escreva um comentário" />
            </div>

        </div>
    </div>
</div>