<nav class="navbar navbar-default navbar-fixed">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#nav">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#"><?= (isset($title) ? $title : 'Dashboard') ?></a>
        </div>
        <ul class="nav navbar-nav navbar-right">
            <li>
                <a href="">
                    Account
                </a>
            </li>
        </ul>
    </div>
</nav>