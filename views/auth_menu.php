    <nav class="auth_block">
        <ul>
            <?php if(isset($_SESSION['user_id'])): ?>
            <li><a href="?page=authorization&action=exit">Sorti</a></li>
            <li><a href="?page=profile&action=show_profile">Profil</a></li>
            <?php else:?>
            <li><a href="?page=authorization&action=authorization">Autorisation</a></li>
            <li><a href="?page=registration&action=registration">Inscription</a></li>
            <?php endif; ?>
        </ul>
    </nav>
