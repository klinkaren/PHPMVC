<hr>

<h2>Kommentarer</h2>

<?php if (is_array($comments)) : ?>

    <div class="post-list">
        <?php foreach ($comments as $id => $comment) : $postID = $id + 1 ?>
            <div class="post">
                
                <div class="post-left">
					<span class="post-id">#<?= $postID ?></span><br/>
					<span class="post-name"><?= $comment['name'] ?></span><br/>
                    <?php if( $comment['mail'] ): ?>
                            <a href="mailto:<?=$comment['mail']?>"><img alt="epost" src="img/email_icon.png"></a>
                    <?php endif; ?>					
                    <?php if( $comment['web'] ): ?>
                            <a href="<?= $comment['web'] ?>"><img alt="webb" src="img/website_icon.png"></a>
                    <?php endif; ?>
                </div>
                <div class="post-right">
                	<span class="time"><?= date("Y-m-d H:i", $comment['timestamp']); ?></span><br/>
					<span class="post-content "><?= $comment['content'] ?></span>
                    <form method=post>

                        <span class="post-menu">
                            <input type=hidden name="redirect" value="<?= $this->url->create($key) ?>">
                            <input type=hidden name="postId" value="<?= $postID ?>">
                            <input type=hidden name="pageKey" value="<?= $key ?>">
                            <input class="btn" type='submit' name='doRemovePost' value='delete' onclick="this.form.action='<?= $this->url->create('comment/remove-id') ?>'">
                            <input class="btn" type='submit' name='doEditId' value='edit' onclick="this.form.action='<?= $this->url->create('comment/edit') ?>'">
                        </span>
                    </form>

                </div>
                

                
            </div>
        <?php endforeach; ?>
    </div>

<?php endif; ?> 