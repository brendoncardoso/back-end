<div class="box feed-new">
    <div class="box-body">
        <div class="feed-new-editor m-10 row">
            <div class="feed-new-avatar">
                <img src="<?= $base; ?>/media/avatars/<?= $user->foto; ?>" />
            </div>
            <div class="feed-new-input-placeholder">O que você está pensando, <?= $user->nome; ?>?</div>
            <div class="feed-new-input" contenteditable="true" name='feed-new-input"'></div>
            <div class="feed-new-send">
                <img src="<?= $base; ?>/assets/images/send.png" />
            </div>
        </div>
    </div>
</div>

<form class='feed_new_form' action="<?= $base ;?>/post/newPost" method="post">
    <input type="text" name="newPost" id="" hidden>
</form>

<script type='text/javascript'>
    var feed_new_input = document.querySelector('.feed-new-input');
    var feed_new_send = document.querySelector('.feed-new-send');
    var feed_new_form = document.querySelector('.feed_new_form');

    feed_new_send.addEventListener('click', function(obj){
        let value = feed_new_input.innerText;
        if(value != ''){
            feed_new_form.querySelector("input[name='newPost']").value = value;
            feed_new_form.submit();
        }
    });
</script>