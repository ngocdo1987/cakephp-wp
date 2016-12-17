<?php ?>
<!-- Navigation -->
<nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="#">CakePHP Admin</a>
    </div>
    <!-- /.navbar-header -->

    <ul class="nav navbar-top-links navbar-right">
        
        <li class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
            </a>
            <ul class="dropdown-menu dropdown-user">
                <li><a href="#"><i class="fa fa-user fa-fw"></i> User Profile</a>
                </li>
                <li><a href="#"><i class="fa fa-gear fa-fw"></i> Settings</a>
                </li>
                <li class="divider"></li>
                <li><a href="#"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                </li>
            </ul>
            <!-- /.dropdown-user -->
        </li>
        <!-- /.dropdown -->
    </ul>
    <!-- /.navbar-top-links -->

    <div class="navbar-default sidebar" role="navigation">
        <div class="sidebar-nav navbar-collapse">
            <ul class="nav" id="side-menu">
                <li class="sidebar-search">
                    <div class="input-group custom-search-form">
                        <input type="text" class="form-control" placeholder="Search...">
                        <span class="input-group-btn">
                            <button class="btn btn-default" type="button">
                                <i class="fa fa-search"></i>
                            </button>
                        </span>
                    </div>
                    <!-- /input-group -->
                </li>
                <li>
                    <?= $this->Html->link(
                        $this->Html->tag('i', '', 
                            ['class' => 'fa fa-dashboard fa-fw']
                        ).' Dashboard',
                        ['controller' => 'Dashboard'],
                        ['escape' => false]
                    ) ?>
                </li>
                
                <li>
                    <?= $this->Html->link(
                        $this->Html->tag('i', '', 
                            ['class' => 'fa fa-edit fa-fw']
                        ).' Posts'.
                        $this->Html->tag('span', '',
                            ['class' => 'fa arrow']
                        ),
                        ['controller' => 'Post', 'action' => 'index'],
                        ['escape' => false]
                    ) ?>
                    <ul class="nav nav-second-level">
                        <li>
                            <?= $this->Html->link(
                                'All Posts',
                                ['controller' => 'Post', 'action' => 'index'],
                                ['escape' => false]
                            ) ?>
                        </li>
                        <li>
                            <?= $this->Html->link(
                                'Add New',
                                ['controller' => 'Post', 'action' => 'add'],
                                ['escape' => false]
                            ) ?>
                        </li>
                        <li>
                            <?= $this->Html->link(
                                'Categories',
                                ['controller' => 'Category', 'action' => 'index'], 
                                ['escape' => false]
                            ) ?>
                        </li>
                        <li>
                            <?= $this->Html->link(
                                'Tags',
                                ['controller' => 'Tag', 'action' => 'index'],
                                ['escape' => false]
                            ) ?>
                        </li>
                    </ul>
                </li>
                
                <li>
                    <?= $this->Html->link(
                        $this->Html->tag('i', '', 
                            ['class' => 'fa fa-files-o fa-fw']
                        ).' Pages'.
                        $this->Html->tag('span', '',
                            ['class' => 'fa arrow']
                        ),
                        ['controller' => 'Page', 'action' => 'index'],
                        ['escape' => false]
                    ) ?>
                    
                    <ul class="nav nav-second-level">
                        <li>
                            <?= $this->Html->link(
                                'All Pages',
                                ['controller' => 'Page', 'action' => 'index'],
                                ['escape' => false]
                            ) ?>
                        </li>
                        <li>
                            <?= $this->Html->link(
                                'Add New',
                                ['controller' => 'Page', 'action' => 'add'],
                                ['escape' => false]
                            ) ?>
                        </li>
                    </ul>
                    <!-- /.nav-second-level -->
                </li>
            </ul>
        </div>
        <!-- /.sidebar-collapse -->
    </div>
    <!-- /.navbar-static-side -->
</nav>