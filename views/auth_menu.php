    <nav class="auth_block">
        <ul>
            <?php if(isset($_SESSION['user_id'])): ?>
            <li><a href="?page=authorization&action=exit">Sorti</a></li>
            <li><a href="?page=profile&action=show_profile">Profil</a></li>
            <?php if($_SESSION['role'] ==1):?>
                <li><a href="?page=theme&action=add_theme">Ajouter un sujet</a></li>
            <?php endif; ?>
            <?php else:?>
            <li><a href="?page=authorization&action=authorization">Autorisation</a></li>
            <li><a href="?page=registration&action=registration">Inscription</a></li>
            <?php endif; ?>
        </ul>
    </nav>
