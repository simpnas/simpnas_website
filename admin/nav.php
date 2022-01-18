
<nav class="navbar navbar-expand-lg fixed-top navbar-dark bg-dark">
  <div class="navbar-brand">Admin Panel</div>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item">
        <a class="nav-link <?php if(basename($_SERVER["PHP_SELF"]) == "users.php" OR basename($_SERVER["PHP_SELF"]) == "add_user.php" OR basename($_SERVER["PHP_SELF"]) == "edit_user.php") { echo "active"; } ?>" href="users.php">Users</a>
      </li>
      <li class="nav-item">
        <a class="nav-link <?php if(basename($_SERVER["PHP_SELF"]) == "pages.php" OR basename($_SERVER["PHP_SELF"]) == "add_page.php" OR basename($_SERVER["PHP_SELF"]) == "edit_page.php") { echo "active"; } ?>" href="pages.php">Pages</a>
      </li>
      <li class="nav-item">
        <a class="nav-link <?php if(basename($_SERVER["PHP_SELF"]) == "links.php" OR basename($_SERVER["PHP_SELF"]) == "add_link.php" OR basename($_SERVER["PHP_SELF"]) == "edit_link.php") { echo "active"; } ?>" href="links.php">Links</a>
      </li>
      <?php if($config_module_blog_enabled == 1){ ?>
      <li class="nav-item">
        <a class="nav-link <?php if(basename($_SERVER["PHP_SELF"]) == "blogs.php" OR basename($_SERVER["PHP_SELF"]) == "add_blog.php" OR basename($_SERVER["PHP_SELF"]) == "edit_blog.php") { echo "active"; } ?>" href="blogs.php">Blogs</a>
      </li>
      <?php } ?>
      <?php if($config_module_docs_enabled == 1){ ?>
      <li class="nav-item">
        <a class="nav-link <?php if(basename($_SERVER["PHP_SELF"]) == "docs.php" OR basename($_SERVER["PHP_SELF"]) == "add_doc.php" OR basename($_SERVER["PHP_SELF"]) == "edit_doc.php") { echo "active"; } ?>" href="docs.php">Docs</a>
      </li>
      <?php } ?>
      <?php if($config_module_polls_enabled == 1){ ?>
      <li class="nav-item">
        <a class="nav-link <?php if(basename($_SERVER["PHP_SELF"]) == "polls.php" OR basename($_SERVER["PHP_SELF"]) == "add_poll.php" OR basename($_SERVER["PHP_SELF"]) == "edit_poll.php") { echo "active"; } ?>" href="polls.php">Polls</a>
      </li>
      <?php } ?>
      <?php if($config_module_forms_enabled == 1){ ?>
      <li class="nav-item">
        <a class="nav-link <?php if(basename($_SERVER["PHP_SELF"]) == "forms.php" OR basename($_SERVER["PHP_SELF"]) == "add_form.php" OR basename($_SERVER["PHP_SELF"]) == "edit_form.php") { echo "active"; } ?>" href="forms.php">Forms</a>
      </li>
      <?php } ?>
      <?php if($config_module_uploads_enabled == 1){ ?>
      <li class="nav-item">
        <a class="nav-link <?php if(basename($_SERVER["PHP_SELF"]) == "files.php") { echo "active"; } ?>" href="files.php">Files</a>
      </li>
      <?php } ?>
      <?php if($config_module_stats_enabled == 1){ ?>
      <li class="nav-item">
        <a class="nav-link <?php if(basename($_SERVER["PHP_SELF"]) == "stats.php") { echo "active"; } ?>" href="stats.php">Stats</a>
      </li>
      <?php } ?>
    </ul>
    <ul class="navbar-nav">
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown">
          <i class="fas fa-fw fa-user"></i> <?php echo $session_username; ?>
        </a>
        <div class="dropdown-menu dropdown-menu-right">
          <a class="dropdown-item" href="/">Back</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="../logout.php">Logout</a>
        </div>
      </li>
    </ul>
  </div>
</nav>