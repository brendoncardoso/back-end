<?= $render('header'); ?>
    <section class="container main">
        <?= $render('sidebar', ['activeMenu' => 'perfil']); ?>
        <section class="feed">
            <div class="row">
                <div class="box flex-1 border-top-flat">
                    <div class="box-body">
                        <div class="profile-cover" style="background-image: url('<?= $base; ?>/media/covers/<?= $getUser->cover; ?>');"></div>
                        <div class="profile-info m-20 row">
                            <div class="profile-info-avatar">
                                <img src="<?= $base; ?>/media/avatars/<?= $getUser->foto; ?>" />
                            </div>
                            <div class="profile-info-name">
                                <div class="profile-info-name-text"><?= $getUser->nome; ?></div>
                                <?php if(!empty($getUser->cidade)){ ?>
                                    <div class="profile-info-location"><?= $getUser->cidade; ?></div>
                                <?php } ?>
                            </div>
                            <div class="profile-info-data row">
                                <?php if($id_logado != $getUser->id) { ?>
                                    <div class="profile-info-item m-width-20">
                                        <a href="<?= $getUser->id; ?>/follow" class="button"><?= ($isFollowing) ? 'Deixar de Seguir' : 'Seguir'?></a>
                                    </div>
                                <?php } ?>
                                <div class="profile-info-item m-width-20">
                                    <div class="profile-info-item-n"><?= count($getUser->seguidores); ?></div>
                                    <div class="profile-info-item-s">Seguidores</div>
                                </div>
                                <div class="profile-info-item m-width-20">
                                    <div class="profile-info-item-n"><?= count($getUser->seguindo); ?></div>
                                    <div class="profile-info-item-s">Seguindo</div>
                                </div>
                                <div class="profile-info-item m-width-20">
                                    <div class="profile-info-item-n"><?= count($getUser->fotos); ?></div>
                                    <div class="profile-info-item-s">Fotos</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="column side pr-5">
                    <div class="box">
                        <div class="box-body">
                            <div class="user-info-mini">
                                <img src="<?= $base; ?>/assets/images/calendar.png" />
                                <?= date('d/m/Y', strtotime($getUser->data_nascimento)); ?> <?= "($getUser->idade anos)"; ?>
                            </div>

                            <?php if(!empty($getUser->cidade)){ ?>
                                <div class="user-info-mini">
                                    <img src="<?= $base; ?>/assets/images/pin.png" />
                                    <?= $getUser->cidade; ?>
                                </div>
                            <?php } ?>

                            <?php if(!empty($getUser->trabalho)){ ?>
                                <div class="user-info-mini">
                                    <img src="<?= $base; ?>/assets/images/work.pn" />
                                    <?= $getUser->trabalho; ?>
                                </div>
                            <?php } ?>
                        </div>
                    </div>

                    <div class="box">
                        <div class="box-header m-10">
                            <div class="box-header-text">
                                Seguindo
                                <span>(<?= count($getUser->seguindo); ?>)</span>
                            </div>
                            <div class="box-header-buttons">
                                <a href="<?= $base; ?>/">ver todos</a>
                            </div>
                        </div>
                        <div class="box-body friend-list">
                            <?php for($q = 0; $q < count($getUser->seguindo); $q++) { ?>
                                <div class="friend-icon">
                                    <a href="<?= $base; ?>/perfil/<?= $getUser->seguindo[$q]->id; ?>">
                                        <div class="friend-icon-avatar">
                                            <img src="<?= $base; ?>/media/avatars/<?= $getUser->seguindo[$q]->foto; ?>" />
                                        </div>
                                        <div class="friend-icon-name">
                                            <?= $getUser->seguindo[$q]->nome; ?>
                                        </div>
                                    </a>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
                <div class="column pl-5">
                    <div class="box">
                        <div class="box-header m-10">
                            <div class="box-header-text">
                                Fotos
                                <span>(<?= count($getUser->fotos); ?>)</span>
                            </div>
                            <div class="box-header-buttons">
                                <a href="<?= $base; ?>/">ver todos</a>
                            </div>
                        </div>
                        <div class="box-body row m-20">
                            <?php for($q = 0; $q < count($getUser->fotos); $q++) { ?>
                                <div class="user-photo-item">
                                    <a href="#modal-<?= $getUser->fotos[$q]->id; ?>" rel="modal:open">
                                        <img src="<?= $base; ?>/media/uploads/<?= $getUser->fotos[$q]->body; ?>"/>
                                    </a>
                                    <div id="modal-<?= $getUser->fotos[$q]->id; ?>" style="display:none">
                                        <img src="<?= $base; ?>/media/uploads/<?= $getUser->fotos[$q]->body; ?>" />
                                    </div>
                                </div>
                            <?php } ?>

                            <!--<div class="user-photo-item">
                                <a href="#modal-2" rel="modal:open">
                                    <img src="<?= $base; ?>/media/uploads/1.jpg" />
                                </a>
                                <div id="modal-2" style="display:none">
                                    <img src="<?= $base; ?>/media/uploads/1.jpg" />
                                </div>
                            </div>

                            <div class="user-photo-item">
                                <a href="#modal-3" rel="modal:open">
                                    <img src="<?= $base; ?>/media/uploads/1.jpg" />
                                </a>
                                <div id="modal-3" style="display:none">
                                    <img src="<?= $base; ?>/media/uploads/1.jpg" />
                                </div>
                            </div>

                            <div class="user-photo-item">
                                <a href="#modal-4" rel="modal:open">
                                    <img src="<?= $base; ?>/media/uploads/1.jpg" />
                                </a>
                                <div id="modal-4" style="display:none">
                                    <img src="<?= $base; ?>/media/uploads/1.jpg" />
                                </div>
                            </div>-->
                        </div>
                    </div>

                    <?php if($getUser->id == $id_logado) { ?>
                        <?= $render('feed-new', ['user'  => $array]); ?>
                    <?php } ?>

                    <?php foreach($feed['posts'] as $array) { ?>
                        <?= $render('feed-item', [
                            'array' => $array
                        ]); ?>
                    <?php } ?>

                    <div class="feed-pagination">
                        <?php for($q=0; $q < $feed['pageCount']; $q++) { ?>
                            <a class="<?= $_GET['page'] == $q ? 'active' : ''; ?>" href="<?= $base?>/perfil/<?= $getUser->id; ?>?page=<?= $q; ?>"><?= $q + 1; ?></a>
                        <?php } ?>
                    </div>

                    <!--<div class="box feed-item">
                        <div class="box-body">
                            <div class="feed-item-head row mt-20 m-width-20">
                                <div class="feed-item-head-photo">
                                    <a href="<?= $base; ?>/"><img src="<?= $base; ?>/media/avatars/avatar.jpg" /></a>
                                </div>
                                <div class="feed-item-head-info">
                                    <a href="<?= $base; ?>/"><span class="fidi-name">Bonieky Lacerda</span></a>
                                    <span class="fidi-action">fez um post</span>
                                    <br/>
                                    <span class="fidi-date">07/03/2020</span>
                                </div>
                                <div class="feed-item-head-btn">
                                    <img src="<?= $base; ?>/assets/images/more.png" />
                                </div>
                            </div>
                            <div class="feed-item-body mt-10 m-width-20">
                                Pessoal, tudo bem! Busco parceiros para empreender comigo em meu software.<br/><br/>
                                Acabei de aprová-lo na Appstore. É um sistema de atendimento via WhatsApp multi-atendentes para auxiliar empresas.<br/><br/>
                                Este sistema permite que vários funcionários/colaboradores da empresa atendam um mesmo número de WhatsApp, mesmo que estejam trabalhando remotamente, sendo que cada um acessa com um login e senha particular....
                            </div>
                            <div class="feed-item-buttons row mt-20 m-width-20">
                                <div class="like-btn on">56</div>
                                <div class="msg-btn">3</div>
                            </div>
                            <div class="feed-item-comments">
                                
                                <div class="fic-item row m-height-10 m-width-20">
                                    <div class="fic-item-photo">
                                        <a href="<?= $base; ?>/"><img src="<?= $base; ?>/media/avatars/avatar.jpg" /></a>
                                    </div>
                                    <div class="fic-item-info">
                                        <a href="<?= $base; ?>/">Bonieky Lacerda</a>
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
                                </div>

                                <div class="fic-answer row m-height-10 m-width-20">
                                    <div class="fic-item-photo">
                                        <a href="<?= $base; ?>/"><img src="<?= $base; ?>/media/avatars/avatar.jpg" /></a>
                                    </div>
                                    <input type="text" class="fic-item-field" placeholder="Escreva um comentário" />
                                </div>

                            </div>
                        </div>
                    </div>-->
                </div>
            </div>
        </section>
    </section>
<?= $render('footer'); ?>